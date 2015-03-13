<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Maremo
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<div class="container">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'maremo' ); ?></a>

		<header id="masthead" class="site-header" role="banner">
			<div class="row">
				<div class="site-branding col-md-4">
					<?php if ( get_header_image() ) : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
						</a>
					<?php endif; // End header image check. ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<h4 class="site-description"><?php bloginfo( 'description' ); ?></h4>
				</div><!-- .site-branding -->
				<div class="contacts col-md-4">
					<br><br>
					<div>
					<?php
						echo'<span class="glyphicon glyphicon-phone-alt"></span> <span><a id="sphone" href="tel:'.get_theme_mod( 'phone_header' ).'">'.get_theme_mod( 'phone_header' ).'</a></span>'
					?>
					</div>
					<div>
						<span class="glyphicon glyphicon-envelope"></span> <span id="semail"><?php echo get_theme_mod( 'email_header' ); ?></span>
					</div>
				</div>
				<div class="callback col-md-4">
					<br><br>
												<!-- Button trigger modal -->
						<button class="btn btn-small btn-success" data-toggle="modal" data-target="#myModal">
						        Заказать обратный звонок
						      </button>

						<!-- Modal -->
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel">Заполните форму для заказа обратного звонка</h4>
						      </div>
						      <div class="modal-body">
						    		<?php echo do_shortcode('[form-cp name_form="Обратный звонок" spam_protect=1]

									[input-cp type=text name="name" placeholder="Имя" meta="Имя"]<br>

									[input-cp type=text name="tel" placeholder="Телефон" required="true" meta="Телефон"]<br>

									[input-cp type=submit class="btn btn-small btn-success" value="Отправить" name="submit"]

									[/form-cp]'); ?>
						      </div>
						    </div>
						  </div>
						</div>
								<br><br>
				</div>
			</div>
		</header><!-- #masthead -->
	</div>
	<?php
	$menu = wp_nav_menu( array(
	                'theme_location'    => 'primary',
	                'depth'             => 2,
	                'container'         => 'div',
	                'container_class'   => 'collapse navbar-collapse',
	                'menu_class'        => 'nav navbar-nav',
	                'echo'            => false,
	                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
	                'walker'            => new wp_bootstrap_navwalker())
	            );

    if (!empty($menu)) { ?>
	<div class="container">
		<nav class="navbar navbar-default akcent" role="navigation" style="background-image: none;">
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>

	        </div>

			<?php

	            echo $menu;
	        ?>
		</nav>
    </div>
<?php } ?>

	<!-- #site-navigation -->
	<div id="content" class="site-content container">
