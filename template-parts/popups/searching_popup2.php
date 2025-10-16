<div class="scf-popup searching_popup2 <?php echo (!empty($user_id)) ? 'logged_modal' : ''; ?>"
	data-name="searching_popup2" <?php js_controller("modal") ?>>
	<div class="scf-popup-dialog">
		<div class="popup-contents">
			<div class="searching_top">
				<div class="row">
					<div class="col-sm-4">
						<div class="pre-img"><img class="img" src="<?php echo get_template_directory_uri() . '/assets/img/report_run 1.png'; ?>" /></div>
						<div id="searching_file2" data-target="searching_file" <?php js_controller("modal.searching_popup2.animation"); ?>></div>
					</div>
					<div class="col-sm-8">
						<h2>Searching Over<br /> 200 Billion Records</h2>
					</div>
				</div>
			</div>
			<?php if (empty($user_id)) { ?>
				<div class="row progress_bar" <?php js_controller('searching_popup2.list') ?>>
					<div class="col-md-5th">
						<span class="si-linefb"></span>
						<label>Social<br /> Networks</label>
					</div>
					<div class="col-md-5th">
						<span class="si-cooperation"></span>
						<label>Education &<br /> Government</label>
					</div>
					<div class="col-md-5th">
						<span class="si-press"></span>
						<label>News<br /> Articles</label>
					</div>
					<div class="col-md-5th">
						<span class="si-dashboard"></span>
						<label>Public<br /> Databases</label>
					</div>
					<div class="col-md-5th">
						<span class="si-searched-file"></span>
						<label>Professional<br /> Records</label>
					</div>
				</div>
			<?php } ?>
			<?php
			/* AB Test: better_results : START*/
			if (isset($_SESSION["br_complete"]["step-one"]) && $_SESSION["br_complete"]["step-one"] == true) {
				$_SESSION["br_complete"]["step-one"] = false;
				$_SESSION["br_complete"]["step-search-progress"] = true;
				?>

				<div class="br-validate">
					<p><?php echo "Now searching <span>" . implode(", ", $_SESSION["better_results_search"]["user_answers"][4]) . " and Other Data.</span>"; ?>
					</p>
				</div> <?php

			}

			/* AB Test: better_results : END*/ ?>
		</div>
	</div>
</div>