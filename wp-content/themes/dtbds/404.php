<?php
get_header(); ?>
<section class="post-wrapper-top dm-shadow clearfix">
	<div class="container">
		<div class="post-wrapper-top-shadow">
			<span class="s1"></span>
		</div>
		<div class="col-lg-12">
			<ul class="breadcrumb">
				<li><a href="<?= pll_home_url() ?>"><?= pll__("Home") ?></a></li>
				<li><?= pll__("Page Not Found (404)") ?></li>
			</ul>
			<h2><?= pll__("Page Not Found (404)") ?></h2>
		</div>
	</div>
</section>
<section class="generalwrapper dm-shadow clearfix">
	<div class="container">
		<div class="row">
			<div id="content" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
				<div class="error404 text-center">
					<h2>
						<span>404</span>
					</h2>
					<h3><?= pll__("The page you are looking for no longer exists.") ?> <br/> <?= pll__("Perhaps you can return back to the homepage and see if you can find what you are looking for.") ?></h3>
					<a class="btn btn-primary" href="<?= pll_home_url() ?>"><?= pll__("Back to Homepage") ?></a>
				</div><br><br><br>
			</div>
		</div><!-- end row -->
	</div><!-- end container -->
</section>
<?php get_footer(); ?>
