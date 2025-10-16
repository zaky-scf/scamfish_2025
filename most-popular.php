<?php
/*
 * Template Name: Most Popular
 * Template Post Type: page
 */

    get_header(); 

?>

<div class="scfb-cat-banner" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/category-bg.jpg);">
    <div class="container">
        <h2>Most Popular Posts</h2>
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
            <li><a href="#">Most Popular</a></li>
        </ul>
    </div>
</div>
<div class="scfb-latest scfb-mb-overlay">
    <div class="container">
        <h2>Popular Posts</h2>
        <div class="row">
            <?php
                $important_posts = get_blog_posts_by_view_count( 0,1 );
                foreach( $important_posts as $row ){
    
                    $img_url = blog_get_optimized_image( wp_get_attachment_url( get_post_thumbnail_id( $row["ID"] ), 'thumbnail' ), true );
                    if( ! $scf_functions->file_is_valid_image( $img_url ) ) $img_url =  get_template_directory_uri() . '/assets/img/no-image-found.jpg';
                    $get_category = get_the_category( $row["ID"] );
                    $author_id = get_post_field( 'post_author', $row["ID"] );
                    $author_name = get_the_author_meta( 'display_name', $author_id );
                    $author_url = get_author_posts_url( $author_id );
                    $get_date = get_the_modified_date( 'F jS, Y', $row["ID"] );
                    $post_content = $scf_functions->scf_content_replace( $row['post_content'], 300 );                             
            ?>
                <div class="col-md-6">
                    <div class="single-latest">
                        <a href="<?php echo get_permalink( $row["ID"] ); ?>" class="scfb-img-overlay">
                            <img src="<?php echo $img_url; ?>" data-src="<?php echo $img_url; ?>" style="background-image: url(<?php echo $img_url; ?>);" alt="<?php echo $row['post_title']; ?>" decoding="async" />
                            <h4><?php echo $row['post_title']; ?></h4>
                        </a>
                        <?php 
                            foreach( $get_category as $cat_index => $cat_row ) {
                                echo "<a href='" . get_category_link( $cat_row->cat_ID ) . "' class='scfb-category-btn'>" . $cat_row->name . "</a> ";
                            }
                        ?>
                        <h4><a href="<?php echo get_permalink( $row["ID"] ); ?>"><?php echo $row['post_title']; ?></a></h4>
                        <div class="scfb-post-date"><?php echo $get_date; ?>  by  <a href="<?php echo $author_url; ?>"><?php echo $author_name; ?></a></div>
                        <p><?php echo $post_content; ?></p>
                    </div>
                </div>
            <?php } ?>
            <div class="col-md-6">
                <div class="scfb-sidebar">
                    <?php
                        $important_posts2 = get_blog_posts_by_view_count( 1,3 );
                        foreach( $important_posts2 as $row ){
            
                            $img_url = blog_get_optimized_image( wp_get_attachment_url( get_post_thumbnail_id( $row["ID"] ), 'thumbnail' ) );
                            if( ! $scf_functions->file_is_valid_image( $img_url ) ) $img_url =  get_template_directory_uri() . '/assets/img/no-image-found.jpg';
                            $get_category = get_the_category( $row["ID"] );
                            $author_id = get_post_field( 'post_author', $row["ID"] );
                            $author_name = get_the_author_meta( 'display_name', $author_id );
                            $author_url = get_author_posts_url( $author_id );
                            $get_date = get_the_modified_date( 'F jS, Y', $row["ID"] );
                            $post_content = $scf_functions->scf_content_replace( $row['post_content'], 45 );
                    ?>
                        <div class="scfb-post-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="<?php echo get_permalink( $row["ID"] ); ?>" class="scfb-img-overlay">
                                        <img src="<?php echo $img_url; ?>" data-src="<?php echo $img_url; ?>" style="background-image: url(<?php echo $img_url; ?>);" alt="<?php echo $row['post_title']; ?>" decoding="async" />
                                        <h4><?php echo $row['post_title']; ?></h4>
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <?php 
                                        foreach( $get_category as $cat_index => $cat_row ) {
                                            echo "<a href='" . get_category_link( $cat_row->cat_ID ) . "' class='scfb-category-btn'>" . $cat_row->name . "</a> ";
                                        }
                                    ?>
                                    <h4><a href="<?php echo get_permalink( $row["ID"] ); ?>"><?php echo $row['post_title']; ?></a></h4>
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
<div class="scfb-items">
    <div class="container">
        <h2>All Popular Posts</h2>
        <?php
            $important_posts = get_blog_posts_by_view_count(4,12);
            foreach( $important_posts as $row ){

                $img_url = blog_get_optimized_image( wp_get_attachment_url( get_post_thumbnail_id( $row["ID"] ), 'thumbnail' ) );
                if( ! $scf_functions->file_is_valid_image( $img_url ) ) $img_url =  get_template_directory_uri() . '/assets/img/no-image-found.jpg';
                $get_category = get_the_category( $row["ID"] );
                $author_id = get_post_field( 'post_author', $row["ID"] );
                $author_name = get_the_author_meta( 'display_name', $author_id );
                $author_url = get_author_posts_url( $author_id );
                $get_date = get_the_modified_date( 'F jS, Y', $row["ID"] );
                $post_content = $scf_functions->scf_content_replace( $row['post_content'], 200 );  
        ?>
        <div class="scfb-post-item scfb-mb-col2">
            <div class="row">
                <div class="col-xs-4 col-md-4">
                    <a href="<?php echo get_permalink( $row["ID"] ); ?>"><img src="<?php echo $img_url; ?>" data-src="<?php echo $img_url; ?>" style="background-image: url(<?php echo $img_url; ?>);" alt="<?php echo $row['post_title']; ?>" decoding="async" /></a>
                </div>
                <div class="col-xs-8 col-md-8">
                    <?php 
                        foreach( $get_category as $cat_index => $cat_row ) {
                            echo "<a href='" . get_category_link( $cat_row->cat_ID ) . "' class='scfb-category-btn'>" . $cat_row->name . "</a> ";
                        }
                    ?>
                    <h4><a href="<?php echo get_permalink( $row["ID"] ); ?>"><?php echo $row['post_title']; ?></a></h4>
                    <div class="scfb-post-date"><?php echo $get_date; ?>  by  <a href="<?php echo $author_url; ?>"><?php echo $author_name; ?></a></div>
                    <p><?php echo $post_content; ?></p>
                </div>
            </div>
        </div>  
        <?php } ?>
    </div>
</div>

<?php include_once( "template-parts/search-section.php" ); ?>
<?php get_footer(); ?>