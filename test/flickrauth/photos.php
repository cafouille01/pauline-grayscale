<?
// ID de l'alnum
//$id = $_GET['id'];
$id = '72157650415680122';

// Paramètres Flickr
$params = array(
	'api_key'		=>	'3f598cd059e537cd5b0d5197960bd5b1',
	'user_id'		=>	'110135843@N07',
	'method'		=>	'flickr.photosets.getPhotos',
	'photoset_id'   =>	$id,
	'format'		=>	'php_serial' 
);
$encoded_params = array();
foreach ($params as $k => $v){
	$encoded_params[] = urlencode($k).'='.urlencode($v);
}

// Photos
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
<title><? echo $rsp_obj['photoset']['title']; ?></title>	
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="robots" content="index, follow" />
<link rel="stylesheet" type="text/css" href="styles.css" />
<link rel="stylesheet" type="text/css" href="scripts/colorbox/colorbox.css" />
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/colorbox/jquery.colorbox-min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	$("a[rel='photos']").colorbox({transition:"fade"});
});
</script>
</head>

<body>

<div id="plusgallery">

	<div id="pgthumbview" style="display: block;">
		<ul id="pgthumbcrumbs" class="clearfix">
			<li id="pgthumbhome">«</li>
			<li class="crumbtitle"><? echo $rsp_obj['photoset']['title']; ?></li>
		</ul>

		<ul id="pgthumbs" class="clearfix">	
	
	<?			
		$nbre_photo = 0;	
		if($rsp_obj['stat'] == 'ok') {
			foreach ($rsp_obj['photoset']['photo'] as $photo) {
		
				$id			= $photo['id'];			// ID de la photo
				$secret		= $photo['secret'];		// Identifiant secret de la photo
				$server		= $photo['server'];		// ID du serveur
				$farm		= $photo['farm'];		// Numéro du sous domaine
				$titre		= $photo['title'];		// Titre de la photo			
				$image 		= "http://farm" . $farm . ".static.flickr.com/" . $server . "/" . $id . "_" . $secret . "_m.jpg"; // URL de l'aperçu de la photo
				$lien		= "http://farm" . $farm . ".static.flickr.com/" . $server . "/" . $id . "_" . $secret . "_b.jpg"; // URL de la photo élargie
		
				$nbre_photo++;
				//echo $nbre_photo;

				if ($nbre_photo > '10') {
					//echo 'terminée';
					break;
				}
	?>

					<li class="pgthumb">
						<a href="<? echo $lien; ?>" rel="photos">
							<img src="<? echo $image; ?>" id="pgthumbimg0" class="pgthumbimg" alt="<?php echo $titre; ?>" title="<?php echo $titre; ?>" />
						</a>
					</li>


	<?php
				
			}
		}

		else {
			echo "Échec de l'appel Flickr !";
		}
	?>
	
		</ul>
	</div>
</div>

</body>
</html>