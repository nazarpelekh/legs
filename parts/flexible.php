<?php if($field = get_field('flexible_content')) :
	foreach($field as $f) :
		$layout = $f['acf_fc_layout'];
		if($layout == 'content') { ?>

			<div class="page-text-content">
				<?php echo $f['text'] ?>
			</div>

		<?php } elseif($layout == 'button') { ?>

			<div class="content-button-block"><a href="<?php echo $f['link'] ?>" class="button button--action"><span><?php echo $f['text'] ?>  ></span></a></div>

		<?php } elseif($layout == 'previous_text') { ?>

			<div class="previous-text">
				<?php echo $f['text'] ?>
			</div>

		<?php } elseif($layout == 'video') { ?>

			<div class="video-block">
				<?php echo $f['video'] ?>
			</div>

		<?php } elseif($layout == 'table') { ?>

			<div class="table-block">
				<?php echo $f['table'] ?>
			</div>

		<?php } elseif($layout == 'contact_block') { ?>

			<div class="person-contact-block">
				<h4 class="block-title text-center"><?php echo $f['title'] ?></h4>
				<div class="inner-wrapper clearfix">
					<div class="photo-block block-right">
						<img src="<?php echo $f['image'] ?>" alt="">
						<div class="preson-name-block">
							<div class="name"><?php echo $f['name'] ?></div>
							<div class="post"><?php echo $f['post'] ?></div>
						</div>
					</div>
					<div class="info-block block-left">
						<div class="description"><?php echo $f['description'] ?></div>
						<div class="address"><?php echo $f['address'] ?></div>
						<ul class="phone-list">
							<?php foreach ($f['contact_field'] as $p) { ?>
								<li><?php echo $p['contact_field'] ?></li>
							<?php } ?>
						</ul>
						<div class="email">Email: <a href="mailto:<?php echo $f['email'] ?>"><?php echo $f['email'] ?></a></div>
					</div>
				</div>
			</div>

		<?php }
	endforeach;
endif; ?>