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
?>
	<?= get_template_part_with_vars('template-parts/breadcrumb', null,
		['items' => getBreadcrumbItems("news-detail")]
	) ?>
	<section class="generalwrapper dm-shadow clearfix">
		<div class="container">
			<div class="row">
				<div id="left_sidebar" class="hidden-sm hidden-xs col-lg-2 col-md-3 first clearfix">
					<?= get_template_part('template-parts/project', 'categories') ?>
					<?php dynamic_sidebar('ads-content-1') ?>
				</div><!-- #left_sidebar -->

				<div id="content" class="col-lg-7 col-md-6 col-sm-6 col-xs-12 clearfix">
					<div class="blog_container clearfix">

						<div class="col-lg-12 col-md-12 col-sm-12">
							<article class="blog-wrap">
								<?php if ($thumbnail = get_the_post_thumbnail_url(get_the_ID(), "large")): ?>
									<div class="ImageWrapper blog-media">
										<img class="img-responsive" src="<?= $thumbnail ?>" alt="">
									</div>
								<?php endif; ?>
								<div class="post-date">
									<span class="day"><?= get_the_date('d') ?></span>
									<span class="month"><?= get_the_date('M') ?></span>
								</div><!-- end post-date -->

								<div class="post-content">
									<div class="title"><h2><a href="<?= get_permalink() ?>"><?= get_the_title() ?></a></h2></div>

									<div class="post-meta">
										<span><i class="fa fa-user"></i> <a href="javascript:;"><?= get_the_author() ?></a></span>
										<span><i class="fa fa-comments"></i> <a href="javascript:;"><?= wp_count_comments(get_the_ID())->approved ?> Comments</a></span>
									</div>

									<?= get_the_content() ?>
								</div><!-- post-content -->
							</article><!-- end blog wrap -->
						</div><!-- end col-lg-6 -->
					</div><!-- end blog container -->

				</div><!-- end content -->

				<div id="right_sidebar" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 last single-post-sidebar clearfix">
					<?= get_sidebar() ?>
				</div><!-- end sidebar -->

			</div><!-- end row -->
		</div><!-- end container -->
	</section><!-- end generalwrapper -->

	<?php
endwhile;
?>
<?php get_footer(); ?>
