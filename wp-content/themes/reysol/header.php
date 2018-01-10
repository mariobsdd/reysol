	<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
		<?php wp_head();?>
		<?php $url = get_template_directory_uri(); ?>
		<link href="https://fonts.googleapis.com/css?family=Qwigley" rel="stylesheet">
		<!-- TAGS -->
		<meta name="description" content="Restaurante Vegetariano">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="apple-mobile-web-app-title" content="Rey Sol">
		<meta name="application-name" content="Rey Sol">
		<!-- FACEBOOK TAGS -->
		<meta property="og:url"                content="http://www.restaurantereysol.com" />
		<meta property="og:type"               content="Webpage" />
		<meta property="og:title"              content="Rey Sol" />	
	</head>
	<body <?php body_class();?>>
		<div id="header">
			<div id="header-top">
				<img class="wave" src="<?php echo($url).'/images/waves.png';?> " alt="">
				<?php wp_nav_menu( array( 'theme_location' => 'header', 'menu_class' => 'header-menu') ); ?>
				<div class="logo">
					<img src="<?php echo($url).'/images/logo.png'?>" alt="">
				</div>
			</div>
			<div id="header-bottom">
			<?php if (!(is_page('inicio'))): ?>
				<?php echo (the_post_thumbnail());?>
			<?php endif;?>
			</div>
		</div>

