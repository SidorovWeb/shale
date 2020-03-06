<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Theme_Shale
 */

get_header();
?>

<header class="header">
	<div class="container">
		<div class="header-404">
			<div class="header-404__header">
				<h1 class="header-404__title">404</h1>
				<h5 class="header-404__subtitle">К сожалению произошла ошибка, страница недоступна. Попробуйте позже.
				</h5>
			</div>
			<div class="button-reserve page-404__button-reserve"><a
					class="button-reserve__link button-reserve--size-m button-reserve--bg-black"
					href="<?php echo esc_url( home_url( '/' ) ); ?>">на
					главную</a></div>
		</div>
	</div>
	<div class="header__background header-bg  header-bg-404 parent "><img class="header-bg-404 img-responsive"
			src="<?php echo get_field('error_img', 74)['url']?>">
	</div>
</header>