<?php
/**
 * The team shortcodes
 *
 */
 

 /********** Code Index
 *
 * -01- ADD A TEAM
 * 
 */


 /**
 * -01- ADD A TEAM  [team no="category number"]
 */ 


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
            $holdarr = '';
    
    
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

            $op .= $qp . $pp . $rp;

         break;
    }

    return $op;
}
add_shortcode( 'cro_menu', 'cro_menulist_func' );


function cro_menuq_func( $atts ) {


    extract( $atts );

    $op = '<div class="quickiemenu">';

    if (isset($title) && $title != '') {
        $op .= '<span class="quickietitle cro_accent">' . stripslashes($title)  . '</span>';
    }

    if (isset($desc) && $desc != '') {
       $op .= '<span class="quickiedesc">' . stripslashes($desc)  . '</span>';
    }

    if (isset($price) && $price != '') {
       $op .= '<span class="quickieprice cro_accent">' . stripslashes($price)  . '</span>';
    }



    $op .= '</div>';

    return $op;

}
add_shortcode( 'cro_menuq', 'cro_menuq_func' );




?>