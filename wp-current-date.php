<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://inspiworks.com/wp-current-date.zip
 * @since             1.0.0
 * @package           Wp_Current_Date
 *
 * @wordpress-plugin
 * Plugin Name:       WP Current Date/Year
 * Plugin URI:        http://inspiworks.com/wp-current-date.zip
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            inspiworks
 * Author URI:        https://inspiworks.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-current-date
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function currentYear(){
    return date('Y');
}

//Different display of current month
function currentMonth($atts){
	$month=array();
	$month = extract(shortcode_atts(array(
		"format" => 'full'
	), $atts));
if(is_array($atts) && $atts['format']== "semi")
{
	return date('M');
}
elseif(is_array($atts) && $atts['format'] == "numerical")
	{
		return date('m');
	}
else{
		return date('F');
	}
	
}


//Display week number in current year
function currentWeek($atts){
	return date('W');
}

//Display current day
function currentDay($atts){
	$day=array();
	$day = extract(shortcode_atts(array(
		"reference" => 'week',
		"format" => 'text'
	), $atts));
		if(is_array($atts) && $atts['reference']== "year"){
			$temp= date('z') +1;
			return $temp;
			
		}
		elseif(is_array($atts) && $atts['reference']== "month")
		{
			return date('j');
		}
		elseif(is_array($atts) && $atts['reference']== "week" && $atts['format']=="numerical")
		{
			$temp = date('w') +1;
			return $temp;
		}
		elseif(is_array($atts) && $atts['reference']== "week" && $atts['format']=="text"){
			return date('l');
		}
		
}

add_shortcode( 'year', 'currentYear' );
add_shortcode('month', 'currentMonth');
add_shortcode('week', 'currentWeek');
add_shortcode('timezone', 'currentTimeZone');
add_shortcode('day', 'currentDay');





