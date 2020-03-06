<?php


if ( ! function_exists( 'theme_shale_setup' ) ) :

	function theme_shale_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'top-menu' => 'header',
			'm-menu' => 'mobile-menu',
			'menu-footer' => 'footer',
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'theme_shale_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );


		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'theme_shale_setup' );

function theme_shale_content_width() {

	$GLOBALS['content_width'] = apply_filters( 'theme_shale_content_width', 640 );
}
add_action( 'after_setup_theme', 'theme_shale_content_width', 0 );


function theme_shale_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'theme-shale' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'theme-shale' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Weather', 'theme-shale' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'theme-shale' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'theme_shale_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function theme_shale_scripts() {
	wp_enqueue_style( 'theme-shale-style', get_stylesheet_uri() );


	// wp_enqueue_script( 'theme-shale-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	// wp_enqueue_script( 'theme-shale-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

wp_enqueue_script( 'main-js',  get_template_directory_uri() . '/js/scripts.min.js', array(), null, true ); 
// wp_enqueue_script( 'photoswipe',  get_template_directory_uri() . '/js/photoswipe.min.js', array(), null, true ); 

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_shale_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Paginations additions.
 */
require get_template_directory() . '/inc/paginations.php';

/**
 * breadcrumbs additions.
 */
require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_filter('show_admin_bar', '__return_false');

// Добавляем классы ссылкам
add_filter( 'nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 4 );
function filter_nav_menu_link_attributes( $atts, $item, $args, $depth ) {
	if ( $args->theme_location === 'top-menu' ) {
		$atts['class'] = 'navigation__link';
	}
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'filter_nav_menu_link_attributes_mobile', 10, 4 );
function filter_nav_menu_link_attributes_mobile( $atts, $item, $args, $depth ) {
	if ( $args->theme_location === 'm-menu' ) {
		$atts['class'] = 'm-menu__link';
	}
	return $atts;
}

add_filter( 'nav_menu_link_attributes', 'filter_nav_menu_link_attributes_footer', 10, 4 );
function filter_nav_menu_link_attributes_footer( $atts, $item, $args, $depth ) {
	if ( $args->theme_location === 'menu-footer' ) {
		$atts['class'] = 'footer__top-link';
	}
	return $atts;
}
// Добавляем классы li
function add_additional_class_on_li($classes, $item, $args) {
    if($args->add_li_class) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);


// Добавить класс к img 
function add_image_class($class){
    $class .= ' additional-class';
    return $class;
}
add_filter('get_image_tag_class','add_image_class');


//  Удалить span вокруг инпута

add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});
// Страница Шале, слайдер на первом экране
register_post_type('shale_slider_header', array(
	'labels' => array(
		'name'               => esc_html__( 'Страница Шале, слайдер на первом экране', 'theme-shale' ), // основное название для типа записи
		'singular_name'      => esc_html__( 'Слайд', 'theme-shale' ), // название для одной записи этого типа
		'add_new'            => esc_html__( 'Добавить слайд', 'theme-shale' ), // для добавления новой записи
		'add_new_item'       => esc_html__( 'Добавление слайда', 'theme-shale' ), // заголовка у вновь создаваемой записи в админ-панели.
		'edit_item'          => esc_html__( 'Редактирование слайда', 'theme-shale' ), // для редактирования типа записи
		'new_item'           => esc_html__( 'Новый слайд', 'theme-shale' ), // текст новой записи
		'view_item'          => esc_html__( 'Смотреть слайд', 'theme-shale' ), // для просмотра записи этого типа.
		'search_items'       => esc_html__( 'Искать слайд', 'theme-shale' ), // для поиска по этим типам записи
		'not_found'          => esc_html__( 'Не найдено', 'theme-shale' ), // если в результате поиска ничего не было найдено
		'not_found_in_trash' => esc_html__( 'Не найдено в корзине', 'theme-shale' ), // если не было найдено в корзине
		'parent_item_colon'  => '', // для родителей (у древовидных типов)
		'menu_name'          => esc_html__( 'Шале, слайдер на первом экране', 'theme-shale' ), // название меню

	),
	'menu_icon' => 'dashicons-images-alt2',
	'public'              => false,
	'show_ui'             => true, // зависит от public
	'supports'            => [ 'title', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
));

function getSlider(){
	$args = array(
		'orderby'     => 'date',
		'order'       => 'ASC',
		'post_type'   => 'shale_slider_header',
	);
	$slider = [];

	foreach (get_posts($args) as $post) {
		// $slide = get_fields($post->ID);
		$slide['name'] = $post->post_title;
		$slide['url'] = get_the_post_thumbnail_url( $post->ID );
		$slide['img'] = get_the_post_thumbnail( $post->ID );
		$slider[] = $slide;
	}
	return $slider;
};



// select lagn

register_post_type('select_lagn', array(
	'labels' => array(
		'name'               => esc_html__( 'Языки', 'theme-shale' ), // основное название для типа записи
		'singular_name'      => esc_html__( 'Язык', 'theme-shale' ), // название для одной записи этого типа
		'add_new'            => esc_html__( 'Добавить язык', 'theme-shale' ), // для добавления новой записи
		'add_new_item'       => esc_html__( 'Добавление языка', 'theme-shale' ), // заголовка у вновь создаваемой записи в админ-панели.
		'edit_item'          => esc_html__( 'Редактирование языка', 'theme-shale' ), // для редактирования типа записи
		'new_item'           => esc_html__( 'Новый язык', 'theme-shale' ), // текст новой записи
		'view_item'          => esc_html__( 'Смотреть язык', 'theme-shale' ), // для просмотра записи этого типа.
		'search_items'       => esc_html__( 'Искать язык', 'theme-shale' ), // для поиска по этим типам записи
		'not_found'          => esc_html__( 'Не найдено', 'theme-shale' ), // если в результате поиска ничего не было найдено
		'not_found_in_trash' => esc_html__( 'Не найдено в корзине', 'theme-shale' ), // если не было найдено в корзине
		'parent_item_colon'  => '', // для родителей (у древовидных типов)
		'menu_name'          => esc_html__( 'Языки', 'theme-shale' ), // название меню

	),
	'menu_icon' => 'dashicons-admin-site-alt',
	'public'              => false,
	'show_ui'             => true, // зависит от public
	'supports'            => [ 'title', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
));

function getLagns(){
	$args = array(
		'orderby'     => 'date',
		'order'       => 'ASC',
		'post_type'   => 'select_lagn',
	);
	$langs = [];

	foreach (get_posts($args) as $post) {
		$lang['name'] = $post->post_title;
		$langs[] = $lang;
	}
	return $langs;
};

// Спецпредложения

register_post_type('special', array(
	'labels' => array(
		'name'               => esc_html__( 'Спецпредложения', 'theme-shale' ), // основное название для типа записи
		'singular_name'      => esc_html__( 'Спецпредложения', 'theme-shale' ), // название для одной записи этого типа
		'add_new'            => esc_html__( 'Добавить спецпредложение', 'theme-shale' ), // для добавления новой записи
		'add_new_item'       => esc_html__( 'Добавление спецпредложения', 'theme-shale' ), // заголовка у вновь создаваемой записи в админ-панели.
		'edit_item'          => esc_html__( 'Редактирование спецпредложения', 'theme-shale' ), // для редактирования типа записи
		'new_item'           => esc_html__( 'Новое спецпредложение', 'theme-shale' ), // текст новой записи
		'view_item'          => esc_html__( 'Смотреть спецпредложение', 'theme-shale' ), // для просмотра записи этого типа.
		'search_items'       => esc_html__( 'Искать спецпредложение', 'theme-shale' ), // для поиска по этим типам записи
		'not_found'          => esc_html__( 'Не найдено', 'theme-shale' ), // если в результате поиска ничего не было найдено
		'not_found_in_trash' => esc_html__( 'Не найдено в корзине', 'theme-shale' ), // если не было найдено в корзине
		'parent_item_colon'  => '', // для родителей (у древовидных типов)
		'menu_name'          => esc_html__( 'Спецпредложения', 'theme-shale' ), // название меню

	),
	'menu_icon' => 'dashicons-shield',
	'public'              => false,
	'show_ui'             => true, // зависит от public
	'supports'            => [ 'title', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
));

function getSpecial(){
	$args = array(
		'orderby'     => 'date',
		'order'       => 'ASC',
		'post_type'   => 'special',
	);
	$specials = [];

	foreach (get_posts($args) as $post) {
		$special = get_fields($post->ID);
		// $special['name'] = $post->post_title;
		$special['url'] = get_the_post_thumbnail_url( $post->ID );
		$special['img'] = get_the_post_thumbnail( $post->ID );
		$specials[] = $special;
	}
	return $specials;
};

// Премиум

register_post_type('premium', array(
	'labels' => array(
		'name'               => esc_html__( 'Премиальные предложения', 'theme-shale' ), // основное название для типа записи
		'singular_name'      => esc_html__( 'Прем предложение', 'theme-shale' ), // название для одной записи этого типа
		'add_new'            => esc_html__( 'Добавить предложение', 'theme-shale' ), // для добавления новой записи
		'add_new_item'       => esc_html__( 'Добавление предложения', 'theme-shale' ), // заголовка у вновь создаваемой записи в админ-панели.
		'edit_item'          => esc_html__( 'Редактирование предложения', 'theme-shale' ), // для редактирования типа записи
		'new_item'           => esc_html__( 'Новое предложение', 'theme-shale' ), // текст новой записи
		'view_item'          => esc_html__( 'Смотреть предложение', 'theme-shale' ), // для просмотра записи этого типа.
		'search_items'       => esc_html__( 'Искать предложение', 'theme-shale' ), // для поиска по этим типам записи
		'not_found'          => esc_html__( 'Не найдено', 'theme-shale' ), // если в результате поиска ничего не было найдено
		'not_found_in_trash' => esc_html__( 'Не найдено в корзине', 'theme-shale' ), // если не было найдено в корзине
		'parent_item_colon'  => '', // для родителей (у древовидных типов)
		'menu_name'          => esc_html__( 'Премиальные предложения', 'theme-shale' ), // название меню

	),
	'menu_icon' => 'dashicons-awards',
	'public'              => false,
	'show_ui'             => true, // зависит от public
	'supports'            => [ 'title', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
));

function getOffers(){
	$args = array(
		'orderby'     => 'date',
		'order'       => 'ASC',
		'post_type'   => 'premium',
	);
	$offers = [];

	foreach (get_posts($args) as $post) {
		$offer = get_fields($post->ID);
		$offer['name'] = $post->post_title;
		$offer['url'] = get_the_post_thumbnail_url( $post->ID );
		$offer['img'] = get_the_post_thumbnail( $post->ID );
		$offers[] = $offer;
	}
	return $offers;
};
// Меню ресторана

register_post_type('restaurant-menu', array(
	'labels' => array(
		'name'               => esc_html__( 'Меню ресторана', 'theme-shale' ), // основное название для типа записи
		'singular_name'      => esc_html__( 'Блюдо', 'theme-shale' ), // название для одной записи этого типа
		'add_new'            => esc_html__( 'Добавить блюдо', 'theme-shale' ), // для добавления новой записи
		'add_new_item'       => esc_html__( 'Добавление блюда', 'theme-shale' ), // заголовка у вновь создаваемой записи в админ-панели.
		'edit_item'          => esc_html__( 'Редактирование блюда', 'theme-shale' ), // для редактирования типа записи
		'new_item'           => esc_html__( 'Новое блюдо', 'theme-shale' ), // текст новой записи
		'view_item'          => esc_html__( 'Смотреть блюдо', 'theme-shale' ), // для просмотра записи этого типа.
		'search_items'       => esc_html__( 'Искать блюдо', 'theme-shale' ), // для поиска по этим типам записи
		'not_found'          => esc_html__( 'Не найдено', 'theme-shale' ), // если в результате поиска ничего не было найдено
		'not_found_in_trash' => esc_html__( 'Не найдено в корзине', 'theme-shale' ), // если не было найдено в корзине
		'parent_item_colon'  => '', // для родителей (у древовидных типов)
		'menu_name'          => esc_html__( 'Меню ресторана', 'theme-shale' ), // название меню

	),
	'menu_icon' => 'dashicons-store',
	'public'              => false,
	'show_ui'             => true, // зависит от public
	'supports'            => [ 'title', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
));

function getDishes(){
	$args = array(
		'orderby'     => 'date',
		'order'       => 'ASC',
		'post_type'   => 'restaurant-menu',
	);
	$dishes = [];

	foreach (get_posts($args) as $post) {
		$dish = get_fields($post->ID);
		$dish['name'] = $post->post_title;
		$dish['url'] = get_the_post_thumbnail_url( $post->ID );
		$dish['img'] = get_the_post_thumbnail( $post->ID );
		$dishes[] = $dish;
	}
	return $dishes;
};

// Фотогалерея

register_post_type('photo-gallery', array(
	'labels' => array(
		'name'               => esc_html__( 'Фотогалерея', 'theme-shale' ), // основное название для типа записи
		'singular_name'      => esc_html__( 'Фотография', 'theme-shale' ), // название для одной записи этого типа
		'add_new'            => esc_html__( 'Добавить фотографию', 'theme-shale' ), // для добавления новой записи
		'add_new_item'       => esc_html__( 'Добавление фотографии', 'theme-shale' ), // заголовка у вновь создаваемой записи в админ-панели.
		'edit_item'          => esc_html__( 'Редактирование фотографии', 'theme-shale' ), // для редактирования типа записи
		'new_item'           => esc_html__( 'Новая фотография', 'theme-shale' ), // текст новой записи
		'view_item'          => esc_html__( 'Смотреть фотографию', 'theme-shale' ), // для просмотра записи этого типа.
		'search_items'       => esc_html__( 'Искать фотографию', 'theme-shale' ), // для поиска по этим типам записи
		'not_found'          => esc_html__( 'Не найдено', 'theme-shale' ), // если в результате поиска ничего не было найдено
		'not_found_in_trash' => esc_html__( 'Не найдено в корзине', 'theme-shale' ), // если не было найдено в корзине
		'parent_item_colon'  => '', // для родителей (у древовидных типов)
		'menu_name'          => esc_html__( 'Фотогалерея', 'theme-shale' ), // название меню

	),
	'menu_icon' => 'dashicons-format-gallery',
	'public'              => false,
	'show_ui'             => true, // зависит от public
	'supports'            => [ 'title', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
));

function getPhotos(){
	$args = array(
		'orderby'     => 'date',
		'order'       => 'ASC',
		'post_type'   => 'photo-gallery',
	);
	$photos = [];

	foreach (get_posts($args) as $post) {
		$photo = get_fields($post->ID);
		$photo['name'] = $post->post_title;
		$photo['url'] = get_the_post_thumbnail_url( $post->ID );
		$photo['img'] = get_the_post_thumbnail( $post->ID );
		$photos[] = $photo;
	}
	return $photos;
};

// Фотогалерея навигация

register_post_type('photo-gallery-nav', array(
	'labels' => array(
		'name'               => esc_html__( 'Фотогалерея навигация', 'theme-shale' ), // основное название для типа записи
		'singular_name'      => esc_html__( 'Фотография', 'theme-shale' ), // название для одной записи этого типа
		'add_new'            => esc_html__( 'Добавить фотографию', 'theme-shale' ), // для добавления новой записи
		'add_new_item'       => esc_html__( 'Добавление фотографии', 'theme-shale' ), // заголовка у вновь создаваемой записи в админ-панели.
		'edit_item'          => esc_html__( 'Редактирование фотографии', 'theme-shale' ), // для редактирования типа записи
		'new_item'           => esc_html__( 'Новая фотография', 'theme-shale' ), // текст новой записи
		'view_item'          => esc_html__( 'Смотреть фотографию', 'theme-shale' ), // для просмотра записи этого типа.
		'search_items'       => esc_html__( 'Искать фотографию', 'theme-shale' ), // для поиска по этим типам записи
		'not_found'          => esc_html__( 'Не найдено', 'theme-shale' ), // если в результате поиска ничего не было найдено
		'not_found_in_trash' => esc_html__( 'Не найдено в корзине', 'theme-shale' ), // если не было найдено в корзине
		'parent_item_colon'  => '', // для родителей (у древовидных типов)
		'menu_name'          => esc_html__( 'Фотогалерея навигация', 'theme-shale' ), // название меню

	),
	'menu_icon' => 'dashicons-format-gallery',
	'public'              => false,
	'show_ui'             => true, // зависит от public
	'supports'            => [ 'title', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
));

function getPhotosNav(){
	$args = array(
		'orderby'     => 'date',
		'order'       => 'ASC',
		'post_type'   => 'photo-gallery-nav',
	);
	$photos = [];

	foreach (get_posts($args) as $post) {
		$photo = get_fields($post->ID);
		$photo['name'] = $post->post_title;
		$photo['url'] = get_the_post_thumbnail_url( $post->ID );
		$photo['img'] = get_the_post_thumbnail( $post->ID );
		$photos[] = $photo;
	}
	return $photos;
};

// Тарифы вкладки

register_post_type('timetable', array(
	'labels' => array(
		'name'               => esc_html__( 'Расписание', 'theme-shale' ), // основное название для типа записи
		'singular_name'      => esc_html__( 'Запись', 'theme-shale' ), // название для одной записи этого типа
		'add_new'            => esc_html__( 'Добавить запись', 'theme-shale' ), // для добавления новой записи
		'add_new_item'       => esc_html__( 'Добавление записи', 'theme-shale' ), // заголовка у вновь создаваемой записи в админ-панели.
		'edit_item'          => esc_html__( 'Редактирование записи', 'theme-shale' ), // для редактирования типа записи
		'new_item'           => esc_html__( 'Новая запись', 'theme-shale' ), // текст новой записи
		'view_item'          => esc_html__( 'Смотреть запись', 'theme-shale' ), // для просмотра записи этого типа.
		'search_items'       => esc_html__( 'Искать запись', 'theme-shale' ), // для поиска по этим типам записи
		'not_found'          => esc_html__( 'Не найдено', 'theme-shale' ), // если в результате поиска ничего не было найдено
		'not_found_in_trash' => esc_html__( 'Не найдено в корзине', 'theme-shale' ), // если не было найдено в корзине
		'parent_item_colon'  => '', // для родителей (у древовидных типов)
		'menu_name'          => esc_html__( 'Расписание', 'theme-shale' ), // название меню

	),
	'menu_icon' => 'dashicons-calendar-alt',
	'public'              => false,
	'show_ui'             => true, // зависит от public
	'supports'            => [ 'title', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
));

function getTimetable(){
	$args = array(
		'orderby'     => 'date',
		'order'       => 'ASC',
		'post_type'   => 'timetable',
	);
	$tb = [];

	foreach (get_posts($args) as $post) {
		$t = get_fields($post->ID);
		$t['name'] = $post->post_title;
		$t['url'] = get_the_post_thumbnail_url( $post->ID );
		$t['img'] = get_the_post_thumbnail( $post->ID );
		$tb[] = $t;
	}
	return array_reverse($tb);
};


// print_r(getTimetable());

