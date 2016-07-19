<?php
/**
 * The main template file.
 *
 * Template Name: Front page
 */
 
  $tlset = get_option( 'tlset' );

  get_header();  
  
   
/********** Code Index
 *
 * -01- FETCH SLIDESHOW
 * -02- MAIN PART		
 */

?>


<!--
 * -01- FETCH SLIDESHOW
-->
<?php echo cro_fetch_slider(); ?>



<!--
 * -02- MAIN PART
-->
<div class="main">
	<div class="row">				
		<div class="carouselspaceholder">&nbsp;</div>
		<?php echo get_frontcontent(); ?>
		<div class="clearfix"></div>
	</div>



<?php if (isset($tlset['cro_welcomepage']) && $tlset['cro_welcomepage'] >= 1){							
	echo zig_fetch_welcomenote($tlset['cro_welcomepage']);				
} ?>



<?php if (is_active_sidebar( 'trifronttop' ) || is_active_sidebar( 'tcifronttop' ) || is_active_sidebar( 'tlifronttop'))	 {  ?>


	<?php if (isset($tlset['cro_welcomepage']) && $tlset['cro_welcomepage'] >= 1){		?>
		<div class="fpwidget clearfix">
	<?php } else { ?>
		<div class="fpwidget cro_fpbgset clearfix">
	<?php } ?>

		<div class="row">
			
		<div class="four columns fpwidg">
			<?php if ( is_active_sidebar( 'trifronttop' ) ) { 
				echo '<ul class="mainwidget">';
				dynamic_sidebar( 'trifronttop' );
				echo '</ul>';
			} ?>		
			
		</div> <!-- .c-4 -->	

		<div class="four columns fpwidg">
			<?php if ( is_active_sidebar( 'tcifronttop' ) ) { 
				echo '<ul class="mainwidget">';
				dynamic_sidebar( 'tcifronttop' );
				echo '</ul>';
			} ?>			
		</div> <!-- .c-4 -->	

		<div class="four columns fpwidg">

			<?php if ( is_active_sidebar( 'tlifronttop' ) ) { 
				echo '<ul class="mainwidget">';
				dynamic_sidebar( 'tlifronttop' );
				echo '</ul>';
			} ?>		
			
		</div> <!-- .c-4 -->

	</div>

<?php } else { ?>

<div style="height: 50px;"></div>

<?php } ?>

			
<?php get_footer(); ?>
