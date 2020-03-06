<?php 
/*!
Template name: Спецпредложения
*/

get_header();
?>

<main class="main">
	<section class="s-special-actions">
		<div class="container">
			<?php foreach (getSpecial() as $special): ?>
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
				<?php endforeach; ?>

			</div>
		</div>
	</section>
	<?php 	get_template_part( 'template-parts/maps');?>
</main>

<?php get_footer( )?>