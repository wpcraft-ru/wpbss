<?php


if ( ! function_exists( 'ie_support_header_s' ) ) :
/**
 * Add support IE in header, HTML5 shiv and Respond.js for IE8 support of HTML5 elements and media queries
 */
function ie_support_header_s() {

?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--[if lt IE 9]>
<script src="<?php echo esc_url( get_template_directory_uri() . '/inc/js/html5shiv.min.js' ) ?>"></script>
<script src="<?php echo esc_url( get_template_directory_uri() . '/inc/js/Respond/dest/respond.min.js' ) ?>"></script>
<![endif]-->
<?php
}
endif;
add_action( 'wp_head', 'ie_support_header_s', 1 );
