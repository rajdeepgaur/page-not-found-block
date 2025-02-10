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


$lastPart = extractLastPart($_SERVER['REQUEST_URI']);

?>

<p <?php echo get_block_wrapper_attributes(); ?>><?php echo $lastPart; ?></p>


