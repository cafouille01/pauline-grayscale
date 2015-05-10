<?php
// Paramètres Flickr
$params = array(
	'api_key'	=>	'3f598cd059e537cd5b0d5197960bd5b1',
	'user_id'	=>	'110135843@N07',
	'method'	=>	'flickr.photosets.getList',
	'format'	=>	'php_serial' 
);

// Appel à l'API Flickr
$encoded_params = array();	 
foreach ($params as $k => $v){
	$encoded_params[] = urlencode($k).'='.urlencode($v);
}		 

$ch = curl_init();
$timeout = 5;
curl_setopt ($ch, CURLOPT_URL, 'https://api.flickr.com/services/rest/?'.implode('&', $encoded_params));
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$file_contents = curl_exec($ch);
curl_close($ch);
$rsp_obj = unserialize($file_contents);
?>
<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8" />
<title>Albums Flickr</title>	
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="robots" content="index, follow" />
<link rel="stylesheet" type="text/css" href="styles.css" />
<link rel="stylesheet" type="text/css" href="scripts/colorbox/colorbox.css" />
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/colorbox/jquery.colorbox-min.js"></script>
</head>

<body>

<div id="main">

	<h1>Albums Flickr</h1>	
	
	<?php				
	if($rsp_obj['stat'] == 'ok') {
		foreach($rsp_obj['photosets']['photoset'] as $photo) {
			$id         = $photo['id'];					// ID de l'album
			$primary    = $photo['primary'];			// Photo principale de l'album
			$secret     = $photo['secret'];				// Identifiant secret de la photo
			$server     = $photo['server'];				// ID du serveur
			$farm       = $photo['farm'];				// Numéro du sous domaine
			$titre      = $photo['title']['_content'];	// Titre de l'album
			$nb_photos	= $photo['photos'];				// Nombre de photos
			$lien		= "photos.php?id=" . $id;		// Lien vers les photos
			$photo_url	= "http://farm" . $farm . ".static.flickr.com/" . $server . "/" . $primary . "_" . $secret . "_m.jpg"; // URL de la photo principale
			?>
			<div class="galerie">
				<a href="<? echo $lien; ?>" title="<? echo $titre; ?>"><? echo $titre; ?></a>				
				<div class="galerie_image"><a href="<? echo $lien; ?>" title="<? echo $titre; ?>"><img src="<? echo $photo_url; ?>" alt="<?php echo $titre; ?>" title="<?php echo $titre; ?>" /></a></div>
				<div class="nb_photos"><span class="gris"><? echo $nb_photos; ?> photo<? if($nb_photos > 1) echo "s"; ?></span></div>
			</div>
		<?php
		}
	}
	else {
		echo "Echec de l'appel Flickr !";
	}
	?>	
	
	<br /><br />
	<div><a href="http://www.tikoweb.fr" title="www.tikoweb.fr">www.tikoweb.fr</a></div>			
	
</div>

</body>
</html>