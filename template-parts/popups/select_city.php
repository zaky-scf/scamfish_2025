<div class="scf-popup select_state select_city" data-name="select_city" <?php js_controller("modal") ?>>
	<div class="scf-popup-dialog">
		<span class="si-close-circle close-modal"></span>
		<h3>Refine Your Search</h3>
		<div class="popup-contents">
			<h2><span class="si-location"></span>Which city are they from?</h2>
            <?php html_field_select( "city", [ "@@@" => "Select a City", "" => "Search All" ], null, false, "scf-form dropdown-select-search", "", false, [ JS_MAIN_CONTROLLER => "search.select.city" ] ); ?>
			<button type="button" class="btn btn-purple" <?php js_controller("search.city") ?>>Continue</button>
		</div>
	</div>
</div>