<?php
/**
 * Add local fonts to editor
 */
function mb_add_local_fonts_to_editor( $editor_styles ) {
  $editor_styles[] = 'style.css';

  return $editor_styles;
}

add_filter( 'generate_editor_styles', 'mb_add_local_fonts_to_editor' );