<?php
/**
 * The template for displaying all single posts.
 *
 * @package SilverStone
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

            <?php if( get_theme_mod('SilverStone_show_nav_post') == 'yes' ) { SilverStone_post_nav(); } ?>

			<?php
				if( get_theme_mod('SilverStone_show_comments_post') == 'yes' ) :
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>