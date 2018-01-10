<?php get_header();?>
<?php $url = get_template_directory_uri(); ?>
<?php the_post();?>
<div class="wrapper">
	<h3 class="title"><?php the_title();?></h3>
	<div class="content">
		<?php if (is_page('eventos')): ?>
		<div class="category-title menu-title"><img src="<?php echo($url).'/images/solecito.png'?>" alt=""><h3>Menús</h3></div>
		<?php $menus_query_args = array(
			'post_type' => 'menu',
			'order' => ASC,
			'orderby'=>'menu_order'
			);?>
		<?php $menus = new WP_Query($menus_query_args);?>
		<?php if ($menus->have_posts()):;?>
		<div class="menus">
			<?php while ($menus->have_posts()): ?>
			<?php $menus->the_post(); ?>
			<div class="menu <?php echo($post->post_name);?>">
				<h4 class="menu_title">
					<img src="<?php echo($url).'/images/solecito.png'?>" alt=""><?php the_title();?>
				</h4>
				<p class="description"><?php echo(get_the_content(get_the_ID()));?></p>
				<p class="price"><strong>Q. </strong><?php echo(number_format(get_post_meta(get_the_ID(),'_priceMenu',true),2,'.',''));?></p>
			</div>
			<?php endwhile; ?>
		</div>
		<div class="clear"></div>
		<?php endif; ?>
		<?php wp_reset_postdata();?>
		<div class="category-title condiciones"><img src="<?php echo($url).'/images/solecito.png'?>" alt=""><h3>Condiciones de Servicio</h3></div>
		<?php endif;?>
			<p class="content-text">
			<?php echo strip_shortcodes(wpautop(get_the_content())); ?>
			</p>
		<?php if(!is_page('menu-a-la-carta')): ?>
		<div class="gallery">
			<?php $gallery = get_post_gallery_images($panaderia->ID);?>
			<?php foreach ($gallery as $image): ?>
			<img src="<?php echo($image);?>" alt="">
			<?php endforeach; ?>
		</div>
		<?php endif?>
		<div class="clear"></div>
		<?php if (is_page('menu-a-la-carta')): ?>
		<div class="carta">
			<?php $categories = get_categories(array(
					'echo'=>false,
					'title_li'=>'',
					'hide_empty'=>false,
					'style' => 'title',
					'orderby' => 'meta_value',
					'meta_key' => '_menuOrder' 
			));?>
			<?php foreach ($categories as $category):?>
			<div class="category <?php echo($category->slug);?>">
				<div class="category-title"><img src="<?php echo($url).'/images/solecito.png'?>" alt=""><h3><?php echo($category->name);?></h3></div>
				<div class="description">
					<p class="descripcion"><?php echo($category->description);?></p>
					<p class="description"><?php echo(get_term_meta($category->term_id,'_traduction',true));?></p>
				</div>
				<?php $category_query_args = array(
					'cat'=>$category->term_id,
					'post_type' => 'carta',
					'order' => ASC,
					'orderby'=>'menu_order'
					);?>
				<?php $productos = new WP_Query($category_query_args);?>
				<?php if ($productos->have_posts()):;?>
				<div class="productos">
					<?php while ($productos->have_posts()): ?>
					<?php $productos->the_post(); ?>
					<div class="product <?php echo($post->post_name);?>">
						<h4 class="product_title">
							<img src="<?php echo($url).'/images/solecito.png'?>" alt=""><?php the_title();?>
						</h4>
						<p class="description"><?php echo(get_the_content(get_the_ID()));?></p>
						<p class="translation"><?php echo(get_post_meta(get_the_ID(),'_translationproduct',true));?></p>
						<p class="price"><strong>Q. </strong><?php echo(number_format(get_post_meta(get_the_ID(),'_priceproduct',true),2,'.',''));?></p>
					</div>
					<?php endwhile; ?>
				</div>
				<div class="clear"></div>
				<?php endif; ?>
				<?php wp_reset_postdata();?>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif;?>
	</div>
</div>
<?php get_footer();?>