<?php
/*
 * Template Name: Blog Author Profile
 * Template Post Type: post, page
 */

    get_header();
    $email = get_the_author_meta( 'email' );
    $avatar_url = get_avatar_url( $email );

    if( ! $scf_functions->file_is_valid_image( $avatar_url ) ) $avatar_url =  get_template_directory_uri() . '/assets/img/no-image-found.jpg';

    $author = get_queried_object();
    $author_id = $author->ID;

    $currentPage = get_query_var('paged');

?>
<div class="scfb-breadcrumb">
    <div class="container">
        <ul>
            <li><a href="<?php echo RELATIVE_BLOG_URL; ?>/"><?php echo BLOG_URL_PATH; ?></a></li>
            <li><a href="#">Authors</a></li>
            <li><a href="#"><?php echo get_the_author();?></a></li>
        </ul>
    </div>
</div>
<div class="container">
    <div class="scfb-author-profile">
        <div class="row">
            <div class="col-lg-2 col-md-3">
                <img src="<?php echo $avatar_url; ?>" data-src="<?php echo $avatar_url; ?>" style="background-image: url(<?php echo $avatar_url; ?>);" alt="<?php echo get_the_author(); ?>" decoding="async" loading="lazy" />
            </div>
            <div class="col-lg-10 col-md-9">
                <div class="row">
                    <div class="col-sm-8">
                        <h6><?php echo ucfirst( $author->roles[0] . " Writer" ); ?></h6>
                        <h2><?php echo get_the_author(); ?></h2>
                    </div>
                    <div class="col-sm-4 text-right">
                        <span class="btn btn-blue"><?php echo count_user_posts( $author_id ); ?> Posts</span>
                    </div>
                </div>                
                <h5><?php echo ucfirst( $author->roles[0] ); ?> / Socialcatfish</h5>
                <p><?php echo get_the_author_meta( 'description' ); ?></p>
                <div class="row">
                    <div class="col-md-4">
                        <p><strong>Email :</strong> <?php echo $author->user_email; ?></p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Member Since :</strong> <?php echo date( 'F j, Y', strtotime( $author->user_registered ) ); ?></p>
                    </div>
                    <div class="col-md-4 social-list">
                        <p><strong>Website :</strong> <a href="<?php echo $author->user_url; ?>">Open Link</a></p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="scfb-items">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-3">
                <div class="scfb-author-sidebar">
                    <h4>Categories</h4>
                    <?php wp_list_categories( array (
                        'orderby'    => 'name',
                        'show_count' => true,
                        'exclude'    => array( 10 ),
                        'style' => "a",
                        'hide_title_if_empty' => true,
                        'separator' => "",
                        'author' => $author_id
                    ) ); ?> 
                    <span class="view_more">View More Categories</span>
                </div>
            </div>
            <div class="col-md-8 col-lg-9">
                <div class="scfb-sidebar">
                    <div class="row item-title">
                        <div class="col-md-8 col-xs-6">
                            <h2>Most Popular</h2>
                        </div>
                        <div class="col-md-4 col-xs-6 text-right">
                            <p class="scfb-auth-text"><strong>Post by:</strong> <?php echo get_the_author(); ?></p>
                        </div>
                    </div>
                    <?php
                        $popular = new WP_Query( array (
                            'post_type' => 'post',
                            'orderby'   => 'meta_value_num',
                            'meta_key' => 'wpb_post_views_count',
                            'posts_per_page' => 2,
                            'author' => $author_id,
                            'order' => 'DESC'                        
                        ) );
                        if ( $popular->have_posts() ) :
                            while ( $popular->have_posts()) : $popular->the_post();
                                $img_url = blog_get_optimized_image( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'thumbnail' ) );
                                if( ! $scf_functions->file_is_valid_image( $img_url ) ) $img_url =  get_template_directory_uri() . '/assets/img/no-image-found.jpg';
                                $get_date = get_the_modified_date();
                                $get_category = get_the_category( $popular->ID );
                                $author_id = get_post_field( 'post_author', get_the_ID() );
                                $author_name = get_the_author();
                                $author_url = get_author_posts_url( $author_id );
                                $post_content = $scf_functions->scf_content_replace( get_the_content(), 100 );                               
                    ?>
                        <div class="scfb-post-item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="<?php echo get_permalink(); ?>"><img src="<?php echo $img_url; ?>" data-src="<?php echo $img_url; ?>" style="background-image: url(<?php echo $img_url; ?>);" alt="<?php echo get_the_title(); ?>" decoding="async" loading="lazy" /></a>
                                    </div>
                                    <div class="col-md-8">
                                        <?php 
                                            foreach( $get_category as $cat_index => $cat_row ) {
                                                echo "<a href='" . get_category_link( $cat_row->cat_ID ) . "' class='scfb-category-btn'>" . $cat_row->name . "</a> ";
                                            }
                                        ?>
                                        <h4><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></h4>
                                        <div class="scfb-post-date"><?php echo $get_date; ?>  by  <a href="<?php echo $author_url; ?>"><?php echo $author_name; ?></a></div>
                                        <p><?php echo $post_content; ?></p>
                                    </div>
                                </div>
                            </div>
                    <?php
                            endwhile;
                        endif;
                        wp_reset_query();
                    ?>
                    <h2>Most Recent</h2>
                    <?php
                        $recent = new WP_Query( array (
                            'post_type' => 'post',
                            'posts_per_page' => 1,
                            'author' => $author_id,
                            'order' => 'DESC'                        
                        ) );
                        if ( $recent->have_posts() ) :
                            while ( $recent->have_posts()) : $recent->the_post();
                                $img_url = blog_get_optimized_image( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'thumbnail' ) );
                                if( ! $scf_functions->file_is_valid_image( $img_url ) ) $img_url =  get_template_directory_uri() . '/assets/img/no-image-found.jpg';
                                $get_date = get_the_modified_date();
                                $get_category = get_the_category( $recent->ID );
                                $author_id = get_post_field( 'post_author', get_the_ID() );
                                $author_name = get_the_author();
                                $author_url = get_author_posts_url( $author_id );
                                $post_content = $scf_functions->scf_content_replace( get_the_content(), 100 );
                    ?>
                        <div class="scfb-post-item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="<?php echo get_permalink(); ?>"><img src="<?php echo $img_url; ?>" data-src="<?php echo $img_url; ?>" style="background-image: url(<?php echo $img_url; ?>);" alt="<?php echo get_the_title(); ?>" decoding="async" loading="lazy" /></a>
                                    </div>
                                    <div class="col-md-8">
                                        <?php 
                                            foreach( $get_category as $cat_index => $cat_row ) {
                                                echo "<a href='" . get_category_link( $cat_row->cat_ID ) . "' class='scfb-category-btn'>" . $cat_row->name . "</a> ";
                                            }
                                        ?>
                                        <h4><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></h4>
                                        <div class="scfb-post-date"><?php echo $get_date; ?>  by  <a href="<?php echo $author_url; ?>"><?php echo $author_name; ?></a></div>
                                        <p><?php echo $post_content; ?></p>
                                    </div>
                                </div>
                            </div>
                    <?php
                            endwhile;
                        endif;
                        wp_reset_query();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="scfb-items">
    <div class="container"> 
        <div class="row item-title">
            <div class="col-md-8 col-xs-6">
                <h2>All Posts</h2>
            </div>
            <div class="col-md-4 col-xs-6 text-right">
                <p class="scfb-auth-text"><strong>Post by:</strong> <?php echo get_the_author(); ?></p>
            </div>
        </div>
        <?php
            $posts = new WP_Query( array (
                'post_type' => 'post',
                'posts_per_page' => 10,
                'author' => $author_id,
                'paged' => $currentPage,
                'order' => 'DESC'
            ) );

            if ( $posts->have_posts() ) :
                while ($posts->have_posts()) : $posts->the_post();
                    $img_url = blog_get_optimized_image( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'thumbnail' ) );
                    if( ! $scf_functions->file_is_valid_image( $img_url ) ) $img_url =  get_template_directory_uri() . '/assets/img/no-image-found.jpg';
                    $get_date = get_the_modified_date();
                    $get_category = get_the_category( $posts->ID );
                    $author_id = get_post_field( 'post_author', get_the_ID() );
                    $author_name = get_the_author();
                    $author_url = get_author_posts_url( $author_id );
                    $post_content = $scf_functions->scf_content_replace( get_the_content(), 100 ); 
                    if( empty( $author_name ) ) continue;
            ?>

                            <div class="scfb-post-item scfb-mb-col2">
                                <div class="row">
                                    <div class="col-xs-4 col-md-4">
                                        <a href="<?php echo get_permalink(); ?>"><img src="<?php echo $img_url; ?>" data-src="<?php echo $img_url; ?>" style="background-image: url(<?php echo $img_url; ?>);" alt="<?php echo get_the_title(); ?>" decoding="async" loading="lazy" /></a>
                                    </div>
                                    <div class="col-xs-8 col-md-8">
                                        <?php 
                                            foreach( $get_category as $cat_index => $cat_row ) {
                                                echo "<a href='" . get_category_link( $cat_row->cat_ID ) . "' class='scfb-category-btn'>" . $cat_row->name . "</a> ";
                                            }
                                        ?>
                                        <h4><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></h4>
                                        <div class="scfb-post-date"><?php echo $get_date; ?>  by  <a href="<?php echo $author_url; ?>"><?php echo $author_name; ?></a></div>
                                        <p><?php echo $post_content; ?></p>
                                    </div>
                                </div>
                            </div>

            <?php
                endwhile;
            endif;

            echo "<div class='scfb-pagination'>" . paginate_links(array(
                'total' => $posts->max_num_pages,
                'prev_text' => __('<span class="si-left"></span>'),
                'next_text' => __('<span class="si-right"></span>')
            )) . "</div>";

            wp_reset_query(); 
            
        ?>
    </div>
</div>
<?php
get_footer();