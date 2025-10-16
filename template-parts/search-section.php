<div class="container">
    <div class="scfb-search">
        <h2>Looking for someone you know ?</h2>
        <?php
            $header_version = "full"; //change later
            if( wp_is_mobile_scf() ) {
                $scfb_search = "scf-full-search scfb-compact-search";
            } else {
                $scfb_search = "scf-full-search";
            }
        ?>
        <div class="<?php echo $scfb_search; ?>">
            <?php      
                include get_template_directory() . '/template-parts/search.php';     
            ?>
        </div>
    </div>
</div>