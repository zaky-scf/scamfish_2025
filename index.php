<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php
        if (have_posts()) : // check if the loop has returned any posts.

            while (have_posts()) : // loop through each returned post.
                the_post(); // set up the content so we can use template tags like the_title().
                the_title(); // output the post title.
                the_content(); // output the post content.
            endwhile;

        else :

            get_template_part( 'template-parts/content-none' );

        endif;
        ?>

    </main>
</div>

<?php
get_sidebar();
get_footer();