<?php
$type = 'du-an';
$args=array(
    'post_type' => $type,
    'post_status' => 'publish',
    'posts_per_page' => 30,
    'caller_get_posts'=> 1,
    'tax_query' => []
);

$baseUri = basename(get_page_link());
$baseTerms = ['mua-ban', 'cho-thue', 'for-sale', 'for-rent'];
foreach($baseTerms as $base) {
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

$my_query = null;
$my_query = new WP_Query($args);
if ($my_query->have_posts()):
    $count = 1;
    while ($my_query->have_posts()) : $my_query->the_post();
        $thumbnail = isset(get_field("project_gallery")[0]['sizes']['thumbnail']) ? get_field("project_gallery")[0]['sizes']['thumbnail'] : false;
        $image = isset(get_field("project_gallery")[0]['sizes']['large']) ? get_field("project_gallery")[0]['sizes']['large'] : false;
        $type = isset(wp_get_post_terms(get_the_ID(), 'project-type')[0]) ? wp_get_post_terms(get_the_ID(), 'project-type')[0] : '';
        $status = isset(wp_get_post_terms(get_the_ID(), 'project-status')[0]) ? wp_get_post_terms(get_the_ID(), 'project-status')[0] : '';
        $price = get_field("project_price_information");
        $price = is_numeric($price) ? number_format($price, 0, ",", ".") . " đ" : $price;
        if ($thumbnail):
            if ($count == 1 || $count % 4 == 0) {
                $class = "first";
            } else if ($count % 3 == 0) {
                $class = "last";
            } else {
                $class = '';
            }
            $count++;
            ?>
            <div class="col-lg-4 col-md-6 col-sm-6 <?= $class ?>">
                <div class="boxes">
                    <div class="boxes_img ImageWrapper">
                        <a href="<?= the_permalink() ?>">
                            <img class="img-responsive" src="<?= $thumbnail ?>" alt="">
                            <div class="PStyleNe"></div>
                        </a>
                        <div class="box_type"><?= $price ?></div>
                    </div>
                    <h2 class="title"><a href="<?= the_permalink() ?>" title="<?= the_title_attribute() ?>"> <?= the_title() ?></a></h2>
                    <div class="boxed_mini_details clearfix">
                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 2</span>
                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 4</span>
                    </div>
                </div><!-- end boxes -->
            </div>
            <?php
        endif;
    endwhile;
endif;