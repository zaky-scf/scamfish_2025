<?php
    /**
    * Template Name: Site Improvements
    * Template Post Type: page
    */
    
    get_header();
    $current_page = get_queried_object();
    $category     = $current_page->name;

    $currentPage = get_query_var('paged');

    $posts = new WP_Query( array (
        'post_type' => 'post', // Default or custom post type
        'posts_per_page' => 5, // Max number of posts per page
        'category_name' => "site-improvements", // Your category (optional)
        'paged' => $currentPage,
        'order' => 'DESC',
    ) );
?>
<div class="scf-improvements">
    <div class="container">
        <div class="site-header">
            <h2><i class="si-dot"></i> What's New?</h2>
            <p>New updates and improvements to our website and overall platform.<br /> We'll notify you via email about new version updates.</p>
            <!-- <div class="update-filter">
                <select class="scf-form">
                    <option>All the Updates</option>
                </select>
                <i class="si-info"></i>
            </div> -->
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="scf-icn"> 
                    <?php
                        if ( $posts->have_posts() ) :
                            while ($posts->have_posts()) : $posts->the_post();
                                $img_url = blog_get_optimized_image( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'thumbnail' ) );
                                if( ! $scf_functions->file_is_valid_image( $img_url ) ) $img_url =  get_template_directory_uri() . '/assets/img/no-image-found.jpg';
                                $get_date = get_the_modified_date();
                                $author_id = get_post_field( 'post_author', get_the_ID() );
                                $author_name = get_the_author();
                                $author_url = get_author_posts_url( $author_id );
                                $post_content = str_replace( array( "{scf_search_bar}", "&nbsp;" ), "", strip_tags( get_the_content() ) );
                        ?>

                                        <div class="scfb-post-item scfb-mb-col2">
                                            <div class="scfbi-title">
                                                <span class="si-notification"><i class="si-dot"></i></span>
                                                <h4><?php echo the_title(); ?></h4>
                                                <div class="scfb-post-date"><?php echo $get_date; ?></div>
                                            </div>
                                            <div class="scfb-imp-content">
                                                <?php the_content(); ?>
                                                <?php
                                                    /* To be Done
                                                    if( $user_id ) {
                                                    $check_improve_feedback =  User::check_improve_feedback( get_the_ID(), $user_id );
                                                ?>
                                                    <?php if( ! $check_improve_feedback ) { ?>
                                                        <div class="feedback-msg">Feedback added successfully!</div>
                                                        <div class="scfbi-feedback">
                                                            <h5>Quick Feedback</h5>
                                                            <div class="icon-list" <?php SCF::js_controller("feedback.improve_feedback") ?>>
                                                                <img src="<?php echo $current_template_assets_url; ?>/images/emoji/bad.svg" alt="1" data-id="<?php echo get_the_ID(); ?>" data-link="<?php echo get_permalink(); ?>" />
                                                                <img src="<?php echo $current_template_assets_url; ?>/images/emoji/normal.svg" alt="2" data-id="<?php echo get_the_ID(); ?>" data-link="<?php echo get_permalink(); ?>" />
                                                                <img src="<?php echo $current_template_assets_url; ?>/images/emoji/good.svg" alt="3" data-id="<?php echo get_the_ID(); ?>" data-link="<?php echo get_permalink(); ?>" />
                                                                <img src="<?php echo $current_template_assets_url; ?>/images/emoji/excellent.svg" data-id="<?php echo get_the_ID(); ?>" alt="4" data-link="<?php echo get_permalink(); ?>" />
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                <?php } ?>
                                                <?php */
                                                ?>
                                            </div>                                            
                                        </div>

                        <?php
                            endwhile;
                        endif;

                        if( $posts->max_num_pages > 1 ) {
                            
                            echo "<div class='scfb-pagination'>" . paginate_links(array(
                                'total' => $posts->max_num_pages,
                                'prev_text' => __('<span class="si-left"></span>'),
                                'next_text' => __('<span class="si-right"></span>')
                            )) . "</div>";

                        }
                        
                    ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="improve-scf">
                    <form action="" method="POST">
                        <img src="<?php echo get_template_directory_uri() . '/assets/img/improve.png'; ?>" />
                        <h4>Got an idea to improve SocialCatfish?</h4>
                        <label>Enter Your Idea</label>
                        <textarea class="scf-form" rows="5" name="description" placeholder="Tell us what about your idea to make our service better.." required></textarea>
                        <label>Add Your Email <span>Required</span></label>
                        <input type="email" class="scf-form" name="email" placeholder="Enter email address here.." required />
                        <input type="hidden" name="submit_action" value="submit_idea">
                        <input type="submit" class="btn btn-dark-green" value="Submit Your Idea" />
                    </form>
                    <?php echo !empty($awsm_response['success'][0]) ? $awsm_response['success'][0] : ''; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>