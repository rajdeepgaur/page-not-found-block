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


// Default value
$display_text = $last_part;

// Case 1: Both prefix & suffix exist and should be shown
if (
    !empty($attributes['prefix']) && 
    !empty($attributes['showPrefix']) && 
    !empty($attributes['suffix']) && 
    !empty($attributes['showSuffix'])
) {
    $display_text = $attributes['prefix'] . '"' . $last_part . '"' . $attributes['suffix'];
}

// Case 2: Show suffix is enabled, but suffix is empty → Only prefix + last_part
elseif (
    !empty($attributes['showSuffix']) && 
    empty($attributes['suffix']) && 
    !empty($attributes['prefix']) && 
    !empty($attributes['showPrefix'])
) {
    $display_text = $attributes['prefix'] . '"' . $last_part . '"';
}

// Case 3: Show prefix is enabled, but prefix is empty → Only last_part + suffix
elseif (
    !empty($attributes['showPrefix']) && 
    empty($attributes['prefix']) && 
    !empty($attributes['suffix']) && 
    !empty($attributes['showSuffix'])
) {
    $display_text = '"' . $last_part . '"' . $attributes['suffix'];
}

// Case 4: Prefix and showPrefix are empty, but suffix and showSuffix exist → Show only last_part + suffix
elseif (
    empty($attributes['prefix']) && 
    empty($attributes['showPrefix']) && 
    !empty($attributes['suffix']) && 
    !empty($attributes['showSuffix'])
) {
    $display_text = '"' . $last_part . '"' . $attributes['suffix'];
}

// Case 5: Suffix and showSuffix are empty, but prefix and showPrefix exist → Show only prefix + last_part
elseif (
    !empty($attributes['prefix']) && 
    !empty($attributes['showPrefix']) && 
    empty($attributes['suffix']) && 
    empty($attributes['showSuffix'])
) {
    $display_text = $attributes['prefix'] . '"' . $last_part . '"';
}

// Case 6: Only showPrefix & showSuffix are set, but prefix and suffix are empty → Show only last_part
elseif (
    !empty($attributes['showPrefix']) && 
    empty($attributes['prefix']) && 
    !empty($attributes['showSuffix']) && 
    empty($attributes['suffix'])
) {
    $display_text = $last_part;
}

// Case 7: Both showPrefix & showSuffix are empty → Show only last_part
elseif (
    empty($attributes['showPrefix']) && 
    empty($attributes['showSuffix'])
) {
    $display_text = $last_part;
}

// Case 8: Suffix should be shown but is empty, and showPrefix is empty → Show only last_part
elseif (
    !empty($attributes['showSuffix']) && 
    empty($attributes['suffix']) && 
    empty($attributes['showPrefix'])
) {
    $display_text = $last_part;
}

// Case 9: Prefix should be shown but is empty, and showSuffix is empty → Show only last_part
elseif (
    !empty($attributes['showPrefix']) && 
    empty($attributes['prefix']) && 
    empty($attributes['showSuffix'])
) {
    $display_text = $last_part;
}

?>

<p <?php echo get_block_wrapper_attributes(); ?>><?php echo $display_text; ?></p>


