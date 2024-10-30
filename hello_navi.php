<?php
/**
 * @package Hello_Navi
 * @version 1.1
 */
/*
Plugin Name: Hello Navi
Plugin URI: https://wordpress.org/plugins/hello-navi
Description: This plugin is here to remind you one of the most traumatic (and all other) videogames sentences: <cite>Navi's sentence</cite>, from <cite>The Legend of Zelda: Ocarina of Time</cite> in the upper right of your admin screen on every page. This is based off the Hello, Dolly plugin.
Author: Arthur Brugiere
Version: 1.1
Author URI: http://www.arthurbrugiere.fr
*/

function hello_navi_get_quote() {
	/** These are excerpts from the game: The Legend of Zelda: Ocarina of Time */
	$quotes = "Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
HEY! LISTEN!
Hey! Listen!
Hey listen!
Hey!
Listen!
Watch out!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
HEY! LISTEN!
Hey! Listen!
Hey listen!
Hey!
Listen!
Watch out!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
Hey, listen!
HEY! LISTEN!
Hey! Listen!
Hey listen!
Hey!
Listen!
Watch out!
Watch out!
Watch out!
Watch out!
Watch out!
Watch out!
Watch out!
Watch out!
Watch out!
Watch out!
Watch out!
Watch out!
Watch out!
Watch out!
Watch out!
Watch out!
Watch out!
Watch out!
Watch out!
Watch out!
Watch out!
Watch out!
Watch out!
Watch out!
Watch out!
Look!
Hello!
Would you like to talk to Saria?
Really? Would you like to talk to me instead?
Hello, Link. Wake up.
Look, Link! You're big now!!! You've grown up!
It looks like this item doesn't work here...
?? No response. He's still asleep...
Link! I can't help you!
There's no way he's going to hold me back again! This time, we fight together!
Should we believe what Sheik told us and go to Kakariko village?
WHAAAAT!!! Look at all those flags! Can you figure out which ones are real?";

	// Here we split it into lines
	$quotes = explode( "\n", $quotes );

	// And then randomly choose a line
	return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_navi() {
	$chosen = hello_navi_get_quote();
	echo "<p id='hal'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_navi' );

// We need some CSS to position the paragraph
function navi_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#hal {
		float: $x;
		padding-$x: 5px;
		padding-top: 5px;		
		margin: 0;
		font-size: 12px;
	}
	</style>
	";
}

add_action( 'admin_head', 'navi_css' );

?>
