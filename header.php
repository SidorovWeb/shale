<!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<head>
		<meta <?php bloginfo( 'charset' ); ?>>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon" href="img/favicon/apple-touch-icon.png">
		<link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-touch-icon-114x114.png">
		<meta name="theme-color" content="#000">
		<meta name="msapplication-navbutton-color" content="#000">
		<meta name="apple-mobile-web-app-status-bar-style" content="#000">
		<?php wp_head(); ?>
	</head>
	<?php if( is_front_page() ):?>

	<body class="rose-page" <?php body_class(); ?>>
		<div class="m-menu">
			<nav class="m-menu__nav">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'm-menu',
						'container' => false,
						'menu_class' => 'm-menu__list',
						'add_li_class'  => 'm-menu__item'
					) );
				?>

			</nav>
		</div>
		<div class="navigation-line">

			<div class="navigation">
				<div class="main-logo navigation__main-logo"><a class="main-logo__link"
						href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<svg class="icon icon-logo-white ">
							<use
								xlink:href="<?php echo  get_template_directory_uri() . '/img/sprite/symbol/sprite.svg'?>#logo-white">
							</use>
						</svg>
						<svg class="icon icon-logo-black ">
							<use
								xlink:href="<?php echo get_template_directory_uri() . '/img/sprite/symbol/sprite.svg' ?>#logo-black">
							</use>
						</svg></a></div>
				<nav class="nav navigation__nav">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'top-menu',
							'container' => false,
							'menu_id'        => 'primary-menu',
							'menu_class' => 'navigation__list navigation__list_main',
							'add_li_class'  => 'navigation__item'
						) );
					?>
				</nav>
				<div class="select">
					<div class="select__header"><span class="select__current">ru</span></div>
					<div class="select__body">
						<ul class="select-list">
							<?php foreach (getLagns() as $slide): ?>
							<li class="select-list__item">
								<? echo $slide['name']?>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
				<div class="button-reserve"><a
						class="button-reserve__link button-reserve--bg-black button-reserve--size-m"
						href="#"><?php esc_html__(the_field('button', 74), 'theme-shale')?></a></div>
				<div class="hamburger"><span class="hamburger__line"></span><span class="hamburger__line"></span><span
						class="hamburger__line"></span></div>
			</div>
		</div>
		<?php elseif (is_page( 16 )) :?>

		<body class="premium-page" <?php body_class(); ?>>
			<div class="m-menu">
				<nav class="m-menu__nav">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'm-menu',
						'container' => false,
						'menu_class' => 'm-menu__list',
						'add_li_class'  => 'm-menu__item'
					) );
				?>

				</nav>
			</div>
			<div class="navigation-line">

				<div class="navigation">
					<div class="main-logo navigation__main-logo"><a class="main-logo__link"
							href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<svg class="icon icon-logo-white ">
								<use
									xlink:href="<?php echo  get_template_directory_uri() . '/img/sprite/symbol/sprite.svg'?>#logo-white">
								</use>
							</svg>
							<svg class="icon icon-logo-black ">
								<use
									xlink:href="<?php echo get_template_directory_uri() . '/img/sprite/symbol/sprite.svg' ?>#logo-black">
								</use>
							</svg></a></div>
					<nav class="nav navigation__nav">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'top-menu',
							'container' => false,
							'menu_id'        => 'primary-menu',
							'menu_class' => 'navigation__list navigation__list_main',
							'add_li_class'  => 'navigation__item'
						) );
					?>
					</nav>
					<div class="select">
						<div class="select__header"><span class="select__current">ru</span></div>
						<div class="select__body">
							<ul class="select-list">
								<?php foreach (getLagns() as $slide): ?>
								<li class="select-list__item">
									<? echo $slide['name']?>
								</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
					<div class="button-reserve"><a
							class="button-reserve__link button-reserve--bg-black button-reserve--size-m"
							href="#"><?php esc_html__(the_field('button', 74), 'theme-shale')?></a></div>
					<div class="hamburger"><span class="hamburger__line"></span><span
							class="hamburger__line"></span><span class="hamburger__line"></span></div>
				</div>
			</div>
			<?php else :?>

			<body <?php body_class(); ?>>
				<div class="m-menu">
					<nav class="m-menu__nav">
						<?php
					wp_nav_menu( array(
						'theme_location' => 'm-menu',
						'container' => false,
						'menu_class' => 'm-menu__list',
						'add_li_class'  => 'm-menu__item'
					) );
				?>

					</nav>
				</div>
				<div class="navigation-line">

					<div class="navigation">
						<div class="main-logo navigation__main-logo"><a class="main-logo__link"
								href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<svg class="icon icon-logo-white ">
									<use
										xlink:href="<?php echo  get_template_directory_uri() . '/img/sprite/symbol/sprite.svg'?>#logo-white">
									</use>
								</svg>
								<svg class="icon icon-logo-black ">
									<use
										xlink:href="<?php echo get_template_directory_uri() . '/img/sprite/symbol/sprite.svg' ?>#logo-black">
									</use>
								</svg></a></div>
						<nav class="nav navigation__nav">
							<?php
						wp_nav_menu( array(
							'theme_location' => 'top-menu',
							'container' => false,
							'menu_id'        => 'primary-menu',
							'menu_class' => 'navigation__list navigation__list_main',
							'add_li_class'  => 'navigation__item'
						) );
					?>
						</nav>
						<div class="select">
							<div class="select__header"><span class="select__current">ru</span></div>
							<div class="select__body">
								<ul class="select-list">
									<?php foreach (getLagns() as $slide): ?>
									<li class="select-list__item">
										<? echo $slide['name']?>
									</li>
									<?php endforeach; ?>
								</ul>
							</div>
						</div>
						<div class="button-reserve"><a
								class="button-reserve__link button-reserve--bg-black button-reserve--size-m"
								href="#"><?php esc_html__(the_field('button', 74), 'theme-shale')?></a></div>
						<div class="hamburger"><span class="hamburger__line"></span><span
								class="hamburger__line"></span><span class="hamburger__line"></span></div>
					</div>
				</div>
				<?php endif; ?>


				<?php if( is_front_page() ):?>
				<header class="header">
					<div class="container">
						<div class="header__main">
							<div class="greeting greeting-rose">
								<h4 class="greeting__subtitle">
									<?php esc_html__(the_field('subtitle', 74), 'theme-shale')?>
								</h4>
								<h1 class="greeting__title"><?php esc_html__(the_field('title', 74), 'theme-shale')?>
								</h1>
								<span
									class="greeting__height"><?php esc_html__(the_field('height', 74), 'theme-shale')?></span>
							</div>
							<div class="button-reserve rose-page__button-reserve"><a
									class="button-reserve__link button-reserve--size-l button-reserve--bg-black"
									href="#">
									<?php esc_html__(the_field('button', 74), 'theme-shale')?></a>
							</div>
						</div>
					</div>
					<div class="header__background">
						<div class="slider index__slider">

							<?php foreach (getSlider() as $slide): ?>
							<div class="slider__item index__slider-item parent">
								<? echo $slide['img']?>
							</div>
							<?php endforeach; ?>

						</div>
					</div>
					<?php 	get_template_part( 'template-parts/weather_slider');?>
					<a class="scroll-down slowly" href=".main">
						<span class="scroll-down__text"><?php esc_html__(the_field('down', 74), 'theme-shale')?></span>
						<div class="scroll-down__icon">
							<svg class="icon icon-scroll-down ">
								<use
									xlink:href="<?php echo  get_template_directory_uri() . '/img/sprite/symbol/sprite.svg'?>#scroll-down">
								</use>
							</svg>
						</div>
					</a>
				</header>
				<?php elseif (is_page( 14 )) :?>
				<header class="header">
					<div class="promo-block special-page__promo-block">
						<div class="greeting greeting-special">
							<h1 class="greeting__title"><?php the_title();?></h1>
						</div>
					</div>
					<?php 	get_template_part( 'template-parts/weather_slider');?>
				</header>
				<?php elseif (is_page( 20 )) :?>
				<header class="header">
					<div class="header-tariffs">
						<div class="header-tariffs__header">
							<h1 class="header-tariffs__title"><?php esc_html__(the_field('t_title'), 'theme-shale')?>
							</h1>
						</div>
					</div>
					<?php 	get_template_part( 'template-parts/weather_slider');?>
				</header>
				<?php elseif (is_page( 16 )) :?>
				<header class="header">
					<div class="promo-block premium-page__promo-block lazy-background"
						style="background-image:url(<?php echo get_template_directory_uri(). '/img/@2x/premium/greeting/glow.png'?>)">
						<div class="greeting greeting-premium">
							<h1 class="greeting__title"><?php esc_html__(the_field('prem_title'), 'theme-shale')?></h1>
							<span
								class="greeting__height"><?php esc_html__(the_field('prem_subtitle'), 'theme-shale')?></span>
						</div>
					</div>
					<?php 	get_template_part( 'template-parts/weather_slider');?>
				</header>
				<?php elseif (is_page( 18 )) :?>
				<header class="header">
					<div class="container">
						<div class="header__main">
							<div class="greeting greeting-dynasty">
								<h4 class="greeting__subtitle">
									<?php esc_html__(the_field('res_subtitle'), 'theme-shale')?></h4>
								<h1 class="greeting__title"><?php esc_html__(the_field('res_title'), 'theme-shale')?>
								</h1><span
									class="greeting__height"><?php esc_html__(the_field('res_height'), 'theme-shale')?></span>
							</div>
							<div class="button-reserve rose-page__button-reserve"><a
									class="button-reserve__link button-reserve--size-l button-reserve--bg-black"
									href="#"><?php esc_html__(the_field('button', 74), 'theme-shale')?></a>
							</div>
						</div>
					</div>
					<div class="header__background header-bg parent">
						<img class="description__img img-responsive" src="<?php the_post_thumbnail_url()?>"
							alt="Ресторан">
					</div>
					<?php 	get_template_part( 'template-parts/weather_slider');?>
					</div>
					<a class="scroll-down slowly" href=".main">
						<span class="scroll-down__text"><?php esc_html__(the_field('down', 74), 'theme-shale')?></span>
						<div class="scroll-down__icon">
							<svg class="icon icon-scroll-down ">
								<use
									xlink:href="<?php echo  get_template_directory_uri() . '/img/sprite/symbol/sprite.svg'?>#scroll-down">
								</use>
							</svg>
						</div>
					</a>
				</header>
				<?php elseif (is_page( 22 )) :?>
				<header class="header">
					<a class='lb' href="<?php the_post_thumbnail_url()?>"><img src="<?php the_post_thumbnail_url()?>"
							alt="Карта склонов"></a>
				</header>

				<?php elseif (is_single( )) :?>
				<header class="header">
					<div class="container">
						<div class="header__main">
							<div class="greeting greeting-dynasty">
								<h4 class="greeting__subtitle">
									<?php esc_html__(the_field('subtitle', 74), 'theme-shale')?></h4>
								<h1 class="greeting__title"><?php the_title( )?>
								</h1><span
									class="greeting__height"><?php esc_html__(the_field('height', 74), 'theme-shale')?></span>
							</div>
							<div class="button-reserve rose-page__button-reserve"><a
									class="button-reserve__link button-reserve--size-l button-reserve--bg-black"
									href="#"><?php esc_html__(the_field('button', 74), 'theme-shale')?></a>
							</div>
						</div>
					</div>
					<div class="header__background header-bg parent">
						<img class="description__img img-responsive" src="<?php the_post_thumbnail_url()?>"
							alt="Ресторан">
					</div>
					<?php 	get_template_part( 'template-parts/weather_slider');?>
					</div>
					<a class="scroll-down slowly" href=".main">
						<span class="scroll-down__text"><?php esc_html__(the_field('down', 74), 'theme-shale')?></span>
						<div class="scroll-down__icon">
							<svg class="icon icon-scroll-down ">
								<use
									xlink:href="<?php echo  get_template_directory_uri() . '/img/sprite/symbol/sprite.svg'?>#scroll-down">
								</use>
							</svg>
						</div>
					</a>
				</header>
				<?php else :?>
				<?php echo "это не главная страница"; ?>
				<?php endif; ?>