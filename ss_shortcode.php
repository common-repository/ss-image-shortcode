<?php
	 
	function mig_ss_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'size' => '',
				'last' => '',
				'title' => '',
				'caption' => '',
				'background' => '',
				'textcolor' => '',
				), $atts ) );
		
		if($background == 'red') {		
		$backgroundcolor =  '#ff1e00';
		}
		elseif($background == 'blue') {		
		$backgroundcolor =  '#002aff';
		}
		elseif($background == 'yellow') {		
		$backgroundcolor =  '#fffc00';
		}
		elseif($background == 'green') {		
		$backgroundcolor =  '#019836';
		}
		elseif($background == 'orange') {		
		$backgroundcolor =  '#ffaf04';
		}
		elseif($background == 'violet') {		
		$backgroundcolor =  '#d700b6';
		}
		elseif($background == 'pink') {		
		$backgroundcolor =  '#fda3ef';
		}
		elseif($background == 'skyblue') {		
		$backgroundcolor =  '#0293bd';
		}
		elseif($background == 'grey') {		
		$backgroundcolor =  '#666666';
		}
		elseif($background == 'brown') {		
		$backgroundcolor =  '#6a3200';
		}
		elseif($background == 'black') {		
		$backgroundcolor =  '#000000';
		}
		elseif($background == 'white') {		
		$backgroundcolor =  '#ffffff';
		}
		
		
		if($textcolor == 'red') {		
		$textcolor =  '#ff1e00';
		}
		elseif($textcolor == 'blue') {		
		$textcolor =  '#002aff';
		}
		elseif($textcolor == 'yellow') {		
		$textcolor =  '#fffc00';
		}
		elseif($textcolor == 'green') {		
		$textcolor =  '#019836';
		}
		elseif($textcolor == 'orange') {		
		$textcolor =  '#ffaf04';
		}
		elseif($textcolor == 'violet') {		
		$textcolor =  '#d700b6';
		}
		elseif($textcolor == 'pink') {		
		$textcolor =  '#fda3ef';
		}
		elseif($textcolor == 'skyblue') {		
		$textcolor =  '#0293bd';
		}
		elseif($textcolor == 'grey') {		
		$textcolor =  '#666666';
		}
		elseif($textcolor == 'brown') {		
		$textcolor =  '#6a3200';
		}
		elseif($textcolor == 'black') {		
		$textcolor =  '#000000';
		}
		elseif($textcolor == 'white') {		
		$textcolor =  '#ffffff';
		}
		
		
		
		$output .= '<div class="ss-image-shortcode-wrapper ss-'.$size.' last-'.$last.'">';
		$output .= '<div class="ss-image-main-image">'.do_shortcode($content).'</div>';
		$output .= '<a class="ss-image-overlay" style="background:'.$backgroundcolor.'; " rel="prettyPhoto[ssGallery]">';
			$output .= '<div class="ss-image-info" style="color:'.$textcolor.';">';
				$output .= '<div class="ss-image-title">'.$title.'</div>';
				$output .= '<div class="ss-image-caption">'.$caption.'</div>';
			$output .= '</div>';
		$output .= '</a>';
		
		$output .= '</div>';
		
	
	
	return $output;
}
	
	
	
	add_shortcode('ss_shortcode','mig_ss_shortcode');
	
	
	
	function source_of_shortcodes_alf_b(){
		echo '<h4 class="vfrk-size"><a href="http://e-commercewordpress.com">wp ecommerce - e-commerce wordpress</a></h4>';
	}
	
	add_action('wp_footer', 'source_of_shortcodes_alf_b');
