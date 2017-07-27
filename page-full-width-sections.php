<?php
/**
 * Template Name: Full Width Sections Template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php //HERO Section
			if( get_field('page_enable_hero_section') ) {?>
				<section class="jumbotron hero container-fluid" style="background:linear-gradient(rgba(0, 0, 0, 0.3),rgba(0, 0, 0, 0.3)),url('<?php the_field('page_hero_section_image'); ?>')no-repeat center; background-size:cover;" role="banner">
					<div class="content">
						<?php the_field('page_hero_section_content'); ?>
					</div>
				</section>
			<?php } ?>

			<?php //Section 2
			if( get_field('page_enable_section_2') ) {?>
				<section class="jumbotron container-fluid content-section">
					<div class="content row">
						<div class="content-copy col-md-6 align-self-center">
							<?php the_field('page_section_2_content'); ?>
						</div>
						<div class="content-img col-md-6 align-self-center">
							<img src="<?php the_field('page_section_2_image'); ?>" />
						</div>
					</div>
				</section>
			<?php } ?>

			<?php //Section 3
			if( get_field('page_enable_section_3') ) {?>
				<section class="jumbotron container-fluid content-section">
					<div class="content row">
						<div class="content-copy col-md-6 align-self-center">
							<?php the_field('page_section_3_content'); ?>
						</div>
						<div class="content-img col-md-6 align-self-center">
							<img src="<?php the_field('page_section_3_image'); ?>" />
						</div>
					</div>
				</section>
			<?php } ?>

			<?php //Section 4
			if( get_field('page_enable_section_4') ) {?>
				<section class="jumbotron container-fluid content-section">
					<div class="content row">
						<div class="content-copy col-md-6 align-self-center">
							<?php the_field('page_section_4_content'); ?>
						</div>
						<div class="content-img col-md-6 align-self-center">
							<img src="<?php the_field('page_section_4_image'); ?>" />
						</div>
					</div>
				</section>
			<?php } ?>	

			<?php //Section 5
			if( get_field('page_enable_section_5') ) {?>
				<section class="jumbotron container-fluid content-section">
					<div class="content row">
						<div class="content-copy col-md-6 align-self-center">
							<?php the_field('page_section_5_content'); ?>
						</div>
						<div class="content-img col-md-6 align-self-center">
							<img src="<?php the_field('page_section_5_image'); ?>" />
						</div>
					</div>
				</section>
			<?php } ?>				


		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
