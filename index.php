<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Pauline Vial">
    <!-- <meta name='robots' content='noindex,nofollow' /> -->
    <title>paulinevial.com</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/grayscale.css" rel="stylesheet">
    <link href="css/twitter-api.css" rel="stylesheet">
    <link href="css/colorbox.css" rel="stylesheet">
    <link href="css/flickr-api.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600,800,400' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <i class="fa fa-play-circle"></i>  <span class="light">PAULINE</span>VIAL.COM
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#tweet">Tweet</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#flickr">Flickr</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">Bienvenue</h1>
                        <!-- <p class="intro-text"></p> -->
                        <a href="#about" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>A propos de moi</h2>
                <br></br>
                <p> Je suis interréssée par l'informatique, la photographie, l'aéronautique et pleins d'autres choses.  A mes heures perdues, je fais de la veille numérique, je bricole, je prend des photos, etc.. <br />Par contre, je suis tête en l'air et souvent en retard --'</p>
                
                <p> Vous avez une question, n'hésitez pas, <a href="#contact" class=" page-scroll"> contacter moi </a> ! </p>
                <br></br>
            </div>
        </div>
    </section>

    <!-- Separation Section -->
    <section id="separation" class="container content-section text-center">
        <div class="row">
            <div class="separationsection"></div>
        </div>
    </section>

    <!-- Tweet Section -->
    <section id="tweet" class="container content-section text-center">
        <div class="tweet-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <h2>Quelques Tweets de Twitter</h2>
                        <?php

                            date_default_timezone_set('Europe/Paris');

                            /* 1 - Settings (please update to math your own) */
                            $consumer_key='KTF226FCe29Gd7bhj1sAjfoj2'; // application consumer key
                            $consumer_secret='Cmle8o047Zpc4ZiA2o3mnbTK7HKTXZc8uITxyuFa7W5ecZAH0C'; // application consumer secret
                            $oauth_token = '160325875-dCRxJggxLF0sDAFaM7AaUingB4gX4K1Dg4qxTCeE'; // your oAuth Token
                            $oauth_token_secret = 'ltfqcVnELiaIXdsP48AfCUo8o9PlnGYx3A3Fqx0BCM0bP'; // your oAuth Token Secret

                            if(!empty($consumer_key) && !empty($consumer_secret) && !empty($oauth_token) && !empty($oauth_token_secret)) {

                                /* 2 - Include @abraham's PHP twitteroauth Library */
                                require_once('twitteroauth/twitteroauth.php');

                                /* 3 - Authentication */
                                /* Create a TwitterOauth object with consumer/user tokens. */
                                $connection = new TwitterOAuth($consumer_key, $consumer_secret, $oauth_token, $oauth_token_secret);

                                /* 4 - Start Querying - Your Twitter API query */
                                $query = 'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=paulinevial&count=5'; //
                                $content = $connection->get($query);
                            }

                            if(!empty($consumer_key) && !empty($consumer_secret) && !empty($oauth_token) && !empty($oauth_token_secret)) {

                                $i=4;

                                if(!empty($content)){ foreach($content as $tweet) {

                                    echo '
                                    <div class="api-twitter'.$i.'">
                                        <blockquote class="twitter-tweet">
                                            <p class="twitter-tweet" > '.parseTweet($tweet->text).' </p>
                                            <a href="http://twitter.com/'.$tweet->user->screen_name.'"> &mdash; <b>'.$tweet->user->name.'</b> (@'.$tweet->user->screen_name.') </a>
                                            <a class="twitter-tweet" href="https://twitter.com/'.$tweet->user->screen_name.'/status/'.$tweet->id.'">'   .date('d F - H:i',strtotime($tweet->created_at)).'</a>
                                        </blockquote>

                                    </div>';

                                    $i = $i-1;

                                }
                            }
                        } 

                        else {
                            echo'<div><p>Please update your settings to provide valid credentials</p>';
                        }
                        echo '</div>';

                        /*
                         * Transform Tweet plain text into clickable text
                         */
                        function parseTweet($text) {
                            $text = preg_replace('#http://[a-z0-9._/-]+#i', '<a  target="_blank" href="$0">$0</a>', $text); //Link
                            $text = preg_replace('#@([a-z0-9_]+)#i', '@<a  target="_blank" href="http://twitter.com/$1">$1</a>', $text); //usernames
                            $text = preg_replace('# \#([a-z0-9_-]+)#i', ' #<a target="_blank" href="http://search.twitter.com/search?q=%23$1">$1</a>', $text); //Hashtags
                            $text = preg_replace('#https://[a-z0-9._/-]+#i', '<a  target="_blank" href="$0">$0</a>', $text); //Links
                            return $text;
                        }

                    ?>
                        
                    </div>
                </div>
            <div>
        </div>
    </section>

    <!-- Separation Section -->
    <section id="separation" class="container content-section text-center">
        <div class="row">
            <div class="separationsection"></div>
        </div>
    </section>

    <!-- Flickr Section -->
    <section id="flickr" class="content-section text-center">
        <div class="flickr-section">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2>Quelques photos de Flickr</h2>
                    <?
                        // ID de l'alnum - $id = $_GET['id'];
                        $id = '72157650415680122';

                        // Paramètres Flickr
                        $params = array(
                            'api_key'       =>  '3f598cd059e537cd5b0d5197960bd5b1',
                            'user_id'       =>  '110135843@N07',
                            'method'        =>  'flickr.photosets.getPhotos',
                            'photoset_id'   =>  $id,
                            'per_page'      =>  '10',
                            'format'        =>  'php_serial' 
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

                    <div id="plusgallery">

                        <div id="pgthumbview" style="display: block;">
                            <h3 class="pgtcolor">- <? echo $rsp_obj['photoset']['title']; ?> -</h3>

                            <ul id="pgthumbs" class="clearfix list-inline"> 
    
                    <?php          
                                $nbre_photo = 0;    
                                if($rsp_obj['stat'] == 'ok') {
                                    foreach ($rsp_obj['photoset']['photo'] as $photo) {
        
                                        $id         = $photo['id'];         // ID de la photo
                                        $secret     = $photo['secret'];     // Identifiant secret de la photo
                                        $server     = $photo['server'];     // ID du serveur
                                        $farm       = $photo['farm'];       // Numéro du sous domaine
                                        $titre      = $photo['title'];      // Titre de la photo            
                                        $image      = "http://farm" . $farm . ".static.flickr.com/" . $server . "/" . $id . "_" . $secret . "_m.jpg"; // URL de l'aperçu de la photo
                                        $lien       = "http://farm" . $farm . ".static.flickr.com/" . $server . "/" . $id . "_" . $secret . "_b.jpg"; // URL de la photo élargie
        
                                        $nbre_photo++;

                                        if ($nbre_photo > '10') {
                                            //echo 'terminée';
                                            break;
                                        }
                    ?>

                                        <li class="pgthumb">
                                            <a href="<? echo $lien; ?>" title="<?php echo $titre; ?>" rel="photos">
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
                    
                    <br /><br />
                    
                    <div id="pgcredit">
                        <a href="https://www.flickr.com/photos/110135843@N07/sets/72157650415680122/" target="_blank" title="suite album">La suite de l'album </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Separation Section -->
    <section id="separation" class="container content-section text-center">
        <div class="row">
            <div class="separationsection"></div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Contacter moi</h2>
                <p>Vous souhaitez me contacter pour me poser une question sur un article, sur ce que je fais dans la vie, ou tout simplement pour me dire bonjour ! </p>
                <p> Rien de plus simple !! Vous avez le choix : </p>
                <p><a href="mailto:contact@paulinevial.com">contact@paulinevial.com</a>
                </p>
                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="https://twitter.com/paulinevial" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                    </li>
                    <li>
                        <a href="https://www.flickr.com/photos/110135843@N07/sets/" class="btn btn-default btn-lg"><i class="fa fa-flickr fa-fw"></i> <span class="network-name">Flickr</span></a>
                    </li>
                    <li>
                        <a href="http://yooying.com/cafouille01" class="btn btn-default btn-lg"><i class="fa fa-instagram fa-fw"></i> <span class="network-name">Instagram</span></a>
                    </li>
                    <li>
                        <a href="https://fr.linkedin.com/in/paulinevial" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-8 col-lg-offset-2">
            
            </div>
        </div>
    </section>

    <!-- Separation Section -->
    <section id="separation" class="container content-section text-center">
        <div class="row">
            <div class="separationsection"></div>
        </div>
    </section>

    <!-- Map Section -->
    <div id="map"></div>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; paulinevial.com - 2015</p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/grayscale.js"></script>

    <!-- ColorBox  -->
    <script src="js/jquery.colorbox-min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("a[rel='photos']").colorbox({transition:"fade"}); 
    }); 
    </script>



</body>

</html>
