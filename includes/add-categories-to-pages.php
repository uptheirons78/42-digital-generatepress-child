<?php
/**
 * Add categories to pages
 */

function mb_add_categories_to_pages() {
  register_taxonomy_for_object_type( 'category', 'page' );
}

add_action( 'init', 'mb_add_categories_to_pages' );