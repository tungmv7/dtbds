<?php
/* Template Name: Project Page Template */
get_header(); ?>
<?= get_template_part('template-parts/project', 'page-breadcrumb') ?>
<section class="generalwrapper dm-shadow clearfix">
    <div class="container">
        <div class="row">
            <div id="left_sidebar" class="col-lg-2 col-md-3 col-sm-3 col-xs-12 first clearfix">
                <?= get_template_part('template-parts/project', 'categories') ?>
                <?= get_template_part('template-parts/banner', 'ads-1') ?>
            </div><!-- #left_sidebar -->

            <div id="content" class="col-lg-7 col-md-6 col-sm-6 col-xs-12 clearfix">
                <div class="clearfix">
                    <?= get_template_part('template-parts/project', 'page-items') ?>
                </div>

                <div class="pagination_wrapper clearfix">
                    <!-- Pagination Normal -->
                    <ul class="pagination">
                        <li><a href="grid-view.html#">«</a></li>
                        <li class="active"><a href="grid-view.html#">1</a></li>
                        <li><a href="grid-view.html#">2</a></li>
                        <li><a href="grid-view.html#">3</a></li>
                        <li><a href="grid-view.html#">4</a></li>
                        <li><a href="grid-view.html#">5</a></li>
                        <li class="disabled"><a href="grid-view.html#">»</a></li>
                    </ul>
                </div>

            </div><!-- end content -->

            <div id="right_sidebar" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 last clearfix">

                <?= get_template_part('template-parts/search', 'box') ?>

                <?= get_template_part('template-parts/banner', 'ads-2') ?>

                <?= get_template_part('template-parts/banner', 'ads-2') ?>

            </div><!-- end sidebar -->

        </div><!-- end row -->
    </div><!-- end container -->
</section>
<?php get_footer(); ?>
