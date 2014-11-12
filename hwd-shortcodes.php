<?php

/*
Plugin Name: HWD Shortcodes
Plugin URI: https://github.com/HealthyWebDeveloper/HWD-shortcodes/
Description: Add additional customizations to WordPress.
Version: 1.8.5
Author: Bradford Knowlton
Author URI: http://bradknowlton.com/
License:           GNU General Public License v2
License URI:       http://www.gnu.org/licenses/gpl-2.0.html
GitHub Plugin URI: https://github.com/HealthyWebDeveloper/HWD-shortcodes/
GitHub Branch:     master
*/

// mobile code based on code from http://jes.se.com/wp-mobile-detect

/*
WP Mobile Detect
Copyright (C) 2012, Jesse Friedman - http://jes.se.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

/********************************************//**
* PHP Mobile Detect class used to detect browser or device type
***********************************************/
require_once('mobile-detect.php');

$detect = new Mobile_Detect();


/********************************************//**
* Generates [notmobile][/notmobile] shortcode which shows content on desktops or tablets
***********************************************/
function wpmd_notphone( $tats, $content="" ) {
	global $detect;
	if( ! ( $detect->isMobile() || $detect->isTablet() || is_feed() ) ) return do_shortcode($content);
}
add_shortcode( 'notphone', 'wpmd_notphone' );


/********************************************//**
* Generates [notrss][/notrss] shortcode which shows content not on rss
***********************************************/
function hwd_notrss( $tats, $content="" ) {
	global $detect;
	if( ! is_feed() ) return do_shortcode($content);
}
add_shortcode( 'notrss', 'hwd_notrss' );



