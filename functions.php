<?php

    $http_host = filter_input(INPUT_SERVER, 'HTTP_HOST', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    define("SCF_PATH_ABS", ("socialcatfish.com" == $http_host) ? "/home/socialcatfish/public_html/" : realpath(ABSPATH . "../") . DIRECTORY_SEPARATOR);
    define( "FROM_SCF_BLOG", true );
    define( "BLOG_URL_PATH", "scamfish" );
    //include_once SCF_PATH_ABS . "init.php";

    require_once get_stylesheet_directory() . '/scf-config.php';

    $user_template = "2020";

    /* BTT disabled
    //Behavior Implementation for BLOG pages
    $behavior_tracking_activated = true;
    $behavior_heatmap = false;
    
    $behavior_heatmap_ver1 = (! empty($_GET["behavior_trk_heatmap_ver1"])) ? $_GET["behavior_trk_heatmap_ver1"] : "false";
    $scamfish_flg = false;
    if($behavior_heatmap_ver1 == "true") {
        $user_id_btt = 255;

        set_time_limit( 0 );
        //ini_set( "memory_limit", "1024M" );

        //ini_set('display_errors', 1);
        //ini_set('display_startup_errors', 1);
        //error_reporting(E_ALL);
        $scamfish_flg = true;
    }
    $behavior_header_scripts = Behavior::generate_site_header_scripts();
    */

define( "TIMESTAMP_FOR_JS_CSS", "1742925225" );

if ( ! defined('ASSETS_URL') ) {
    define('ASSETS_URL', get_template_directory_uri() . '/assets');
}

function get_asset_url( $section = "", $template_module_name = "" ) {

    static $accepted_sections;

    if ( empty( $accepted_sections ) ) {
        $accepted_sections = array_fill_keys( [ "template", "common", "module" ], 1 );
    }

    if ( ! isset( $accepted_sections[ $section ] ) ) {
        $section = "";
    }

    if ( "template" === $section ) {
        if ( ! $template_module_name ) {
            $template_module_name = $GLOBALS["user_template"] ?? "default"; // fallback
        }
        $path = $section . '/' . $template_module_name;
    } elseif ( "module" === $section ) {
        $path = $section . '/' . $template_module_name;
    } else {
        $path = $section;
    }

    return ASSETS_URL . '/' . $path;
}
$current_template_assets_url = get_asset_url();
$common_assets_url = get_asset_url();

class scf_functions {

    function __construct() {

        register_nav_menus( array (
            'menu-1' => __( 'Primary Menu', 'socialcatfish-2020' ),
        ) );

        add_image_size( 'my-custom-image-size', 640, 999 );

        add_action( "wp_enqueue_scripts", array( $this, "socialcatfish_scripts" ) );
        add_action( 'widgets_init', array( $this, "scf_theme_widgets" ) );
        add_filter( 'the_content', array( $this, "socialcatfish_content_replacement" ) );
        add_filter( 'category_template', array( $this, "scf_category_templates" ) );
        add_filter( 'comment_form_fields', array( $this, "socialcatfish_comment_form" ) );
        add_filter( 'wp_list_categories', array( $this, "scf_category_list" ) );
        add_filter( 'singular_template', array( $this, "career_page_template" ) );
        add_action( 'template_redirect', array( $this, "form_submit" ) );
        //add_filter( 'user_trailingslashit', array( $this, "remove_category" ), 100, 2 );
        
        add_filter( 'wp', array( $this, "redirect_to_home_if_author_parameter" ) );
        add_filter( 'rest_endpoints', function( $endpoints ){
            if ( isset( $endpoints['/wp/v2/users'] ) ) {
                unset( $endpoints['/wp/v2/users'] );
            }
            if ( isset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] ) ) {
                unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
            }
            return $endpoints;
        });

        add_shortcode( 'embed_link', array( $this, "scf_embed_link" ) );
        add_shortcode( 'review_star_rating', array( $this, "review_star_rating" ) );

    }

    function socialcatfish_scripts() {

        wp_enqueue_style( 'socialcatfish-scf-icons', get_template_directory_uri() . '/assets/css/scf-icons.css?' . TIMESTAMP_FOR_JS_CSS );
        wp_enqueue_style( 'socialcatfish-scf-style', get_template_directory_uri() . '/assets/css/scf-style.css?' . TIMESTAMP_FOR_JS_CSS );
        wp_enqueue_style( 'socialcatfish-style', get_template_directory_uri() . '/assets/css/style2.css?' . TIMESTAMP_FOR_JS_CSS );
        wp_enqueue_style( "socialcatfish-blog-style", get_template_directory_uri() . "/assets/css/style.css?" . TIMESTAMP_FOR_JS_CSS );
        wp_enqueue_style( "socialcatfish-dashboard-style", get_template_directory_uri() . "/assets/css/dashboard.css?" . TIMESTAMP_FOR_JS_CSS );
        wp_enqueue_style( 'socialcatfish-abtest-style', get_template_directory_uri() . '/assets/css/abtest.css?' . TIMESTAMP_FOR_JS_CSS );

        wp_enqueue_script( "jquery-new", get_template_directory_uri() . "/assets/js/jquery-3.6.0.min.js?" . TIMESTAMP_FOR_JS_CSS, 'jquery' );
        wp_enqueue_script( "jquery-ui", get_template_directory_uri() . "/assets/js/jquery-ui.min.js?" . TIMESTAMP_FOR_JS_CSS, 'jquery' );
        wp_enqueue_script( "jquery-fit", get_template_directory_uri() . "/assets/js/jquery.fitvids.js?" . TIMESTAMP_FOR_JS_CSS, 'jquery' );

        wp_enqueue_script( "socialcatfish-scf", get_template_directory_uri() . "/assets/js/scf.js?" . TIMESTAMP_FOR_JS_CSS, 'jquery' );
        
        wp_enqueue_script( "socialcatfish-script", get_template_directory_uri() . "/assets/js/script.js?" . TIMESTAMP_FOR_JS_CSS, 'jquery' );
        //wp_enqueue_script( "socialcatfish-scf-abtest", ASSETS_BASE_URL . '/template/2020/abtest/js/abtest.js?' . TIMESTAMP_FOR_JS_CSS, 'jquery' );
        if (is_page_template('pillar.php')) {
            wp_enqueue_script('socialcatfish-pillar-script', get_template_directory_uri() . '/assets/js/pillar.js' . TIMESTAMP_FOR_JS_CSS, 'jquery' );
        }

	}

    function load_popups() {

        global $include_popup;

        return $include_popup;

    }

    function scf_theme_widgets() {

        register_sidebar( array(
            'name' => 'SCF Post Sidebar',
            'id' => 'scf_post_sidebar',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="rounded">',
            'after_title' => '</h2>',
        ));

    }

    function socialcatfish_content_replacement( $content ) {

        global $header_version;
        $header_version = "full"; //change later
        global $current_search_type;

        if( wp_is_mobile() ) {
            $scfb_search = "search_mb_2020 scfb_mb_search scfb_full_search";
        } else {
            $scfb_search = "search_mb_2020 scfb_mb_search scfb_full_search";
        }

        ob_start();
        include get_template_directory() . '/template-parts/search.php';
        $search_data = ob_get_clean();
        // ob_end_clean();
        ob_start();
        include get_template_directory() . '/template-parts/subscribe_email.php';
        $subscribe_data = ob_get_clean();





        $content = str_replace(
            [
                "{scf_infographics_form}",
                "{scf_search_bar}",
                '"/blog/',
                'socialcatfish.com/blog/',
                //'https://socialcatfish.com/scamfish/wp-content/uploads',
                '{scf_email_sub}',
				'https://https://'
            ],
            [   
                '',
                //'<div class="infographic-form"><div class="box"><div class="box-header">Want Access to The Data From the Infographic?</div><img src="' . get_template_directory_uri() . '/assets/images/icon-email-blog-small.png" /><div class="box-text">Enter your email to get access to the data collected for our inforgraphic that includes image matches and top accounts</div><div class="input-group"><input class="form-control infographic_form" aria-label="Recipient\'s username" aria-describedby="basic-addon2" type="text"><span class="input-group-addon" id="basic-addon2">See the Data</span> </div></div></div>',
                '<div class="' . $scfb_search . ' blog_content_search">' . $search_data . '</div>',
                '"/' . BLOG_URL_PATH . "/",
                'socialcatfish.com/scamfish/',
                //BLOG_CDN_URL,
                '<div>'. $subscribe_data .'</div>',
				'https://'
            ],
            $content
        );

        // Make articles use the optimized images
        preg_match_all( "/\"([^\"]+scamfishcdn\.socialcatfish\.com\/uploads\/[^\"]+)\"/i", $content, $image_list );
        foreach ( $image_list[1] as $image_url ) {

            $optimized_image = blog_get_optimized_image( $image_url, true );
            if ( $optimized_image != $image_url ) {

                $content = str_replace( $image_url, $optimized_image, $content );

            }

        }

        return $content;

    }

    function scf_category_templates( $template ) {

        $term = get_queried_object();
        $children = get_term_children( $term->term_id, $term->taxonomy );

        if( empty( $children ) ) {
            $template = locate_template( 'subcategory.php' );
        } else {
            $template = locate_template( 'category.php' );
        }

        if( $term->name == "Catfished on YouTube" ) $template = locate_template( 'catfished-on-youtube.php' );

        return $template;

    }

    function file_is_valid_image( $path ) {

        //$size = wp_getimagesize( $path );
        //return ! empty( $size );

        if( ! empty ( $path ) ) return 1;
        else return 0;

    }

    function socialcatfish_comment_form( $fields ) {

        return array (
            "author" => "<div class=\"row\"><div class=\"col-md-6\"><input id=\"author\" class=\"scf-form\" name=\"author\" type=\"text\" value=\"\" size=\"30\" maxlength=\"245\" aria-required='true' required='required' placeholder=\"Enter your Name*\" /></div>",
            "email" => "<div class=\"col-md-6\"><input id=\"email\" class=\"scf-form\" name=\"email\" type=\"text\" value=\"\" size=\"30\" maxlength=\"100\" aria-describedby=\"email-notes\" aria-required='true' required='required' placeholder=\"Enter your Email*\" /></div></div>",
            "url" => "<p class=\"comment-form-url\"><input id=\"url\" class=\"scf-form\" name=\"url\" type=\"text\" value=\"\" size=\"30\" maxlength=\"200\" placeholder=\"Website\" /></p>",
            "comment" => "<p class=\"comment-form-comment\"><textarea id=\"comment\" class=\"scf-form\" name=\"comment\" cols=\"45\" rows=\"8\" maxlength=\"65525\" aria-required=\"true\" required=\"required\" placeholder=\"Comment*\"></textarea></p><p class=\"form-warning\">Please use your real name and a corresponding social media profile when commenting. Otherwise, your comment may be deleted.</p>",
        );

    }

    function socialcatfish_comment_walker( $comment, $depth, $args ) {

        printf('
            <div class="comment-card">
            <div class="author-avatar">%s</div>
            <a>%s</a><span>%s</span>
            ', get_avatar($comment, 50), get_comment_author_link($comment), date("d F, Y H:i a", strtotime($comment->comment_date)));

        comment_text( get_comment_id() );

        comment_reply_link( array(
            'depth' => $depth,
            'max_depth' => $args['max_depth'],
            'before' => '<div class="reply">',
            'after' => '</div>',
        ));

        echo '</div>';

    }

    function scf_category_list( $list ) {
        $list = str_replace( '</a> (', '<span>', $list );
        $list = str_replace( ')', '</span></a>', $list );
        return $list;
    }

    function scf_embed_link( $atts ) {

        $post_id = url_to_postid( $atts["url"] );
        $img_url = blog_get_optimized_image( wp_get_attachment_url( get_post_thumbnail_id( $post_id ), 'thumbnail' ) );
        if( ! $this->file_is_valid_image( $img_url ) ) $img_url =  get_template_directory_uri() . '/assets/img/no-image-found.jpg';
        $author_id = get_post_field( 'post_author', $post_id );
        $author_name = get_the_author_meta( 'display_name', $author_id );
        $get_date = get_the_modified_date( 'F jS, Y', $post_id );

        $post_content = str_replace( "{scf_search_bar}", "", strip_tags( substr( $this->get_the_content_by_id( $post_id ), 0, 150 ) ) . "..." );

        $content = '<a href="' . get_permalink( $post_id ) . '">
                        <div class="scfb_embed_post">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="' . $current_template_assets_url . '/images/loader-white.svg" data-src="' .  $img_url . '" class="lazy-loader" style="background-image: url('. $img_url .');" alt="'. $embed_post[0]->post_title .'" />
                                </div>
                                <div class="col-md-8">
                                    <h4>'. get_the_title( $post_id ) .'</h4>
                                    <div class="scfb-post-date">'. $get_date .' by '. $author_name .'</div>
                                    <p>'. $post_content .'</p>
                                </div>
                            </div>
                        </div>
                    </a>';

        return $content;

    }

    function get_the_content_by_id( $post_id ) {

        $page_data = get_post( $post_id );
        if ( $page_data ) {
          return $page_data->post_content;
        }
        else return false;

    }

    function review_star_rating( $attr ) {

        $a = shortcode_atts(array(
            'rating' => 0,
            ), $attr);

        $rating = floor($a['rating']);
        $fraction = $a['rating'] - $rating;

        $output = "<div class='scfb-rating-sc'><strong>Rating : </strong>";
        for ($i = 0; $i < $rating; $i++) {
            $output .= '<i class="si-star-fill"></i>';
        }
        if ($fraction > 0) {
            $output .= '<i class="si-star-half"></i>';
        }
        $output .= '</div>';
        return $output;

    }

    function remove_category( $string, $type )  {

        if ( $type != 'single' && $type == 'category' && ( strpos( $string, 'category' ) !== false ) ) {
            $url_without_category = str_replace( "/category/", "/", $string );
            return trailingslashit( $url_without_category );
        }
        return $string;

    }

    function scf_content_replace( $string, $limit = "" ) {

        $text = strip_shortcodes( strip_tags( $string ) );
        $content = preg_replace( '#\[[^\]]+\]#', '', $text );
        if( $limit == "" || empty( $content ) ) {
            return str_replace( "{scf_search_bar}", "", $content );
        } else {
            return substr( str_replace( "{scf_search_bar}", "", $content ), 0, $limit  ) . "...";
        }

    }

    function redirect_to_home_if_author_parameter() {

        if ( preg_match( "/author=/i", $_SERVER["REQUEST_URI"] ) ) {

            wp_redirect( home_url(), 301 );
            exit();

        }

    }

    function career_page_template() {

        $term = get_queried_object();
        if( $term->post_type == "job_listing" ) $template = locate_template( 'career.php' );
        else $template = locate_template( 'singular.php' );
        return $template;
        
    }

    function form_submit() {

        if ( isset( $_POST['submit_action'] ) ) {
            global $awsm_response;
            $action = sanitize_title( $_POST['submit_action'] );

            switch ( $action ) {
                case 'submit_idea' : 
                    $email = $_POST['email'];               
                    $description = $_POST['description'];                    
                    add_improve( $email, $description );
                    $return_message = "<div class='scfb-success'>Thank you! Your submission has been sent.</div>";
                    break;
        
                default :
                    $return_message = "";
                    break;
            }            
	        $awsm_response['success'][] = $return_message;
            
        }

    }

}

