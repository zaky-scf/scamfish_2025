<div class="scf-popup select_state refine_address_search" data-name="refine_address_search" <?php echo js_controller("modal") ?>>
	<div class="scf-popup-dialog">
		<span class="si-close-circle close-modal"></span>
		<h3>Refine Your Address Search</h3>
		<div class="popup-contents">
			<div class="refined_search" data-name="refined_search" <?php echo js_controller("modal") ?>>
				<form method="post" <?php js_controller("ras.refine_form") ?>>
					<p>We can't seem to locate that property in our records.</p>
					<h2>Let's try a deep search.</h2>
					<input type="text" class="scf-form" name="address" placeholder="Enter Street Address..." aria-label="Enter Street Address" aria-required="true" required pattern="^[0-9]+ .*"/>
					<?php html_field_select( "state", array_merge( [ "@@@" => "Select a State" ], $list_of_states ), "", false, "scf-form", "", false, [ JS_MAIN_CONTROLLER => "ras.state" ] ); ?>
					<?php html_field_select( "city", [ "@@@" => "Select a City" ], "", false, "scf-form", "", false, [ JS_MAIN_CONTROLLER => "ras.city" ] ); ?>
					<input type="number" class="scf-form" name="zip" placeholder="Enter Zip Code..." aria-label="Enter Zip Code" aria-required="true" required />
					<input type="hidden" name="redirect" value="0" />
					<button type="submit" class="btn btn-purple">Search Now</button>
				</form>
			</div>
		</div>
	</div>
</div>