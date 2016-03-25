<?php
$type = 'du-an';
$args=array(
    'post_type' => $type,
    'post_status' => 'publish',
    'posts_per_page' => 4,
    'caller_get_posts'=> 1
);
$my_query = null;
$my_query = new WP_Query($args);
if ($my_query->have_posts()):
    ?>
    <?php
    while ($my_query->have_posts()) : $my_query->the_post();
        $thumbnail = isset(get_field("project_gallery")[0]['sizes']['thumbnail']) ? get_field("project_gallery")[0]['sizes']['thumbnail'] : false;
        $image = isset(get_field("project_gallery")[0]['sizes']['large']) ? get_field("project_gallery")[0]['sizes']['large'] : false;
        $type = isset(wp_get_post_terms(get_the_ID(), 'project-type')[0]) ? wp_get_post_terms(get_the_ID(), 'project-type')[0] : '';
        $status = isset(wp_get_post_terms(get_the_ID(), 'project-status')[0]) ? wp_get_post_terms(get_the_ID(), 'project-status')[0] : '';
        $price = get_field("project_price_information");
        $price = is_numeric($price) ? number_format($price, 0, ",", ".") . " đ" : $price;
        // $url = the_permalink();
        if ($thumbnail) {
            ?>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="boxes first effect-slide-bottom in" data-effect="slide-bottom"
                     style="transition: all 0.7s ease-in-out;">
                    <div class="ImageWrapper boxes_img">
                        <img class="img-responsive" src="<?= $thumbnail ?>" alt="">
                        <div class="ImageOverlayH"></div>
                        <div class="Buttons StyleMg">
                                                <span class="WhiteSquare"><a class="fancybox" href="<?= $image ?>"><i
                                                            class="fa fa-search"></i></a>
                                                </span>
                                                <span class="WhiteSquare"><a href="demo-single-property.html"><i
                                                            class="fa fa-link"></i></a>
                                                </span>
                        </div>
                        <div class="box_type"><?= $price ?></div>
                        <div class="status_type"><?= pll__($status->name) ?></div>
                    </div>
                    <h2 class="title"><a href="<?= the_permalink() ?>"
                                         title="<?= the_title_attribute() ?>"> <?= the_title() ?></a>
                        <small class="small_title"><?= ($type->name) ?></small>
                    </h2>

                    <div class="boxed_mini_details1 clearfix">
                                            <span class="garage first"><strong>Garage</strong><i
                                                    class="icon-garage"></i> 3</span>
                                            <span class="bedrooms"><strong>Beds</strong><i
                                                    class="icon-bed"></i> 4</span>
                                            <span class="status"><strong>Baths</strong><i
                                                    class="icon-bath"></i> 2</span>
                                            <span class="sqft last"><strong>Area</strong><i
                                                    class="icon-sqft"></i> 445</span>
                    </div>
                </div><!-- end boxes -->
            </div>

            <?php
        }
    endwhile;
    ?>
<?php endif;?>