if ( class_exists( 'scf_functions' ) ) {

    $scf_functions = new scf_functions();

}

function scf_cdn_rewrite_after( $rewritten_contents ) {

    $rewritten_contents = str_replace( [ 'scamfishcdn.socialcatfish.com/blog/wp-content/', 'scamfishcdn.socialcatfish.com/assets/', 'spcdnblog.socialcatfish.com/blog/wp-content/', 'spcdnblog.socialcatfish.com/assets/', 'spcdnblog.socialcatfish.com/scamfish/wp-content/', 'scamfishcdn.socialcatfish.com/scamfish/wp-content/' ], BLOG_CDN_URL . '/', $rewritten_contents );
    return $rewritten_contents;

}
add_filter( 'cdn_enabler_contents_after_rewrite', 'scf_cdn_rewrite_after' );

function scf_disable_partial_link_redirects( $location ) {

    return ( is_404() ) ? "" : $location;


}
add_filter( "post_link", "scf_disable_partial_link_redirects", 99 );


if (!function_exists("socialcatfish_get_mailer")):

    function socialcatfish_get_mailer() {

        include_once ABSPATH . WPINC . '/PHPMailer/PHPMailer.php';
        include_once ABSPATH . WPINC . '/PHPMailer/SMTP.php';
        
        class_alias( 'PHPMailer\PHPMailer\PHPMailer', 'PHPMailer' );
        class_alias( 'PHPMailer\PHPMailer\SMTP', 'SMTP' );
        
        return get_mailer();
    }

