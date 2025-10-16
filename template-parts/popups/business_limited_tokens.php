<div class="scf-popup ris_risk_level ris_pro_upgrade limited_tokens unlock-premium" data-name="business_limited_tokens"
	<?php js_controller("modal"); ?>>
	<div class="scf-popup-dialog" <?php js_element_var("form") ?>
		data-url="<?php echo PAGE_URL_MEMBERSHIP_LEVELS ?>">
		<span class="si-close-circle close-modal"></span>
		<h2>Upgrade to Pro <label>Action Required</label></h2>
		<div class="popup-contents">
			<div class="row">
				<div class="col-md-2 text-left">
					<img src="<?php echo $current_template_assets_url; ?>/images/limited_tokens.png" alt="" />
				</div>
				<div class="col-md-10 list">
					<h4>Uh-oh! You've run out of Search Tokens.</h4>
					<p>You'll need to add more token to your account to continue your search.</p>
				</div>
			</div>
			<p class="pick_note">Pick your Pro plan. Unused tokens won't roll over to next month.</p>
			<ul class="lm_tab">
				<li class="active" data-plan-type="monthly" <?php js_controller("modal.business_limited_tokens_update.plan_type_select") ?>>Monthly</li>
				<li data-plan-type="yearly" <?php js_controller("modal.business_limited_tokens_update.plan_type_select") ?>>Yearly <span>20%
						OFF</span></li>
			</ul>
			<div class="select_plans" <?php js_element_var("plan") ?>>
				<div class="row monthly">
					<div class="col-md-4">
						<label
							class="radio <?php echo !empty(Membership::get_user_plan_id($user_id, PLAN_LIMITED_TOKENS_250_MONTHLY)) ? "activated" : "" ?>"
							data-plan-id="<?php echo PLAN_LIMITED_TOKENS_250_MONTHLY ?>"
							data-token-amount="<?php echo Membership::get(PLAN_LIMITED_TOKENS_250_MONTHLY)["tokens_social"]; ?>"
							data-price="<?php echo Membership::get(PLAN_LIMITED_TOKENS_250_MONTHLY)["recurring_amount"]; ?>"
							<?php js_controller("modal.business_limited_tokens.plan_select") ?>>
							<strong>
								<?php echo Membership::get(PLAN_LIMITED_TOKENS_250_MONTHLY)["tokens_social"]; ?> tokens
							</strong>
							<span>per month</span>
							<input type="radio" checked name="radio">
							<span class="radiomark"></span>
						</label>
					</div>
					<div class="col-md-4">
						<label
							class="radio <?php echo !empty(Membership::get_user_plan_id($user_id, PLAN_LIMITED_TOKENS_500_MONTHLY)) ? "activated" : "" ?>"
							data-plan-id="<?php echo PLAN_LIMITED_TOKENS_500_MONTHLY ?>"
							data-token-amount="<?php echo Membership::get(PLAN_LIMITED_TOKENS_500_MONTHLY)["tokens_social"]; ?>"
							data-price="<?php echo Membership::get(PLAN_LIMITED_TOKENS_500_MONTHLY)["recurring_amount"]; ?>"
							<?php js_controller("modal.business_limited_tokens.plan_select") ?>>
							<strong>
								<?php echo Membership::get(PLAN_LIMITED_TOKENS_500_MONTHLY)["tokens_social"]; ?> tokens
							</strong>
							<span>per month</span>
							<input type="radio" name="radio">
							<span class="radiomark"></span>
						</label>
					</div>
					<div class="col-md-4">
						<label
							class="radio <?php echo !empty(Membership::get_user_plan_id($user_id, PLAN_LIMITED_TOKENS_1200_MONTHLY)) ? "activated" : "" ?>"
							data-plan-id="<?php echo PLAN_LIMITED_TOKENS_1200_MONTHLY ?>"
							data-token-amount="<?php echo Membership::get(PLAN_LIMITED_TOKENS_1200_MONTHLY)["tokens_social"]; ?>"
							data-price="<?php echo Membership::get(PLAN_LIMITED_TOKENS_1200_MONTHLY)["recurring_amount"]; ?>"
							<?php js_controller("modal.business_limited_tokens.plan_select") ?>>
							<strong>
								<?php echo Membership::get(PLAN_LIMITED_TOKENS_1200_MONTHLY)["tokens_social"]; ?> tokens
							</strong>
							<span>per month</span>
							<input type="radio" name="radio">
							<span class="radiomark"></span>
						</label>
					</div>
				</div>


				<div class="row yearly hide">
					<div class="col-md-4">
						<label
							class="radio <?php echo !empty(Membership::get_user_plan_id($user_id, PLAN_LIMITED_TOKENS_250_ANNUAL)) ? "activated" : "" ?>"
							data-plan-id="<?php echo PLAN_LIMITED_TOKENS_250_ANNUAL ?>"
							data-token-amount="<?php echo Membership::get(PLAN_LIMITED_TOKENS_250_ANNUAL)["tokens_social"]; ?>"
							data-price="<?php echo Membership::get(PLAN_LIMITED_TOKENS_250_ANNUAL)["recurring_amount"]; ?>"
							<?php js_controller("modal.business_limited_tokens.plan_select") ?>>
							<strong>
								<?php echo Membership::get(PLAN_LIMITED_TOKENS_250_ANNUAL)["tokens_social"]; ?> tokens
							</strong>
							<span>per month</span>
							<input type="radio" name="radio">
							<span class="radiomark"></span>
						</label>
					</div>
					<div class="col-md-4">
						<label
							class="radio <?php echo !empty(Membership::get_user_plan_id($user_id, PLAN_LIMITED_TOKENS_500_ANNUAL)) ? "activated" : "" ?>"
							data-plan-id="<?php echo PLAN_LIMITED_TOKENS_500_ANNUAL ?>"
							data-token-amount="<?php echo Membership::get(PLAN_LIMITED_TOKENS_500_ANNUAL)["tokens_social"]; ?>"
							data-price="<?php echo Membership::get(PLAN_LIMITED_TOKENS_500_ANNUAL)["recurring_amount"]; ?>"
							<?php js_controller("modal.business_limited_tokens.plan_select") ?>>
							<strong>
								<?php echo Membership::get(PLAN_LIMITED_TOKENS_500_ANNUAL)["tokens_social"]; ?> tokens
							</strong>
							<span>per month</span>
							<input type="radio" name="radio">
							<span class="radiomark"></span>
						</label>
					</div>
					<div class="col-md-4">
						<label
							class="radio <?php echo !empty(Membership::get_user_plan_id($user_id, PLAN_LIMITED_TOKENS_1200_ANNUAL)) ? "activated" : "" ?>"
							data-plan-id="<?php echo PLAN_LIMITED_TOKENS_1200_ANNUAL ?>"
							data-token-amount="<?php echo Membership::get(PLAN_LIMITED_TOKENS_1200_ANNUAL)["tokens_social"]; ?>"
							data-price="<?php echo Membership::get(PLAN_LIMITED_TOKENS_1200_ANNUAL)["recurring_amount"]; ?>"
							<?php js_controller("modal.business_limited_tokens.plan_select") ?>>
							<strong>
								<?php echo Membership::get(PLAN_LIMITED_TOKENS_1200_ANNUAL)["tokens_social"]; ?> tokens
							</strong>
							<span>per month</span>
							<input type="radio" name="radio">
							<span class="radiomark"></span>
						</label>
					</div>
				</div>

			</div>
			<div class="pro_addon">
				<div class="p_head">
					<div class="row">
						<div class="col-md-6">
							<h5>SocialCatfish Pro</h5>
							<span><strong><span class="token_amount"><?php echo Membership::get(PLAN_LIMITED_TOKENS_250_MONTHLY)["tokens_social"]; ?></span></strong> tokens package</span>
						</div>
						<div class="col-md-6 text-right">
							<label <?php js_controller("modal.business_limited_tokens.price") ?>>$
								<?php echo Membership::get(PLAN_LIMITED_TOKENS_250_MONTHLY)["recurring_amount"]; ?> /
								month
							</label>
						</div>
					</div>
				</div>
				<div class="p_content">
					<ul>
						<li>High volume access to all the search tools</li>
						<li>Get <span class="token_amount"><?php echo Membership::get(PLAN_LIMITED_TOKENS_250_MONTHLY)["tokens_social"]; ?></span> searches for one month</li>
					</ul>
					<div class="card-wrapper">
						<div class="card-inner-wrapper" <?php js_controller("card_option.select") ?>>
							<div class="card-option selected-item">
								<?php

								$card_data = $user_credit_cards[0];
								$card_type = str_replace("American Express", "Amex", $card_data["cardType"]);
								$card_image = in_array($card_type, ["Amex", "Discover", "MasterCard", "Visa"]) ? $card_type : "default_cc";

								?>
								<img src="<?php echo $current_template_assets_url; ?>/images/<?php echo $card_image; ?>.svg"
									alt="Loading" decoding="async" loading="lazy" /> <span class="card">
									<?php echo $card_data["cardType"] . " " . str_repeat("• ", 4) . $card_data["last4"]; ?>
								</span><span class="expire-date">Expires
									<?php echo "{$card_data["expirationMonth"]}/{$card_data["expirationYear"]}"; ?>
								</span>
							</div>
							<div class="options-wrapper" <?php js_element_var("saved_cards") ?>>
								<?php
								foreach ($user_credit_cards as $index => $card_data) {

									$card_type = str_replace("American Express", "Amex", $card_data["cardType"]);
									$card_image = in_array($card_type, ["Amex", "Discover", "MasterCard", "Visa"]) ? $card_type : "default_cc";
									?>
									<div data-token="<?php echo $card_data["token"]; ?>"
										class="card-option <?php echo ($index == 0) ? "selected" : ""; ?>"><img
											src="<?php echo $current_template_assets_url; ?>/images/<?php echo $card_image; ?>.svg"
											alt="Loading" decoding="async" loading="lazy" /> <span class="card">
											<?php echo $card_data["cardType"] . " " . str_repeat("• ", 4) . $card_data["last4"]; ?>
										</span><span class="expire-date">Expires
											<?php echo "{$card_data["expirationMonth"]}/{$card_data["expirationYear"]}"; ?>
										</span><span class="icon si-done"></span></div>
									<?php
								}
								?>
								<div class="card-option paypal"><img
										src="<?php echo $current_template_assets_url; ?>/images/paypal-btn-new.svg"
										alt="Loading" decoding="async" loading="lazy" /><span
										class="icon si-done"></span></div>
								<div class="card-option add-new">Add New Payment <span class="si-plus"></span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="lt-unable hide" <?php js_controller("modal.business_limited_tokens.error_msg") ?>>
				<h5><i class="si-info"></i> Unable to process your payment. <span class="si-close"></span></h5>
				<p>Contact your payment provider for further details, enter another card, or select another payment
					method. If you continue to experience the issue please <a href="<?php echo RELATIVE_URL ?>contact/">Contact Us.</a></p>
			</div>
			<div class="row">
				<div class="col-md-6">
					<button type="button" class="btn btn-blue close-modal">Cancel</button>
				</div>
				<div class="col-md-6">
					<a href="#"
						class="btn btn-blue btn-pay <?php echo !empty(Membership::get_user_plan_id($user_id, PLAN_LIMITED_TOKENS_250_MONTHLY)) ? "deactivate" : "" ?>"
						<?php js_element_var("access"); ?>>
						<!-- <i class="btn-loading" <?php js_controller("modal.business_limited_tokens.loader") ?>></i> -->
						Pay Now
					</a>
				</div>
				<form action="<?php echo PAGE_URL_MEMBERSHIP_LEVELS ?>" <?php js_controller("modal.business_limited_tokens.new_payment_method") ?> method="post">
					<input type="hidden" name="token" value="<?php echo md5(time() * rand(100, 200)); ?>" />
					<input type="hidden" name="id" <?php js_controller("modal.business_limited_tokens.hdn_selected_plan") ?>
						value="<?php echo PLAN_LIMITED_TOKENS_250_MONTHLY ?>" />
					<input type="hidden" name="action" value="checkout" />
				</form>
			</div>


		</div>
	</div>



</div>
</div>
</div>