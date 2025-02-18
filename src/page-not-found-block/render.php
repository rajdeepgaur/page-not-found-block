<?php 

if (!function_exists('extractLastPart')){
    function extractLastPart($url) {
        // Remove trailing slash if present
        $url = rtrim($url, '/');
    
        // Extract the last part of the URL
        $parts = explode('/', $url);
        return end($parts);
    }
}


$last_part = extractLastPart($_SERVER['REQUEST_URI']);

if ( ! empty( $attributes['prefix'] ) && ! empty( $attributes['showPrefix'] ) && ! empty($attributes['suffix'] ) && ! empty( $attributes['showSuffix'] )) {
    $display_text = $attributes['prefix'] . '"' . $last_part . '"' . $attributes['suffix'];
} else {
    $display_text = $last_part;
}

if ( ! empty( $attributes['prefix'] ) && ! empty( $attributes['showPrefix'] ) &&  empty($attributes['suffix'] ) && empty( $attributes['showSuffix'] )) {
    $display_text = $attributes['prefix'] . '"' . $last_part . '"';
} else {
    $display_text = $last_part;
}

if ( empty( $attributes['prefix'] ) && empty( $attributes['showPrefix'] ) && ! empty($attributes['suffix'] ) && ! empty( $attributes['showSuffix'] )) {
    $display_text = '"' . $last_part . '"' . $attributes['suffix'];
} else {
    $display_text = $last_part;
}

?>

<p <?php echo get_block_wrapper_attributes(); ?>><?php echo $display_text; ?></p>