endif;

if (!function_exists('socialcatfish_capture_ajax')):

function socialcatfish_capture_ajax() {

    // Check if action is correct and email is present
    if ( isset($_POST['action']) && $_POST['action'] === 'infographics' && !empty($_POST['email']) ) {

        $email = trim($_POST['email']);

        // Validate email safely
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $content = "Thanks for your interest in the data from the infographic. Please see attached PDF with matching images from top Instagram accounts. If you use the data, please credit us.\r\n\r\n<br /><br />Thanks,\r\n<br />Social Catfish Team\r\n<br />\r\n<br /><b>About Social Catfish</b>: Socialcatfish.com is a people search website that specializes in helping people find out who they've met online, find lost ones and help verify people's online profiles.";

            $mailer = socialcatfish_get_mailer();
            $mailer->addAddress($email);
            $mailer->Subject = "SocialCatfish: InfoGraphics Report";
            $mailer->msgHTML($content);
            $mailer->AltBody = strip_tags($content);
            $mailer->addAttachment(__DIR__ . "/attachments/infographics-report.pdf", "Infographics Report.pdf");

            if ($mailer->send()) {
                // Add to Mailchimp list
                $mailchimp = new MailChimp(MAILCHIMP_API_KEY);
                $mailchimp->add_to_list(MAILCHIMP_LIST_INFOGRAPHICS_REPORT_SIGNUP, $email);

                wp_send_json(['status' => true]);
            } else {
                wp_send_json(['status' => false, 'error' => 'Failed to send email']);
            }

        } else {
            wp_send_json(['status' => false, 'error' => 'Invalid email']);
        }

    } else {
        wp_send_json(['status' => false, 'error' => 'Invalid request']);
    }

    // Just in case
    wp_die();
}

