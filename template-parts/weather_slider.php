<div class="current-weather-wrap">
	<div class="weather_slider">
		<div class="current-weather">
			<div class="current-weather__header">
				<h4 class="current-weather__header-title">
					<?php esc_html__(the_field('w_title', 74), 'theme-shale')?></h4>
			</div>
			<div class="current-weather__body">
				<ul class="current-weather__list">
					<li class="current-weather__item"><span class="temperature">+4°C</span><span class="location">Роза
							Долина</span>
						<svg class="icon icon-sun_big_cloud ">
							<use
								xlink:href="<?php echo  get_template_directory_uri() . '/img/sprite/symbol/sprite.svg'?>#sun_big_cloud">
							</use>
						</svg>
					</li>
					<li class="current-weather__item"><span class="temperature">+1°C</span><span class="location">Роза
							Плато</span>
						<svg class="icon icon-snow_wind ">
							<use
								xlink:href="<?php echo  get_template_directory_uri() . '/img/sprite/symbol/sprite.svg'?>#snow_wind">
							</use>
						</svg>
					</li>
					<li class="current-weather__item"><span class="temperature">-3°C</span><span class="location">Роза
							Пик</span>
						<svg class="icon icon-cloud_snow ">
							<use
								xlink:href="<?php echo  get_template_directory_uri() . '/img/sprite/symbol/sprite.svg'?>#cloud_snow">
							</use>
						</svg>
					</li>
				</ul>
			</div>
		</div>
		<div class="current-weather__toggle">
			<div class="current-weather__arrow">
				<svg class="icon icon-left-arrow ">
					<use
						xlink:href="<?php echo  get_template_directory_uri() . '/img/sprite/symbol/sprite.svg'?>#left-arrow">
					</use>
				</svg>
			</div>
			<div class="current-weather__title"><?php esc_html__(the_field('w_title', 74), 'theme-shale')?>
			</div>
		</div>
	</div>
</div>