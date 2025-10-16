<?php
    $user_id = 0;
    $GLOBALS["user_id"] = 0;
    $module = "";

    if ( empty( $hide_menu ) ) {
?>

<span class="si-option-vertical new-mb-option" <?php js_controller("menu.mobile") ?>></span>
<div class="new-menu" <?php js_element_var("menu") ?>>
    <div class="mobile-back" <?php js_controller("menu.back") ?>><span><i class="si-left"></i> <b>BACK</b></span></div>
    <div class="row">
        <div class="col-sm-4 pos-initial">
        <?php
    if ( empty( $hide_resources_menu ) ) {
?>
            <span class="item" <?php js_controller("menu.item") ?>>Resources <i class="si-triangle-down"></i></span>
            <div class="row new-sub-menu">
                <div class="col-md-12">
                     <h4>Are You being Catfished</h4>
                     <ul>
                        <li><a href="<?php echo RELATIVE_BLOG_URL; ?>online-dating-scams/">Catfishing - What is It?</a></li>
                        <li><a href="<?php echo RELATIVE_BLOG_URL; ?>find-out-if-youre-being-catfished/">Find out if You're Being Catfished</a></li>
                        <li><a href="<?php echo RELATIVE_BLOG_URL; ?>12-signs-might-getting-catfished-online/">Signs You've Been Catfished</a></li>
                        <li><a href="<?php echo RELATIVE_BLOG_URL; ?>what-to-do-if-youre-being-catfished-a-step-by-step-guide/">What To Do If You're Being Catfished</a></li>
                        <li><a href="<?php echo RELATIVE_URL; ?>search-specialist/">Search Specialist</a></li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <h4>Catfished-Online Dating Scams</h4>
                    <ul>
                        <li><a href="<?php echo RELATIVE_BLOG_URL; ?>ashley-madison-scams-all-about-ashleymadison-com-catfish-scams/">Catfished on Ashley Madison</a></li>
                        <li><a href="<?php echo RELATIVE_BLOG_URL; ?>eharmony-scams-all-about-eharmony-catfish-scams/">Catfished on eHarmony</a></li>
                        <li><a href="<?php echo RELATIVE_BLOG_URL; ?>catfished-kik-messenger-kik-scams/">Catfished on KIK Messenger</a></li>
                        <li><a href="<?php echo RELATIVE_BLOG_URL; ?>catfishing-match-com-scams-learn-match-com-scams/">Catfished on Match.com</a></li>
                        <li><a href="<?php echo RELATIVE_BLOG_URL; ?>okcupid-scams-everything-about-being-catfished-scams-on-okcupid-com/">Catfished on OKCupid</a></li>
                        <li><a href="<?php echo RELATIVE_BLOG_URL; ?>catfished-tinder-need-know-tinder-scams/">Catfished on Tinder</a></li>
                    </ul>
                </div>
            </div>
            <?php
   }
?>
        </div>
        <div class="col-sm-4 pos-initial">
        <?php
    if ( empty( $hide_lookup_menu ) ) {
?>
            <span class="item" <?php js_controller("menu.item") ?>>Lookups <i class="si-triangle-down"></i></span>
            <div class="row new-sub-menu sub-lookups">
                <div class="col-md-12">
                    <h4>Reverse Lookups</h4>
                    <ul>
    <?php if ($user_id): ?>
        <li><a href="<?php echo RELATIVE_URL ?>dashboard.html?lookup=name" class="<?php echo ($lookup === 'name') ? 'active' : ''; ?>" data-type="2" data-class="name-search" data-target=".name-search"><i class="si-user <?php echo ($lookup === 'name') ? 'active' : ''; ?>"></i> <span>Name Lookup</span></a></li>
        <li><a href="<?php echo RELATIVE_URL ?>dashboard.html?lookup=phone" class="<?php echo ($lookup === 'phone') ? 'active' : ''; ?>" data-type="3" data-class="phone-search" data-target=".phone-search"><i class="si-phone <?php echo ($lookup === 'phone') ? 'active' : ''; ?>"></i> <span>Phone Lookup</span></a></li>
        <li><a href="<?php echo RELATIVE_URL ?>dashboard.html?lookup=image" class="<?php echo ($lookup === 'image') ? 'active' : ''; ?>" data-type="4" data-target="image-search"><i class="si-image <?php echo ($lookup === 'image') ? 'active' : ''; ?>"></i> <span>Reverse Image Lookup</span></a></li>
        <li><a href="<?php echo RELATIVE_URL ?>dashboard.html?lookup=address" class="<?php echo ($lookup === 'address') ? 'active' : ''; ?>"  data-type="5" data-target="address-search"><i class="si-location <?php echo ($lookup === 'address') ? 'active' : ''; ?>"></i> <span>Address Lookup</span></a></li>
        <li><a href="<?php echo RELATIVE_URL ?>dashboard.html?lookup=email" class="<?php echo ($lookup === 'email') ? 'active' : ''; ?>" data-type="1" data-class="email-search" data-target=".email-search"><i class="si-email <?php echo ($lookup === 'email') ? 'active' : ''; ?>"></i> <span>Email Lookup</span></a></li>
        <li><a href="<?php echo RELATIVE_URL ?>dashboard.html?lookup=username" class="<?php echo ($lookup === 'username') ? 'active' : ''; ?>"  data-type="0" data-target="username-search"><i class="si-username <?php echo ($lookup === 'username') ? 'active' : ''; ?>"></i> <span>Username Lookup</span></a></li>
    <?php else: ?>
        <li><a href="<?php echo RELATIVE_URL; ?>"><i class="si-user"></i> <span>Name Lookup</span></a></li>
        <li><a href="<?php echo PAGE_URL_REVERSE_PHONE_SEARCH; ?>"><i class="si-phone"></i> <span>Phone Lookup</span></a></li>
        <li><a href="<?php echo PAGE_URL_REVERSE_IMAGE_SEARCH; ?>"><i class="si-image"></i> <span>Reverse Image Lookup</span></a></li>
        <li><a href="<?php echo PAGE_URL_REVERSE_ADDRESS_SEARCH; ?>"><i class="si-location"></i> <span>Address Lookup</span></a></li>
        <li><a href="<?php echo PAGE_URL_REVERSE_EMAIL_SEARCH; ?>"><i class="si-email"></i> <span>Email Lookup</span></a></li>
        <li><a href="<?php echo PAGE_URL_REVERSE_USERNAME_SEARCH; ?>"><i class="si-username"></i> <span>Username Lookup</span></a></li>
    <?php endif; ?>
        <li><a href="<?php echo PAGE_URL_REVERSE_SEARCH; ?>"><i class="si-search"></i> <span>Reverse Lookup</span></a></li>

    <?php
        if ( $GLOBALS["user_id"] ) { 
?>
                        <li><a href="<?php echo RELATIVE_URL ?>dashboard.html?section=criminal_records_search"><i class="si-criminal-rec"></i> <span>Criminal Records Lookup</span></a></li>
<?php
        }
?>
                    </ul>
                  
                </div>
                <div class="col-md-12">
                    <h4>Other Lookups</h4>
                    <ul>
                        <li><a href="<?php echo PAGE_URL_BEST_PEOPLE; ?>"><i class="si-best-people"></i> <span>Best People</span></a></li>
                         <li><a href="https://www.orbitly.io/" target="_blank"><i class="si-orbitly"></i> <span>Orbitly.io</span></a></li>
                    </ul>
                </div>
            </div>
            <?php
    } 
?>
        </div>
<?php
        //if ( ! $GLOBALS["user_id"] && empty( $hide_login ) ) {
?>
        <div class="col-sm-4 pos-initial scf_login_item">
            <span class="item" <?php js_controller("menu.item") ?>>Login <i class="si-triangle-down"></i></span>
            <div class="row login-modal login-modal-new new-sub-menu">
                <div class="col-md-12">
                    <div class="login-header">
                        <div class="row">
                            <div class="col-xs-12">
                                <p>Login to SocialCatfish.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="section-login">
                        <p class="error" <?php js_controller("menu.login.error"); ?>>Invalid Email or Password.</p>
                        <iframe name="login_form" id="fake-login" width="0" height="0"></iframe>
                        <form method="POST" target="login_form" <?php js_controller("menu.login.form"); ?>>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Email or Username</label>
                                    <input type="text" name="email" class="login-email" placeholder="Email or Username" />
                                </div>
                                <div class="col-md-12">
                                    <label>Password</label>
                                    <input type="password" name="password" class="login-password" placeholder="Password" autocomplete="off" />
                                    <p class="sign-in-forgot-password" ><a style="color:white" href="<?php echo RELATIVE_URL; ?>forgot-password" >Forgot Password?</a></p>
                                </div>
                                <div class="col-md-12">
                                    <input type="hidden" name="redirect" class="login-redirect" value="<?php echo ( ( "register" == $module && ! empty( $token ) ) ? RELATIVE_URL . "membership-levels/?token={$token}&step=2" : "" ); ?>" />
                                    <div class="login-button login-controller btn" <?php js_controller("fs") ?>>LOGIN NOW</div>
                                </div>
                            </div>
                            <input type="hidden" name="csrf_token" value="">
                        </form>
                    </div>
                    <div class="section-forgot" <?php js_controller("menu.login.forgot_form") ?>>
                        <p class="success" <?php js_element_var("success"); ?>>Password reset instructions sent to your email. Please be sure to check your spam/junk folder if you don't see it in your regular mail.</p>
                        <p class="error"  <?php js_element_var("error"); ?>>An Error. Invalid Email.</p>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Email Address</label>
                                <input type="text" name="email" class="forgot-email" placeholder="Email Address" <?php js_element_var("email"); ?>/>
                                <p class="sign-in-forgot-password" <?php js_controller("menu.login_toggle"); ?>>Back to Sign In</p>
                            </div>
                            <div class="col-md-12">
                                <div class="login-button reset-controller btn" <?php js_controller("menu.login.forgot") ?>>Reset Password</div>
                            </div>
                        </div>
                    </div>
                    <div class="login-footer">
                        New User? <a href="<?php echo RELATIVE_URL; ?>membership-levels">Sign Up</a> Here.
                    </div>
                </div>
            </div>
        </div>
<?php
        // }
        // if ( $GLOBALS["user_id"] ) {
?>
            <div class="col-sm-4 pos-initial account-section" style="display: none;">
                <span class="item" <?php js_controller("menu.item") ?>>Account <i class="si-triangle-down"></i></span>
                <div class="row new-sub-menu">
                    <div class="col-md-12">
                        <h4>Navigate in Your Account</h4>
                        <ul class="account-menu">
                            <li><a href="<?php echo RELATIVE_URL ?>dashboard.html"><i class="si-dashboard"></i> <span>Dashboard</span></a></li>
                            <li><a href="<?php echo RELATIVE_URL ?>contact/"><i class="si-contact-us"></i> <span>Contact Us</span></a></li>
                            <li><a href="<?php echo RELATIVE_URL ?>faq/"><i class="si-faq"></i> <span>FAQs</span></a></li>
                            <li class="logout-link" <?php js_controller("menu.demo_mode.kill") ?>><a href="<?php echo RELATIVE_URL ?>logout.html">LOGOUT</a></li>
                        </ul>
                    </div>
                </div>
            </div>
<?php
        // }
?>
    </div>
</div>
<?php
    }
?>
<?php
    /* AB Test: Criminal Records Teaser CSI-3859 : START*/

    if ($module == "register") {

        include($current_template_path . "content/modals/existing_user_login.php");

    }

    /* AB Test: Criminal Records Teaser CSI-3859 : END*/

?>