endif;

add_action('wp_ajax_infographics', 'socialcatfish_capture_ajax');
add_action('wp_ajax_nopriv_infographics', 'socialcatfish_capture_ajax');


function wp_is_mobile_scf() {
	if ( empty( $_SERVER['HTTP_USER_AGENT'] ) ) {
		$is_mobile = false;
	} elseif ( strpos( $_SERVER['HTTP_USER_AGENT'], 'Mobile' ) !== false // Many mobile devices (all iPhone, iPad, etc.)
		|| strpos( $_SERVER['HTTP_USER_AGENT'], 'Android' ) !== false
		|| strpos( $_SERVER['HTTP_USER_AGENT'], 'Silk/' ) !== false
		|| strpos( $_SERVER['HTTP_USER_AGENT'], 'Kindle' ) !== false
		|| strpos( $_SERVER['HTTP_USER_AGENT'], 'BlackBerry' ) !== false
		|| strpos( $_SERVER['HTTP_USER_AGENT'], 'Opera Mini' ) !== false
		|| strpos( $_SERVER['HTTP_USER_AGENT'], 'Opera Mobi' ) !== false ) {
			$is_mobile = true;
	} else {
		$is_mobile = false;
	}

	/**
	 * Filters whether the request should be treated as coming from a mobile device or not.
	 *
	 * @since 4.9.0
	 *
	 * @param bool $is_mobile Whether the request is from a mobile device or not.
	 */
	return apply_filters( 'wp_is_mobile', $is_mobile );
}

