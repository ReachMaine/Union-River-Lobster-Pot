<?php
/**
 * The template for displaying the footer.
 *
 */

/********** Code Index
 *
 * -01- CLOSE MAINPART
 * -02- START FOOTER
 * -03- FOOTER WIDGETS
 * -04- CREDITS
 * -05- FOOTER FRAMEWORK STUFF
 * 
 */

?>



<!--
 * -01- CLOSE MAINPART
-->	
		</div>
	</div> 
</div> 


<!--
 * -02- START FOOTER
-->	
<div class="footer">
	<div class="footinner">
		<div class="row">

<!--
 * -03- FOOTER WIDGETS
-->	
			<div class="four columns">
				&nbsp;
				<?php if ( is_active_sidebar( 'cro_footleft' ) ) { 
					echo '<ul class="footwidget">';
					dynamic_sidebar( 'cro_footleft' );
					echo '</ul>';
				} ?>					
			</div>

			<div class="four columns">
				&nbsp;
				<?php if ( is_active_sidebar( 'cro_footcent' ) ) { 
					echo '<ul class="footwidget">';
					dynamic_sidebar( 'cro_footcent' );
					echo '</ul>';
				} ?>					
			</div>

			<div class="four columns">
				&nbsp;
				<?php if ( is_active_sidebar( 'cro_footright' ) ) { 
					echo '<ul class="footwidget">';
					dynamic_sidebar( 'cro_footright' );
					echo '</ul>';
				} ?>					
			</div>

		</div>
	</div>

<!--
 * -04- CREDITS
-->	
	<div class="footscribe">
		<div class="row">
			<div class="six columns">
				<div id="site-info">
					<a href="<?php echo home_url( '/' ) ?>" class="whites" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<?php bloginfo( 'name' ); ?> &copy; (<?php echo date('Y'); ?>)
					</a>
				</div>					
			</div>

			<div class="six columns">
				<div id="site-generator">
					<a href="<?php echo esc_url( __('//reachmaine.com', 'localize') ); ?>" 
						title="<?php esc_attr_e('Croma', 'localize'); ?>" rel="generator">
						<?php printf('<span>Reach Maine Marketing</span>' ); ?>
					</a>
				</div><!-- #site-generator -->				
			</div>
		</div>
	</div>
</div>

<?php do_action('croma_sch'); ?>
<?php do_action('croma_footstuff'); ?>
<?php wp_footer(); ?>
</body>
</html>
