<?php
get_header(); ?>
<?php
while(have_posts()): the_post();
?>
    <?= get_template_part_with_vars('template-parts/breadcrumb', null,
        ['items' => getBreadcrumbItems("news-detail")]
    ) ?>
    <section class="generalwrapper dm-shadow clearfix">
        <div class="container">
            <div class="row">
                <div id="left_sidebar" class="col-lg-2 col-md-3 col-sm-3 col-xs-12 first clearfix">
                    <?= get_template_part('template-parts/project', 'categories') ?>
                    <?= get_template_part('template-parts/banner', 'ads-1') ?>
                </div><!-- #left_sidebar -->

                <div id="content" class="col-lg-7 col-md-6 col-sm-6 col-xs-12 clearfix">
                    <div class="agent_boxes boxes clearfix">
                        <div class="agent_details clearfix">
                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <div class="agents_widget">
                                    <h3 class="big_title"><?= get_the_title() ?><small>Total 36 Property</small></h3>
                                    <div class="agencies_widget row">
                                        <div class="col-lg-5 clearfix">
                                            <img class="img-thumbnail img-responsive" src="<?= get_the_post_thumbnail_url() ?>" alt="">
                                        </div><!-- end col-lg-5 -->
                                        <div class="col-lg-7 clearfix">
                                            <div class="agencies_meta clearfix">
                                                <span><i class="fa fa-envelope"></i> <a href="mailto:<?= get_field("agency_email") ?>"><?= get_field("agency_email") ?></a></span>
                                                <span><i class="fa fa-link"></i> <a href="<?= get_field("agency_website") ?>" target="_blank"><?= get_field("agency_website") ?></a></span>
                                                <span><i class="fa fa-phone-square"></i> <?= get_field("agency_phone") ?></span>
                                                <span><i class="fa fa-print"></i> <?= get_field("agency_fax") ?></span>
                                                <span><i class="fa fa-facebook-square"></i> <a href="<?= get_field("agency_facebook") ?>"><?= get_field("agency_facebook") ?></a></span>
                                            </div><!-- end agencies_meta -->

                                        </div><!-- end col-lg-7 -->

                                        <div class="clearfix"></div>

                                        <hr>

                                        <div class="col-lg-12">
                                            <p><?= get_the_excerpt() ?></p>
                                        </div>
                                    </div><!-- end agencies_widget -->
                                </div><!-- agents_widget -->
                            </div><!-- end col-lg-7 -->

                            <div class="col-lg-5 col-md-5 col-sm-12">
                                <h3 class="big_title"><?= pll__("Contact") ?><small><?= pll__("Leave a message") ?></small></h3>
                                <form action="javascript:;" id="agent_form">
                                    <input type="text" class="form-control" placeholder="<?= pll__("Name") ?>">
                                    <input type="text" class="form-control" placeholder="<?= pll__("Email") ?>">
                                    <input type="text" class="form-control" placeholder="<?= pll__("Phone") ?>">
                                    <input type="text" class="form-control" placeholder="<?= pll__("Subject") ?>">
                                    <textarea class="form-control" rows="5" placeholder="<?= pll__("Message goes here") ?>..."></textarea>
                                    <button class="btn btn-primary"><?= pll__("Send Message") ?></button>
                                </form><!-- end search form -->

                            </div><!-- end col-lg-6 -->
                        </div><!-- end agent_details -->
                    </div><!-- end agent_boxes -->

                    <div class="property_wrapper boxes clearfix">
                        <h3 class="big_title"><?= pll__("Recent Properties") ?><small><?= pll__("View other properties from this agency")?></small></h3>
                        <div class="row">

                            <?php
                            $projects = getProjects(18, 1, [
                                'meta_query' => [
                                    [
                                        'key' => 'project_agency_information',
                                        'value' => '"' . get_the_ID() . '"',
                                        'compare' => 'LIKE'
                                    ]
                                ]
                            ]);
                            while ($projects->have_posts()) {
                                $projects->the_post();
                                get_template_part('template-parts/project', 'item-1');
                            };
                            ?>
                        </div><!-- end row -->
                    </div>
                </div>

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
