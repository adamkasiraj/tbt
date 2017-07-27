<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
?>

<footer class="container-fluid" id="site-footer">
	<div class="wrapper wrapper-footer text-white">

		<div class="row">

			<div class="col-lg-4 hidden-md-down">
				<h4>
					<a  rel="home" 
						href="<?php echo esc_url( home_url( '/' ) ); ?>" 
						title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
						>
							<?php bloginfo( 'name' ); ?>
					</a>
				</h4>
				
				<div> Made in Austin, TX </div>

				<?php if( get_field('settings_footer_callout', 'option') ) {?>
					<img class="footer-callout" src=" <?php the_field('settings_footer_callout', 'option'); ?>" />
				<?php } ?>	


			</div><!--col end -->

			<div class="col-lg-4">
				<h4 class="hidden-md-down">Contact Us</h4>

				<ul class="footer-contact px-0">
			
					<?php //Check for Email Address
						if( get_field('settings_email', 'option') ) {?>
							<li class="contact">
								<i class="fa fa-envelope"></i> 
								<a href="mailto:<?php the_field('settings_email', 'option'); ?>"> 
									Email Us 
								</a>
							</li>	
						<?php } 
					?>

					<?php //Check for Phone No.
						if( get_field('settings_phone1', 'option') ) {?>
							<li class="contact">
								<i class="fa fa-phone"></i> 
								<a href="tel:<?php the_field('settings_phone1', 'option'); ?>"> 
									<?php the_field('settings_phone1', 'option'); ?> 
								</a>
							</li>	
						<?php } 
					?>

					<?php //Check for Alt Phone No.
						if( get_field('settings_phone2', 'option') ) {?>
							<li class="contact hidden-md-down">
								<i class="fa fa-phone"></i> 
								<a href="tel:<?php the_field('settings_phone2', 'option'); ?>"> 
									<?php the_field('settings_phone2', 'option'); ?> 
								</a>
							</li>	
						<?php } 
					?>

				</ul>

			</div><!--col end -->

			<div class="col-lg-4">
				<h4 class="hidden-md-down">Follow Us</h4>
				
				<ul class="social-icons mx-auto px-0">

					<?php //Check for Twitter URL
						if( get_field('settings_twitter', 'option') ) {?>
							<li class="social">
								<a href="<?php the_field('settings_twitter', 'option'); ?>"> 
									<i class="fa fa-twitter"></i> 
								</a>
							</li>	
						<?php } 
					?>

					<?php //Check for Yelp URL
						if( get_field('settings_yelp', 'option') ) {?>
							<li class="social">
								<a href="<?php the_field('settings_yelp', 'option'); ?>"> 
									<i class="fa fa-yelp"></i> 
								</a>
							</li>	
						<?php } 
					?>

					<?php //Check for Facebook URL
						if( get_field('settings_facebook', 'option') ) {?>
							<li class="social">
								<a href="<?php the_field('settings_facebook', 'option'); ?>"> 
									<i class="fa fa-facebook"></i> 
								</a>
							</li>	
						<?php } 
					?>

					<?php //Check for Pinterest URL
						if( get_field('settings_pinterest', 'option') ) {?>
							<li class="social"> 
								<a href="<?php the_field('settings_pinterest', 'option'); ?>"> 
									<i class="fa fa-pinterest"></i> 
								</a>
							</li>	
						<?php } 
					?>

					<?php //Check for Pinterest URL
						if( get_field('settings_linkedin', 'option') ) {?>
							<li class="social hidden-md-down">
								<a href="<?php the_field('settings_linkedin', 'option'); ?>"> 
									<i class="fa fa-linkedin"></i> 
								</a>
							</li>	
						<?php } 
					?>

					<?php //Check for Pinterest URL
						if( get_field('settings_google', 'option') ) {?>
							<li class="social hidden-md-down">
								<a href="<?php the_field('settings_google', 'option'); ?>"> 
									<i class="fa fa-google-plus"></i> 
								</a>
							</li>	
						<?php } 
					?>

					<?php //Check for Pinterest URL
						if( get_field('settings_trip_advisor', 'option') ) {?>
							<li class="social">
								<a href="<?php the_field('settings_trip_advisor', 'option'); ?>"> 
									<i class="fa fa-tripadvisor"></i> 
								</a>
							</li>	
						<?php } 
					?>


				</ul>

			</div><!--col end -->

		</div><!-- row end -->


		<?php 
			//Footer Nav Menu
			wp_nav_menu(
				array(
					'theme_location'  => 'footer',
					'container_class' => 'row',
					'container_id'    => '',
					'menu_class'      => 'footer-nav col-xs-12 mx-auto',
					'fallback_cb'     => '',
					'menu_id'         => '',
					'walker'          => new Nav_Footer_Walker(),
				)
			); 
		?>

		<?php //Check for Copyright Text
			if( get_field('settings_copyright', 'option') ) {?>
				<div class="row">
					<div class="col-xs-12 copyright mx-auto">
						<?php the_field('settings_copyright', 'option'); ?>
					</div>
				</div>
			<?php } 
		?>


</footer><!-- wrapper end -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>