// Function to get all H2 tags from post content
function get_post_h2_tags_with_links() {
    // Get the current post ID
    $post_id = get_the_ID();

    // Initialize an empty array to store H2 tag values with links
    $h2_tags = array();

    // Get the content of the post
    $post_content = get_post_field('post_content', $post_id);

    // Use a regular expression to find all H2 tags in the content
    preg_match_all('/<h2[^>]*>(.*?)<\/h2>/', $post_content, $matches);

    // Check if there are any matches
    if (!empty($matches[1])) {
        // Add each H2 tag value with its link to the array
        foreach ($matches[1] as $index => $h2_tag) {
            $h2_tags[] = array(
                'title' => $h2_tag,
                'link' => '#h2-' . $index // Generate an anchor link
            );
        }
    }

    // Return the array of H2 tag values with links
    return $h2_tags;
}

/* BTT disabled
function insert_html_in_header() {
    global $behavior_header_scripts;

    
    echo $behavior_header_scripts["style"];
}

function insert_html_after_body_via_wp_head() {
    global $behavior_header_scripts;

    echo $behavior_header_scripts["html"];
    echo $behavior_header_scripts["script"];
}

add_action('wp_head', 'insert_html_in_header');
add_action('wp_footer', 'insert_html_after_body_via_wp_head', 5);
*/   


/*
    Migration functions from SCF server to blog server
*/

function blog_get_optimized_image( $image, $high_res = false ) {

    if ( strpos( $image, "devstaging.socialcatfish.com" ) !== false ) return $image;

    $optimized_image = preg_replace( "/(\.[^\.]+)\$/im", ( $high_res ? "-web-op-2x.jpg" : "-web-op.jpg" ), $image );
    $uri = parse_url( $optimized_image );

    $check_url = BLOG_PATH . "wp-content/" . preg_replace( "/^.*?\/(uploads\/.*?)(?: |,|\$).*\$/im", "\\1", $optimized_image );

    if ( strpos( $image, "new.socialcatfish.com" ) !== false ) return $image;
    $img_url = str_replace( [ "socialcatfish.com/blog/wp-content", "socialcatfish.com/scamfish/wp-content" ], [ BLOG_CDN_URL, BLOG_CDN_URL ], ( file_exists( $check_url ) ? $optimized_image : $image ) );
    //$img_url = str_replace( "/uploads", "", $img_url );
    $img_url = str_replace( ["scamfishcdn.socialcatfish.com/uploads", "spcdnblog.socialcatfish.com/uploads", "scamfishcdn.socialcatfish.com/themes", "spcdnblog.socialcatfish.com/themes"], [ "socialcatfish.com/scamfish/wp-content/uploads","socialcatfish.com/scamfish/wp-content/uploads", "socialcatfish.com/scamfish/wp-content/themes", "socialcatfish.com/scamfish/wp-content/themes" ], $img_url ); //Disabled CDN

    //return str_replace( "devtemp.", "", $img_url );
    return $img_url;

}

function add_improve($email, $description) {
  
    $improvements = get_option('scf_improvements', []);

    $improvements[] = [
        'email'       => $email,
        'description' => $description,
        'date'        => current_time('mysql')
    ];

    update_option('scf_improvements', $improvements);
    
    return true;
}

function get_template_path( $section = "", $template_module_name = "" ) {

    static $accepted_sections;

    if ( empty( $accepted_sections ) ) $accepted_sections = array_fill_keys( [ "template", "common", "module" ], 1 );

    if ( ! isset( $accepted_sections[ $section ] ) ) $section = "template";

    if ( "template" == $section ) {

        if ( ! $template_module_name ) $template_module_name = $GLOBALS["user_template"];
        $path =  "main" . DIRECTORY_SEPARATOR . $template_module_name . DIRECTORY_SEPARATOR;

    } elseif ( "module" == $section ) {

        $path = $section . DIRECTORY_SEPARATOR . $template_module_name . DIRECTORY_SEPARATOR;

    } else {

        $path = $section . DIRECTORY_SEPARATOR;

    }

    return TEMPLATE_PATH  . $path;

}


