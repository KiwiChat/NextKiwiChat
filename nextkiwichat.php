<?php
/*
Plugin Name: NextKiwiChat
Plugin URI: https://github.com/kiwichat/NextKiwiChat
Description: Allows you to embed a KiwiIRC IRC client with a shortcode.
Version: 1.0
Author: KiwiChat &lt;<a href="mailto:kiwichat@email.com">kiwichat@mail.com</a>&gt;
Author URI: https://showchat.tk
License: GNU General Public License
*/

function nextchat_embed_func($atts) {
	extract(shortcode_atts(array(
		'width'		=> '100%',
		'height'	=> '550px',
		'plugins'	=> 'conference',
		'host'	=> 'irc.freenode.com',
		'channel'	=> '#lobby',
		'theme'	    => 'sky'
	), $atts));
		//User Nick
	if(!is_user_logged_in()) {
		$nick = __('User??', 'nextkiwichat');
	} else {
		global $current_user;
		get_currentuserinfo();
		$nick = $current_user->display_name;
	}
	return '<iframe style="width:'.$width.';height:'.$height.';border:0;" src="https://kiwiirc.com/nextclient/?plugins='.$plugins.'&theme='.$theme.'#irc://'.$host.'/'.$channel.'?nick='.$nick.'"></iframe>';
}
add_shortcode('nextkiwichat', 'nextchat_embed_func');
?>
