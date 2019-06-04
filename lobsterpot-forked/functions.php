<?php
//require_once(get_stylesheet_directory().'/inc/shortcodes/shortcode-menu.php');
require_once(get_stylesheet_directory().'/custom/reach_CTAs.php');
add_action( 'wp_print_styles', 'cro_deregister_styles', 100 );

function cro_deregister_styles() {
	wp_deregister_style( 'croma_style' );
	wp_deregister_style( 'croma_site' );
}


add_action( 'wp_enqueue_scripts', 'croma_fetch_mystyle' );

function croma_fetch_mystyle() {
	wp_enqueue_style('croma_mystyle', get_stylesheet_directory_uri() . '/style.css', array(), null, 'all');
}
/** shortcode function for cro_menu or zig_menu* */
function cro_menulist_func( $atts ) {
	global $post;
	$op = $pp = $qp = '';
    $holdarr = array();
    $pid = get_post_meta($post->ID, 'cro_sidebar', true);
    $pcat = ($pid == 1) ? 'cro_col_3' : 'cro_col_4' ;

    extract( shortcode_atts( array(
        'no'    => 'menucat',
        'type'  => 'typenumber'
    ), $atts ) );


    $term = get_term( $no, 'foodmenu');

    if ($no >= 1) {
    	$catargs = array(
    		'post_type' => 'menus',
    		'numberposts' => -1,
    		'foodmenu' => $term->slug
    	);
    } else {
    	$catargs = array(
    		'post_type' => 'menus',
    		'numberposts' => -1,
    	);
    }

    $myposts = get_posts( $catargs );

    switch ($type) {
        case 1:

            $op .= '<ul class="cro_mainstay ">';


            foreach( $myposts as $apost ) : setup_postdata($apost);
                $fp = get_post_meta( $apost->ID, 'cro_foodprice' , true);
                $img = get_the_post_thumbnail($apost->ID,'thumbnail');
                $op .= '<li  class="mainstayli">';
                if ($img){
                    $op .= ' <div class="cro_mainstayimg">'  .   $img . '</div>';
                }
                $op .='<div class="cro_mainstaybody">';

                if ($fp) {
                    $op .= '<span class="cro_foodprice">' . $fp . '</span>';
                }

                $op .= '<h5 class="mainstayhead">' . $apost->post_title . '</h5>';

                $op .= '<p class="mainstayp">' . get_the_content() . '</p>';

                $op .= '</div>';

                $op .= '<div class="clearfix"></div></li>';

            endforeach;

            $op .= '</ul>';

         break;

         case 2:

            $pp .= '<ul class="cro_masthead m'   .  $pcat  .    '">';
            $holdarr = [];


            foreach( $myposts as $apost ) : setup_postdata($apost);
                $fp = get_post_meta( $apost->ID, 'cro_foodprice' , true);

                $img = get_the_post_thumbnail($apost->ID,'thumbnail');
                if ($img) {
                    $holdarr[] = array(
                        'img' => $img,
                        'titl' => $apost->post_title
                    );
                }

                $pp .= '<li class="mastheadli">
                            <div class="cro_mainstaybody">';

                if ($fp) {
                    $pp .= '<span class="cro_foodprice">' . $fp . '</span>';
                }

                $pp .= '<h5 class="mastheadh">' . $apost->post_title . '</h5>';

                $pp .= '<p class="mastheadp">' . get_the_content() . '</p>';

                $pp .= '</div>';

                $pp .= '<div class="clearfix"></div></li>';

            endforeach;

            $pp .= '</ul>';

            if ($holdarr) {
                shuffle($holdarr);
            }
            $countholdarr = count($holdarr);


            $crotestnum = ($pid == 1) ? 3 : 4 ;

            if ($countholdarr >= $crotestnum) {
                $qp = '<div class="displaytopimg i'   .  $pcat  .    '">';


                for ($i=1; $i < $crotestnum + 1 ; $i++) {
                   $qp .= $holdarr[$i - 1]['img'];
                }


                $qp .= '</div>';

                $qp .= '<span class="displaytopimgspan">';

                for ($i=1; $i < $crotestnum + 1 ; $i++) {
                    if ($i == 1) {
                         $qp .= $holdarr[$i - 1]['titl'];
                    } else {
                        $qp .= ', ' . $holdarr[$i - 1]['titl'];
                    }
                }

                $qp .= '</span>';


            }


            if ($countholdarr >= $crotestnum) {
                $rp = '<div class="displaytopimg i'   .  $pcat  .    '">';

                for ($i=1; $i < $crotestnum + 1 ; $i++) {
                   $rp .= $holdarr[$countholdarr - $i]['img'];
                }

                $rp .= '</div>';

                $rp .= '<span class="displaytopimgspan">';

                for ($i=1; $i < $crotestnum + 1 ; $i++) {
                    if ($i == 1) {
                         $rp .= $holdarr[$countholdarr - $i]['titl'];
                    } else {
                        $rp .= ', ' . $holdarr[$countholdarr - $i]['titl'];
                    }
                }

                $rp .= '</span>';
            }

            $op .= $qp . $pp; /*  . $rp; */

         break;
    }

    return $op;
}
/**** child theme setup
 and where to override some theme functions
*/
function zig_theme_setup() {
	/* replacing a few theme functions */
	/* menu_shortcode */
		/* remove_shortcode( 'cro_menu' );  */

		 /* add_shortcode( 'zig_menu', 'cro_menulist_func' );  works but dont need it. */

}
add_action( 'after_setup_theme', 'zig_theme_setup' );


/**** replace welcome page function on home page  */
/* changes:
    - do_shortcode
*/
function zig_fetch_welcomenote($id){

    $tlset = get_option( 'tlset' );
    $bt = get_post($id);
    $imgurl = wp_get_attachment_image_src(get_post_thumbnail_id($id),'full', true);
    $op = /* '<div class="carouselspaceholder" style="height: 40px;">&nbsp;</div> */ '<div class="welcomemsg" ><div class="row">';

   /* $op .= '<h3 class="cro_accent">' . $bt->post_title . '</h3>'; */

    $op .= '<p class="cro_accent zig">' . do_shortcode( $bt->post_content ) . '</p>';

    $op .= '</div></div>';


    return $op;
}
/* image sizes */
/* $cwk_thumbimg = array(200, 999); // size of featured image in archive/category blog
	$cwk_postimg = array(200, 999); // size of featured image on single post.
	add_image_size( 'cwk-slider', 1420, 447, true ); // Slider */

/*****  change the login screen logo ****/
    function my_login_logo() { ?>
        <style type="text/css">
            body.login div#login h1 a {
                background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/lp.png);
                padding-bottom: 30px;
                background-size: cover;
                margin-left: 0px;
                margin-bottom: 0px;
                margin-right: 0px;
                height: 108px;
                width: 100%;
            }
        </style>
    <?php }
    add_action( 'login_enqueue_scripts', 'my_login_logo' );
    /*****  end custom login screen logo ****/

        /***** change admin favicon *****/
    /* add favicons for admin */
    add_action('login_head', 'add_favicon');
    add_action('admin_head', 'add_favicon');

    function add_favicon() {
        $favicon_url = get_stylesheet_directory_uri() . '/images/admin-favicon.ico';
        echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
    }
    /***** end admin favicon *****/

?>
