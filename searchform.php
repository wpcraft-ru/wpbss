<?php
/**
 * The template for displaying search forms
 */
?>
<form role="search" method="get" class="form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="form-group">
        <input type="search" class="search-field form-control" placeholder="<?php _e( 'Text for search...', 'wpbss' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="Найти:">
    </div>
    <input type="submit" class="btn btn-default search-submit" value="<?php _e( 'Find', 'wpbss' ); ?>">
</form>