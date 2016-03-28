<?php
get_header(); ?>
<?= get_template_part_with_vars('template-parts/breadcrumb', null,
	['items' => getBreadcrumbItems("news-page")]
) ?>
<section class="generalwrapper dm-shadow clearfix">
	<div class="container">
		<div class="row">
			<div id="left_sidebar" class="col-lg-2 col-md-3 col-sm-3 col-xs-12 first clearfix">
				<?= get_template_part('template-parts/project', 'categories') ?>
				<?= get_template_part('template-parts/banner', 'ads-1') ?>
			</div><!-- #left_sidebar -->

			<div id="content" class="col-lg-7 col-md-6 col-sm-6 col-xs-12 clearfix">
				<div class="row">
					<div class="col-sm-12">
						<?php
						// Start the loop.
						while ( have_posts() ) : the_post();
							the_content();
						endwhile;
						?>
					</div>
				</div>
			</div><!-- end content -->

			<div id="right_sidebar" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 last clearfix">
				<?= get_sidebar() ?>
			</div><!-- end sidebar -->

		</div><!-- end row -->
	</div><!-- end container -->
</section>
<?php get_footer(); ?>
