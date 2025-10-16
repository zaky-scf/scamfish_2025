<div class="scfb-email-subscribe">
    <form class="email-subscribe email-subscribe-form" action="<?php echo SENDY_INSTALATION_URL; ?>subscribe" method="POST">
        <h4>Subscribe to our newsletter to receive latest articles.</h4>
        <div class="email-row">
            <input type="text" class="sendi-email-id scf-form" placeholder="Enter your Email Address" name="email">
            <button type="button" class="post-subscribe-button btn btn-purple">SUBSCRIBE</button>
        </div>
        <input type="hidden" name="list" value="<?php echo SENDY_LIST_BLOG_PAGE_CONTENT ?>">
        <input type="hidden" value="subscribe" name="action">
        <input type="hidden" name="subform" value="yes"/>
    </form>
</div>