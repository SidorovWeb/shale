<?get_header();?>
<?php if(have_posts()){ while (have_posts()) {the_post(); ?>
<main class="main">
	<section class="s-slider-prev-shales">
		<div class="container">
			<div class="slider-prev-shales__wrap">
				<div class="prev-shales-arrow-prev"><span class="arrow__title">Шале №11</span>
					<svg class="icon icon-long-arrow-prev prev-shales-arrow">
						<use
							xlink:href="<?php echo  get_template_directory_uri() . '/img/sprite/symbol/sprite.svg'?>#long-arrow-prev">
						</use>
					</svg>
				</div>
				<div class="prev-shales-arrow-next"><span class="arrow__title">Шале №13</span>
					<svg class="icon icon-long-arrow-next prev-shales-arrow">
						<use
							xlink:href="<?php echo  get_template_directory_uri() . '/img/sprite/symbol/sprite.svg'?>#long-arrow-next">
						</use>
					</svg>
				</div>
				<div class="slider-prev-shales">
					<?php
						$posts = get_posts( array(
							'numberposts' => 0,
							'category' => 4,
							'orderby'     => 'date',
							'order'       => 'DESC',
							'include'     => array(),
							'exclude'     => array(),
							'meta_key'    => '',
							'meta_value'  =>'',
							'post_type'   => 'post',
							'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
						) );?>

					<?foreach( $posts as $post ){
						setup_postdata($post);
					?>
					<div class="slide-prev-shale" data-bar="<?php the_title()?>">
						<div class="slide-prev-shale__header"><a class="slide-prev-shale__link"
								href="<?php the_permalink()?>">
								<h3 class="slide-prev-shale__title"><?php the_title()?></h3>
							</a></div>
						<div class="slide-prev-shale__body"><span
								class="slide-prev-shale__square"><?php esc_html__(the_field('square'), 'theme-shale')?></span>
							<div class="slide-prev-shale__text">
								<p><?php esc_html__(the_field('shale_descr'), 'theme-shale')?></p>
							</div>
						</div>
					</div>

					<?php }wp_reset_postdata();?>
				</div>

			</div>
		</div>
	</section>
	<section class="s-room-description">
		<div class="container">
			<div class="room-description">
				<div class="room-description__img parent"><img class="img-abs img-responsive"
						src="<?php echo get_field('shale_img_prev')['url'] ?>"
						alt="<?php echo get_field('shale_img_prev')['alt'] ?>">
					<div class="room-description__border"></div>
				</div>
				<div class="room-description__body">
					<div class="room-description__block">
						<?php the_content()?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="s-shale-photo-gallery">
		<div class="container">
			<div class="shale-photo-gallery">
				<div class="shale-photo-gallery__header">
					<h3 class="shale-photo-gallery__title">Фотогалерея</h3>
				</div>
				<div class="shale-photo-gallery__body">
					<div class="shale-photo-gallery-prev">
						<svg class="icon icon-long-arrow-prev .shale-photo-gallery__arrow">
							<use
								xlink:href="<?php echo  get_template_directory_uri() . '/img/sprite/symbol/sprite.svg'?>#long-arrow-prev">
							</use>
						</svg>
					</div>
					<div class="shale-photo-gallery-next">
						<svg class="icon icon-long-arrow-next .shale-photo-gallery__arrow">
							<use
								xlink:href="<?php echo  get_template_directory_uri() . '/img/sprite/symbol/sprite.svg'?>#long-arrow-next">
							</use>
						</svg>
					</div>
					<div class="shale-photo-gallery__slider">
						<?php $images = acf_photo_gallery('shale_gall', $post->ID); if(count($images)): ?>
						<?php foreach($images as $image): ?>

						<div class="shale-photo-gallery__slide">
							<div class="shale-photo-gallery__img parent">
								<img class="img-responsive" src="<?php echo $image['full_image_url']; ?>"
									alt="<?php echo $image['title']; ?>">
							</div>
							<div class="shale-photo-gallery__slide-footer"><span
									class="shale-photo-gallery__slide-desc">На
									фото:</span>
								<h5 class="shale-photo-gallery__slide-title"><?php echo $image['title']; ?></h5>
							</div>
						</div>
						<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="s-shale-premium">
		<div class="container">
			<div class="shale-premium">
				<div class="shale-premium__header">
					<h3 class="shale-premium__title">Роза премиум</h3>
					<h5 class="shale-premium__subtitle">Когда качество обслуживания становится искусством</h5>
				</div>
				<div class="shale-premium__body">
					<div class="row no-gutters">
						<?php foreach (getOffers() as $key=>$offer): ?>
						<?php if($key < 3) :?>
						<div class="instructor">
							<div class="instructor__item parent">
								<?php echo $offer['img']?>
								<h3 class="instructor__title"><?php echo esc_html__($offer["name"], 'theme-shale')?>
								</h3>
								<p class="instructor__paragraph">
									<?php echo esc_html__($offer["prem_text"], 'theme-shale')?></p>
							</div>
						</div>
						<?php endif;?>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="shale-premium__bottom">
					<div class="button-reserve"><a
							class="button-reserve__link button-reserve--size-l button-reserve--bg-accent"
							href="<?php the_permalink(16)?>">
							Подробнее</a></div>
				</div>
			</div>
		</div>
	</section>
	<section class="s-shale-actions">
		<div class="container">
			<?php foreach (getSpecial() as $key=>$special): ?>
			<?php if($key < 1) :?>
			<div class="special-actions">
				<div class="special-actions__item parent">
					<?php echo $special['img']?>
					<div class="special-actions__block">
						<div class="special-actions__header">
							<h3 class="special-actions__title">
								<?php echo esc_html__($special["special_text"], 'theme-shale')?></h3>
						</div>
						<div class="button-reserve"><a
								class="button-reserve__link button-reserve--bg-white button-reserve--size-l"
								href="#"><?php echo esc_html__($special['special_button'], 'theme-shale')?></a></div>
					</div>

				</div>
				<?php endif;?>
				<?php endforeach; ?>

			</div>
	</section>
	<?php 	get_template_part( 'template-parts/maps');?>
</main>
<?php } /* конец while */?>
<?php } /* конец if */?>
<?get_footer();?>