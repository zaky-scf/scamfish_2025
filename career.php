<?php
/*
 * Template Name: Career
 * Template Post Type: page
 */

    get_header();

    $post = get_post();
    setup_postdata( $post );

    $get_category = get_the_category( get_the_ID() );
    $author_id_main = get_post_field( 'post_author', get_the_ID() );
    $author_name_main = get_the_author_meta( 'display_name', $author_id_main );
    $author_img = get_avatar_url( $author_id_main );
    if( ! $scf_functions->file_is_valid_image( $author_img ) ) $author_img =  get_template_directory_uri() . '/assets/img/avatar.png';
    $author_url_main = get_author_posts_url( $author_id_main );

    $youtube_video = get_post_meta($post->ID, 'video_iframe', true);
    $search_type = get_post_meta($post->ID, 'search_type', true);

    if( $search_type == "address" ) {
        $current_search_type = SEARCH_TYPE_RAS;
    } else if( $search_type == "username" ) {
        $current_search_type = SEARCH_TYPE_USERNAME;
    } else if( $search_type == "email" ) {
        $current_search_type = SEARCH_TYPE_EMAIL;
    } else if( $search_type == "phone" ) {
        $current_search_type = SEARCH_TYPE_PHONE;
    } else if( $search_type == "image" ) {
        $current_search_type = SEARCH_TYPE_IMAGE;
    } else {
        $current_search_type = SEARCH_TYPE_NAME;
    }

?>
<div class="scfb-main-section scfb-single">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="scfb-single-section">
                    <div class="sinlge-thumbnail-mb">
                        <?php                        
                            $post_thumbnail = blog_get_optimized_image( get_the_post_thumbnail_url() );
                            if( ! $scf_functions->file_is_valid_image( $post_thumbnail ) ) $post_thumbnail =  get_template_directory_uri() . '/assets/img/no-image-found.jpg';
                            if( ! empty ( $youtube_video ) ) { echo $youtube_video; } else {
                        ?>
                        <img src="<?php echo $post_thumbnail; ?>" data-src="<?php echo $post_thumbnail; ?>" class="scfb-thumbnail" style="background-image: url(<?php echo $post_thumbnail; ?>);" alt="<?php the_title(); ?>" />
                        <?php } ?>
                    </div>
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    <div class="sinlge-thumbnail-lg">
                        <?php
                            if( ! empty ( $youtube_video ) ) { echo $youtube_video; } else {
                        ?>
                        <img src="<?php echo $post_thumbnail; ?>" data-src="<?php echo $post_thumbnail; ?>" class="scfb-thumbnail" style="background-image: url(<?php echo $post_thumbnail; ?>);" alt="<?php the_title(); ?>" />
                        <?php } ?>  
                    </div>                  
                    <div class="scfb-post-content">
                        <?php the_content(); ?>
                    </div>
                </div>
                <?php //include_once( "template-parts/email_subscribe.php" ); ?>
                <br /><br />      
            </div>
        </div>
    </div>
</div>
<?php
get_footer();