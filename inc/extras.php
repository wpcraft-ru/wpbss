<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package wpbss
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function wpbss_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'wpbss_body_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function wpbss_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name.
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary.
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( esc_html__( 'Page %s', 'wpbss' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'wpbss_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function wpbss_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'wpbss_render_title' );
endif;


/**
 * Change for `the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 */
function get_the_archive_title_callback_wpbss($title) {
	if ( is_post_type_archive() ) {
		return post_type_archive_title( '', false );
    }
return $title;
}
add_filter('get_the_archive_title', 'get_the_archive_title_callback_wpbss');



/*
Добавлем кнопку Подробнее на странице списка постов
*/
function the_content_more_link_callback( $more_link, $more_link_text ) {
	global $post;
	return '<br/><a href="' . get_permalink() . '#more-' . get_the_id() . '" class="btn btn-default">Подробнее &rarr;</a>';
}
add_filter( 'the_content_more_link', 'the_content_more_link_callback', 10, 2 );

function excerpt_more_callback($more){
	global $post;
	return '<br/><a href="' . get_permalink() . '#more-' . get_the_id() . '" class="btn btn-default">Подробнее &rarr;</a>';
}
add_filter('excerpt_more', 'excerpt_more_callback');
