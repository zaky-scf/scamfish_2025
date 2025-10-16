<div class="scfb-email-subscribe email-sub">
    <form class="email-subscribe email-subscribe-form" action="<?php echo SENDY_INSTALATION_URL; ?>subscribe" method="POST">
        <p>Sign up here to get the latest news, updates, and special offers.</p>
        <div class="email-row">
            <input type="text" class="sendi-email-id scf-form" placeholder="Enter your Email Address" name="email">
            <button type="button" class="post-subscribe-button btn btn-green">Subscribe</button>
        </div>
        <input type="hidden" name="list" value="<?php echo SENDY_LIST_BLOG ?>">
        <input type="hidden" value="subscribe" name="action">
        <input type="hidden" name="subform" value="yes"/>
    </form>
</div>
