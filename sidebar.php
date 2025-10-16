<?php global $current_template_assets_url, $common_assets_url; ?>
<div class="scfb-main-sidebar">
    <div class="scf-full-search scfb-compact-search">
        <?php
            $header_version = "full"; //change later
            global $current_search_type;
            global $list_of_countries;
            global $list_of_states;
            include( get_template_directory() . '/template-parts/search.php' ); 
        ?>            
    </div>
    <?php
        if ( class_exists( 'scf_functions' ) ) $scf_functions = new scf_functions();        
        $random_populer = rand(0, 10);
        $important_posts = get_blog_posts_by_view_count( $random_populer,2 );
        foreach( $important_posts as $row ){
            $img_url = blog_get_optimized_image( wp_get_attachment_url( get_post_thumbnail_id( $row["ID"] ), 'thumbnail' ) );
            if( ! $scf_functions->file_is_valid_image( $img_url ) ) $img_url =  get_template_directory_uri() . '/assets/img/no-image-found.jpg';
            $author_id = get_post_field( 'post_author', $row["ID"] );
            $author_name = get_the_author_meta( 'display_name', $author_id );
            $get_date = get_the_modified_date( 'F jS, Y', $row["ID"] );
            $author_url = get_author_posts_url( $author_id );
            $post_content = $scf_functions->scf_content_replace( $row['post_content'], 100 );
    ?>
        <div class="scfb-post-item">
            <a href="<?php echo get_permalink( $row["ID"] ); ?>"><img src="<?php echo $img_url; ?>" data-src="<?php echo $img_url; ?>" style="background-image: url(<?php echo $img_url; ?>);" alt="<?php echo $row['post_title']; ?>" decoding="async" loading="lazy" /></a>
            <h4><a href="<?php echo get_permalink( $row["ID"] ); ?>"><?php echo $row['post_title']; ?></a></h4>
            <div class="scfb-post-date"><?php echo $get_date; ?>  by  <a href="<?php echo $author_url; ?>"><?php echo $author_name; ?></a></div>
            <p><?php echo $post_content; ?></p>
        </div>  
    <?php } ?> 
    <?php if ( is_active_sidebar( 'scf_post_sidebar' ) ) { ?>
        <ul class="sidebar">
            <?php dynamic_sidebar('scf_post_sidebar' ); ?>
        </ul>
    <?php } ?>
</div>