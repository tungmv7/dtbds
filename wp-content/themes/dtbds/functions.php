<?php

require_once('wp_bootstrap_navwalker.php');

function dtbds_setup()
{

    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');

    // crop
    add_image_size("featured-project-image", 1280, 548, true);

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus(array(
        'top_menu' => __('Primary Menu', 'dtbds'),
    ));

    // get contact page vi
    $contactPage = get_page_by_path('lien-he');
    $contactData = [
        'pageId' => $contactPage->ID,
        'congty' => get_field('contact_congty', $contactPage->ID),
        'email' => get_field('contact_email', $contactPage->ID),
        'phone' => get_field('contact_phone', $contactPage->ID),
        'facebook' => get_field('contact_facebook', $contactPage->ID),
        'address' => get_field('contact_address', $contactPage->ID),
        'google-plus' => '',
        'rss' => '',
        'thumbnail' => get_field('contact_gallery', $contactPage->ID)[0]
    ];
    wp_cache_set('contact-data', $contactData);
    wp_cache_set('contact-data-vi', $contactData);

    // get contact page en
    $contactPageEn = get_page_by_path('contact');
    $contactPageEn = [
        'pageId' => $contactPageEn->ID,
        'congty' => get_field('contact_congty', $contactPageEn->ID),
        'email' => get_field('contact_email', $contactPageEn->ID),
        'phone' => get_field('contact_phone', $contactPageEn->ID),
        'facebook' => get_field('contact_facebook', $contactPageEn->ID),
        'address' => get_field('contact_address', $contactPageEn->ID),
        'google-plus' => '',
        'rss' => '',
        'thumbnail' => get_field('contact_gallery', $contactPageEn->ID)[0]
    ];
    wp_cache_set('contact-data-en', $contactPageEn);

//    /*
//     * Switch default core markup for search form, comment form, and comments
//     * to output valid HTML5.
//     */
//    add_theme_support( 'html5', array(
//        'search-form',
//        'comment-form',
//        'comment-list',
//        'gallery',
//        'caption',
//    ) );

}

add_action('after_setup_theme', 'dtbds_setup');