function get_mailer($use_primary = true) {

    $mailer = new PHPMailer( false );
    $mailer->isSMTP();
    $mailer->SMTPAuth = true;
    $mailer->Timeout = 30;
    //$mailer->SMTPSecure = false;
    //$mailer->SMTPAutoTLS = false;
    $mailer->SMTPSecure = "tls";
    if($use_primary){
        $mailer->Host = MAIL_HOST;
        $mailer->Port = MAIL_PORT;
        $mailer->Username = MAIL_USERNAME;
        $mailer->Password = MAIL_PASSWORD;
        $mailer->setFrom( MAIL_FROM_ADDRESS, "SocialCatfish" );
    } else{
        $mailer->Host = SECONDARY_MAIL_HOST;
        $mailer->Port = SECONDARY_MAIL_PORT;
        $mailer->Username = SECONDARY_MAIL_USERNAME;
        $mailer->Password = SECONDARY_MAIL_PASSWORD;
        $mailer->setFrom( MAIL_FROM_ADDRESS, "SocialCatfish" );
    }
   
    return $mailer;

}


function get_custom_countries() {
    $countries = [];

    $file = get_theme_file_path('/data/countries.txt');
    if (file_exists($file)) {
        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $parts = explode("\t", trim($line));
            if (count($parts) === 2) {
                $countries[$parts[0]] = $parts[1];
            }
        }
    }

    return $countries;
}

function get_custom_states() {
    $states = [];

    $file = get_theme_file_path('/data/states.txt');
    if (file_exists($file)) {
        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $parts = explode("\t", trim($line));
            if (count($parts) === 2) {
                $states[$parts[0]] = $parts[1];
            }
        }
    }

    return $states;
}

function get_custom_ages() {
    $ages = [];

    for ($i = 18; $i <= 99; $i++) {
        $ages[$i] = (string)$i;
    }

    return $ages;
}

function get_custom_age_ranges() {
    return [
        ''         => 'Search All',
        '18 - 25'  => '18 - 25',
        '26 - 35'  => '26 - 35',
        '36 - 45'  => '36 - 45',
        '46 +'     => '46 +'
    ];
}


function setup_global_data() {

    global $user_id, $module, $user_data, $exclude_header_footer_content, $show_compact_footer,
           $get_nr_feedback, $action, $pre_page_loading, $fancybox, $slick, $landing_page_js,
           $timezone, $current_time_ca, $behavior_trk_heatmap_element, $mobile_app, $ca_page,
           $popular_data, $header_version, $active_plans, $section, $current_search_type,
           $list_of_countries, $name_cross_sell_popup, $username_cross_sell_popup,
           $email_cross_sell_popup, $phone_cross_sell_popup, $address_cross_sell_popup,
           $criminal_cross_sell_popup, $image_cross_sell_popup, $combo_active, $use_minified_assets,
           $fullUrl, $list_of_states, $post_data, $current_template_assets_url, $common_assets_url, $ris_active_plans_only;

    // Initialize variables
    $user_id = false;
    $module = '';
    $user_data = [
        'email' => '',
        'active_plans' => [],
    ];
    $exclude_header_footer_content = false;
    $show_compact_footer = false;
    $get_nr_feedback = false;
    $action = '';
    $pre_page_loading = false;
    $fancybox = false;
    $slick = false;
    $landing_page_js = false;
    $behavior_trk_heatmap_element = false; // BTT disabled
    $mobile_app = false;
    $ca_page = false;
    $popular_data = [];
    $header_version = 'compact';
    $active_plans = [];
    $section = '';
    $current_search_type = 2;
    $fullUrl = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $ris_active_plans_only = false;

    $post_data = get_accepted_post_fields();
    $list_of_countries = get_custom_countries();
    $list_of_states = get_custom_states();

    // Cross-sell popup flags
    $name_cross_sell_popup = 0;
    $username_cross_sell_popup = 0;
    $email_cross_sell_popup = 0;
    $phone_cross_sell_popup = 0;
    $address_cross_sell_popup = 0;
    $criminal_cross_sell_popup = 0;
    $image_cross_sell_popup = 0;
    $combo_active = 1;

    // Timezone setup
    $timezone = new DateTimeZone('America/Los_Angeles');
    $current_time_ca = new DateTime('now', $timezone);

    $use_minified_assets = defined("MINIFIED_JS") && MINIFIED_JS;

    $current_template_assets_url = get_asset_url();
    $common_assets_url = get_asset_url();
}
add_action('after_setup_theme', 'setup_global_data');


