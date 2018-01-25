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
				<div class="header-menu">
					<ul>
				<?php $menu_name = "header"; ?>
        		<?php $array = wp_get_nav_menu_items($menu_name); ?>
        		<?php $padres =array(); ?>
        		<?php $hijos =array(); ?>
        		<?php foreach ( $array as $item ): ?>
            		<?php $menu = $item->title; ?>
            		<?php $id_menu = $item->ID; ?>
            		<?php $url = $item->url; ?>
            		<?php $parent = $item->menu_item_parent; ?>
            		<?php if ($parent == 0): ?>
                		<?php array_push($padres, $item); ?>
            		<?php else: ?>
                		<?php   array_push($hijos, $item); ?>
            		<?php endif; ?>
        		<?php endforeach; ?>
		        <?php foreach ($padres as $key=>$elem): ?>
        		    <?php $cont = 0;?>
            		<?php $menu = $elem->title; ?>
            		<?php $id_menu = $elem->ID; ?>
            		<?php $url = $elem->url; ?>
            		<?php if ($menu == 'Inicio'):?>
                    <li class="page_item"><a href="<?php echo get_home_url()?>">Inicio</a></li>
            		<?php else: ?>
            			<li class="page_item page_item_has_children"><a href="<?php echo $url ?>"><?php echo $menu ;?></a>
            		<?php endif; ?>
            		<?php foreach ($hijos as $keyc=>$child): ?>
                		<?php $size = sizeof($hijos)-1; ?>
                		<?php $parent = $child->menu_item_parent; ?>
                		<?php $name_child = $child->title; ?>
                		<?php $url_child = $child->url; ?>
                		<?php if ($parent == $id_menu):?>
                    		<?php $cont = $cont + 1; ?>
                    		<?php if ($cont == 1):?>
                        	<ul class="children">
                    		<?php endif;?>
                            	<li class='page_item'><a href="<?php echo $url_child ?>"><?php echo $name_child;?></a></li>
                		<?php endif; ?>
                		<?php if ($keyc == $size && $cont>0):?>
                    		</ul>
                		<?php endif; ?>
            		<?php endforeach; ?>
            			</li>
        	<?php endforeach; ?>
					</ul>
				</div>
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

