<?php
	/*-----------------------------------------------------------------------------------*/
	/* This template will be called by all other template files to begin 
	/* rendering the page and display the header/nav
	/*-----------------------------------------------------------------------------------*/
?>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title>
	<?php bloginfo('name'); // show the blog name, from settings ?> | 
	<?php if( is_home() ) : echo bloginfo( 'description' ); // if we're on the home page, show the description, from settings 
		endif; ?>
	<?php wp_title( '', true ); // then, show the title of the post or page, if we are on one ?>
</title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // We are loading our theme directory style.css by enquing scripts in our functions.php file, 
	// so if you want to load other stylesheets,
	// I would load them with a call in your style.css
?>

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); 
// This fxn allows plugins to insert themselves/scripts/css/files (right here) into the head of your website. 
// Removing this fxn call will disable all kinds of plugins and Wordpress default insertions. 
// Move it if you like, but keep it around.
?>

</head>

<body <?php body_class(); ?>>

<header id="masthead" class="site-header" role="banner">
	<div class="container center">
	
		<nav role="navigation" class="site-navigation main-navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); // Display the user-defined menu in Appearance > Menus ?>
		</nav><!-- .site-navigation .main-navigation -->

		<div id="brand">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); // Link to the home page ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); // Title it with the blog name ?>" rel="home"><?php bloginfo( 'name' ); // Display the blog name ?></a></span></h1>
		</div><!-- /brand -->
		
		<div class="clear"></div>
	</div><!--/container -->
		
</header><!-- #masthead .site-header -->

<div class="main-fluid"><!-- start the page containter -->