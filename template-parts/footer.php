<script type="text/javascript">
(function() {
    window.sib = {
        equeue: [],
        client_key: "o3zfgvlhhfq9v2523l4lsbkw"
    };
    /* OPTIONAL: email for identify request*/
    // window.sib.email_id = 'example@domain.com';
    window.sendinblue = {};
    for (var j = ['track', 'identify', 'trackLink', 'page'], i = 0; i < j.length; i++) {
    (function(k) {
        window.sendinblue[k] = function() {
            var arg = Array.prototype.slice.call(arguments);
            (window.sib[k] || function() {
                    var t = {};
                    t[k] = arg;
                    window.sib.equeue.push(t);
                })(arg[0], arg[1], arg[2], arg[3]);
            };
        })(j[i]);
    }
    var n = document.createElement("script"),
        i = document.getElementsByTagName("script")[0];
    n.type = "text/javascript", n.id = "sendinblue-js", n.async = !0, n.src = "https://sibautomation.com/sa.js?key=" + window.sib.client_key, i.parentNode.insertBefore(n, i), window.sendinblue.page();
})();
</script>
    <?php if (!$exclude_header_footer_content) { ?>
        <div id="new_footer_tmp" class="scf_2020_style">
            <?php if( ! $show_compact_footer ) { ?>
            <div id="footer-links">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 pad-right">
                            <h2>About</h2>
                            <p>Social Catfish is an online dating investigation service based in California, USA. We verify information to confirm if the person that you've met online is really who they say they are. We do in depth checks using our own proprietary online tools to verify things like images, social profiles, phone numbers, emails, jobs and a lot more to make sure that you have the most information about the person that you've met online.</p>
                            <div class="row" style="display:inline-block;">
                                <div  style="padding-left: 15px;display:flex;">
                                    <span id="grecaptcha-box"></span>
                                    <span style="padding-left: 30px;"><img width="60" height="60" style="background-color: #2ac984;border-radius: 50%!important;" id="userway-custom-icon" aria-hidden="true" alt="Open the Accessibility Menu" src="https://cdn.userway.org/widgetapp/images/wheel_left_wh.svg"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <h2>Company</h2>
                            <ul>
                                <li><a href="<?php echo RELATIVE_URL ?>" title="Home">Home</a></li>
                                <li><a href="<?php echo RELATIVE_URL ?>about-us/" title="About Us">About Us</a></li>
                                <li><a href="<?php echo RELATIVE_URL ?>faq/" title="FAQ">FAQ</a></li>
                                <li><a href="<?php echo RELATIVE_URL ?>contact/" title="Contact Us">Contact Us</a></li>
                                <li><a href="<?php echo RELATIVE_URL ?>about-us/press/" title="Press">Press</a></li>
                                <li><a href="<?php echo RELATIVE_URL ?>walkthrough" title="How-To Videos">How-To Videos</a></li>
                                <li><a href="<?php echo RELATIVE_URL ?>careers/" title="Careers">Careers</a></li>
                                <li><a href="<?php echo RELATIVE_URL ?>scamfish/social-catfish-affiliate-program/" title="Social Catfish Affiliate Program">Social Catfish Affiliate Program</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <h2>Legal</h2>
                            <ul>
                                <li><a class="tos" href="<?php echo RELATIVE_URL ?>faq/terms-of-service/">Terms of Service</a></li>
                                <li><a href="<?php echo RELATIVE_URL ?>faq/privacy/" title="Privacy Policy">Privacy Policy</a></li>
                                <li>Do Not Sell My Personal Information:</li>
                                <li><a href="<?php echo PAGE_URL_OPTOUT ?>?id=request_optout" title="CPRA and NV Privacy Requests">CPRA Privacy Requests<br> (CA Residents) <img id="cpra-icon" alt="CRPA Icon" src="<?php echo get_template_directory_uri() . '/assets/img/privacyoptions.svg'; ?>"  decoding="async" loading="lazy" /></a></li>
                                <li><a href="<?php echo PAGE_URL_OPTOUT ?>?id=request_optout" title="Do Not Sell My Personal Information">All Privacy Requests <br> (OR,CO,NV,ETC) <img id="cpra-icon" alt="CRPA Icon" src="<?php echo get_template_directory_uri() . '/assets/img/privacyoptions.svg'; ?>"  decoding="async" loading="lazy" /></a></li>
                                <li><a href="<?php echo PAGE_URL_OPTOUT ?>?id=law_enforcement_optout" title="Law enforcement">Opt-out Requests <br>(Law enforcement)</a></li>
                            </ul>
                        </div>
                        <div class="col-md-2">
                            <h2>Contact Us</h2>
                            <p>Address:<br />SocialCatfish, LLC<br />39252 Winchester Rd. STE 107 #228<br />Murrieta, CA 92563</p>
                            <p class="footer-tell">Telephone:<br /> <a href="tel:8444228347">(844) 422-8347</a></p>
                            <p>General Inquiries: <a <?php js_controller("mailto"); ?> data-to="welcome" href="javascript:void(0)">welcome@socialcatfish.com</a></p>
                        </div>
                    </div>
                    
                    <div class="row bpl-row">
                        <?php if( $module == 'business_landing'){ ?>
                            <div class="col-md-5 bpl-foo">
                                <img alt="Social catfish Logo" src="<?php echo get_template_directory_uri() . '/assets/images/logo-white.png'; ?>" class="footer_logo" decoding="async" loading="lazy" />
                                <a href="https://www.bbb.org/us/ca/murrieta/profile/background-checks/social-catfish-1126-850024602" target="_blank" class="bbb-link">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/images/business-plans/bbb-badge.svg'; ?>" alt="BBB badge">
                                </a>
                            </div>
                            <div class="col-md-5">
                            <!-- <p class="subscribe_text">For latest news and catfish stories, subscribe to our newsletter!</p> -->
                            <!-- <div>
                                <form class="email-subscribe" action="<?php // echo SENDY_INSTALATION_URL; ?>subscribe" method="POST">
                                    <input type="hidden" name="list" value="<?php // echo SENDY_LIST_BLOG ?>">
                                    <input type="text" placeholder="Enter Your Email..." id="scf_email_subscribe" aria-label="Enter Your Email" name="email" aria-required="true" required />
                                    <a <?php js_controller("email_subscribe") ?> id="subscribe" class="subscribe">Subscribe</a>
                                    <input type="hidden" name="subform" value="yes" />
                                </form>
                            </div> -->   
                            </div>
                        <?php } else { ?>
                            <div class="col-md-5">
                            <!-- <p class="subscribe_text">For latest news and catfish stories, subscribe to our newsletter!</p> -->
                            <!-- <div>
                                <form class="email-subscribe" action="<?php // echo SENDY_INSTALATION_URL; ?>subscribe" method="POST">
                                    <input type="hidden" name="list" value="<?php // echo SENDY_LIST_BLOG ?>">
                                    <input type="text" placeholder="Enter Your Email..." id="scf_email_subscribe" aria-label="Enter Your Email" name="email" aria-required="true" required />
                                    <a <?php js_controller("email_subscribe") ?> id="subscribe" class="subscribe">Subscribe</a>
                                    <input type="hidden" name="subform" value="yes" />
                                </form>
                            </div> -->   
                            
                        </div>
                            <div class="col-md-5">
                                <img alt="Social catfish Logo" src="<?php echo get_template_directory_uri() . '/assets/images/logo-white.png'; ?>" class="footer_logo" decoding="async" loading="lazy" />
                            </div>
                        <?php } ?>
                        <div class="col-md-2">
                            <img alt="Accepted Credit Cards" class="card-types" src="<?php echo get_template_directory_uri() . '/assets/images/all-cards.svg'; ?>" height="31" decoding="async" loading="lazy" />
                        </div>
                    </div>

                    <?php if( $module != "optout" ){?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="signup-form-wrapper">
                                <?php include_once( get_template_directory() . '/template-parts/brevo/footer-signup.php' ); ?>
                            </div>
                        </div>
                    </div>
                    <?php  } ?>
                </div>
            </div>
            <div id="footer-disclaimer">
                <div class="container">Disclaimer: You may not use SocialCatfish.com or the information we provide to make decisions about consumer credit, employment, insurance, tenant screening, or any other purpose that would require FCRA compliance. SocialCatfish.com does not provide consumer credit reports and is not a consumer credit reporting agency. (These terms have special meanings under the Fair Credit Reporting Act, 15 USC 1681 et seq., ("FCRA"), which are incorporated herein by reference.) While we do pride ourselves on our thoroughness, the information available on our website or that we provide at times may not be 100% accurate, complete, or up to date, so do not use it as a substitute for your own due diligence, especially if you have concerns about a person's criminal history. SocialCatfish.com does not make any representation or warranty about the character or the integrity of the person, business, or entity about which you inquire, or the information available through our website or that you receive from us or any or our representatives.</div>
            </div> <?php } ?>
            <div id="footer">
                <div class="container">
                    <div class="row">                        
                        <div class="col-md-12 copyright">&copy; <?php echo date("Y"); ?> by Socialcatfish.com. All Rights Reserved. <?php if (empty($compact_footer)) { ?> <span class="spacer">|</span> <a class="tos" href="<?php echo RELATIVE_URL ?>faq/terms-of-service/">Terms of Use</a> <span class="spacer">|</span> <a href="<?php echo RELATIVE_URL ?>faq/privacy/" class="privacy">Privacy Policy</a> <span class="spacer">|</span> <a href="<?php echo RELATIVE_URL ?>directory/" class="privacy">Directory</a> <span class="spacer">|</span> <a href="<?php echo RELATIVE_URL ?>faq/privacy/#ca-nv-privacy" class="privacy">CA and NV Residents Privacy Policy</a><?php } ?></div>
                        <?php if( ! $show_compact_footer ) { ?>
                        <div class="col-md-12 social-links">
                            <?php 
								require_once get_template_directory() . '/template-parts/social.php';
                            ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        
    <?php } ?>
    <?php
        $hasCampaigner = false;
        foreach ($_GET as $key => $value) {
            if ($value === 'campaigner') {
                $hasCampaigner = true;
                break;
            }
        }
    ?>

    <?php
    if ($user_id) {
    ?>
        <input type="hidden" class="name_cross_sell_popup" value="<?php echo $name_cross_sell_popup; ?>" />
        <input type="hidden" class="username_cross_sell_popup" value="<?php echo $username_cross_sell_popup; ?>" />
        <input type="hidden" class="email_cross_sell_popup" value="<?php echo $email_cross_sell_popup; ?>" />
        <input type="hidden" class="phone_cross_sell_popup" value="<?php echo $phone_cross_sell_popup; ?>" />
        <input type="hidden" class="address_cross_sell_popup" value="<?php echo $address_cross_sell_popup; ?>" />
        <input type="hidden" class="criminal_cross_sell_popup" value="<?php echo $criminal_cross_sell_popup; ?>" />
        <input type="hidden" class="image_cross_sell_popup" value="<?php echo $image_cross_sell_popup; ?>" />
        <input type="hidden" class="combo_user" value="<?php echo $combo_active; ?>" />
    <?php } ?>
    <?php if( $user_id && ! $get_nr_feedback && $action == "show_feedback" ) { ?>
        <div class="scf_nr_feedback">
            <span class="si-close-circle" <?php js_controller("feedback.no_result_close"); ?>></span>
            <h4>How do you like the new Deep Search feature?</h4>
            <div class="rate_now">
                <span class="btn si-like like" <?php js_controller("feedback.no_result_choose"); ?> data-id="1"></span>
                <span class="btn si-like diss_like" <?php js_controller("feedback.no_result_choose"); ?> data-id="0"></span>
            </div>
            <p class="hide_cnt">Do you have any suggestion to improve?</p>
            <textarea class="scf-form hide_cnt" placeholder="Enter feedback here.." rows="3"></textarea>
            <button class="btn btn-purple hide_cnt" data-id="" <?php js_controller("feedback.no_result_submit"); ?>>Submit Feedback</button>
            <button class="btn btn-default">Submit Feedback</button>
            <span class="btn success-msg hide_cnt"><span class="si-done"></span>Feedback Submitted</span>
        </div>
    <?php } ?>
    <?php if ($user_id && ($pre_page_loading || !empty($search_data["ras_records"]) || ("criminal_report" == $module && !empty($id)))) { ?>
        </div>
        
        
        
        
        
        <!-- end scf-body-content -->
        <script>
            document.addEventListener('readystatechange', function() {
                var state = document.readyState;

                document.getElementById('scf-body-content').style.display = "none";
                if (state == 'interactive' || state == 'loading' || state == 'uninitialized') {
                    document.getElementById('scf-body-content').style.display = "none";
                    document.getElementById('scf-page-loading').style.display = "block";
                } else if (state == 'complete') {
                    var loadingElement = document.getElementById('scf-page-loading');
                    if (loadingElement) {
                        loadingElement.remove();
                    }
                    document.getElementById('scf-body-content').style.display = "block";
                }
            });
        </script>
    <?php } ?>

    <?php if( $module == "privacy_lock" && ! empty ( $action  ) && $action == 2 ) { ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <?php } else { ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" <?php echo ( $behavior_trk_heatmap_element ) ?  "" : 'defer="defer"'; ?>></script>

    <?php if (empty($module) || $module == "privacy_lock") { /* For Privacy lock meter animation*/ ?>
        <script type="text/javascript" src="https://code.jquery.com/jquery-latest.js"></script>
    <?php } ?>
    
    <?php if ($fancybox) { ?>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" defer="defer"></script>
    <?php } ?>

    <?php if ($slick) { ?>
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js" defer="defer"></script>
    <?php } ?>


        <?php
    }

    /* BBTT disabled 
    global $behavior_header_scripts;
    echo $behavior_header_scripts["scripts"];
    */

    if (!empty($include_scripts)) {
        foreach($include_scripts as $s){
echo ' <script type="text/javascript" src="'.$s.'"></script>';
        }
    }
    ?>

       
    <?php
    if (empty($ads_optimized)) {

        if (!empty($user_id) && $current_time_ca->format("N") <= 5 && ($hour = $current_time_ca->format("H")) && $hour >= 9 && $hour <= 17) {

    ?>
            <script src="https://wchat.freshchat.com/js/widget.js"></script>
            <script>
                window.fcWidget.init({
                    token: "3a3dfd85-9a57-4b35-b046-73214d68db4e",
                    host: "https://wchat.freshchat.com",
                });
                window.fcWidget.setExternalId("<?php echo $user_id; ?>");
                window.fcWidget.user.setFirstName("<?php echo $user_data['last_name']; ?>");
                window.fcWidget.user.setEmail("<?php echo $user_data['email']; ?>");
                window.fcWidget.user.setProperties({
                    plan: "Estate", // meta property 1
                    status: "Active" // meta property 2
                });
            </script>
        <?php
        }
    }

    if (!$mobile_app && empty($ads_optimized)) {
        ?>

        <script>
            document.onreadystatechange = function() {
                var state = document.readyState;

                if (state == 'complete') {
                    // return;
                    (function(d) {
                        var s = d.createElement("script");
                        /* uncomment the following line to override default position*/
                        /* s.setAttribute("data-position", 3);*/
                        /* uncomment the following line to override default size (values: small, large)*/
                        /* s.setAttribute("data-size", "large");*/
                        /* uncomment the following line to override default language (e.g., fr, de, es, he, nl, etc.)*/
                        /* s.setAttribute("data-language", "null");*/
                        /* uncomment the following line to override color set via widget (e.g., #053f67)*/
                        /* s.setAttribute("data-color", "#2d68ff");*/
                        /* uncomment the following line to override type set via widget (1=person, 2=chair, 3=eye, 4=text)*/
                        /* s.setAttribute("data-type", "1");*/
                        /* s.setAttribute("data-statement_text:", "Our Accessibility Statement");*/
                        /* s.setAttribute("data-statement_url", "http://www.example.com/accessibility";*/
                        /* uncomment the following line to override support on mobile devices*/
                        /* s.setAttribute("data-mobile", true);*/
                        /* uncomment the following line to set custom trigger action for accessibility menu*/
                        /* s.setAttribute("data-trigger", "triggerId")*/

                        s.setAttribute("data-account", "UjTdosE06m");
                        s.setAttribute("src", "https://cdn.userway.org/widget.js");
                        (d.body || d.head).appendChild(s);
                    })(document)

                    document.addEventListener('userway:render_completed', function(event) {

                        var gb = document.getElementById("userwayAccessibilityIcon");
                        //gb.style.position = 'inherit';
                        //document.getElementById('grecaptcha-box').appendChild(gb.cloneNode(true));
                        //gb.parentNode.removeChild(gb);
                        var instance = event.detail.userWayInstance
                        instance.iconVisibilityOff()

                        var userway = document.querySelector('.uai.userway_dark')
                        if (userway) {
                            userway.setAttribute('style', 'background:#2AC984 !important;')
                        }

                    })
                    document.getElementById("userway-custom-icon").onclick = function(e, instance) {
                        UserWay.widgetOpen()
                    };
                };
            };
        </script>

    <?php 
    }
    ?>
    


    <?php if( $slick ){ ?>
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <?php } ?>
    </body>

    </html>