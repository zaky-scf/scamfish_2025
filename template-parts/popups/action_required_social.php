<div class="scf-popup ca_popup action_required activate_social_search" data-name="action_required_social" <?php js_controller("modal"); ?>>
	<div class="scf-popup-dialog">
		<div class="action-btn">Action Required</div>
		<span class="si-close-circle close-modal"></span>
		<div class="popup-contents">
			<div class="image-wrapper">
				<img src="<?php echo get_template_directory_uri() . '/assets/img/Artboard-68.svg'; ?>" alt="Activate Social Search " />
			</div>
			<h2>Activate Social Search </h2>

			<p id="activate_social_search_ss_cancel" style="display: none;">Your subscription expired or canceled.<br /> Please add back Social Searches to continue.</p>
			<p id="activate_social_search_not_ss_cancel" style="display: none;">Your subscription does NOT include Social Searches.<br/>Please add Social Searches to continue.</p>
		
			<div class="row btn-wrapper">
				<div class="col-xs-6">
					<button type="button" class="btn btn-gray" <?php js_controller( "modal.onclick_close" ) ?>>Close</button>
				</div>
				<div class="col-xs-6">
				<form action="<?php echo PAGE_URL_MEMBERSHIP_LEVELS ?>" method="post">
					<input type="hidden" name="token" value="<?php echo md5( time() * rand( 100, 200 ) ); ?>" />
					<input type="hidden" name="id" value="<?php echo !empty($user_data['user_invitees_id']) ? PLAN_100_LIMITED_TOKENS_MIGRATED_27_48 : PLAN_100_LIMITED_TOKENS; ?>" />
					<input type="hidden" name="action" value="checkout" />
					<button type="submit" class="btn btn-dark-green">Add <?php echo (true) ? '' : 'Unlimited'; ?> Social Searches</button>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>