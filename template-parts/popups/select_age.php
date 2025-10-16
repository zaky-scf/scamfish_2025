<div class="scf-popup select_state" data-name="select_age" <?php js_controller("modal") ?>>
	<div class="scf-popup-dialog">
		<span class="si-close-circle close-modal"></span>
		<h3>Refine Your Search</h3>
		<div class="popup-contents">
			<h2><span class="si-calendar"></span>Select an Age Range?</h2>
			<div class="age_range_set" <?php js_controller("search.age_range") ?>>
				<div class="age_range active">18 - 25</div>
				<div class="age_range">26 - 35</div>
				<div class="age_range">36 - 45</div>
				<div class="age_range">46 +</div>
			</div>
			<button type="button" class="btn btn-purple" <?php js_controller("search.age") ?>>Continue</button>
			<div class="skip-now" data-target="skip" <?php js_controller("search.age") ?>>Skip for Now</div>
		</div>
	</div>
</div>