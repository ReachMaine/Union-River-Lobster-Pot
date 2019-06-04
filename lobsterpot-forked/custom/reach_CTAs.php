<?php /* Call to actions  top & bottom... */
/*  add widget areas */
function reach_widgets_init() {
  register_sidebar(
    array(
     'name' => __( 'Homepage Above Content', 'localize' ),
     'id'   => 'reach-above-frontcontent',
     'description'   => __( 'Homepage Widget area above  ', 'localize' ),
     'before_widget' => '<div class="%2$s widget">',
     'after_widget'  => '</div>',
     'before_title'  => '<h6>',
     'after_title'   => '</h6>',
    )
  );

}
add_action( 'widgets_init', 'reach_widgets_init' );
