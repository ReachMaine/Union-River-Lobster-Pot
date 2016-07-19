<?php
/**
 * The template for displaying member pages.
 * 
 * display single post title 
 * zig: put title of post in content.
 *
 */
 
get_header(); 

$tlset = get_option( 'tlset' );


?>

<?php 

	if (isset($tlset['cro_showbanindex']) && $tlset['cro_showbanindex'] == 1 ){
		$ps =  cro_fetch_banner('inner'); 
	} else {
		$ps =  ''; 
	}


?>


			
	<?php while ( have_posts() ) : the_post();

		$sbar = get_post_meta($post->ID, 'cro_sidebar', true);
		echo cro_headerimg($post->ID, 'post', $ps);			
	?>

	<div class="main singleitem">				
		<div class="row singlepage singlepost">

			<?php if ($sbar == 1) { ?>


				<div class="eight column">
					<h2 class="post-title"> <?php echo get_the_title($post->ID) ?> </h2>
					<?php get_template_part( 'public/tparts/content', get_post_format() ); 
					$tag_list = get_the_tag_list( '', __( ', ', 'localize' ) );
					?>
					<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'localize' ) . '</span> %title' ); ?></span>
					<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'localize' ) . '</span>' ); ?></span>
					<?php comments_template('', ''); ?>
				</div>

				<div class="four column">
					<?php get_sidebar(); ?>
				</div>



			<?php } else { ?>

				<div class="twelve column">
					<?php get_template_part( 'public/tparts/content', get_post_format() ); ?>
				</div>

			<?php } ?>
			
		</div>
	</div>

	<?php endwhile; // end of the loop. ?>


<?php get_footer(); ?>