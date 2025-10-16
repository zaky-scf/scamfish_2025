<?php 
//Gamification your self search
global $user_id, $user_data, $header_version, $include_popup, $popular_data, $list_of_countries, $list_of_states, $current_search_type, $ras_no_num, $fullUrl, $ris_active_plans_only;
$name_search_val='';
$email_search_val=htmlspecialchars( request("email") );
$phone_search_val='';

$blocked_user_verification = "false";
if ( empty($user_data["email_verified"]) && ! empty($user_data["forced_email_verification"]) ) {
    $include_popup[] = "blocked_user_verification";
    $include_popup[] = "blocked_user_verification_sent";
    $blocked_user_verification = "true";
}

if( $header_version == "full"  && $user_id && isset($_SESSION["gamification"]['current_challange'])&&$_SESSION["gamification"]['current_challange']=='task_2'){
    $name_search_val=$_SESSION['user']["first_name"].' '.$_SESSION['user']["last_name"];
    $email_search_val=$_SESSION['user']["email"];
    $phone_search_val=$_SESSION['user']["mobile_number"]?$_SESSION['user']["mobile_number"]:$_SESSION['user']["phone_number"];
    $ras_address=$_SESSION['user']["address_1"]!=''?($_SESSION['user']["address_1"].' '.$_SESSION['user']["address_2"].' '.$_SESSION['user']["city"].' '.$_SESSION['user']["state"].' '.$_SESSION['user']["postal_code"].' '.$_SESSION['user']["country"]):'';
}

