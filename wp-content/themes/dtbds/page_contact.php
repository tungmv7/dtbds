<?php
/* Template Name: Contact Template */
get_header(); ?>
<?= get_template_part_with_vars('template-parts/breadcrumb', null,
	['items' => getBreadcrumbItems("news-page")]
) ?>
<section class="generalwrapper dm-shadow clearfix">
	<div class="container">
		<div class="row">
			<div id="left_sidebar" class="hidden-sm hidden-xs col-lg-2 col-md-3 first sticky-col clearfix">
				<?= get_template_part('template-parts/project', 'categories') ?>
				<div class="sticky">
				<?php dynamic_sidebar('ads-content-1') ?>
				</div>
			</div><!-- #left_sidebar -->

			<div id="content" class="col-lg-7 col-md-6 col-sm-6 col-xs-12 clearfix">
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();
				?>
					<div class="row modal-body clearfix" style="padding-top: 0;">
						<h3 class="big_title" style="margin-top: 0; margin-bottom: 10px"><?= pll__("Do you have questions?") ?></h3>
						<p><?= pll__("Please leave a message. We will contact with you as soon as possible we can.")?></p>
						<hr>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="ImageWrapper boxes_img">
								<?php
								if (isset(get_field('contact_gallery')[0])){
									echo "<img src=\"".get_field('contact_gallery')[0]['sizes']['featured-project-image']."\" class=\"img-responsive\" alt=\"\">";
								}
								?>
							</div>
							<div class="servicetitle"><h3><?= pll__("Contact Details") ?></h3></div>
							<ul>
								<li><i class="fa fa-home"></i> <?= get_field('contact_congty') ?></li>
								<li><i class="fa fa-envelope"></i> <?= get_field('contact_email') ?></li>
								<li><i class="fa fa-phone-square"></i> <?= get_field('contact_phone') ?></li>
								<li><i class="fa fa-facebook-square"></i> <?= get_field('contact_facebook') ?></li>
								<li><i class="fa fa-share-square"></i> <?= get_field('contact_address') ?></li>
							</ul>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<style type="text/css">.wpcf7 .btn-primary {margin-top: 10px;} .wpcf7-response-output {margin: 2em 0 1em}</style>
							<?php
								if (pll_current_language() == 'en') {
									echo do_shortcode('[contact-form-7 id="774" title="Contact form 1"]');
								} else {
									echo do_shortcode('[contact-form-7 id="775" title="Contact form vi"]');
								}
							?>
						</div>
					</div>

					<div class="clearfix"></div>
					<div class="col-sm-12 property_wrapper clearfix">
						<?php
						the_content();
						?>
					</div>

				<?php
				endwhile;
				?>

			</div><!-- end content -->

			<div id="right_sidebar" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 last sticky-col clearfix">
				<?= get_sidebar() ?>
			</div><!-- end sidebar -->
			<style>
				#right_sidebar .contact-box {display: none;}
			</style>

		</div><!-- end row -->
	</div><!-- end container -->
</section>
<?php get_footer(); ?>
