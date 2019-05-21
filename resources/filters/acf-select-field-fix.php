<?php

/**
 * Temporary workaround Filter to fix default value type
 * for Select field types returns array if values 
 * are not set. More info check below URL
 * https://support.advancedcustomfields.com/forums/topic/get_field-returning-array-for-select-when-no-value-exists-in-database/
 */

function coerce_array_to_value( $value, $post_id, $field ) {
  if (
    $field['return_format'] === 'value' &&
    !$field['multiple'] &&
    is_array( $value ) &&
    array_key_exists( 0, $value )
  ) {
    $value = $value[0];
  }

  return $value;
}

add_filter( 'acf/load_value/type=select', 'coerce_array_to_value', 10, 3 );