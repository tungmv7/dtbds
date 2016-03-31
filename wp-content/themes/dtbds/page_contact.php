<?php
/* Template Name: Contact Template */
get_header(); ?>
<?= get_template_part_with_vars('template-parts/breadcrumb', null,
	['items' => getBreadcrumbItems("news-page")]
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
				// Start the loop.
				while ( have_posts() ) : the_post();
				?>
					<div class="row modal-body clearfix" style="padding-top: 0;">
						<h3 class="big_title" style="margin-top: 0;">Do you have questions? <small>Dont worry! We're here to help you</small></h3>
						<p>Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free.</p>
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
								<li><i class="fa fa-envelope"></i> <?= get_field('contact_email') ?></li>
								<li><i class="fa fa-phone-square"></i> <?= get_field('contact_phone') ?></li>
								<li><i class="fa fa-facebook-square"></i> <?= get_field('contact_facebook') ?></li>
								<li><i class="fa fa-share-square"></i> <?= get_field('contact_address') ?></li>
							</ul>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<form id="contact" class="row">
								<input type="text" class="form-control" placeholder="<?= pll__("Name") ?>">
								<input type="text" class="form-control" placeholder="<?= pll__("Email") ?>">
								<input type="text" class="form-control" placeholder="<?= pll__("Phone") ?>">
								<input type="text" class="form-control" placeholder="<?= pll__("Subject") ?>">
								<textarea class="form-control" rows="5" placeholder="<?= pll__("Message goes here") ?>..."></textarea>
								<button class="btn btn-primary"><?= pll__("Send Message") ?></button>
							</form>
						</div>
					</div>

					<div class="clearfix"></div>
					<div class="row col-sm-12 property_wrapper clearfix">
						<?php
						the_content();
						?>
					</div>

				<?php
				endwhile;
				?>

			</div><!-- end content -->

			<div id="right_sidebar" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 last clearfix">
				<?= get_sidebar() ?>
			</div><!-- end sidebar -->

		</div><!-- end row -->
	</div><!-- end container -->
</section>
<?php get_footer(); ?>
