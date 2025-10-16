<?php $blog_version_ab = "original"; ?>
<div id="blog-signup-leaving" class="scf-popup blog-email-sign-up" data-name="blog_email_sign_up" <?php echo js_controller("modal") ?>>
	<div class="scf-popup-dialog" <?php js_controller( "modal.blog_email_signup.init" ) ?>>
		<span class="si-close-circle close-modal"></span>
        <div class="modal-content-email">
            <h3>Wait, Don't Miss Out!</h3>
            <img src="<?php echo get_template_directory_uri() . '/assets/img/email-open.svg'; ?>" alt="open letter">
            <h4>Enter Your Email Below To Get The Latest News and Catfish stories</h4>
            <div class="popup-contents">
            <?php include_once( get_template_directory() . '/template-parts/brevo/blog-signup.php' ); ?>
            
            </div>
            <p>Don't worry. We respect your privacy. We will not sell, rent, or spam your email.</p>
        </div>
	</div>
</div>