<section class="s-map">
	<div class="map">
		<div class="container">
			<div class="map__header">
				<h3 class="map__header-title"><?php esc_html__( the_field('map_title', 74), 'theme-shale' )?></h3>
				<p class="map__header-paragraph"><?php esc_html__( the_field('map_addres', 74), 'theme-shale' )?>
				</p>
			</div>
			<div class="map__body">
				<div id="map"></div>
			</div>
		</div>
	</div>
</section>