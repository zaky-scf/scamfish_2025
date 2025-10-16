<?php if ( has_nav_menu( 'menu-1' ) ) { ?>
    <div class="scfb-menu-mb">All Categories <span class="si-hamburger"></span></div>
    <?php
        wp_nav_menu( array(
            'theme_location' => 'menu-1',
            'menu_class' => 'scfb-menu'
        ) );
    ?>
<?php } ?>