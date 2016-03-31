<?php
/* Template Name: Search Template */
get_header(); ?>
<?= get_template_part_with_vars('template-parts/breadcrumb', null,
    ['items' => getBreadcrumbItems()]
) ?>
<section class="generalwrapper dm-shadow clearfix">
    <div class="container">
        <div class="row">
            <div id="left_sidebar" class="col-lg-2 col-md-3 col-sm-3 col-xs-12 first clearfix">
                <?= get_template_part('template-parts/project', 'categories') ?>
                <?php dynamic_sidebar('ads-content-1') ?>
            </div><!-- #left_sidebar -->

            <div id="content" class="col-lg-7 col-md-6 col-sm-6 col-xs-12 clearfix">
                <?php
                $searchAttributes = [];
                $defaultAttributes = ['q' => "", 'location' => "all", "status" => "all", "type" => "all"];
                foreach($defaultAttributes as $attrKey => $attrValue) {
                    if (isset($_REQUEST[$attrKey])) {
                        $searchAttributes[$attrKey] = trim($_REQUEST[$attrKey]);
                    } else {
                        $searchAttributes[$attrKey] = $attrValue;
                    }
                }
                ?>
                <div class="clearfix">
                    <div class="img-thumbnail" style="margin: 0 0 3em 0; display: block; padding-top: 20px;">
                    <?= get_template_part_with_vars('template-parts/search', 'adv-box', ['formAttributes' => $searchAttributes]) ?>
                    </div>
                </div>

                <div class="row clearfix">
                    <?php
                    $currentPage = get_query_var("paged") ? get_query_var("paged") : 1;
                    $args = [];
                    if ($searchAttributes['q'] !== "") {
                        $args['s'] = $searchAttributes['q'];
                    }
                    if ($searchAttributes['location'] !== "all") {
                        echo "a";
                        $args['tax_query'][] = [
                            'taxonomy' => 'project-area',
                            'field' => 'slug',
                            'terms' => $searchAttributes['location']
                        ];
                    }
                    if ($searchAttributes['type'] !== "all") {
                        $args['tax_query'][] = [
                            'taxonomy' => 'project-type',
                            'field' => 'slug',
                            'terms' => $searchAttributes['type']
                        ];
                    }
                    if ($searchAttributes['status'] !== "all") {
                        $args['tax_query'][] = [
                            'taxonomy' => 'project-status',
                            'field' => 'slug',
                            'terms' => $searchAttributes['status']
                        ];
                    }
                    $projects = getProjects(18, $currentPage, $args);
                    if ($projects) {
                        while ($projects->have_posts()) {
                            $projects->the_post();
                            get_template_part('template-parts/project', 'item-1');
                        }
                    } else {
                        get_template_part('template-parts/project', 'item-not-found');
                    }
                    ?>
                </div>
                <?php if ($projects->max_num_pages > 1): ?>
                    <div class="pagination_wrapper clearfix">
                        <ul class="pagination">
                            <?php
                            for ($i = 1; $i <= $projects->max_num_pages; $i++) {
                                $active = $currentPage == $i ? " class='active'" : '';
                                echo "<li" . $active . "><a href='?paged=" . $i . "'>" . $i . "</a></li>";
                            }
                            ?>
                        </ul>
                    </div>
                <?php endif; ?>

            </div><!-- end content -->

            <div id="right_sidebar" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 last clearfix">
                <?= get_sidebar() ?>
            </div><!-- end sidebar -->

        </div><!-- end row -->
    </div><!-- end container -->
</section>
<?php get_footer(); ?>
