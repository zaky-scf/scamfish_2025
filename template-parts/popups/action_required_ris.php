<div class="scf-popup ca_popup action_required activate_image_search" data-name="action_required_ris" <?php js_controller("modal"); ?>>
	<div class="scf-popup-dialog">
		<div class="action-btn">Action Required</div>
		<span class="si-close-circle close-modal"></span>
		<div class="popup-contents">
			<div class="image-wrapper">
				<img src="<?php echo get_template_directory_uri() . '/assets/img/Artboard-68.svg'; ?>" alt="Activate Image Search" />
			</div>
			<h2>Activate Image Search</h2>
			<p>Your subscription does NOT include Image Searches.<br/>Please add Ultimate Image Searches to continue.</p>
			<div class="row btn-wrapper">
				<div class="col-xs-6">
					<button type="button" class="btn btn-gray" <?php js_controller( "modal.onclick_close" ) ?>>Close</button>
				</div>
				<div class="col-xs-6">
					<form action="<?php echo PAGE_URL_MEMBERSHIP_LEVELS ?>" method="post">
						<input type="hidden" name="token" value="<?php echo md5( time() * rand( 100, 200 ) ); ?>" />
						<input type="hidden" name="id" value="<?php echo PLAN_UNLIMITED_3_DAY_RIS_2897; ?>" />
						<input type="hidden" name="action" value="checkout" />
						<button type="submit" class="btn btn-dark-green">Activate Now</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>