function js_controller( $controller, $return = false ) {

    if ( $return ) return sprintf( ' data-%s="%s"', JS_MAIN_CONTROLLER, $controller );
    else printf( ' data-%s="%s"', JS_MAIN_CONTROLLER, $controller );

}

function js_element_var( $controller, $return = false ) {

            if ( $return ) return sprintf( ' data-%s="%s"', JS_ELEMENT_VAR, $controller );
            else printf( ' data-%s="%s"', JS_ELEMENT_VAR, $controller );

        }

function html_field_select( $name, $data, $default = "", $sort = false, $class = "", $id = "", $add_empty_option = false, $data_attributes = [], $required = false, $multiple = false) {

            if ( $sort ) asort( $data );

            if ( $add_empty_option ) $data = ["" => ""] + $data;

            echo "<select name=\"{$name}\" " . ( ! empty( $class ) ? " class=\"{$class}\"" : "" ) . ( ! empty( $id ) ? " id=\"{$id}\"" : "" ) .(  empty( $multiple ) ? "" : "multiple" ) . ( ! empty( $data_attributes ) ? " " . html_generate_data_attributes( $data_attributes ) : "" ) . ( $required ? " required" : "" ) . ">";
            foreach ( $data as $value => $key ) {

                if ( $value === "@@@" ) echo "<option selected disabled hidden" . ( $default == $value ? " selected=\"selected\"" : "" ) . ">{$key}</option>";
                else echo "<option value=\"" . htmlspecialchars( $value ) . "\"" . ( ( ! is_null( $default ) && $default == $value ) ? " selected=\"selected\"" : "" ) . ">{$key}</option>";

            }
            echo "</select>";

}

function html_field_text( $name, $value = "" ,$maxlength = 50, $class = "", $id = "", $placeholder = "", $required = false, $data_attributes = [], $onkeypress = "" ) {

    html_field_input( [ "type" => "text",  "name" => $name, "value" => $value, "maxlength" => $maxlength, "class" => $class, "id" => $id, "placeholder" => $placeholder, "required" => $required, "data_attributes" => $data_attributes, "onkeypress" => $onkeypress] );

}

function html_field_input( $settings ) {

    extract( $settings );
    echo "<input" .
        ( ! empty( $type ) ? " type=\"{$type}\"" : "" ) .
        ( ! empty( $name ) ? " name=\"{$name}\"" : "" ) .
        ( ! empty( $class ) ? " class=\"{$class}\"" : "" ) .
        ( ! empty( $id ) ? " id=\"{$id}\"" : "" ) .
        ( ! empty( $value ) ? " value=\"" . htmlspecialchars( $value ) . "\"" : "" ) .
        ( ! empty( $maxlength ) ? " maxlength=\"{$maxlength}\"" : "" ) .
        ( ! empty( $placeholder ) ? " placeholder=\"{$placeholder}\"" : "" ) .
        ( ! empty( $checked ) ? " checked=\"checked\"" : "" ) .
        ( ! empty( $required ) ? " required" : "" ) .
        ( ! empty( $onkeypress ) ? " onkeypress=\"{$onkeypress}\"" : "" ) .
        ( ! empty( $data_attributes ) ? html_generate_data_attributes( $data_attributes ) : "" ) .
    " />";

}

        function html_generate_data_attributes( $data ) {

            $return = [];

            if ( ! empty( $data ) && is_array( $data ) ) {

                foreach ( $data as $key => $value ) {

                    $return[] = sprintf( 'data-%s = "%s"', $key, htmlentities( $value ) );

                }

            }

            return " " . implode( " ", $return );
        
        }

        

function request_get( $name, $default = "" ) {
    return get_request_value( $name, $default, "GET" );
}

function request_post( $name, $default = "" ) {
    return get_request_value( $name, $default, "POST" );
}

function request( $name, $default = "" ) {
    $post = request_post( $name, null );
    $get = request_get( $name, null );

    if ( null !== $post ) return $post;
    elseif ( null !== $get ) return $get;
    else return $default;
}

function get_request_value( $name, $default = "", $type = "GET" ) {
    $array = isset( $GLOBALS["_{$type}"] ) ? $GLOBALS["_{$type}"] : array();
    $value = ( ! empty( $array[ $name ] ) ) ? $array[ $name ] : $default;
    return is_array( $value ) ? $value : ( is_null( $value ) ? null : trim( $value ) );
}

