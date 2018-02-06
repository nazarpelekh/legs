<?php
header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + 3600));
header('Content-Type: text/html; charset=utf-8');
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header('X-UA-Compatible: IE=Edge,chrome=1');
/*
// HTML Compress
function ob_html_compress($buf){
return preg_replace(array('/<!--(?>(?!\[).)(.*)(?>(?!\]).)-->/Uis','/[[:blank:]]+/'),array('',' '),str_replace(array("\n","\r","\t"),'',$buf));
}
ob_start('ob_html_compress');
*/
?>
<!DOCTYPE html>
<html>
<head lang="fr">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Legs</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
<body class="front">
<header id="header">
    <div class="container clearfix">
        <button class="button-small button-question block-left"><span class="bl-icon bl-icon--letter"></span>Posez votre question</button>
        <form action="" id="search-header-form" class="block-right">
            <input type="search" id="search" placeholder="Rechercher un dossier, un article ...">
            <button type="submit" class="button-small">rechercher <span class="bl-icon bl-icon--search"></span></button>
        </form>
        <div class="close"><i class="fa fa-times" aria-hidden="true"></i></div>
    </div>
</header>

<section id="main-menu-section">
  <div class="wrap-section">
    <div class="container text-center">
      <div class="menu-bars"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt=""></a></div>
      <?php  wp_nav_menu(array('container' => false, 'items_wrap' => '<ul id="main-menu" class="clearfix">%3$s</ul>', 'theme_location'  => 'main_menu')); ?>
      <ul class="headers-bar">
        <li><a href="#" class="question-bar"><span class="bl-icon--letter_white"></span>Nous contacter</a></li>
        <li><a href="#" class="search-bar"><span class="bl-icon--search search-bar"></span></a></li>
      </ul>
      <div class="menu-mobile block-right">
        <span class="fa fa-search search-bar" aria-hidden="true"></span>
        <div class=" menu-bar">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
  </div>
</section>
<?php wp_head(); ?>