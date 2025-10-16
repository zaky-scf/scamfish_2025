<?php global $post_data; ?>

<div class="scf-popup ca_popup criminal_records ras_proccess" data-name="ras_proccess" <?php js_controller('modal'); ?>>
	<div class="scf-popup-dialog">
		<div class="popup-contents">
			<div class="row">
				<div class="col-md-7" <?php js_element_var("data_list") ?>>
                    <div class="data-list">
					    <h4><span class="si-user"></span> Owner Information</h4>
					    <p>Your report may include the following information:</p>
					    <ul class="ras-data">
						    <li>Current owner full name</li>
						    <li>Ownership history</li>
						    <li>People associated with this address</li>
						    <li>And more!</li>
					    </ul>
                    </div>
                    <div class="data-list">
					    <h4><span class="si-property"></span> Deed and Tax</h4>
					    <p>Your report may include the following information:</p>
					    <ul class="ras-data">
						    <li>Full record of tax payments</li>
						    <li>Current Assessed Value of the property</li>
						    <li>Ownership History</li>
						    <li>Special Tax Classifications (if any)</li>
						    <li>And more!</li>
					    </ul>
                    </div>
                    <div class="data-list">
					    <h4><span class="si-tracked-data"></span> Financial Data</h4>
					    <p>Your report may include the following information:</p>
					    <ul class="ras-data">
						    <li>Loan history with dates and amounts</li>
						    <li>Lenders and Loan types</li>
						    <li>Market value and improvements</li>
						    <li>Updated sales history</li>
						    <li>And more!</li>
					    </ul>
                    </div>
                    <div class="data-list">
					    <h4><span class="si-home-plan"></span> Property Information</h4>
					    <p>Your report may include the following information:</p>
					    <ul class="ras-data">
						    <li>Year Built</li>
						    <li>Lot size and Square footage</li>
						    <li>Number of bedrooms and bathrooms</li>
						    <li>Building details</li>
						    <li>And more!</li>
					    </ul>
                    </div>
                    <div class="data-list">
					    <h4><span class="si-home-plan"></span> Organizing Data</h4>
					    <p>Your Report comes with access to People Search tools to look up contact and background information for all owners. Your Report includes access to Unlimited:</p>
					    <ul class="ras-data">
						    <li>Name Search</li>
						    <li>Email Search</li>
						    <li>Username Search</li>
						    <li>Telephone Search</li>
					    </ul>
                    </div>
                    <div class="data-list">
					    <h4><span class="si-secured"></span> Success !</h4>
					    <p>Your Report for <span id="add" <?php js_element_var("address") ?>></span> is Ready!</p>
					    <p>Property Information, Ownership History, Assessed and Market Value, Tax Payment History, and more Inofrmation available.</p>
                    </div>
				</div>
				<div class="col-md-5">
					<ul class="progress-text" <?php js_element_var("steps") ?>>
						<li>Owner Information</li>
						<li>Deed and Tax</li>
						<li>Financial Data</li>
						<li>Property Information</li>
						<li>Organizing Data</li>
					</ul>
				</div>
			</div>

		</div>
		<div class="progress-loading">
            <div <?php js_element_var("pbar"); ?>>
			    <div class="progress-title"><span <?php js_element_var("title") ?>>Searching Owner Information...</span><span class="load-avg" <?php js_element_var("progress") ?>>0%</span></div>
                <div class="payment-progress"><div class="value" style="width: 0%;" <?php js_element_var("progress_bar") ?>></div></div>
			    <p <?php js_element_var("footer") ?>>Thank you for your patience.</p>
            </div>

			<form action="<?php echo PAGE_URL_REVERSE_ADDRESS_SEARCH . "?signup=1"; ?>" method="post" onsubmit="$('#query').val($('#add').html()); return true;">
				<div class="ras-unlock-btn" <?php js_element_var("unlock") ?>>
						<input type="hidden" id="query" name="query" />
						<div class="unlock-step">Enter your Email to unlock result</div>

						<?php html_field_text( "email", $post_data["email"], 1000, "scf-form", "email", "Enter your Email Address Here...", true, [ JS_ELEMENT_VAR => "email" ] ); ?>
					
						<button type="button" data-target="<?php echo PAGE_URL_REVERSE_ADDRESS_SEARCH . "?signup=1"; ?>" <?php js_controller("fs") ?> class="btn btn-dark-green margintop">Unlock Your Results Now</button>
						
				</div>
			</form>	
			
		</div>
	</div>
</div>