<?php
/**
 * @package Which_Server
 * @version 1.0
 */
/*
Plugin Name: Which Server
Plugin URI: http://github.com/micahwalter/which-server/
Description: A stupid simple wordpress plugin that displays the current hostname
Author: Micah Walter
Version: 1.0
Author URI: http://micahwalter.com/
*/


// This just echoes the current app server
function which_server() {
	$the_server = gethostname();
	echo "<p id='server'>$the_server</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'which_server' );

// We need some CSS to position the paragraph
function server_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#server {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'server_css' );

?>