<?php get_header();?>
<?php $url = get_template_directory_uri(); ?>
<?php $home = get_page_by_path('inicio'); ?>
<div class="wrapper">
	<div class="home-image">
		<?php echo (get_the_post_thumbnail($home));?>
	</div>
	<div class="sub-menu">
		<?php $buffet = get_page_by_path('servicios/buffet');?>
		<?php $panaderia = get_page_by_path('productos/panaderia');?>
		<?php $embutidos_de_soya = get_page_by_path('productos/embutidos-de-soya');?>
		<?php $eventos = get_page_by_path('servicios/eventos');?>
		<div class="page buffet">
			<h3 class="page-title"> <?php echo(get_the_title($buffet->ID));?></h3>
			<a href="<?php echo(get_permalink($buffet->ID));?>"></a>
			<div class="images">
				<?php $gallery = get_post_gallery_images($buffet->ID);?>
				<?php foreach ($gallery as $image): ?>
				<img src="<?php echo($image);?>" alt="">
				<?php endforeach; ?>
			</div>
		</div>
		<div class="page panaderia">
			<h3 class="page-title"> <?php echo(get_the_title($panaderia->ID));?></h3>
			<a href="<?php echo(get_permalink($panaderia->ID));?>"></a>
			<div class="images">
				<?php $gallery = get_post_gallery_images($panaderia->ID);?>
				<?php foreach ($gallery as $image): ?>
				<img src="<?php echo($image);?>" alt="">
				<?php endforeach; ?>
			</div>
		</div>
		<div class="page embutidos">
			<h3 class="page-title"> <?php echo(get_the_title($embutidos_de_soya->ID));?></h3>
			<a href="<?php echo(get_permalink($embutidos_de_soya->ID));?>"></a>
			<div class="images">
				<?php $gallery = get_post_gallery_images($embutidos_de_soya->ID);?>
				<?php foreach ($gallery as $image): ?>
				<img src="<?php echo($image);?>" alt="">
				<?php endforeach; ?>
			</div>
		</div>
		<div class="page eventos">
			<h3 class="page-title"> <?php echo(get_the_title($eventos->ID));?></h3>
			<a href="<?php echo(get_permalink($eventos->ID));?>"></a>
			<div class="images">
				<?php $gallery = get_post_gallery_images($eventos->ID);?>
				<?php foreach ($gallery as $image): ?>
				<img src="<?php echo($image);?>" alt="">
				<?php endforeach; ?>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php get_footer();?>