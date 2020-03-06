<?php 
/*!
Template name: Ресторан
*/

get_header();
?>

<main class="main">
	<section class="s-description">
		<h2 class="visually-hidden">Комплекс «Роза Шале»</h2>
		<div class="description">
			<div class="container">
				<div class="description__item parent"><img class="img-abs img-responsive"
						src="<?php echo get_field('res_img')['url']?>" alt="<?php echo get_field('res_img')['alt']?>">
					<div class="description__text">
						<p class="description__paragraph"><?php esc_html__(the_field('res_text'), 'theme-shale')?></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="s-breakfast-veranda">
		<h2 class="visually-hidden">Комплекс «Роза Шале»</h2>
		<div class="container">
			<div class="breakfast-veranda">
				<div class="breakfast-veranda_left">
					<div class="breakfast-veranda__body">
						<div class="breakfast-veranda__text">
							<p class="breakfast-veranda__paragraph">
								<?php esc_html__(the_field('res_break'), 'theme-shale')?></p>
						</div>
					</div>
				</div>
				<div class="breakfast-veranda_right parent"><img class="img-abs img-responsive"
						src="<?php echo get_field('res_break_img')['url']?>"
						alt="<?php echo get_field('res_break_img')['alt']?>">
					<div class="breakfast-veranda__border"></div>
				</div>
			</div>
		</div>
	</section>
	<section class="s-high-kitchen">
		<h2 class="visually-hidden">Комплекс «Роза Шале»</h2>
		<div class="high-kitchen parent"><img class="img-abs img-responsive"
				src="<?php echo get_field('res_kitchen_img')['url']?>"
				alt="<?php echo get_field('res_kitchen_img')['alt']?>">
			<div class="container">
				<div class="high-kitchen__text">
					<p class="high-kitchen__paragraph"><?php esc_html__(the_field('res_kitchen'), 'theme-shale')?></p>
				</div>
			</div>
		</div>
	</section>
	<section class="s-restaurant-menu">
		<div class="restaurant-menu">
			<div class="container">
				<div class="row">
					<div class="restaurant-menu__container">
						<h2 class="restaurant-menu__title title_accent">МЕНЮ РЕСТОРАНА</h2>
						<div class="restaurant-menu-prev slider-arrows slide-prev">
							<svg class="icon icon-left-arrow ">
								<use
									xlink:href="<?php echo  get_template_directory_uri() . '/img/sprite/symbol/sprite.svg'?>#left-arrow">
								</use>
							</svg>
						</div>
						<div class="restaurant-menu__slider">
							<?php foreach (getDishes() as $dish): ?>
							<div class="restaurant-menu__item">
								<div class="restaurant-menu__body parent"><img class="img-responsive"
										src="<?php echo $dish['url']?>" alt="<?php echo $dish['alt']?>"></div>
								<div class="restaurant-menu__footer">
									<h4 class="restaurant-menu__footer-title"><?php echo esc_html__($dish['name'])?>
									</h4>
									<span
										class="restaurant-menu__footer-text"><?php echo esc_html__($dish['menu_desc'])?></span>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
						<div class="restaurant-menu-next slider-arrows slide-next">
							<svg class="icon icon-right-arrow ">
								<use
									xlink:href="<?php echo  get_template_directory_uri() . '/img/sprite/symbol/sprite.svg'?>#right-arrow">
								</use>
							</svg>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="s-photo-gallery">
		<div class="gallery">
			<div class="container">
				<h2 class="gallery__title title_accent">ФОТОГАЛЕРЕЯ</h2>
				<div class="gallery-slider">
					<div class="gallery-slide-prev slider-arrows slide-prev">
						<svg class="icon icon-left-arrow ">
							<use
								xlink:href="<?php echo  get_template_directory_uri() . '/img/sprite/symbol/sprite.svg'?>#left-arrow">
							</use>
						</svg>
					</div>
					<div class="gallery-slide-next slider-arrows slide-next">
						<svg class="icon icon-right-arrow ">
							<use
								xlink:href="<?php echo  get_template_directory_uri() . '/img/sprite/symbol/sprite.svg'?>#right-arrow">
							</use>
						</svg>
					</div>
					<div class="gallery-slide">
						<div class="gallery-slide__block">
							<?php foreach (getPhotos() as $photo): ?>
							<div class="gallery-slide__main parent"><img class="img-responsive"
									src="<?php echo $photo['url']?>" alt="<?php echo $photo['alt']?>"></div>
							<?php endforeach; ?>
						</div>
						<div class="gallery-slider-nav">
							<?php foreach (getPhotosNav() as $photo): ?>
							<div class="gallery-slide-nav parent"><img class="img-responsive"
									src="<?php echo $photo['url']?>" alt="<?php echo $photo['alt']?>"></div>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="custom-dots"></div>
				</div>
				<div class="gallery-btns"><span
						class="btn-time"><?php esc_html(the_field("res_time"), 'theme-shale' )?></span><a
						class="btn-tel"
						href="tel:<?php echo str_replace(array(' ', ")", "(", "-", "_"), '', get_field('res_phone'))?>"><?php the_field('res_phone')?></a>
				</div>
			</div>
		</div>
	</section>
	<?php 	get_template_part( 'template-parts/maps');?>
</main>

<?php get_footer( )?>