if ( empty( $hide_main_search ) ) { ?>
 <?php
// Get the 'lookup' parameter from the URL
$lookup = isset($_GET['lookup']) ? $_GET['lookup'] : ''; // Default to empty if not set

// Map lookup values to their respective types
$type = '';

if ($lookup === 'name') {
    $type = 'name-search';
} elseif ($lookup === 'email') {
    $type = 'email-search';
} elseif ($lookup === 'address') {
    $type = 'address-search';
} elseif ($lookup === 'phone') {
    $type = 'phone-search';
}elseif ($lookup === 'image') {
    $type = 'image-search';
}
elseif ($lookup === 'username') {
    $type = 'username-search';
}
 else {
    $type = 'name-search'; // Default, or handle unknown cases
}
?>
<div class="search-form-2020" <?php js_controller("search.form") ?>>
    <div class="row tabs-content">
        <div class="scf-tooltip-badge-target" data-badge-number="1" data-badge-position="badge-bl"></div>
        <div class="col-sm-3">

            <div class="tabs" data-pause="<?php echo ( ! empty( $paused_account_regular ) || ! empty( $paused_account_ris ) ) ? "true" : "false"; ?>">
                <div class="dropdown-overlay" <?php js_controller("search.form.dropdown_overlay") ?>></div>
<?php
    if ( $header_version != "full" ) {
?>
                <div class="active-tab <?php echo ($type === 'name-search') ? 'no_action_active' : ''; ?> <?php echo ( SEARCH_TYPE_NAME == $current_search_type ) ? " no_action_active" : ""; ?>">
                    <a data-item="0" data-type="<?php echo SEARCH_TYPE_NAME; ?>" href="<?php echo RELATIVE_URL; ?>" class='<?php echo ( SEARCH_TYPE_NAME == $current_search_type ) ? " active" : ""; ?>'><i class="si-user"></i> <span>Name</span></a>
                </div>
                <div class="hide-tabs">
                    <a data-item="1" data-type="<?php echo SEARCH_TYPE_EMAIL; ?>" href="<?php echo PAGE_URL_REVERSE_EMAIL_SEARCH; ?>" class='<?php echo ( SEARCH_TYPE_EMAIL == $current_search_type ) ? " active" : ""; ?> <?php echo ($type === "email-search") ? " active" : ""; ?>'><i class="si-email"></i> <span>Email</span></a>
                    <a data-item="2" data-type="<?php echo SEARCH_TYPE_PHONE; ?>" href="<?php echo PAGE_URL_REVERSE_PHONE_SEARCH; ?>" class='<?php echo ( SEARCH_TYPE_PHONE == $current_search_type ) ? " active" : ""; ?> <?php echo ($type === "phone-search") ? " active" : ""; ?>'><i class="si-phone"></i> <span>Phone</span></a>
                    <a data-item="3" data-type="<?php echo SEARCH_TYPE_USERNAME; ?>" href="<?php echo PAGE_URL_REVERSE_USERNAME_SEARCH; ?>" class='<?php echo ( SEARCH_TYPE_USERNAME == $current_search_type ) ? " active" : ""; ?> <?php echo ($type === "username-search") ? " active" : ""; ?>'><i class="si-username"></i> <span>Username</span></a>
                    <a data-item="4" data-type="<?php echo SEARCH_TYPE_RAS; ?>" href="<?php echo PAGE_URL_REVERSE_ADDRESS_SEARCH; ?>" class='<?php echo ( SEARCH_TYPE_RAS == $current_search_type ) ? " active" : ""; ?> address_search_menue <?php echo ($type === "address-search") ? " active" : ""; ?>'><i class="si-location"></i> <span>Address</span></a>
                    <a data-item="5" data-type="<?php echo SEARCH_TYPE_IMAGE; ?>" href="<?php echo PAGE_URL_REVERSE_IMAGE_SEARCH; ?>" class='<?php echo ( SEARCH_TYPE_IMAGE == $current_search_type || SEARCH_TYPE_BS == $current_search_type  || $ris_active_plans_only ) ? " active" : ""; ?> <?php echo ($type === "image-search") ? " active" : ""; ?>'><i class="si-image"></i> <span>Image</span></a>
                </div>
<?php
    } else {
?>
                <a data-item="0" data-type="<?php echo SEARCH_TYPE_NAME; ?>" href="<?php echo RELATIVE_URL; ?>" class='<?php echo ( SEARCH_TYPE_NAME == $current_search_type ) ? " active" : ""; ?> <?php echo ($type === "name-search") ? " active" : ""; ?>'><i class="si-user"></i> <span>Name</span></a>
                <a data-item="1" data-type="<?php echo SEARCH_TYPE_EMAIL; ?>" href="<?php echo PAGE_URL_REVERSE_EMAIL_SEARCH; ?>" class='<?php echo ( SEARCH_TYPE_EMAIL == $current_search_type ) ? " active" : ""; ?> <?php echo ($type === "email-search") ? " active" : ""; ?>'><i class="si-email"></i> <span>Email</span></a>
                <a data-item="2" data-type="<?php echo SEARCH_TYPE_PHONE; ?>" href="<?php echo PAGE_URL_REVERSE_PHONE_SEARCH; ?>" class='<?php echo ( SEARCH_TYPE_PHONE == $current_search_type ) ? " active" : ""; ?> <?php echo ($type === "phone-search") ? " active" : ""; ?>'><i class="si-phone"></i> <span>Phone</span></a>
                <a data-item="3" data-type="<?php echo SEARCH_TYPE_USERNAME; ?>" href="<?php echo PAGE_URL_REVERSE_USERNAME_SEARCH; ?>" class='<?php echo ( SEARCH_TYPE_USERNAME == $current_search_type ) ? " active" : ""; ?> <?php echo ($type === "username-search") ? " active" : ""; ?>'><i class="si-username"></i> <span>Username</span></a>
                <a data-item="4" data-type="<?php echo SEARCH_TYPE_RAS; ?>" href="<?php echo PAGE_URL_REVERSE_ADDRESS_SEARCH; ?>" class='<?php echo ( SEARCH_TYPE_RAS == $current_search_type ) ? " active" : ""; ?> address_search_menue <?php echo ($type === "address-search") ? " active" : ""; ?>'><i class="si-location"></i> <span>Address</span></a>
                <a data-item="5" data-type="<?php echo SEARCH_TYPE_IMAGE; ?>" href="<?php echo PAGE_URL_REVERSE_IMAGE_SEARCH; ?>" class='<?php echo ( SEARCH_TYPE_IMAGE == $current_search_type || SEARCH_TYPE_BS == $current_search_type ) ? " active" : ""; ?> <?php echo ($type === "image-search") ? " active" : ""; ?>'><i class="si-image"></i> <span>Image</span></a>
<?php } ?>
            </div>
        </div>
        <div class="col-sm-7" <?php js_controller( "search.input.all" ) ?>>
            <div class="row list <?php echo ( SEARCH_TYPE_NAME == $current_search_type ) ? " active" : ""; ?> name-list">
                <div class="col-sm-6 border-rt">
                    <input type="text" placeholder="Enter name here" aria-label="Enter name here" value="<?php echo $name_search_val ?>" maxlength="100" name="full_name" aria-required="true">
                    <label class="scf-tooltip-val">Start Here</label>
                </div>
                <?php $country_list_full = array_merge( [ "US" => "United States" ], $list_of_countries ); ?>
                <div class="col-sm-6 si-triangle-down">
                    <?php if(!empty($list_of_countries)) html_field_select( "country", $country_list_full, "", false, "", "", false );
                    ?>
                </div>
                
            </div>
            <div class="row list <?php echo ( SEARCH_TYPE_EMAIL == $current_search_type ) ? " active" : ""; ?>">
                <input type="text" placeholder="Enter email here" name="email" maxlength="100" value="<?php echo $email_search_val; ?>" >
                <label class="scf-tooltip-val">Start Here: Search an Email</label>
            </div>
            <div class="row list <?php echo ( SEARCH_TYPE_PHONE == $current_search_type ) ? " active" : ""; ?>">
                <input type="text" placeholder="Enter phone here" name="phone" maxlength="12" value="<?php echo $phone_search_val ?>" <?php js_controller("search.input.phone"); ?>>
                <label class="scf-tooltip-val">Start Here: Search a Phone Number</label>
            </div>
            <div class="row list <?php echo ( SEARCH_TYPE_USERNAME == $current_search_type ) ? " active" : ""; ?>">
                <input type="text" placeholder="Enter username here" name="username" maxlength="100">
                <label class="scf-tooltip-val">Start Here: Search a Username</label>
            </div>
            <div class="row list <?php echo ( SEARCH_TYPE_RAS == $current_search_type ) ? " active" : ""; ?>">
                <input type="text" placeholder="Enter address here" name="address" maxlength="100" <?php js_controller("search.input.address"); ?>  autocomplete="off" <?php if (isset($ras_address)) {
                        echo 'value="'.$ras_address.'"';
                    } ?>>
                <label class="scf-tooltip-val"><?php echo (isset($ras_address) && isset($ras_no_num) ?  "Incomplete Address. To search for an address start typing number and street in the address search field." : "Start Here: Search an Address" ); ?></label>
            </div>
            <?php
            $has_ris_pro = in_array(PLAN_RIS_BOOSTED_UNLIMITED, $user_data["active_plans"]);
            //For Activation for RIS pro for the users who completed all the gamification tasks     
            if (isset($_SESSION["gamification"]['user_record']) && $_SESSION["gamification"]['user_record']['is_completed'] == 1 && $_SESSION["gamification"]['user_record']['reward_status'] == 1 && $_SESSION["gamification"]['user_record']['reward_type'] == 2) {
                $has_ris_pro = true;
            }
            ?>
            <div class="row list image <?php echo ( SEARCH_TYPE_IMAGE == $current_search_type  || SEARCH_TYPE_BS == $current_search_type) ? " active" : ""; ?>" <?php  (!empty($user_id) && $has_ris_pro && empty($late_payment_plans["image_search"]) && $user_has_ris_active_subcription && !isset($_SESSION["gamification"]['single_image'])) ? js_controller("search.input.file_select") : ""; ?>>
                <span>Browse and upload image here </span>
                <?php if(!empty($user_id) && $has_ris_pro && empty($late_payment_plans["image_search"]) && $user_has_ris_active_subcription && !isset($_SESSION["gamification"]['single_image'])) { ?>                    
                    <label class="scf-tooltip-val">Start Here: Search an Image</label>
                <?php } else {?>
                    <form method="post">
                        <input type="file" name="image[]" aria-label="Search an Image" aria-required="true" accept="image/*" <?php if($blocked_user_verification == "true") { ?> <?php js_controller("modal.users_blocked.show"); } else { js_controller("search.input.image_single"); } ?>>
                        <label class="scf-tooltip-val">Start Here: Search an Image</label>
                        <input type="hidden" name="search_type" value="4" />
                    </form>                
                    <?php }?>
                <div class="file-progress-wrapper">
                    <div class="file-progress-value">Uploading...</div>
                    <div class="file-progress">
                        <div class="file-progress-value">Uploading...</div>
                    </div>
                </div>
            </div>
            <label class="scf-tooltip-val anim" style="display: block;"></label>
        
            <?php if (strpos($fullUrl, "/scamfish") === false ){?>
            <div class="search-example">
                <div class="example-type name-search <?php echo ( SEARCH_TYPE_NAME == $current_search_type ) ? " active" : ""; ?>">
                    <p class="example-title">Name Search Examples</p>
                    <ul class="sample-list">
                    <?php 
                        $names_types = unserialize($popular_data["names"]);
                        $count = 0;
                        foreach($names_types as $name_examples){
                            echo ("<li>".ucfirst($name_examples['first_name'])." ".ucfirst($name_examples['last_name'])."</li>");
                            $count++;
                            if($count == 6){
                                break;
                            }
                        }   
                        ?>
                    </ul>
                    <p class="note"><span class="si-tip"></span> To get more accurate results, enter the full name including at least <span>First name</span>, <span>Middle name</span> and <span>Last name</span>.</p>
                </div>

                <div class="example-type email-search <?php echo ( SEARCH_TYPE_EMAIL == $current_search_type ) ? " active" : ""; ?>">
                    <p class="example-title">Email Search Examples</p>
                    <ul class="sample-list">
                    <?php 
                        $emails_types = unserialize($popular_data["emails"]);
                        foreach($emails_types as $email_examples){
                            echo ("<li>".$email_examples['query']."</li>");
                        }
                        ?>
                    </ul>
                </div>

                <div class="example-type phone-search <?php echo ( SEARCH_TYPE_PHONE == $current_search_type ) ? " active" : ""; ?>">
                    <p class="example-title">Phone Search Examples</p>
                    <ul class="sample-list">
                    <?php 
                        $phones_types = unserialize($popular_data["phone"]);
                        foreach($phones_types as $phone_examples){
                            echo ("<li>".$phone_examples['query']."</li>");
                        }
                        ?>
                    </ul>
                </div>

                <div class="example-type username-search <?php echo ( SEARCH_TYPE_USERNAME == $current_search_type ) ? " active" : ""; ?>">
                    <p class="example-title">Username Search Examples</p>
                    <ul class="sample-list">
                    <?php 
                        $usernames_types = unserialize($popular_data["usernames"]);
                        $count = 0;
                        foreach($usernames_types as $username_examples){
                            echo ("<li>".$username_examples['query']."</li>");
                            $count++;
                            if($count == 6){
                                break;
                            }
                        }   
                        ?>
                    </ul>
                </div>

                <div class="example-type address-search <?php echo ( SEARCH_TYPE_RAS == $current_search_type ) ? " active" : ""; ?>">
                    <p class="example-title">Address Search Examples</p>
                    <ul class="sample-list single-col">
                    <?php 
                        $addresses_types = unserialize($popular_data["address"]);
                        $count = 0;
                        foreach($addresses_types as $address_examples){
                            echo ("<li>".$address_examples['address']."</li>");
                            $count++;
                            if($count == 6){
                                break;
                            }
                        }   
                        ?>
                    </ul>
                    <p class="note"><span class="si-tip"></span> Start typing the initial part of the address and select from the addresses given dropdown afterward.</p>
                </div>
            </div>
            <?php }?>
        </div>
        <div class="col-sm-2 text-center">
            <button type="button" class="go" <?php js_controller("search.go"); ?>>Search</button>
        </div>
    </div>
    <!-- Bulk -->
   <?php if(!empty($user_id) && $has_ris_pro && empty($late_payment_plans["image_search"]) && $user_has_ris_active_subcription && !isset($_SESSION["gamification"]['single_image'])) { ?>

    <div class="bulk-upload-popup" <?php js_controller("search.input.init"); ?>>
        <div class="ris-drag-box" id="browse">
                <span class="si-close-circle close-modal" <?php js_controller("search.input.bulk_upload_hide"); ?>></span>
            <span class="maximum_limit_reached hide">
                <i class="si-info"></i>
                <h4>Upload limit reached. ( <?php echo ($user_tokens["image"]["available"] < 20) ? $user_tokens["image"]["available"] : 20; ?>/<?php echo ($user_tokens["image"]["available"] < 20) ? $user_tokens["image"]["available"] : 20; ?> )</h4>
            </span>
            <span class="upload_image">
			    <h4>Drag and drop your photos</h4>
                <span class="btn">
                    <form method="post">
                        <input type="file" class="btn image_search_file_upload"  id="fileupload" name="image[]" aria-label="Search an Image" aria-required="true" multiple="true" accept="image/*" max-files="<?php echo ($user_tokens["image"]["available"] < 20) ? $user_tokens["image"]["available"] : 20; ?>" <?php js_controller("search.input.image"); ?>>
                        <input type="hidden" name="search_type" value="4" />
                    </form>
                    <i class="si-plus"></i> Browse Photos
                </span>
            </span>
            <div class="bulk-ris-progress search_input_image_count_uploading">
                <p><span class="search_input_image_count">0</span> images uploading... <span>0%</span></p>
                <div class="scf-progress-bar">
                    <div class="value" style="width: 0%;"></div>
                </div>
            </div>
            <p class="image_duplicates"><i class="si-close-circle"></i><span>0</span> duplicate image(s) not uploaded.</p>
			<p>Max file size 10MB. Supports JPG, JPEG, PNG <br/> Upload Count: <span class="search_input_image_count">0</span>/<?php echo ($user_tokens["image"]["available"] < 20) ? $user_tokens["image"]["available"] : 20; ?></p>
            <p class="multiple_face_disabled"><i class="si-info"></i>Multiple-face detection disabled.</p>
		</div>
        <div class="uploaded-images">
            <ul>
            </ul>
        </div>
        <button class="btn btn-dark-green disabled" <?php js_controller("search.go"); ?>>Continue to Search</button>
        <br/>
        <br/>
        <label class="scf-tooltip-val">Start Here: Search an Image</label>
    </div>
    <?php } ?>
    
    <p class="respect-privacy"><span class="si-secured-fill"></span> We Respect Your Privacy.</p>
</div>
<?php } ?>
<?php /* AB Test: ab_us_only CSI-4577 : END*/ ?>
<script>
    var uploaded_images = <?php echo json_encode([]) ?>;
</script>