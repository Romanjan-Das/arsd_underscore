<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscore
 */

get_header();
?>

	<main id="primary" class="site-main">
	<div style="width:100%;font-size:2rem;font-weight:500;text-align:center;padding:0px 0px 3rem 0px;"><?php
		the_archive_title();
		the_archive_description();
	?></div>
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				?>
				<a class="excerpt-link" href="<?php the_permalink();?>">
				<div class="excerpt"><?php the_post();?>
                <div class="excerpt-title"><?php the_title();?></div>
                <div class="excerpt-thumb"><?php if(has_post_thumbnail()):?><img src="<?php the_post_thumbnail_url();?>"><?php endif;?></div>
                <div class="excerpt-date"><?php the_date();?></div>
                <div class="excerpt-excerpt"><?php the_excerpt();?></div>
                </div></a><?php 
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				//get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
