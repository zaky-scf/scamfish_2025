<div class="scf-popup multiple_faces_detected" data-name="multiple_faces_detected" <?php js_controller("modal"); ?>>
	<div class="scf-popup-dialog">
		<span class="si-close-circle close-modal" <?php js_controller("search.multiple_face_detect.skip"); ?>></span>
		<h2><img src="<?php echo get_template_directory_uri() . '/assets/img/multiple-face-detect.svg'; ?>" alt=""/>	Multiple Faces Detected</h2>
		<div class="popup-contents">			
			<p>Multiple faces detected. Please select photo of a face you want to search or skip to run the search with full image.</p>
			<div class="uploaded_images">
				<div class="row">
					<?php for($i=1; $i <= RIS_MAX_MULTIPLE_FACES; $i++){ ?>

					<div class="col-xs-4 <?php echo $i==1 ?"active":"" ?>" <?php js_controller("search.multiple_face_detect.image_selection_change"); ?> data-image_no ="<?php echo $i ?>">
						<img src="<?php echo $current_template_assets_url; ?>/images/report2.png" alt="" id="image-<?php echo $i ?>" />		
					</div>

					<?php } ?>
				</div>
			</div>
			<div class="run_checkbox">
				<label class="checkbox"> Run Separate Reports for Each Face <input type="checkbox" <?php js_controller("search.multiple_face_detect.run_checkbox"); ?> /><span class="checkmark"></span></label>
			</div>
			<button class="btn btn-blue" <?php js_controller("search.multiple_face_detect.go"); ?>>Continue Image Search</button>
			<button class="btn btn_skip close-modal" <?php js_controller("search.multiple_face_detect.skip"); ?>>Skip for Now</button>
		</div>
	</div>
</div>