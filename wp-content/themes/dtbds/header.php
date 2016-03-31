<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Bootstrap core CSS -->
	<link href="<?= get_template_directory_uri() ?>/assets/css/bootstrap.css" rel="stylesheet">

	<!-- Style CSS -->
	<link href="<?= get_template_directory_uri() ?>/style.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="<?= get_template_directory_uri() ?>/assets/js/html5shiv.js"></script>
	<script src="<?= get_template_directory_uri() ?>/assets/js/respond.min.js"></script>
	<![endif]-->

	<!-- Favicons -->
	<link rel="shortcut icon" href="<?= get_template_directory_uri() ?>/assets/ico/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="<?= get_template_directory_uri() ?>/assets/ico/apple-touch-icon.png" />
	<link rel="apple-touch-icon" sizes="57x57" href="<?= get_template_directory_uri() ?>/assets/ico/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?= get_template_directory_uri() ?>/assets/ico/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?= get_template_directory_uri() ?>/assets/ico/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?= get_template_directory_uri() ?>/assets/ico/apple-touch-icon-144x144.png">

	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<div class="topbar clearfix">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="callus">
					<p>
						<span><i class="fa fa-envelope"></i> info@yoursite.com</span>
						<span><i class="fa fa-phone-square"></i> +90 333 444 55 66</span>
					</p>
				</div><!-- end callus-->
			</div><!-- end col-lg-6 -->
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="marketing">
					<?php $translations = pll_the_languages(array('raw'=>1)); ?>
					<ul class="topflags pull-right">
						<?php
							foreach($translations as $translation):
						?>
						<li><a data-placement="bottom" data-toggle="tooltip" data-original-title="<?= $translation['name'] ?>" title="<?= $translation['name'] ?>" href="<?= $translation["url"]?>">
								<img alt="de" src="<?= $translation['flag'] ?>"></a>
						</li>
						<?php endforeach; ?>
					</ul><!-- end flags -->
				</div><!-- end marketing -->
			</div><!-- end col-lg-6 -->
		</div><!-- end row -->
	</div><!-- end container -->
</div>

<header class="header1">
	<div class="container">
		<div class="row header-row">
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="logo-wrapper clearfix">
					<div class="logo">
						<a href="<?= pll_home_url() ?>" title="<?= pll__("Home") ?>">
							<img src="<?= get_template_directory_uri() ?>/images/logo.png">
						</a>
					</div><!-- /.site-name -->
				</div><!-- /.logo-wrapper -->
			</div>
			<div class="col-lg-3 col-md-6 col-sm-12">
			</div>
			<div class="col-lg-5 col-md-5 col-sm-12  pull-right">
				<div class="social clearfix pull-right">
					<span><a data-placement="bottom" data-toggle="tooltip" data-original-title="Facebook" title="" href="demo-index.html#"><i class="fa fa-facebook"></i></a></span>
					<span><a data-placement="bottom" data-toggle="tooltip" data-original-title="Google Plus" title="" href="demo-index.html#"><i class="fa fa-google-plus"></i></a></span>
					<span><a data-placement="bottom" data-toggle="tooltip" data-original-title="RSS" title="" href="demo-index.html#"><i class="fa fa-rss"></i></a></span>
				</div><!-- end social -->
			</div>
		</div><!-- end row -->


		<?php if ( has_nav_menu( 'top_menu' )) : ?>
		<nav class="navbar navbar-default fhmm" role="navigation">
			<div class="menudrop container">
				<div class="navbar-header">
					<button type="button" data-toggle="collapse" data-target="#defaultmenu" class="navbar-toggle">
						<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button>
				</div>
				<?php
				wp_nav_menu(array(
						'menu' => 'top_menu',
						'theme_location' => 'top_menu',
						'depth' => 2,
						'container' => 'div',
						'container_class' => 'collapse navbar-collapse',
						'menu_class' => 'nav navbar-nav',
						'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
						'walker' => new wp_bootstrap_navwalker())
				);
				?>
			</div>
		</nav>
		<?php endif; ?>


	</div><!-- end container -->
</header><!-- end header -->
