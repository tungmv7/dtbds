<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Bootstrap core CSS -->
	<link href="<?= get_template_directory_uri() ?>/assets/css/bootstrap.min.css" rel="stylesheet">

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

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-108407182-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-108407182-2');
    </script>

</head>
<body <?php body_class(); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5&appId=596806690476942";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
<div class="topbar clearfix">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-xs-12">
				<div class="callus">
					<p>
						<?php $contactData = wp_cache_get('contact-data'); ?>
						<span><i class="fa fa-envelope"></i> <?= $contactData['email'] ?></span>
						<span><i class="fa fa-phone-square"></i> <?= $contactData['phone'] ?></span>
					</p>
				</div><!-- end callus-->
			</div><!-- end col-lg-6 -->
			<div class="col-sm-4 col-xs-12">
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
		<div class="row header-row hidden-xs">
			<div class="col-sm-8 col-xs-12 text-left">
				<div class="logo-wrapper clearfix">
					<div class="logo">
						<a href="<?= pll_home_url() ?>" title="<?= pll__("Home") ?>">
							<img src="<?= get_template_directory_uri() ?>/images/logo.png">
						</a>
						<button type="button" data-toggle="collapse" data-target="#defaultmenu" class="navbar-toggle">
							<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
						</button>
					</div><!-- /.site-name -->
				</div><!-- /.logo-wrapper -->
			</div>
			<div class="col-sm-4 col-xs-12 text-right">
				<div class="social clearfix pull-right">
					<span><a data-placement="bottom" data-toggle="tooltip" data-original-title="Facebook" title="" href="<?= $contactData['facebook'] ?>"><i class="fa fa-facebook"></i></a></span>
					<span><a data-placement="bottom" data-toggle="tooltip" data-original-title="Google Plus" title="" href="<?= $contactData['google-plus'] ?>"><i class="fa fa-google-plus"></i></a></span>
					<span><a data-placement="bottom" data-toggle="tooltip" data-original-title="RSS" title="" href="<?= $contactData['rss'] ?>"><i class="fa fa-rss"></i></a></span>
				</div><!-- end social -->
			</div>
		</div><!-- end row -->


		<?php if ( has_nav_menu( 'top_menu' )) : ?>
		<nav class="navbar navbar-default fhmm" role="navigation">
			<div class="menudrop container">
				<div class="navbar-header">
					<a class="logo-inline" href="<?= pll_home_url() ?>" title="<?= pll__("Home") ?>">
						<img src="<?= get_template_directory_uri() ?>/images/logo.png">
					</a>
					<button type="button" data-toggle="collapse" data-target="#defaultmenu" class="navbar-toggle">
						<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button>
				</div>
				<?php
				wp_nav_menu(array(
						'menu' => 'top_menu',
						'theme_location' => 'top_menu',
						'depth' => 2,
						'container_id' => 'defaultmenu',
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
