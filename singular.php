<?php
/**
 * The template for displaying single posts and pages.
 *
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
<div class="scfb-cat-banner scfb-singuler-nav no-background">
    <div class="container">
        <?php include_once( "template-parts/navigation-menu.php" ); ?>
    </div>
</div>
<div class="scfb-breadcrumb scfb-singuler-breadcrumb">
    <div class="container">
        <ul>
            <li><a href="<?php echo RELATIVE_BLOG_URL; ?>"><?php echo BLOG_URL_PATH; ?></a></li>
            <li><a href="<?php echo get_category_link( $get_category[0]->cat_ID ); ?>"><?php echo $get_category[0]->name; ?></a></li>
            <li><a href="#"><?php the_title(); ?></a></li>
        </ul>
    </div>
</div>
<div class="scfb-main-section scfb-single">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8">
                <div class="scfb-single-section">
                    <div class="sinlge-thumbnail-mb">
                        <?php
                            $post_thumbnail = blog_get_optimized_image( get_the_post_thumbnail_url(), true );
                            if( ! $scf_functions->file_is_valid_image( $post_thumbnail ) ) $post_thumbnail =  get_template_directory_uri() . '/assets/img/no-image-found.jpg';
                            if( ! empty ( $youtube_video ) ) { echo $youtube_video; } else {
                        ?>
                        <img src="<?php echo $post_thumbnail; ?>" data-src="<?php echo $post_thumbnail; ?>" class="scfb-thumbnail" style="background-image: url(<?php echo $post_thumbnail; ?>);" alt="<?php the_title(); ?>" decoding="async" loading="lazy" />
                        <?php } ?>
                    </div>
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    <div class="scfb-date-cat">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <img src="<?php echo $author_img; ?>" data-src="<?php echo $author_img; ?>" class="author-img" style="background-image: url(<?php echo $author_img; ?>);" alt="<?php get_the_author(); ?>" decoding="async" loading="lazy" />
                                <label><a href="<?php echo $author_url_main; ?>"><?php echo $author_name_main; ?></a></label>
                                <strong><?php echo get_the_modified_date(); ?></strong>
                            </div>
                            <div class="col-xs-12 col-md-6"><label class="scb-cat">Category: </label>
                                <?php
                                    foreach( $get_category as $cat_index => $cat_row ) {
                                        echo "<a href='" . get_category_link( $cat_row->cat_ID ) . "'>" . $cat_row->name . "</a>";
                                        echo ( $cat_index + 1 < count( $get_category ) )? ", " : "";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="sinlge-thumbnail-lg">
                        <?php
                            if( ! empty ( $youtube_video ) ) { echo $youtube_video; } else {
                        ?>
                        <img src="<?php echo $post_thumbnail; ?>" data-src="<?php echo $post_thumbnail; ?>" class="scfb-thumbnail" style="background-image: url(<?php echo $post_thumbnail; ?>);" alt="<?php the_title(); ?>" decoding="async" loading="lazy" />
                        <?php } ?>
                    </div>
                    <div class="scfb-post-content">
                        <?php the_content(); ?>
                    </div>
                </div>
                <div class="scfb-breadcrumb scfb-singuler-breadcrumb scfb-singuler-breadcrumb-mb">
                    <ul>
                        <li><a href="<?php echo RELATIVE_BLOG_URL; ?>/"><?php echo BLOG_URL_PATH; ?></a></li>
                        <li><a href="<?php echo get_category_link( $get_category[0]->cat_ID ); ?>"><?php echo $get_category[0]->name; ?></a></li>
                        <li><a href="#"><?php the_title(); ?></a></li>
                    </ul>
                </div>
                <div class="scfb-post-navigation">
                    <div class="row">
                        <div class="col-xs-6 left-btn">
                            <?php
                                if( get_adjacent_post(false, '', true) ) {
                                    previous_post_link('%link', '<div class="btn btn-blog-view"><span class="si-left"></span> Previous Article</div>');
                                } else {
                                    $first = new WP_Query('posts_per_page=1&order=DESC');
                                    $first->the_post();
                                    echo '<a href="' . get_permalink() . '"><div class="btn btn-blog-view"><span class="si-left"></span> Previous Article</div></a>';
                                    wp_reset_query();
                                };
                            ?>
                        </div>
                        <div class="col-xs-6 text-right right-btn">
                            <?php
                                if( get_adjacent_post(false, '', false) ) {
                                    next_post_link('%link', '<div class="btn btn-blog-view">Next Article<span class="si-right"></span></div>');
                                } else {
                                    $last = new WP_Query('posts_per_page=1&order=ASC');
                                    $last->the_post();
                                    echo '<a href="' . get_permalink() . '"><div class="btn btn-blog-view">Next Article<span class="si-right"></span></div></a>';
                                    wp_reset_query();
                                };
                            ?>
                        </div>
                    </div>
                </div>

                <?php // include_once( "template-parts/email_subscribe.php" ); ?>
                
            </div>
            <div class="col-lg-3 col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<div class="scfb-items scfb-items-2col">
    <div class="container">
        <div class="row item-title">
            <div class="col-md-12">
                <h2>Related Articles</h2>
            </div>
        </div>
        <div class="row">
            <?php
                $related_posts = get_posts( array( 'numberposts' => 4, 'category_name' => $get_category[0]->slug, 'order' => 'DESC', ) );
                foreach( $related_posts as $row ){
                    $img_url = blog_get_optimized_image( wp_get_attachment_url( get_post_thumbnail_id( $row->ID ), 'thumbnail' ) );
                    if( ! $scf_functions->file_is_valid_image( $img_url ) ) $img_url =  get_template_directory_uri() . '/assets/img/no-image-found.jpg';
                    $author_id = get_post_field( 'post_author', $row->ID );
                    $author_name = get_the_author_meta( 'display_name', $author_id );
                    $get_date = get_the_modified_date( 'F jS, Y', $row->ID );
                    $author_url = get_author_posts_url( $author_id );
                    $post_content = $scf_functions->scf_content_replace( $row->post_content, 50 );
            ?>
            <div class="col-md-6">
                <div class="scfb-post-item scfb-mb-col2">
                    <div class="row">
                        <div class="col-xs-4 col-md-4">
                            <a href="<?php echo get_permalink( $row->ID ); ?>"><img src="<?php echo $img_url; ?>" data-src="<?php echo $img_url; ?>" style="background-image: url(<?php echo $img_url; ?>);" alt="<?php echo $row->post_title; ?>" decoding="async" loading="lazy" /></a>
                        </div>
                        <div class="col-xs-8 col-md-8">
                            <h4><a href="<?php echo get_permalink( $row->ID ); ?>"><?php echo $row->post_title; ?></a></h4>
                            <div class="scfb-post-date"><?php echo $get_date; ?>  by  <a href="<?php echo $author_url; ?>"><?php echo $author_name; ?></a></div>
                            <p><?php echo $post_content; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php
get_footer();