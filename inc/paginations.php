<?php
add_action( 'wp_ajax_demo-pagination-load-posts', 'cvf_demo_pagination_load_posts' );

add_action( 'wp_ajax_nopriv_demo-pagination-load-posts', 'cvf_demo_pagination_load_posts' ); 

function cvf_demo_pagination_load_posts() {

    global $wpdb;
    // Set default variables
    $msg = '';

    if(isset($_POST['page'])){
        // Sanitize the received page
        $page = sanitize_text_field($_POST['page']);
        $cur_page = $page;
        $page -= 1;
        // Set the number of results to display
        $per_page = 3;
        $previous_btn = true;
        $next_btn = true;
        $first_btn = true;
        $last_btn = true;
        $start = $page * $per_page;

        // Set the table where we will be querying data
        $table_name = $wpdb->prefix . "posts";

        // Query the necessary posts
        $all_blog_posts = $wpdb->get_results($wpdb->prepare("
            SELECT * FROM " . $table_name . " WHERE post_type = 'post' AND post_status = 'publish' ORDER BY post_date DESC LIMIT %d, %d", $start, $per_page ) );

        // At the same time, count the number of queried posts
        $count = $wpdb->get_var($wpdb->prepare("
            SELECT COUNT(ID) FROM " . $table_name . " WHERE post_type = 'post' AND post_status = 'publish'", array() ) );

		// Loop into all the posts
        foreach($all_blog_posts as $key => $post):
			$at = get_fields($post->ID);
			$title = $at['shale_title'];
			$btn = $at['shale_button'];
			$descr = $at['shale_descr'];
			$square = $at['shale_square'];
			$img = $at['shale_img_prev'];
			// print_r($at);
			// Set the desired output into a variable
			if($at['img_left']) {
				$msg .='
					<div class="preview-shale__item" >
						<div class="preview-shale__prev parent">
							<a href="' . get_permalink($post->ID) . '">
								<img class="img-abs
										img-responsive" src="' . $img['url'] . '"
									alt="' . $img['alt'] . '">
								<div class="preview-shale__border"></div>
							</a>
						</div>
						<div class="preview-shale__desc">
							<div class="preview-shale__block">
								<div class="preview-shale__header">
									<a href="' . get_permalink($post->ID) . '" class="preview-shale__title">
										<h3>' . $post->post_title . '</h3>
									</a>
								</div>
								<div class="preview-shale__body"><span
										class="preview-shale__square">' . $square . '</span>
									<ul class="preview-shale__text-list">
										<p class="preview-shale__text-item">' . $descr . '</p>
									</ul>
								</div>
								<div class="preview-shale__bottom">
									<div class="button-reserve"><a
											class="button-reserve__link button-reserve--border-accent button-reserve--size-m"
											href="' . get_permalink($post->ID) . '">' . $btn . '</a>
									</div>
								</div>
							</div>
						</div>
					</div>';
			} else {
				$msg .='
					<div class="preview-shale__item" >
						<div class="preview-shale__desc">
							<div class="preview-shale__block">
								<div class="preview-shale__header">
									<a href="' . get_permalink($post->ID) . '" class="preview-shale__title">
										<h3>' . $post->post_title . '</h3>
									</a>
								</div>
								<div class="preview-shale__body"><span
										class="preview-shale__square">' . $square . '</span>
									<ul class="preview-shale__text-list">
										<p class="preview-shale__text-item">' . $descr . '</p>
									</ul>
								</div>
								<div class="preview-shale__bottom">
									<div class="button-reserve"><a
											class="button-reserve__link button-reserve--border-accent button-reserve--size-m"
											href="' . get_permalink($post->ID) . '">' . $btn . '</a>
									</div>
								</div>
							</div>
						</div>
						<div class="preview-shale__prev parent">
							<a href="' . get_permalink($post->ID) . '">
								<img class="img-abs
										img-responsive" src="' . $img['url'] . '"
									alt="' . $img['alt'] . '">
								<div class="preview-shale__border"></div>
							</a>
						</div>
					</div>';
			}

        endforeach;

        // Optional, wrap the output into a container
        $msg = "<div class='preview-shale__container'>" . $msg . "</div>";

        // This is where the magic happens
        $no_of_paginations = ceil($count / $per_page);

        if ($cur_page >= 7) {
            $start_loop = $cur_page - 3;
            if ($no_of_paginations > $cur_page + 3)
                $end_loop = $cur_page + 3;
            else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
                $start_loop = $no_of_paginations - 6;
                $end_loop = $no_of_paginations;
            } else {
                $end_loop = $no_of_paginations;
            }
        } else {
            $start_loop = 1;
            if ($no_of_paginations > 7)
                $end_loop = 7;
            else
                $end_loop = $no_of_paginations;
        }

        // Pagination Buttons logic
        $pag_container .= "
        <div class='cvf-universal-pagination'>
            <ul>";

        if ($first_btn && $cur_page > 1) {
            $pag_container .= "<li p='1' class='active'><a href='#s-preview-shale' class='slowly'>Первая</a></li>";
        } else if ($first_btn) {
            $pag_container .= "<li p='1' class='inactive'><a href='#s-preview-shale' class='slowly'>Первая</a></li>";
        }

        if ($previous_btn && $cur_page > 1) {
            $pre = $cur_page - 1;
            $pag_container .= "<li p='$pre' class='active'><a href='#s-preview-shale' class='slowly'><</a></li>";
        } else if ($previous_btn) {
            $pag_container .= "<li class='inactive'><a href='#s-preview-shale' class='slowly'><</a></li>";
        }
        for ($i = $start_loop; $i <= $end_loop; $i++) {

            if ($cur_page == $i)
                $pag_container .= "<li p='$i' class = 'selected' ><a href='#s-preview-shale' class='slowly'>{$i}</a> </li>";
            else
                $pag_container .= "<li p='$i' class='active'><a href='#s-preview-shale' class='slowly'>{$i}</a> </li>";
        }

        if ($next_btn && $cur_page < $no_of_paginations) {
            $nex = $cur_page + 1;
            $pag_container .= "<li p='$nex' class='active'><a href='#s-preview-shale' class='slowly'>></a></li>";
        } else if ($next_btn) {
            $pag_container .= "<li class='inactive'><a href='#s-preview-shale' class='slowly'>></a></li>";
        }

        if ($last_btn && $cur_page < $no_of_paginations) {
            $pag_container .= "<li p='$no_of_paginations' class='active'><a href='#s-preview-shale' class='slowly'>Последняя</a></li>";
        } else if ($last_btn) {
            $pag_container .= "<li p='$no_of_paginations' class='inactive'><a href='#s-preview-shale' class='slowly'>Последняя</a></li>";
        }

        $pag_container = $pag_container . "
            </ul>
        </div>";

        // We echo the final output
        echo
        '<div class = "cvf-pagination-content">' . $msg . '</div>' .
        '<div class = "cvf-pagination-nav">' . $pag_container . '</div>';

    }
    // Always exit to avoid further execution
	exit();}