function twentysixteen_widgets_init()
{
    register_sidebar(array(
        'name' => __('Ads Homepage 1', 'dtbds'),
        'id' => 'ads-homepage-1',
        'description' => __('Appears at the bottom of the content on posts and pages.', 'twentysixteen'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<div class="title"><h3>',
        'after_title' => '</div></h3>',
    ));
    register_sidebar(array(
        'name' => __('Ads Homepage 2', 'dtbds'),
        'id' => 'ads-homepage-2',
        'description' => __('Appears at the bottom of the content on posts and pages.', 'twentysixteen'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<div class="title"><h3>',
        'after_title' => '</div></h3>',
    ));
    register_sidebar(array(
        'name' => __('Ads Content 1', 'dtbds'),
        'id' => 'ads-content-1',
        'description' => __('Appears at the bottom of the content on posts and pages.', 'twentysixteen'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<div class="title"><h3>',
        'after_title' => '</div></h3>',
    ));
    register_sidebar(array(
        'name' => __('Ads Content 2', 'dtbds'),
        'id' => 'ads-content-2',
        'description' => __('Appears at the bottom of the content on posts and pages.', 'twentysixteen'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<div class="title"><h3>',
        'after_title' => '</div></h3>',
    ));
}

add_action('widgets_init', 'twentysixteen_widgets_init');


function getAgencies($postPerPage = 9, $currentPage = 1, $args = [], $type = 'agency')
{
    $defaults = [
        'post_type' => $type,
        'post_status' => 'publish',
        'posts_per_page' => $postPerPage,
        'paged' => $currentPage,
        'tax_query' => []
    ];
    $args = wp_parse_args($args, $defaults);

    $my_query = new WP_Query($args);
    if ($my_query->have_posts()) {
        return $my_query;
    } else {
        return [];
    }
}

function getNews($postPerPage = 9, $currentPage = 1, $args = [], $type = 'post')
{
    $defaults = [
        'post_type' => $type,
        'post_status' => 'publish',
        'posts_per_page' => $postPerPage,
        'paged' => $currentPage,
        'tax_query' => []
    ];
    $args = wp_parse_args($args, $defaults);

    $my_query = new WP_Query($args);
    if ($my_query->have_posts()) {
        return $my_query;
    } else {
        return [];
    }
}

function getCurrentProjectType()
{
    $args = [];
    $baseTerms = ['mua-ban', 'cho-thue', 'for-sale', 'for-rent'];
    $baseUri = basename(get_page_link());
    foreach ($baseTerms as $base) {
        if (strpos($baseUri, $base) === 0) {

            $args['tax_query'][] = [
                'taxonomy' => 'project-status',
                'field' => 'slug',
                'terms' => $base
            ];

            if (strlen($base) !== strlen($baseUri)) {
                $projectType = str_replace($base . "-", "", $baseUri);
                $args['tax_query'][] = [
                    'taxonomy' => 'project-type',
                    'field' => 'slug',
                    'terms' => $projectType
                ];
            }

            break;
        }
    }
    return $args;
}

function getCurrentProjectLocation()
{
    $args = [];
    $baseTerms = ['dau-tu', 'investment'];
    $baseUri = basename(get_page_link());
    foreach ($baseTerms as $base) {
        if (strpos($baseUri, $base) === 0) {

            if (strlen($base) !== strlen($baseUri)) {
                $projectType = str_replace($base . "-", "", $baseUri);
                $args['tax_query'][] = [
                    'taxonomy' => 'project-area',
                    'field' => 'slug',
                    'terms' => $projectType
                ];
            }

            break;
        }
    }
    return $args;
}

function getProjects($postPerPage = 9, $currentPage = 1, $args = [], $type = 'du-an')
{
    $defaults = [
        'post_type' => $type,
        'post_status' => 'publish',
        'posts_per_page' => $postPerPage,
        'paged' => $currentPage,
        'tax_query' => []
    ];
    $args = wp_parse_args($args, $defaults);

    $my_query = new WP_Query($args);
    if ($my_query->have_posts()) {
        return $my_query;
    } else {
        return [];
    }
}

function getProjectData($post)
{
    $test = get_field_objects($post->ID, false);
    $tempThumbnail = $test['project_gallery'];
    $thumbnail = wp_get_attachment_image_src($tempThumbnail['value'][0], 'thumbnail')[0];
    $image = wp_get_attachment_image_src($tempThumbnail['value'][0], 'large')[0];
    $tempFeaturedImage = $test["project_slideshow"];
    $featured_project_image =  wp_get_attachment_image_src($tempFeaturedImage['value'], 'featured-project-image')[0];
    $price = $test["project_price_information"]["value"];
    $price = is_numeric($price) ? number_format($price, 0, ",", ".") . " đ" : $price;
    $types = wp_get_object_terms($post->ID, 'project-type', ['fields' => 'names']);
    $type = isset($types[0]) ? $types[0] : '';
    $statuses = wp_get_object_terms($post->ID, 'project-status', ['fields' => 'names']);
    $status = isset($statuses[0]) ? $statuses[0] : '';
    return [
        'thumbnail' => $thumbnail,
        'type' => $type,
        'image' => $image,
        'status' => $status,
        'price' => $price,
        'featured_project_image' => $featured_project_image,
        'gerenal_information' => $test["project_gerenal_information"]["value"],
        'des' => [
            'area' => $test["project_des_area"]["value"],
            'garage' => $test["project_des_garage"]["value"],
            'baths' => $test["project_des_bath"]["value"],
            'beds' => $test["project_des_bed"]["value"],
            'furnish' => $test["project_des_furniture"]["value"],
            'pool' => $test["project_des_pool"]["value"],
        ]
    ];
}

function get_template_part_with_vars($slug, $name = null, $vars = null)
{
    do_action("get_template_part_{$slug}", $slug, $name);

    $templates = array();
    $name = (string)$name;
    if ('' !== $name)
        $templates[] = "{$slug}-{$name}.php";

    $templates[] = "{$slug}.php";

    extract($vars);
    foreach ($templates as $template) {
        include(locate_template($template));
    }
}

function getBreadcrumbItems($type = false, $args = [])
{
    if ($type == 'news-detail') {
        return [
            ['link' => false, 'title' => get_the_title()]
        ];
    } else if ($type == 'news-page') {
        $baseUri = basename(get_page_link());
        $page = get_page_by_path($baseUri);
        return [
            ['link' => false, 'title' => $page->post_title]
        ];
    } else if ($type == 'project-page') {
        $baseUri = basename(get_page_link());
        $baseTerms = ['mua-ban', 'cho-thue', 'for-sale', 'for-rent'];
        $items = [];
        foreach ($baseTerms as $base) {
            if (strpos($baseUri, $base) === 0) {
                $term = get_term_by('slug', $base, 'project-status');
                $items[] = ['link' => true, 'url' => pll_home_url() . $term->slug, 'title' => $term->name];
                if (strlen($base) !== strlen($baseUri)) {
                    $projectType = str_replace($base . "-", "", $baseUri);
                    $term = get_term_by('slug', $projectType, 'project-type');
                    if ($term) {
                        $items[] = ['link' => false, 'title' => $term->name];
                    }
                }
                break;
            }
        }
        return $items;
    } else if ($type == 'project-location') {
        $baseUri = basename(get_page_link());
        $baseTerms = ['dau-tu', 'investment'];
        $baseTermLabels = ['Đầu tư', 'Investment'];
        $items = [];
        foreach ($baseTerms as $k => $base) {
            if (strpos($baseUri, $base) === 0) {
                $items[] = ['link' => true, 'url' => pll_home_url() . $base, 'title' => $baseTermLabels[$k]];
                if (strlen($base) !== strlen($baseUri)) {
                    $projectType = str_replace($base . "-", "", $baseUri);
                    $term = get_term_by('slug', $projectType, 'project-area');
                    if ($term) {
                        $items[] = ['link' => false, 'title' => $term->name];
                    }
                }
                break;
            }
        }
        return $items;
    } else if ($type == 'project-detail') {
        $items = [];
        if (isset(wp_get_post_terms(get_the_ID(), 'project-status')[0])) {
            $term = wp_get_post_terms(get_the_ID(), 'project-status')[0];
            $items[] = ['link' => true, 'url' => pll_home_url() . $term->slug, 'title' => $term->name];
        }
        if (isset(wp_get_post_terms(get_the_ID(), 'project-type')[0])) {
            $temp = wp_get_post_terms(get_the_ID(), 'project-type')[0];
            $temp->slug = isset($term) ? $term->slug . "-" . $temp->slug : $temp->slug;
            $items[] = ['link' => true, 'url' => pll_home_url() . $temp->slug, 'title' => $temp->name];
        }
        $items[] = ['link' => false, 'title' => get_the_title()];
        return $items;
    } else {
        $baseUri = basename(get_page_link());
        $page = get_page_by_path($baseUri);
        return [
            ['link' => false, 'title' => $page->post_title]
        ];
    }
}

// Remove WP Version From Styles
add_filter('style_loader_src', 'my_remove_ver_css_js', 9999);
add_filter('script_loader_src', 'my_remove_ver_css_js', 9999);
function my_remove_ver_css_js($src)
{
    if (strpos($src, 'ver='))
        $src = remove_query_arg('ver', $src);
    return $src;
}

// remove unused files
add_action('init', 'my_disable_embeds_init', 9999);
function my_disable_embeds_init()
{
    if (!is_admin()) {
        wp_deregister_script('wp-embed');
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_styles', 'print_emoji_styles');
        remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
        remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
        remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
        remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
        remove_action('wp_head', 'index_rel_link'); // index link
        remove_action('wp_head', 'parent_post_rel_link', 10, 0); // prev link
        remove_action('wp_head', 'start_post_rel_link', 10, 0); // start link
        remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'rest_output_link_wp_head');
        remove_action('template_redirect', 'rest_output_link_header', 11, 0);

    }
}