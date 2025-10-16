<?php 
// Email Configuration
define('MAIL_HOST', 'smtp.mailtrap.io');
define('MAIL_PORT', 2525);
define('MAIL_USERNAME', '77e44810d3f249');
define('MAIL_PASSWORD', '629ea9907a779b');
define('MAIL_FROM_ADDRESS', 'noreply@socialcatfish.com');
define('SECONDARY_MAIL_HOST', 'backup.smtp.com');
define('SECONDARY_MAIL_PORT', 587);
define('SECONDARY_MAIL_USERNAME', 'backup@socialcatfish.com');
define('SECONDARY_MAIL_PASSWORD', '');

// Search Types
define( "SEARCH_TYPE_USERNAME", 0 );
define( "SEARCH_TYPE_EMAIL", 1 );
define( "SEARCH_TYPE_NAME", 2 );
define( "SEARCH_TYPE_PHONE", 3 );
define( "SEARCH_TYPE_IMAGE", 4 );
define( "SEARCH_TYPE_RAS", 5 );
define( "SEARCH_TYPE_CR", 6);
define( "SEARCH_TYPE_BS", 7);
define( "SEARCH_TYPE_SS", 8);
define("SEARCH_TYPE_COMBO", 9);
define("SEARCH_TYPE_PREMIUM", 10);

define( "BASE_URL", "https://socialcatfish.com/" );
define( "ASSETS_BASE_URL", "https://socialcatfish.com/scamfish/assets" );
define( "RELATIVE_URL", "https://socialcatfish.com/" );
define( "RELATIVE_BLOG_URL", "https://socialcatfish.com/scamfish/" );
define( "CACHE_DIR", "__cache" );
define( "TEMPLATE_DIR", "template" );
define( "NEW_TEMPLATE_DIR", "template/new_templates" );
define( "UPLOADS_DIR", "uploads" );
define( "ASSETS_DIR", "assets" );
define( "USER_DIR", "user" );
define( "EMAIL_TEMPLATES_DIR", "email_templates" );
define( "TEMP_DIR", "tmp" );
define( "AMP_TEMPLATE_DIR", TEMPLATE_DIR . DIRECTORY_SEPARATOR . "amp_templates" );
define( "PAGE_URL_OPTOUT", RELATIVE_URL . "opt-out/" );
define( "SENDY_INSTALATION_URL", "https://socialcatfishmx.com/");

define( "ABS_PATH", __DIR__ . DIRECTORY_SEPARATOR );
define( "TEMPLATE_PATH", ABS_PATH . TEMPLATE_DIR . DIRECTORY_SEPARATOR );
define( "NEW_TEMPLATE_PATH", ABS_PATH . NEW_TEMPLATE_DIR . DIRECTORY_SEPARATOR );
define( "UPLOADS_PATH", ABS_PATH . UPLOADS_DIR . DIRECTORY_SEPARATOR );
define( "ASSETS_PATH", ABS_PATH . ASSETS_DIR . DIRECTORY_SEPARATOR );
define( "USER_UPLOADS_PATH", ABS_PATH . USER_DIR . DIRECTORY_SEPARATOR . UPLOADS_DIR . DIRECTORY_SEPARATOR );
define( "EMAIL_TEMPLATES_PATH", ABS_PATH . EMAIL_TEMPLATES_DIR . DIRECTORY_SEPARATOR );
define( "TEMP_PATH", ABS_PATH . TEMP_DIR . DIRECTORY_SEPARATOR );
define( "CACHE_PATH", ABS_PATH . CACHE_DIR . DIRECTORY_SEPARATOR );
define( "AMP_TEMPLATE_PATH", ABS_PATH . AMP_TEMPLATE_DIR . DIRECTORY_SEPARATOR );
define( "BLOG_PATH", realpath( ABS_PATH . "scamfish" ) . DIRECTORY_SEPARATOR );

define( "PAGE_URL_REVERSE_EMAIL_SEARCH", RELATIVE_URL . "reverse-email-address-search/" );
define( "PAGE_URL_BLOG", RELATIVE_URL . "scamfish/" );
define( "PAGE_URL_DASHBOARD", RELATIVE_URL . "dashboard.html" );
define( "PAGE_URL_LOGIN", RELATIVE_URL . "login.html" );
define( "PAGE_URL_REVERSE_IMAGE_SEARCH", RELATIVE_URL . "reverse-image-search/" );
define( "PAGE_URL_REVERSE_PHONE_SEARCH", RELATIVE_URL . "reverse-phone-lookup/" );
define( "PAGE_URL_REVERSE_USERNAME_SEARCH", RELATIVE_URL . "reverse-username-search/" );
define( "PAGE_URL_REVERSE_ADDRESS_SEARCH", RELATIVE_URL . "reverse-address-check/" );
define( "PAGE_URL_GUEST_PROGRESS", RELATIVE_URL . "search-data.html" );
define( "PAGE_URL_CRIMINAL_RECORD", RELATIVE_URL . "criminal_report/" );
define( "PAGE_URL_RAS_REPORT", RELATIVE_URL . "ras_report/" );
define( "PAGE_URL_REVERSE_SEARCH", RELATIVE_URL . "reverse-lookup/" );
define( "PAGE_URL_BEST_PEOPLE", RELATIVE_URL . "best-people/" );

define( "PAGE_URL_MEMBERSHIP_LEVELS", RELATIVE_URL . "membership-levels/" );

define( "PAGE_URL_FAQ", RELATIVE_URL . "faq/" );
define( "PAGE_URL_CONTACT_US", RELATIVE_URL . "contact/" );

define( "JS_MAIN_CONTROLLER", "js-r" );
define( "JS_ELEMENT_VAR", "js-v" );

define( "PLAN_RIS_BOOSTED_UNLIMITED", 65 );
define( "PLAN_100_LIMITED_TOKENS", 85 );
define( "PLAN_UNLIMITED_3_DAY_RIS_2897", 77 );

define( "RIS_PENDING_FLAG", "0|0|0|0" );
define( "RIS_MAX_MULTIPLE_FACES", 3 );

// Blog
define( "DB_TBL_WP_POSTS", DB_NAME . ".wp_posts" );
define( "DB_TBL_WP_USERS", DB_NAME . ".wp_users" );
define( "DB_TBL_WP_POSTMETA", DB_NAME . ".wp_postmeta" );
define( "DB_TBL_WP_TERM_RELATIONSHIPS", DB_NAME . ".wp_term_relationships" );
define( "DB_TBL_WP_TERM_TAXONOMY", DB_NAME . ".wp_term_taxonomy" );
define( "DB_TBL_WP_TERMS", DB_NAME . ".wp_terms" );

define( "BLOG_CDN_URL", "socialcatfish.com/scamfish/wp-content" );
define( "RECAPTCHA_SITE_KEY", "6LfYlBwTAAAAAI0CitGvsc5rutt06QvjntDr7_Hp" );

define( "SENDY_LIST_BLOG", "" );