function get_accepted_post_fields() {

    $post_data = [];

    $accepted_post_fields = [
        "fullname", "firstname", "lastname", "email", "email_confirm", "password", "password_confirm", "card_name", "card_number", "card_cvv", "card_expiry_month", "card_expiry_year",
        "billing_firstname", "billing_lastname", "billing_address1", "billing_address2", "billing_country", "billing_city", "billing_state", "billing_postal_code", "billing_phone",
        "first_name", "last_name", "display_name", "address_1", "address_2", "city", "state", "postal_code", "country", "mobile_number", "sc_billing_phone", "phone_number", "website", "about",
        "new_email", "new_email_confirm", "profile_email", "profile_email_confirm", "current_password", "new_password_1", "new_password_2", "update", "pending", "user", "key", "g-recaptcha-response", "name", "phone",
        "subject", "issue", "message", "tos_agree", "person_name", "person_email", "person_phone", "person_social_links", "person_occupation", "person_education", "person_address", "person_money", "person_suspicion",
        "person_met", "find", "method", "query", "source", "campaign", "from_date", "to_date", "stripeToken", "url", "status", "report_agreement", "query_data", "close_image_warning", "coupon", "last_id", "investigator_user_id",
        "images", "info_needed", "value", "notes", "reason","investigator_notes", "special_notes", "file", "age", "have_met", "user_names", "how_long_communicating", "form_of_communication", "still_contact", "find_identity",
        "gp_token", "user_level", "membership_plan", "coupon_code", "coupon_type", "fixed_amount", "percentage", "opt_check", "payment_id", "signup_purpose", "from", "to" , 'payment_card', "amount", "hear_about_us", "hear_about_us_data", "bt_token",
        "cancel_purpose", "other_purpose", "plan_id", "user_manager", "ctoken", "ctoken_card_cvv", "user_notes", "emails", "phones", "ap_token", "addon_id", "pg_type", "datauser" ,"unclamed_search_from", "unsubscribe_option", "show_phone_number", "card_token", "location", "ccpa_emails", "ccpa_phones", "ccpa_state", "ccpa_url", "ccpa_middle_name", "ccpa_age",
        "how_money_sent", "video_chatted", "n_image_notes", "n_indentity_notes", "n_monetary_notes", "image_links", "phash" ,"ccpa_description" ,"ccpa_file" ,"user_id" ,"rating" ,"feedback" ,"count" ,"device_type" ,"limit" ,"description","username", "tags","profile_links" ,"sort_by_website", "active", "flag_command", "item_id" ,
        "bulk_search_batch","approved_user","q1_help","reason_id","q2_link","called","chatted","emailed", "event_type" , "csrf_token", "g-recaptcha-v3" , "batch" , "image_type","hidden_firstname","hidden_lastname","hidden_email","cf-turnstile-response"
    ];

    foreach ( $accepted_post_fields as $field ) $post_data[ $field ] = request_post( $field );

    return $post_data;
}

function get_blog_posts_by_view_count( $start, $limit ) {
    global $wpdb;

    $sql = $wpdb->prepare("
        SELECT d.*, p.guid
        FROM (
            SELECT p.ID, p.post_title, p.post_date, p.post_name, p.post_content, d.views
            FROM (
                SELECT m.post_id, CAST(m.meta_value AS UNSIGNED) AS views
                FROM {$wpdb->postmeta} m
                WHERE m.meta_key = 'wpb_post_views_count'
                GROUP BY m.post_id
                ORDER BY views DESC
            ) d
            INNER JOIN {$wpdb->posts} p ON p.ID = d.post_id
            WHERE p.post_status = 'publish' AND (p.post_type = 'post' OR p.post_type = 'page')
            LIMIT %d, %d
        ) d
        INNER JOIN {$wpdb->posts} p ON d.ID = p.post_parent AND p.post_type = 'attachment'
        WHERE SUBSTRING(p.guid, -3) IN ('png', 'jpg', 'peg')
        GROUP BY d.ID
    ", $start, $limit);

    $results = $wpdb->get_results( $sql, ARRAY_A );

    foreach ( $results as $index => $post ) {
        $post_content = explode( "<!--more-->", $post["post_content"] );
        $post_content = preg_replace( "/\[.*?\]/", "", strip_tags( array_shift( $post_content ) ) );
        if ( strlen( $post_content ) > 150 ) {
            $post_content = substr( $post_content, 0, 150 ) . " ...";
        }
        $results[ $index ]["post_content"] = $post_content;
        $results[ $index ]["comment_count"] = 0;
    }

    return $results;
}

function scf_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'scf_theme_setup' );

add_filter( 'show_admin_bar', '__return_false' );


function custom_admin_post_list_css() {
    echo '<style>
        body.post-type-post .wp-list-table th {
            white-space: nowrap !important; 
            vertical-align: middle !important; 
        }
        body.post-type-post .wp-list-table td {
            vertical-align: middle;
    		white-space: pre;
        }
    </style>';
}
add_action('admin_head', 'custom_admin_post_list_css');

// posthog implementation
$posthog_class_file = get_template_directory() . '/inc/Posthog_Scf.php';

if ( file_exists( $posthog_class_file ) ) {
    require_once $posthog_class_file;
}