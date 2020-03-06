<?php
/*!
Template name: Главная страница
*/
get_header();
?>

<main class="main">
	<section class="s-description">
		<h2 class="visually-hidden">Комплекс «Роза Шале»</h2>
		<div class="description">
			<div class="container">
				<div class="description__item parent"><img class="description__img  img-responsive"
						src="<?php echo get_field('shale_desc_img')['url']?>"
						alt="<?php echo get_field('shale_desc_img')['alt']?>">
					<div class="description__text">
						<p class="description__paragraph">
							<?php esc_html__(the_field('shale_desc_text'), 'theme-shale')?></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="s-preview-shale" id='s-preview-shale'>
		<div class="preview-shale">
			<div class="container">

					<!-- d -->
					 <script type="text/javascript">
						jQuery(document).ready(function($) {
							// This is required for AJAX to work on our page
							var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';

							function cvf_load_all_posts(page){
								// Start the transition
								$(".cvf_pag_loading").fadeIn().css('background','transparent');

								// Data to receive from our server
								// the value in 'action' is the key that will be identified by the 'wp_ajax_' hook 
								var data = {
									page: page,
									action: "demo-pagination-load-posts"
								};

								// Send the data
								$.post(ajaxurl, data, function(response) {
									// If successful Append the data into our html container
									$(".cvf_universal_container").empty().append(response);
									// End the transition
									$(".cvf_pag_loading").css({'background':'none', 'transition':'all 1s ease-out'});
								});
							}

							// Load page 1 as the default
							cvf_load_all_posts(1);

							// Handle the clicks
							$('.cvf_universal_container .cvf-universal-pagination li.active').live('click',function(){
								var page = $(this).attr('p');
								cvf_load_all_posts(page);
							});

							   $('.slowly').live('click', function (event) {
										console.log('dddd')
									$('.slowly').parent().removeClass('active')
									$(this).parent().addClass('active')

									event.preventDefault()

									var id = $(this).attr('href')
									let top = $(id).offset().top

									$('body,html').animate({ scrollTop: top }, 600)
								})
						});
					</script>
					<div class = "cvf_pag_loading">
						<div class = "cvf_universal_container">
							<div class="cvf-universal-content"></div>
						</div>
					</div>
			</div>
		</div>
	</section>
	<section class="s-high-kitchen">
		<h2 class="visually-hidden">Комплекс «Роза Шале»</h2>
		<div class="high-kitchen parent"><img class="img-abs img-responsive"
				src="<?php echo get_field('shale_k_img')['url']?>" alt="<?php echo get_field('shale_k_img')['alt']?>">>
			<div class="container">
				<div class="high-kitchen__text">
					<p class="high-kitchen__paragraph"><?php esc_html__( the_field('shale_k_text'), 'theme-shale' )?>
					</p>
				</div>
			</div>
		</div>
	</section>
	<?php 	get_template_part( 'template-parts/maps');?>
</main>

<?php
get_footer();