<?php
/**
 * The template for displaying search forms
*/
?>


<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search" id="search-header-form" class="block-right">
    <input type="text" id="search"  name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php echo esc_attr_x( 'Rechercher un dossier, un article ...', 'placeholder', '' ); ?>">
    <button value="<?php echo esc_attr_x( 'Search', 'submit button', '' ); ?> type="submit" class="button-small">rechercher <span class="bl-icon bl-icon--search"></span></button>
</form>