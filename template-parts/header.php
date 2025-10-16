<!DOCTYPE html>
<html <?php language_attributes();?>>
    <head>
        <meta charset="<?php bloginfo('charset');?>">
        <meta name="viewport" content="width=device-width">
        <link rel="pingback" href="<?php bloginfo('pingback_url');?>">
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo blog_get_optimized_image( $common_assets_url . "images/icons/apple-icon-57x57.png" ); ?>">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo blog_get_optimized_image( $common_assets_url . "images/icons/apple-icon-60x60.png" ); ?>">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo blog_get_optimized_image( $common_assets_url . "images/icons/apple-icon-72x72.png" ); ?>">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo blog_get_optimized_image( $common_assets_url . "images/icons/apple-icon-76x76.png" ); ?>">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo blog_get_optimized_image( $common_assets_url . "images/icons/apple-icon-114x114.png" ); ?>">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo blog_get_optimized_image( $common_assets_url . "images/icons/apple-icon-120x120.png" ); ?>">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo blog_get_optimized_image( $common_assets_url . "images/icons/apple-icon-144x144.png" ); ?>">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo blog_get_optimized_image( $common_assets_url . "images/icons/apple-icon-152x152.png" ); ?>">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo blog_get_optimized_image( $common_assets_url . "images/icons/apple-icon-180x180.png" ); ?>">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo blog_get_optimized_image( $common_assets_url . "images/icons/android-icon-192x192.png" ); ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo blog_get_optimized_image( $common_assets_url . "images/icons/favicon-32x32.png" ); ?>">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo blog_get_optimized_image( $common_assets_url . "images/icons/favicon-96x96.png" ); ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo blog_get_optimized_image( $common_assets_url . "images/icons/favicon-16x16.png" ); ?>">
        <link rel="manifest" href="<?php echo blog_get_optimized_image( $common_assets_url . "images/icons/manifest.json" ); ?>">
        <?php 
            /* BTT disabled

            global $behavior_header_scripts,
            $behavior_tracking_activated,
            $is_behavior_heatmap_preview_activated;
            
            echo $behavior_header_scripts["styles"];

            */    
            $use_minified_assets = defined("MINIFIED_JS") && MINIFIED_JS;
        ?>
        <script>
            var path = {
                base_url: '<?php echo BASE_URL ?>',
                template_url: '<?php echo $GLOBALS["current_template_assets_url"] ?>',
                relative_url: '<?php echo RELATIVE_URL ?>',
                current: '<?php echo home_url(add_query_arg(array(), $wp->request)); ?>',
                cdn_url: '<?php echo BASE_URL.'assets' ?>/'
	            // cdn_url: '<?php //echo defined("CDN_URL") ? CDN_URL : ASSETS_URL ?>/'
            };
            var usign = <?php echo (!empty($GLOBALS["user_id"])) ? 1 : 0; ?>;
            var switched_reg = <?php echo ( ! empty( $swtched_account_regular ) ) ? 1 : 0; ?>;
            var switched_ris = <?php echo ( ! empty( $swtched_account_ris ) ) ? 1 : 0; ?>;

            var module_js = "<?php echo $module; ?>";
            var ris_login = <?php echo json_encode(!empty($_GET["sid"]) && ($module == "ris_login" || $module == "image") ? 1 : 0); ?>;

            //BTT disabled
            //var _bta = <?php //echo $behavior_tracking_activated ? "true" : "false"; ?>;
            //var _ahpa = <?php // echo $is_behavior_heatmap_preview_activated ? "true" : "false"; ?>;

            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-39121190-1', 'auto');
            ga('send', 'pageview');

            (function(b,c,d){scf={merge:function(a){scf=Object.assign({},scf,a)}}})("undefined","function","object");

            var gre_load = function() {

                var
                    gb = document.getElementsByClassName("grecaptcha-badge"),
                    gbl = document.getElementById('grecaptcha-box');

                if ( gb.length && ( typeof gbl === "object"  )) {

                    gb = gb[0];
                    gb.style.position = 'inherit';
                    gbl.appendChild( gb );

                }

            };

        </script>

        <?php if (WP_DEBUG) { ?>
            <script>
                !function(t,e){var o,n,p,r;e.__SV||(window.posthog=e,e._i=[],e.init=function(i,s,a){function g(t,e){var o=e.split(".");2==o.length&&(t=t[o[0]],e=o[1]),t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}}(p=t.createElement("script")).type="text/javascript",p.crossOrigin="anonymous",p.async=!0,p.src=s.api_host.replace(".i.posthog.com","-assets.i.posthog.com")+"/static/array.js",(r=t.getElementsByTagName("script")[0]).parentNode.insertBefore(p,r);var u=e;for(void 0!==a?u=e[a]=[]:a="posthog",u.people=u.people||[],u.toString=function(t){var e="posthog";return"posthog"!==a&&(e+="."+a),t||(e+=" (stub)"),e},u.people.toString=function(){return u.toString(1)+".people (stub)"},o="init capture register register_once register_for_session unregister unregister_for_session getFeatureFlag getFeatureFlagPayload isFeatureEnabled reloadFeatureFlags updateEarlyAccessFeatureEnrollment getEarlyAccessFeatures on onFeatureFlags onSurveysLoaded onSessionId getSurveys getActiveMatchingSurveys renderSurvey canRenderSurvey canRenderSurveyAsync identify setPersonProperties group resetGroups setPersonPropertiesForFlags resetPersonPropertiesForFlags setGroupPropertiesForFlags resetGroupPropertiesForFlags reset get_distinct_id getGroups get_session_id get_session_replay_url alias set_config startSessionRecording stopSessionRecording sessionRecordingStarted captureException loadToolbar get_property getSessionProperty createPersonProfile opt_in_capturing opt_out_capturing has_opted_in_capturing has_opted_out_capturing clear_opt_in_out_capturing debug getPageViewId captureTraceFeedback captureTraceMetric".split(" "),n=0;n<o.length;n++)g(u,o[n]);e._i.push([i,s,a])},e.__SV=1)}(document,window.posthog||[]);
                posthog.init('phc_aePSGz9wxBWODb8aBD7JQl1k4uNvY3nsPmanWGSvarB', {
                    api_host: 'https://us.i.posthog.com',
                    person_profiles: 'identified_only', // or 'always' to create profiles for anonymous users as well
                })
            </script>
            <?php } else { ?>
            <script>
                !function(t,e){var o,n,p,r;e.__SV||(window.posthog=e,e._i=[],e.init=function(i,s,a){function g(t,e){var o=e.split(".");2==o.length&&(t=t[o[0]],e=o[1]),t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}}(p=t.createElement("script")).type="text/javascript",p.crossOrigin="anonymous",p.async=!0,p.src=s.api_host.replace(".i.posthog.com","-assets.i.posthog.com")+"/static/array.js",(r=t.getElementsByTagName("script")[0]).parentNode.insertBefore(p,r);var u=e;for(void 0!==a?u=e[a]=[]:a="posthog",u.people=u.people||[],u.toString=function(t){var e="posthog";return"posthog"!==a&&(e+="."+a),t||(e+=" (stub)"),e},u.people.toString=function(){return u.toString(1)+".people (stub)"},o="init capture register register_once register_for_session unregister unregister_for_session getFeatureFlag getFeatureFlagPayload isFeatureEnabled reloadFeatureFlags updateEarlyAccessFeatureEnrollment getEarlyAccessFeatures on onFeatureFlags onSessionId getSurveys getActiveMatchingSurveys renderSurvey canRenderSurvey identify setPersonProperties group resetGroups setPersonPropertiesForFlags resetPersonPropertiesForFlags setGroupPropertiesForFlags resetGroupPropertiesForFlags reset get_distinct_id getGroups get_session_id get_session_replay_url alias set_config startSessionRecording stopSessionRecording sessionRecordingStarted captureException loadToolbar get_property getSessionProperty createPersonProfile opt_in_capturing opt_out_capturing has_opted_in_capturing has_opted_out_capturing clear_opt_in_out_capturing debug getPageViewId captureTraceFeedback captureTraceMetric".split(" "),n=0;n<o.length;n++)g(u,o[n]);e._i.push([i,s,a])},e.__SV=1)}(document,window.posthog||[]);
                posthog.init('phc_xU62FgO0ePB2C32HT1vXJqsSRBbFjV5vJf5N2UoJLXd', {
                    api_host: 'https://us.i.posthog.com',
                    url_ignorelist: ['socialcatfish.com/directory/.*'],
                    custom_blocked_useragents: [
                    'msnbot',
                    'Yandex',
                    'MJ12Bot',
                    'PetalBot',
                    'AspiegelBot',
                    'DotBot',
                    'MauiBot',
                    'CCBot',
                    'Neevabot',
                    'Yeti'
                    ],
                    autocapture: {
                    url_ignorelist: [
                        '/sitemaps/.*',
                        '/directory/.*'
                    ]
                    },
                    person_profiles: 'identified_only'
                })
            </script>
        <?php } ?>
        
        <?php wp_head(); ?>
        
        <link href="<?php echo $common_assets_url ?>css/brevo<?php echo $use_minified_assets ? "" : "" ?>.css?<?php echo TIMESTAMP_FOR_JS_CSS; ?>" rel="stylesheet">
        <link rel="preload" href="<?php echo $common_assets_url ?>css/brevo<?php echo $use_minified_assets ? "" : "" ?>.css?<?php echo TIMESTAMP_FOR_JS_CSS; ?>" as="style">
        
        <!-- <script type="text/javascript" src="//script.crazyegg.com/pages/scripts/0073/1453.js" async="async"></script> -->
        <script src="https://www.google.com/recaptcha/api.js?onload=gre_load&render=6LftTMMeAAAAAHodlggyeFfE5vOJRAvyArRZqkZv" defer="defer"></script>

        <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5PYaVEERjQLmgPtSjfKLUeNp2_nyDTg4&libraries=places"></script> -->
        <?php if( get_the_ID() == "3726" ){ ?>
            <script type="application/ld+json">
                {
                "@context": "https://schema.org",
                "@type": "SoftwareApplication",
                "name": "Socialcatfish",
                "operatingSystem": "ANDROID",
                "applicationCategory": "Social Catfish Reviews",
                "aggregateRating": {
                    "@type": "AggregateRating",
                    "ratingValue": "5",
                    "ratingCount": "8864"
                },
                "author": {
                    "@type": "Person",
                    "name": "Jen D"
                },
                "datePublished": "2019-11-02",
                "offers": {
                    "@type": "Offer",
                    "price": "1.00",
                    "priceCurrency": "USD"
                }
                }
            </script>
        <?php } ?>
    </head>

    <body <?php body_class( $class = 'scf_2020_style' ); ?>>
        <?php
            global $include_popup;
            
            $include_popup[] = 'select_state';
            $include_popup[] = 'select_city';
            $include_popup[] = 'select_age';
            $include_popup[] = 'searching_popup2';
            $include_popup[] = 'ras_proccess'; // only for logged-out users
            $include_popup[] = 'address_search_progress';
            $include_popup[] = 'refine_address_search';
            $include_popup[] = 'autocomplete_suggestion';
            $include_popup[] = 'no_address_suggestions';
            
            $include_popup[] = 'action_required_social';
            
            $include_popup[] = 'action_required_ris';
            $include_popup[] = 'multiple_faces_detected';
            $include_popup[] = 'improve_image_search';
            //$include_popup[] = 'blog_sign_up_exit';

            if ( ! empty( $include_popup ) && is_array( $include_popup ) ) {

                foreach ( $include_popup as $_include_popup ) {

                    //if( "refine_address_search" == $_include_popup ) continue;
        
                    $_include_popup = get_template_directory() . "/template-parts/popups/{$_include_popup}.php";
        
                    if ( file_exists( $_include_popup ) ) {
        
                        include_once( $_include_popup );
        
                    }
        
                }

                unset( $_include_popup );     
                     

            }
        ?>
        <div id="header_2020" class="compact_v2 scf_2020_style no_compact <?php if($posthog_ab_test_search_widget == "hidden") echo "ab_test"; ?>">
            <div class="container pos-relative">
                <div class="row">
                    <div class="<?php echo empty( $hide_main_search ) ? 'col-md-2': 'col-md-8'; ?> col-sm-6 mb-text-center">
                        <a href="<?php echo RELATIVE_URL; ?>" class="blog-logo logo"><img src="<?php echo get_template_directory_uri() . '/assets/img/logo-white.png'; ?>" alt="Socialcatfish.com: People Search" decoding="async" loading="lazy" /></a>
                    </div>
                    <div class="col-md-6 col-sm-6 search_compact_2020">
                        <?php 
							 $GLOBALS['header_version'] = "compact";
                             require get_template_directory() . '/template-parts/search.php'; 
                        ?>
                    </div>
                    <div class="col-md-4 col-sm-6 pos-initial main-menu" <?php js_controller("menu.main") ?>>
                        <?php 
                            require_once get_template_directory() . '/template-parts/menu.php'; 
                        ?>
                    </div>
                </div>
            </div>
            <?php if ( $user_id && "dashboard" == $module ) { ?>
                <span class="si-hamburger dashboard-menu-new" <?php js_controller("menu.dashboard") ?>></span>
            <?php  } ?>
        </div>
        <div class="scfb_floating_header">
            <div class="scfb-search-compact">
                <p>Start people search here...</p>
                <span class="si-search"></span>
            </div>
            <?php
                if($posthog_ab_test_search_widget == 'hidden')
                    echo '<div class="search_mb_2020 search_hide_lg scfb_mb_search hidden">';
                else 
                    echo '<div class="search_mb_2020 search_hide_lg scfb_mb_search">';
                
                    require get_template_directory() . '/template-parts/search.php'; 
                        
                echo '</div>';
            ?>
        </div>