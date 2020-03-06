<?php if(is_page( 22 ) ):?>
<footer><?php wp_footer(); ?></footer>

</body>

</html>
<?php else :?>
<footer class="footer">
	<div class="footer__inner">
		<div class="footer__top">
			<div class="container">
				<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-footer',
							'container' => false,
							'menu_class' => 'footer__top-list',
							'add_li_class'  => 'footer__top-item'
						) );
					?>
			</div>
		</div>
		<div class="container">
			<div class="row no-gutters">
				<div class="address"><a class="logo" href="<?php echo get_permalink(16); ?>">
						<img src="<?php echo get_field('footer_logo', 74)['url']; ?>" />
					</a>
					<ul class="address__list">
						<li class="address__item">354392 Краснодарский край, г. Сочи,</li>
						<li class="address__item">Адлерский район, Роза Хутор (1200м),</li>
						<li class="address__item">Пихтовая аллея, дом 7</li>
					</ul>
				</div>
				<div class="shale">
					<ul class="shale__list">
						<li class="shale__item"><a class="shale__link shale__link_first"
								href="<?php echo get_permalink(12); ?>"><?php echo get_the_title(12)?></a></li>
						<?php
							// параметры по умолчанию
							$posts = get_posts( array(
								'numberposts' => 0,
								'category'    => 4,
								'orderby'     => 'date',
								'order'       => 'DESC',
								'include'     => array(),
								'exclude'     => array(),
								'meta_key'    => '',
								'meta_value'  =>'',
								'post_type'   => 'post',
								'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
							) );
						?>
						<?php foreach( $posts as $post ){setup_postdata($post);?>
						<li class="shale__item">
							<a class="shale__link" href="<?php the_permalink()?>"><?php the_title()?></a>
						</li>
						<?php } wp_reset_postdata(); // сброс?>
					</ul>
				</div>
				<div class="special"><a class="special__link"
						href="<?php echo get_permalink(14); ?>"><?php echo get_the_title(14)?></a></div>
				<div class="premium"><a class="premium__link"
						href="<?php echo get_permalink(16); ?>"><?php echo get_the_title(16)?></a></div>
				<div class="contacts">
					<div class="contacts__inner">
						<ul class="contacts__list">
							<li class="contacts__item"><a class="contacts__link tel"
									href="tel:<?php echo str_replace(array(' ', ")", "(", "-", "_"), '', get_field('footer_phone', 74))?>"><?php the_field('footer_phone', 74)?></a>
							</li>
							<li class="contacts__item"><a class="contacts__link tel"
									href="tel:<?php echo str_replace(array(' ', ")", "(", "-", "_"), '', get_field('footer_phone_2', 74))?>"><?php the_field('footer_phone_2', 74)?></a>
							</li>
							<li class="contacts__item"><a class="contacts__link mail"
									href="mailto:<?php the_field('footer_email', 74)?>"><?php the_field('footer_email', 74)?></a>
							</li>
						</ul>
						<div class="social"></div>
						<ul class="social__list">
							<li class="social__item"><a class="social__link" href="#">
									<svg class="icon icon-facebook ">
										<use
											xlink:href="<?php echo  get_template_directory_uri() . '/img/sprite/symbol/sprite.svg'?>#facebook">
										</use>
									</svg></a></li>
							<li class="social__item"><a class="social__link" href="#">
									<svg class="icon icon-instagram ">
										<use
											xlink:href="<?php echo  get_template_directory_uri() . '/img/sprite/symbol/sprite.svg'?>#instagram">
										</use>
									</svg></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="fotter-bottom">
		<div class="container">
			<div class="row">
				<div class="copyright"><span class="copyright__item">© <?php the_date("Y")?>
						<?php esc_html__(the_field('footer_copy', 74), 'theme-shale')?></span></div>
				<div class="site-map"><a class="site-map__link" href="#">Карта сайта</a></div>
			</div>
		</div>
	</div>
</footer>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=&lt;ваш API-ключ&gt;"></script>
<?php wp_footer(); ?>

</body>

</html>

<?php endif; ?>