<?php
    /**
    * A Simple Subcategory Template
    */
    
    get_header(); 
    $current_page = get_queried_object();
    $category     = $current_page->name;

    $currentPage = get_query_var('paged');
 
    $posts = new WP_Query( array (
        'post_type' => 'post', // Default or custom post type
        'posts_per_page' => 10, // Max number of posts per page
        'category_name' => $current_page->slug, // Your category (optional)
        'paged' => $currentPage,
        'order' => 'DESC'
    ) );

    $parent = get_category( $current_page->category_parent );

    if ( ! is_wp_error( $parent ) && $parent ) {
        $parent_slug = $parent->slug;
    } else {
        $parent_slug = '';
    }
    
?>

<div class="scfb-cat-banner no-background">
    <div class="container">
        <h2><?php echo single_cat_title( '', false ); ?></h2>
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
            <?php if( ! empty( $parent_slug ) ) { ?><li><?php echo "<a href='" . get_category_link( $parent->cat_ID ) . "'>" . $parent->name . "</a> "; ?></li><?php } ?>
            <li><a href="#"><?php echo single_cat_title( '', false ); ?></a></li>
        </ul>
    </div>
</div>
<div class="scfb-items">
    <div class="container">  
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