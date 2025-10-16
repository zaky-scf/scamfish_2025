<div class="scf-popup ca_popup criminal_records address_search_progress" data-name="address_search_progress" <?php echo js_controller("modal") ?>>
	<div class="scf-popup-dialog">
		<div class="popup-contents">
			<h2>Organizing Data</h2>
			<div id="loading_animation" data-target="folder_files" <?php js_controller('lottie.load') ?>></div>
		</div>
		<div class="progress-loading">
            <div class="progress-title">Organizing All the Data ... <span class="load-avg" <?php js_element_var("progress") ?>>0%</span></div>
            <div class="payment-progress"><div class="value" style="width: 0%;" <?php js_element_var("progress_bar") ?>></div></div>
			<p>Thank you for your patience.</p>
		</div>
	</div>
</div>