<?php
/**
* A Simple Category Template
*/
 
get_header(); 
$cat_term = get_queried_object();
$args = array( 'child_of' => $cat_term->cat_ID );
$categories = get_categories( $args );
?> 
 <?php 
    //echo "<pre>";
    //print_r( $categories );
    //echo "</pre>";
 ?>
<div class="scfb-cat-banner" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/category-bg.jpg);">
    <div class="container">
        <h2><?php echo single_cat_title( '', false ); ?></h2>
        <?php if ( category_description() ) : ?>
        <p><?php echo category_description(); ?></p>
        <?php endif; ?>
        <?php include_once( "template-parts/navigation-menu.php" ); ?>
    </div>
</div>
<div class="scfb-category-tags">
    <div class="container">
        <?php
            if ( ! empty( $categories ) ) {
                foreach( $categories as $category ) { ?>
                <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" class="btn btn-bordered"><?php echo esc_html( $category->name ); ?></a>
                    
        <?php  
                }
            }
        ?>
    </div>
</div>
<div class="scfb-breadcrumb">
    <div class="container">
        <ul>
            <li><a href="<?php echo RELATIVE_BLOG_URL; ?>/"><?php echo BLOG_URL_PATH; ?></a></li>
            <li><a href="#"><?php echo single_cat_title( '', false ); ?></a></li>
        </ul>
    </div>
</div>
<div class="scfb-latest scfb-mb-overlay">
    <div class="container">
        <h2><?php echo single_cat_title( '', false ); ?></h2>
        <div class="row">
            <?php
                $category_posts1 = get_posts( array( 'numberposts' => 1, 'category' => $cat_term->term_id, 'order' => 'DESC', ) );
                foreach( $category_posts1 as $row ){
                    $img_url = blog_get_optimized_image( wp_get_attachment_url( get_post_thumbnail_id( $row->ID ), 'thumbnail' ), true );
                    if( ! $scf_functions->file_is_valid_image( $img_url ) ) $img_url =  get_template_directory_uri() . '/assets/img/no-image-found.jpg';
                    $author_id = get_post_field( 'post_author', $row->ID );
                    $author_name = get_the_author_meta( 'display_name', $author_id );
                    $author_url = get_author_posts_url( $author_id );
                    $get_date = get_the_modified_date( 'F jS, Y', $row->ID );
                    $post_content = $scf_functions->scf_content_replace( $row->post_content, 300 );                                    
            ?>
                <div class="col-md-6">
                    <div class="single-latest">
                        <a href="<?php echo get_permalink( $row->ID ); ?>" class="scfb-img-overlay">
                            <img src="<?php echo $img_url; ?>" data-src="<?php echo $img_url; ?>" style="background-image: url(<?php echo $img_url; ?>);" alt="<?php echo $row->post_title; ?> " decoding="async" loading="lazy" />
                            <h4><?php echo $row->post_title; ?></h4>
                        </a>
                        <h4><a href="<?php echo get_permalink( $row->ID ); ?>"><?php echo $row->post_title; ?></a></h4>
                        <div class="scfb-post-date"><?php echo $get_date; ?>  by  <a href="<?php echo $author_url; ?>"><?php echo $author_name; ?></a></div>
                        <p><?php echo $post_content; ?></p>
                    </div>
                </div>
            <?php } ?>
            <div class="col-md-6">
                <div class="scfb-sidebar">
                <?php
                    $category_posts2 = get_posts( array( 'numberposts' => 4, 'category' => $cat_term->term_id, 'order' => 'DESC', ) );
                    foreach( $category_posts2 as $cat_index => $row ){
                        if( $cat_index == 0 ) continue;
                        $img_url = blog_get_optimized_image( wp_get_attachment_url( get_post_thumbnail_id( $row->ID ), 'thumbnail' ) );
                        if( ! $scf_functions->file_is_valid_image( $img_url ) ) $img_url =  get_template_directory_uri() . '/assets/img/no-image-found.jpg';
                        $author_id = get_post_field( 'post_author', $row->ID );
                        $author_name = get_the_author_meta( 'display_name', $author_id );
                        $author_url = get_author_posts_url( $author_id );
                        $get_date = get_the_modified_date( 'F jS, Y', $row->ID );
                        $post_content = $scf_functions->scf_content_replace( $row->post_content, 100 );                        
                ?>
                        <div class="scfb-post-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="<?php echo get_permalink( $row->ID ); ?>" class="scfb-img-overlay">
                                        <img src="<?php echo $img_url; ?>" data-src="<?php echo $img_url; ?>" style="background-image: url(<?php echo $img_url; ?>);" alt="<?php echo $row->post_title; ?>" decoding="async" loading="lazy" />
                                        <h4><?php echo $row->post_title; ?></h4>
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <h4><a href="<?php echo get_permalink( $row->ID ); ?>"><?php echo $row->post_title; ?></a></h4>
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
<?php
    if ( ! empty( $categories ) ):
    foreach( $categories as $cat_index =>$category ) {
?>
<div class="scfb-items">
    <div class="container">
        <div class="row item-title">
            <div class="col-md-8">
                <h2><?php echo esc_html( $category->name ); ?></h2>
            </div>
            <div class="col-md-4 text-right">
                <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" class="btn btn-blog-view">VIEW ALL <span class="si-right"></span></a>
            </div>
        </div> 
        <?php
            $category_posts3 = get_posts( array( 'numberposts' => 6, 'category' => $category->term_id, 'order' => 'DESC', ) );
            foreach( $category_posts3 as $row ){
                $img_url = blog_get_optimized_image( wp_get_attachment_url( get_post_thumbnail_id( $row->ID ), 'thumbnail' ) );
                if( ! $scf_functions->file_is_valid_image( $img_url ) ) $img_url =  get_template_directory_uri() . '/assets/img/no-image-found.jpg';
                $author_id = get_post_field( 'post_author', $row->ID );
                $author_name = get_the_author_meta( 'display_name', $author_id );
                $author_url = get_author_posts_url( $author_id );
                $get_date = get_the_modified_date( 'F jS, Y', $row->ID );
                $post_content = $scf_functions->scf_content_replace( $row->post_content, 100 ); 
                if ( $cat_index % 2 != 0 ) echo '<div class="col-md-6">';
        ?>
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
        <?php 
                if ( $cat_index % 2 != 0 ) echo '</div>';
            }
        ?>                    
    </div>
</div>
<?php } ?>
<?php endif; ?>

<?php include_once( "template-parts/search-section.php" ); ?> 
<?php get_footer(); ?>