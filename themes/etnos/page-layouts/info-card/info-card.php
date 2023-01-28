<?php
global $page_block;


?>

<section class="etnos-info-card">
	<div class="container">
		<div class="etnos-info-card__wrap">
			<div class="etnos-info-card__content">
				<h2><?php echo $page_block['title'] ?></h2>
				<h5><?php echo $page_block['subtitle'] ?></h5>
				<p><?php echo $page_block['text'] ?></p>
			</div>
			<div class="etnos-info-card__img">
				<?php echo wp_get_attachment_image($page_block['image']['id'], 'full'); ?>
			</div>
		</div>
	</div>
</section>