<?php 
/**
 * This is the default template file.
 */
get_header();
?>
    <!-- the following code is used to display the pages content if using the block editor or classic editor -->
    <?php 
        // in order to use our featured image we will need to add the functions to our functions.php and create a variable to collect it here.
        $featuredImg = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
    ?>
    <section class="post-masthead" style="background: url('<?php echo $featuredImg[0];?>')">
        <div>
            <h1><?php the_title(); ?></h1>
        </div>
    </section>
    <section class="homepage-content">
        <?php echo get_the_content(); ?>
    </section>    
<?php
get_footer();
?>