<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>



<div class="wrapper" id="index-wrapper">

	<div class="" id="content" tabindex="-1">

		
			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">
				<div class="container" style="padding-left: 0px; padding-right: 0px;">
				<div class="d-flex flex-row" style="flex-wrap: wrap; gap: 20px; justify-content: center;">
					<?php

					$args = array(  
						'post_type' => 'cars',
						'post_status' => 'publish',
						'posts_per_page' => -1, 
						'orderby' => 'title', 
						'order' => 'ASC', 
					);

					$posts = new WP_Query( $args ); 

					while ( $posts->have_posts() ) : $posts->the_post(); 
							
							get_template_part( 'loop-templates/content', get_post_format() );
							?>
								
						<?php	
					endwhile;
					?>
					
				</div>
				<!-- <div class="btn-menu text-center pt-4">
					<button class="btn-menu2" id="load_more">Read more</button>
				</div> -->
				</div>
			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

	

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php
get_footer();
