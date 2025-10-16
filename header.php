<?php
    global $custom_data, $user_id, $module, $user_data, $exclude_header_footer_content, 
    $show_compact_footer, $common_assets_url, $fullUrl, $use_minified_assets;
    
    $current_search_type = SEARCH_TYPE_NAME;

    $current_template_assets_url = get_asset_url();
    $common_assets_url = get_asset_url();    
    $fullUrl = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
   

    include_once( "template-parts/header.php" );