<?php

/*
===============================================================================
	Shortcodes
===============================================================================
*/


function sharemark_price($atts, $content = NULL) {

	if( sharemark_init_shortcode( $atts ) ) {
			
			$price = sharemark_get_shareprice( $atts['code'] );

			if( $price && isset( $price->data->price ) ) {

				extract( (array)$price->data );	

				$change_class = '';

				if( $change > 0 ) { $change_class = 'increase'; }
				if( $change < 0 ) { $change_class = 'decrease'; }

				$background_color = isset($atts['color']) ? $atts['color'] : '#1D89E4';

				require('templates/template-price.php');

			} else {

				echo '<div class="sharemark-message">Sharemark is currently updating its index. Please refresh this page in a few seconds.</div>';

			}

	}

}

add_shortcode('sharemark-price', 'sharemark_price');


function sharemark_price_table($atts, $content = NULL) {

	if( sharemark_init_shortcode( $atts ) ) {

			$price = sharemark_get_shareprice( $atts['code'] );

			if( $price && isset( $price->data->price ) ) {

				extract( (array)$price->data );	

				$change_class = '';

				if( $change > 0 ) { $change_class = 'increase'; }
				if( $change < 0 ) { $change_class = 'decrease'; }

				$background_color = isset($atts['color']) ? $atts['color'] : '#1D89E4';

				require('templates/template-price-table.php');

			} else {

				echo '<div class="sharemark-message">Sharemark is currently updating its index. Please refresh this page in a few seconds.</div>';

			}

	}

}

add_shortcode('sharemark-price-table', 'sharemark_price_table');


function sharemark_announcements($atts, $content = NULL) {

	if( sharemark_init_shortcode( $atts ) ) {

		$announcements = sharemark_get_announcements( $atts['code'] );

		if( $announcements && count( $announcements->data ) > 1 ) {

			$announcements = (array)$announcements->data;

			require('templates/template-announcements.php');			

		}

	}

}

add_shortcode('sharemark-announcements', 'sharemark_announcements');
