<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<?php
while(have_posts()): the_post();
    $prjData = getProjectData(get_post());
?>
<?= get_template_part_with_vars('template-parts/breadcrumb', null,
    ['items' => getBreadcrumbItems("project-detail")]
) ?>
<section class="generalwrapper dm-shadow clearfix">
    <div class="container">
        <div class="row">
            <div id="left_sidebar" class="col-lg-2 col-md-3 col-sm-3 col-xs-12 first clearfix">
                <?= get_template_part('template-parts/project', 'categories') ?>
                <?php dynamic_sidebar('ads-content-1') ?>
            </div><!-- #left_sidebar -->

            <div id="content" class="col-lg-7 col-md-6 col-sm-6 col-xs-12 clearfix">


                <div class="property_wrapper boxes clearfix">
                    <?php
                    $images = get_field('project_gallery');
                    if( $images ): ?>
                    <div class="boxes_img">
                        <div id="slider" class="flexslider clearfix">
                            <ul class="slides">
                                <?php foreach( $images as $image ): ?>
                                    <li>
                                        <img class="img-thumbnail" src="<?= $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php if(count($images) > 1): ?>
                        <div id="carousel" class="flexslider clearfix">
                            <ul class="slides">
                                <?php foreach( $images as $image ): ?>
                                    <li>
                                        <img class="img-thumbnail" src="<?= $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>

                    <hr>

                    <div class="title clearfix">
                        <h3><?= the_title() ?>
                            <small class="small_title"><?= $prjData['type'] ?> <mark><?= $prjData['price'] ?></mark></small>
                        </h3>
                    </div>

                    <?php
                        $project_properties = [
                            ['sqft first', 'icon-sqft', pll__("Area"), $prjData['des']['area']],
                            ['garage', 'icon-garage', pll__("Garage"), $prjData['des']['garage']],
                            ['bedrooms', 'icon-bed', pll__("Beds"), $prjData['des']['beds']],
                            ['status', 'icon-bath', pll__("Baths"), $prjData['des']['baths']],
                            ['furnished', 'icon-furnished', pll__("Furnish"), $prjData['des']['furnish'] ? pll__("yes") : pll__('no')],
                            ['pool last', 'icon-pool', pll__("Pool"), $prjData['des']['pool'] ? pll__("yes") : pll__('no')]
                        ]
                    ?>
                    <div class="boxed_mini_details1 clearfix">
                        <?php
                            foreach($project_properties as $k => $v):
                                $icon = !empty($v[1]) ? "<i class='".$v[1]."'></i>" : '';
                                echo "<span class='".$v[0]."'>"."<strong>".$v[2]."</strong>".$icon." " . $v[3]."</span>";
                            endforeach;
                        ?>
                    </div>
                    <?php
                        $accordions = [
                            ['fa-info-circle', pll__("General"), get_field("project_gerenal_information"), 'in'],
                            ['fa-location-arrow', pll__("Position"), get_field("project_position_information"), ''],
                            ['fa-star', pll__("Utilities"), get_field("project_utilities_information"), ''],
                            ['fa-certificate', pll__("Juridical"), get_field("project_juridical_information"), ''],
                            ['fa-tags', pll__("Policy"), get_field("project_policy_information"), '']
                        ]
                    ?>
                    <div class="panel-group" id="accordion_project_information">
                        <?php
                            foreach($accordions as $k => $v):
                        ?>
                        <div class="panel panel-default panel-project">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion_project_information" href="#accordion<?= $k ?>">
                                        <i class="fa <?= $v[0] ?>"></i>   <?= $v[1] ?></a>
                                </h4>
                            </div><!-- end panel heading -->
                            <div id="accordion<?= $k ?>" class="panel-collapse collapse <?= $v[3] ?>">
                                <div class="panel-body">
                                    <?= $v[2] ?>
                                </div>
                            </div>
                        </div><!-- end panel -->

                        <?php endforeach; ?>
                    </div><!-- panel-group -->

                    <?php
                        $video = get_field("project_video");
                        if ($video):
                    ?>
                    <hr>
                    <div class="property_video clearfix">
                        <h3 class="big_title"><?= pll__("Property Video") ?><small><?= pll__("See the details of the house on the video") ?></small></h3>
                        <?= $video ?>
                    </div>
                    <?php endif; ?>

                </div>
                <div class="property_wrapper boxes clearfix">
                    <h3 class="big_title"><?= pll__("Similar Properties") ?><small><?= pll__("View other properties from this agent") ?></small></h3>
                    <div class="row">
                        <?php
                        $term = isset(wp_get_post_terms(get_the_ID(), 'project-status')[0]) ? wp_get_post_terms(get_the_ID(), 'project-status')[0] : false;
                        if ($term){
                            $currentID = get_the_ID();
                            $projects = getProjects(4, 1, [
                                'tax_query' => [
                                    'taxonomy' => 'project-status',
                                    'field' => 'slug',
                                    'terms' => $term->slug
                                ]
                            ]);
                            $count = 1;
                            while ($projects->have_posts()) {
                                $projects->the_post();
                                if (get_the_ID() != $currentID && $count < 4) {
                                    get_template_part('template-parts/project', 'item-2');
                                }
                                $count++;
                            }
                        }
                        ?>
                    </div><!-- end row -->
                </div>
                <div class="property_wrapper boxes clearfix">
                    <h3 class="big_title"><?= pll__("Comments") ?><small><?= pll__("View all comments about this project.") ?></small></h3>
                    <div class="fb-comments" data-href="<?= get_permalink() ?>" data-width="100%" data-numposts="5"></div>
                </div>
            </div><!-- end content -->

            <div id="right_sidebar" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 last clearfix">
                <?= get_sidebar() ?>
            </div><!-- end sidebar -->

        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end generalwrapper -->

    <?php
endwhile;
?>
<?php get_footer(); ?>
