<div class="scf-popup select_state improve_image_search" data-name="improve_image_search" <?php js_controller("modal") ?> >
	<div class="scf-popup-dialog">
		<span class="si-close-circle close-modal" <?php js_controller("search.improve_image_search.skip_all") ?>></span>
		<h3><i class="si-edit"></i> Improve Your Image Search</h3>
		<div class="popup-contents" <?php js_controller("search.improve_image_search.init") ?>>
			<p>You can potentially add more matches by adding the below information to your search. Try it now!</p>
			<div class="box step-1">
				<h4>Add the Name and Age</h4>
				<img src="<?php echo $current_template_assets_url; ?>/images/nps.png" class="selected_image" decoding="async" loading="lazy" style="background-image: url('<?php echo $current_template_assets_url; ?>/images/nps.png')" />
				<div class="input-group age_name_grp">
					<div class="input-group">
						<input type="text" placeholder="Enter their name" maxlength="40" class="scf-form name_filed" <?php js_controller("search.improve_image_search.name") ?> />
						<i class="si-close"></i>
					</div>
					<div class="input-group">
						<input type="number" placeholder="Age" max="999" oninput="this.value = this.value.replace(/[^0-9]/g, '');if(this.value.length > 3) this.value = this.value.slice(0, 3);" class="scf-form age_field" <?php js_controller("search.improve_image_search.age") ?> />
						<i class="si-close"></i>
					</div>
				</div>
			</div>
			<button type="button" class="btn btn-dark-blue step-1" <?php js_controller("search.improve_image_search.continue_name") ?>>Continue with Given Name</button>

			<button type="button" class="btn btn-gray step-1" <?php js_controller("search.improve_image_search.skip_this") ?>>Skip This</button>





			<div class="box box2 step-2">
				<h4>Add the Location of This Person </h4>
				<select class="scf-form select_state" <?php js_controller("search.improve_image_search.state") ?>>
					<option value="">Select State</option>
					<?php foreach ($list_of_states as $key => $_state) { ?>
						<option value="<?php echo $key ?>"><?php echo $_state ?></option>
					<?php } ?>
				</select>
				<select class="scf-form state" <?php js_controller("search.improve_image_search.city") ?> disabled="true">
					<option value="">Select City (Select State First)</option>
				</select>
				<div class="selected_img">
					<img src="<?php echo $current_template_assets_url; ?>/images/nps.png" class="selected_image" decoding="async" loading="lazy" style="background-image: url('<?php echo $current_template_assets_url; ?>/images/nps.png')" />
					<span class="name_display"><i class="si-done"></i></span>
					<span class="age_display"><i class="si-done"></i></span>
				</div>
			</div>
			<button type="button" class="btn btn-dark-blue step-2" <?php js_controller("search.improve_image_search.continue_location") ?>>Continue with Given Location</button>





			<div class="box box3 step-3">
				<h4>Add the Job Title / Company</h4>
				<div class="input-group">
					<input type="text" placeholder="Job Title / Company" maxlength="40" class="scf-form" <?php js_controller("search.improve_image_search.job_title") ?> />
					<i class="si-close"></i>
				</div>
				<div class="selected_img states">
					<span <?php js_controller("search.improve_image_search.state_text") ?>> <i class="si-done"></i></span>
					<span <?php js_controller("search.improve_image_search.city_text") ?>> <i class="si-done"></i></span>
				</div>
				<div class="selected_img">
					<img src="<?php echo $current_template_assets_url; ?>/images/nps.png" class="selected_image" decoding="async" loading="lazy" style="background-image: url('<?php echo $current_template_assets_url; ?>/images/nps.png')" />
					<span class="name_display"><i class="si-done"></i></span>
					<span class="age_display"><i class="si-done"></i></span>
				</div>
			</div>
			<button type="button" class="btn btn-dark-blue step-3" <?php js_controller("search.improve_image_search.continue_job") ?>>Continue with Given Job Info</button>




			<div class="row step-nav">
				<div class="col-md-6">
					<button type="button" class="btn btn-gray" <?php js_controller("search.improve_image_search.back") ?>>Back</button>
				</div>
				<div class="col-md-6">
					<button type="button" class="btn btn-gray" <?php js_controller("search.improve_image_search.skip_this") ?>>Skip This</button>
				</div>
			</div>
			<div class="steps">
				<div class="row">
					<div class="col-md-8 dnt-show text-left">
						<!-- <ul>
							<li class="active"></li>
							<li class="current"></li>
							<li></li>
						</ul> -->
						<label class="checkbox"> Don't show me again. <input type="checkbox" <?php js_controller("search.improve_image_search.dont_show_again") ?>><span class="checkmark"></span></label>
					</div>
					<div class="col-md-4 text-right">
						<label>Step <span <?php js_controller("search.improve_image_search.step_count") ?>>1</span> of 3</label>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>