<?php
global $page_block;


?>

<section class="info-card">
	<div class="container">
		<div class="info-card__row">
			<div class="info-card__content">
				<h2><?php echo $page_block['title']?></h2>
				<div class="info-card__subtitle"><?php echo $page_block['subtitle']?></div>
				<div><?php echo $page_block['text']?></div>
			</div>
			<div class="info-card__img">
				<?php echo wp_get_attachment_image( $page_block['image']['id'], 'full' ); ?>
			</div>
		</div>
	</div>
</section>