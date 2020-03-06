<?php 
/*!
Template name: Премиум
*/

get_header();
?>

<main class="main">
	<section class="s-service">
		<h2 class="visually-hidden">Спец. предложения</h2>
		<div class="service-wrap">
			<div class="service">
				<div class="container">
					<div class="row no-gutters">
						<?php foreach (getOffers() as $offer): ?>
						<?php if($offer['prem_img']) :?>
						<div class="concierge">
							<div class="concierge__item parent">
								<?php echo $offer['img']?>
								<h3 class="concierge__title"><?php echo esc_html__($offer["name"], 'theme-shale')?></h3>
								<div class="concierge__text">
									<p class="concierge__paragraph">
										<?php echo esc_html__($offer["prem_text"], 'theme-shale')?></p>
								</div>
							</div>
						</div>
						<?php else :?>
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
			</div>
		</div>
	</section>
	<section class="s-premium-contacts">
		<h2 class="visually-hidden">Контакты</h2>
		<div class="premium-contacts-wrap">
			<div class="container">
				<div class="premium-contacts">
					<ul class="premium-contacts__list">
						<li class="premium-contacts__item">
							<p class="premium-contacts__paragraph">
								<?php esc_html__(the_field('prem_info_text'), 'theme-shale')?></p>
						</li>
						<li class="premium-contacts__item premium-contacts__email"><a
								class="premium-contacts__email-link"
								href="mailto:<?php the_field('prem_email')?>"><?php the_field('prem_email')?></a></li>
						<li class="premium-contacts__item premium-contacts__tel"><a class="premium-contacts__tel-link"
								href="tel:<?php echo str_replace(array(' ', ")", "(", "-", "_"), '', get_field('prem_phone'))?>"><?php the_field('prem_phone')?></a>
						</li>
						<li class="premium-contacts__item premium-contacts__text">
							<?php esc_html__(the_field('prem_text_text'), 'theme-shale')?></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<section class="s-premium-form">
		<h2 class="visually-hidden">Форма для связи</h2>
		<div class="premium-form-wrap">
			<div class="container">
				<div class="premium-form">
					<div class="hide-on-success">
						<div class="premium-form__header">
							<h3 class="premium-form__title">
								<?php esc_html__(the_field('prem_title_form'), 'theme-shale')?></h3>
						</div>
						<form class="form" action="#" name="form-uprofile" id="login-form">
							<?php echo do_shortcode('[contact-form-7 id="197" title="Форма 1"]' )?>
						</form>
					</div>
					<div class="show-on-success">
						<div class="premium-form__header">
							<h3 class="premium-form__title">
								<?php esc_html__(the_field('prem_title_thanks'), 'theme-shale')?></h3>
						</div>
						<ul class="premium-form__list">
							<p class="premium-form__item">
								<?php esc_html__(the_field('prem_subtitle_thanks'), 'theme-shale')?></p>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php 	get_template_part( 'template-parts/maps');?>
</main>

<?php get_footer( )?>