<?php
/* Template Name: News Template */
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
				<div class="clearfix">
					<?php
					$currentPage = get_query_var("paged") ? get_query_var("paged") : 1;
					$news = getNews(18, $currentPage);
					if ($news) {
						while ($news->have_posts()){
							$news->the_post();
							get_template_part('template-parts/news', 'item-2');
						}
					} else {
						get_template_part('template-parts/news', 'item-not-found');
					}
					?>
					?>
				</div>
				<?php if ($news->max_num_pages > 1): ?>
					<div class="pagination_wrapper clearfix">
						<ul class="pagination">
							<?php
							for ($i = 1; $i <= $news->max_num_pages; $i++) {
								$active = $currentPage == $i ? " class='active'" : '';
								echo "<li" . $active . "><a href='?paged=" . $i . "'>" . $i . "</a></li>";
							}
							?>
						</ul>
					</div>
				<?php endif; ?>

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
