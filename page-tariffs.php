<?php
/*!
Template name: Тарифы
*/

get_header();
?>
<main class="main">
	<section class="s-tariff-table">
		<h2 class="visually-hidden">Комплекс «Роза Шале»</h2>
		<div class="container">
			<div class="container-slider-tariffs">
				<div class="slider-tariffs__arrow slider-tariffs__arrow-prev"></div>
				<div class="slider-tariffs__arrow slider-tariffs__arrow-next"></div>
				<div class="slider-tariffs">
					<?php foreach (getTimetable() as $key=>$timet): ?>
					<button class="slider-tariffs__button"
						data-target="month<?php echo $key?>"><?php  echo $timet['name']?></button>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="tariff-table__container">
				<?php
							// параметры по умолчанию
							$posts2 = get_posts( array(
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
				<?php foreach( $posts2 as $key=>$post2 ){setup_postdata($post2);?>
				<div class="tariff-table is-active" id="month<?php echo $key?>">
					<table class="table">
						<thead class="table__header">
							<tr class="table__row">
								<td class="table__cell">Тип жилья</td>
								<td class="table__cell">Количество гостей (max)</td>
								<td class="table__cell">Проживание</td>
								<td class="table__cell">Количество спален</td>
							</tr>
						</thead>
						<tbody class="table__body">
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
							<tr class="table__row">
								<td class="table__cell"><a class="table__link"
										href="<?php the_permalink()?>"><?php the_title()?></a></td>
								<td class="table__cell"><?php esc_html__(the_field('shale_guests'), 'theme-shale')?>
								</td>
								<td class="table__cell"><?php the_field('m'.$key)?></td>
								<td class="table__cell"><?php esc_html__(the_field('shale_bedrooms'), 'theme-shale')?>
								</td>
							</tr>
							<?php } wp_reset_postdata(); // сброс?>
						</tbody>
					</table>
				</div>
				<?php } wp_reset_postdata(); // сброс?>
				<div class="tariff-table__desc">
					<div class="tariff-table__block">
						<?php the_content()?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php 	get_template_part( 'template-parts/maps');?>
</main>

<?php get_footer( )?>