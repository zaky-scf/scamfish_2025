<?php
	global $list_of_states;
?>

<div class="scf-popup select_state" data-name="select_state" <?php js_controller("modal") ?>>
	<div class="scf-popup-dialog">
		<span class="si-close-circle close-modal"></span>
		<h3>Refine Your Search</h3>
		<div class="popup-contents">
			<h2><span class="si-location"></span>Which state are they from?</h2>
            <?php html_field_select( "state", array_merge( [ "@@@" => "Select a State", "" => "Search All" ], $list_of_states ), null, false, "scf-form  dropdown-select-search", "", false, [ JS_MAIN_CONTROLLER => "search.select.state" ] ); ?>
			<button type="button" class="btn btn-purple" <?php js_controller("search.state") ?>>Continue</button>
		</div>
	</div>
</div>