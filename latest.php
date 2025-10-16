<?php
/*
 * Template Name: Latest
 * Template Post Type: page
 */

    get_header();

    $get_category_by_slug = get_category_by_slug( "site-improvements" );
    $slug_id = $get_category_by_slug->term_id;

    $currentPage = get_query_var('paged');  
    $posts = new WP_Query( array (
        'post_type' => 'post', // Default or custom post type
        'posts_per_page' => 10, // Max number of posts per page
        'paged' => $currentPage,
        'order' => 'DESC',
        'category__not_in' => array( $slug_id )
    ) );

?>

<div class="scfb-cat-banner" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/category-bg.jpg);">
    <div class="container">
        <h2>Latest</h2>
        <?php if ( category_description() ) : ?>
        <p><?php echo category_description(); ?></p>
        <?php endif; ?>
        <?php include_once( "template-parts/navigation-menu.php" ); ?>
    </div>
</div>
<div class="scfb-breadcrumb">
    <div class="container">
        <ul>
            <li><a href="<?php echo RELATIVE_BLOG_URL; ?>/"><?php echo BLOG_URL_PATH; ?></a></li>
            <li><a href="#">Latest</a></li>
        </ul>
    </div>
</div>
<?php if( $currentPage <= 0 ) { ?>
<div class="scfb-latest scfb-mb-overlay">
    <div class="container">
        <h2>Latest Posts</h2>
        <div class="row">
            <?php
                $recent_posts_1 = wp_get_recent_posts( array( 'numberposts' => '1', 'post_status' =>'publish', 'category__not_in' => array($slug_id) ) );
                foreach( $recent_posts_1 as $recent ){

                    $img_url = blog_get_optimized_image( wp_get_attachment_url( get_post_thumbnail_id( $recent["ID"] ), 'thumbnail' ), true );
                    if( ! $scf_functions->file_is_valid_image( $img_url ) ) $img_url =  get_template_directory_uri() . '/assets/img/no-image-found.jpg';
                    $get_category = get_the_category( $recent["ID"] );
                    $author_id = get_post_field( 'post_author', $recent["ID"] );
                    $author_name = get_the_author_meta( 'display_name', $author_id );
                    $author_url = get_author_posts_url( $author_id );
                    $get_date = get_the_modified_date( 'F jS, Y', $recent["ID"] );
                    $post_content = $scf_functions->scf_content_replace( $recent["post_content"], 300 );                               
            ?>
                <div class="col-md-6">
                    <div class="single-latest">
                        <a href="<?php echo get_permalink( $recent["ID"] ); ?>" class="scfb-img-overlay">
                            <img src="<?php echo $img_url; ?>" data-src="<?php echo $img_url; ?>" style="background-image: url(<?php echo $img_url; ?>);" alt="<?php echo $recent['post_title']; ?>" decoding="async" loading="lazy" />
                            <h4><?php echo $recent['post_title']; ?></h4>
                        </a>
                        <?php 
                            foreach( $get_category as $cat_index => $cat_row ) {
                                echo "<a href='" . get_category_link( $cat_row->cat_ID ) . "' class='scfb-category-btn'>" . $cat_row->name . "</a> ";
                            }
                        ?>
                        <h4><a href="<?php echo get_permalink( $recent["ID"] ); ?>"><?php echo $recent['post_title']; ?></a></h4>
                        <div class="scfb-post-date"><?php echo $get_date; ?>  by  <a href="<?php echo $author_url; ?>"><?php echo $author_name; ?></a></div>
                        <p><?php echo $post_content; ?></p>
                    </div>
                </div>
            <?php } ?>
            <div class="col-md-6">
                <div class="scfb-sidebar">
                    <?php
                        $recent_posts_2 = wp_get_recent_posts( array( 'numberposts' => '4', 'post_status' =>'publish', 'category__not_in' => array($slug_id) ) );
                        
                        foreach( $recent_posts_2 as $recent_index => $recent ){
                            if( $recent_index == 0 ) continue;
                            $img_url = blog_get_optimized_image( wp_get_attachment_url( get_post_thumbnail_id( $recent["ID"] ), 'thumbnail' ) );
                            if( ! $scf_functions->file_is_valid_image( $img_url ) ) $img_url =  get_template_directory_uri() . '/assets/img/no-image-found.jpg';
                            $get_category = get_the_category( $recent["ID"] );
                            $author_id = get_post_field( 'post_author', $recent["ID"] );
                            $author_name = get_the_author_meta( 'display_name', $author_id );
                            $author_url = get_author_posts_url( $author_id );
                            $get_date = get_the_modified_date( 'F jS, Y', $recent["ID"] );
                            $post_content = $scf_functions->scf_content_replace( $recent["post_content"], 45 ); 
                    ?>
                        <div class="scfb-post-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="<?php echo get_permalink( $recent["ID"] ); ?>" class="scfb-img-overlay">
                                        <img src="<?php echo $img_url; ?>" data-src="<?php echo $img_url; ?>" style="background-image: url(<?php echo $img_url; ?>);" alt="<?php echo $recent['post_title']; ?>" decoding="async" loading="lazy" />
                                        <h4><?php echo $recent['post_title']; ?></h4>
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <?php 
                                        foreach( $get_category as $cat_index => $cat_row ) {
                                            echo "<a href='" . get_category_link( $cat_row->cat_ID ) . "' class='scfb-category-btn'>" . $cat_row->name . "</a> ";
                                        }
                                    ?>
                                    <h4><a href="<?php echo get_permalink( $recent["ID"] ); ?>"><?php echo $recent['post_title']; ?></a></h4>
                                    <div class="scfb-post-date"><?php echo $get_date; ?>  by  <a href="<?php echo $author_url; ?>"><?php echo $author_name; ?></a></div>
                                    <p><?php echo $post_content; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<div class="scfb-items">
    <div class="container"> 
        <h2>All Posts</h2>
        <?php
            if ( $posts->have_posts() ) :
                while ($posts->have_posts()) : $posts->the_post();
                    $img_url = blog_get_optimized_image( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'thumbnail' ) );
                    if( ! $scf_functions->file_is_valid_image( $img_url ) ) $img_url =  get_template_directory_uri() . '/assets/img/no-image-found.jpg';
                    $get_date = get_the_modified_date();
                    $author_id = get_post_field( 'post_author', get_the_ID() );
                    $author_name = get_the_author();
                    $author_url = get_author_posts_url( $author_id );
                    $post_content = $scf_functions->scf_content_replace( get_the_content(), 100 );
            ?>

                            <div class="scfb-post-item scfb-mb-col2">
                                <div class="row">
                                    <div class="col-xs-4 col-md-4">
                                        <a href="<?php echo get_permalink(); ?>"><img src="<?php echo $img_url; ?>" data-src="<?php echo $img_url; ?>" style="background-image: url(<?php echo $img_url; ?>);" alt="<?php echo get_the_title(); ?>" decoding="async" loading="lazy" /></a>
                                    </div>
                                    <div class="col-xs-8 col-md-8">
                                        <h4><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></h4>
                                        <div class="scfb-post-date"><?php echo $get_date; ?>  by  <a href="<?php echo $author_url; ?>"><?php echo $author_name; ?></a></div>
                                        <p><?php echo $post_content; ?></p>
                                    </div>
                                </div>
                            </div>

            <?php
                endwhile;
            endif;
            
        ?>
        <div class="row">
        <?php 
            $total_pages = $posts->max_num_pages;
            $number_distance = 10;
            if( $total_pages > $number_distance ) { 
        ?>
                <div class="col-md-4 scf-dr-filter">
                    <div class="dr-filter-row">
                        <?php
                            if( $total_pages < $number_distance ) $number_distance = $total_pages;

                            if( $total_pages < $number_distance ) {
                                $total_options = 1;
                            } else {
                                $total_options = $total_pages / $number_distance;
                            }   
                            
                            if( is_float ( $total_options) ) $total_options++;
                        ?>
                        <h5>Jump to Page: </h5>                    
                        <div class="dr_filter_dropdown number_filter_php">
                            <button class="scf-form" type="button" <?php js_controller("directory.default_nember_pagin"); ?>>1 - <?php echo $number_distance; ?><span class="si-triangle-down"></span></button>
                            <ul class="dr_filter_range default_nember_pagin">
                                <?php 
                                    for( $x=1;$x <= $total_options;$x++ ) {
                                        $start_number = ( $x * $number_distance ) - $number_distance + 1;
                                        $end_number = ( $x * $number_distance );
                                ?>
                                    <li>
                                        <a href="#" <?php js_controller("directory.default_nember_filter"); ?>><?php echo $start_number . " - " . $end_number; ?></a>
                                        <ul class="dr_filter_values default_nember_value">
                                            <?php 
                                                for( $y=$start_number;$y<=$end_number;$y++ ) {
                                                    if( $total_pages < $y ) continue;
                                            ?>
                                                <li><a href="<?php echo get_pagenum_link() . "page/" . $y . "/";  ?>"><?php echo $y; ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                <?php } ?>
                            </ul>                        
                        </div>
                    </div>
                </div>
            <?php } ?> 
            <div class="<?php echo ( $total_pages > $number_distance )? 'col-md-8' : 'col-md-12'; ?>">
                <?php

                    echo "<div class='scfb-pagination'>" . paginate_links(array(
                        'total' => $posts->max_num_pages,
                        'prev_text' => __('<span class="si-left"></span>'),
                        'next_text' => __('<span class="si-right"></span>')
                    )) . "</div>";
					
					wp_reset_postdata();
                    
                ?>
            </div>           
        </div>
    </div>
</div>

<?php include_once( "template-parts/search-section.php" ); ?>
<?php get_footer(); ?>