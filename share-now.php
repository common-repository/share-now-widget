<?php
/**
 * WordPress (http://wordpress.org) Share now! plugin.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 *
 ***********************************************************************
 * This program is distributed in the hope that it will be useful, but *
 * WITHOUT ANY WARRANTY; without even the implied warranty of          *
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.                *
 ***********************************************************************
 *
 *
 * @author Bruno Pedro <bpedro@tarpipe.com>
 * @copyright Copyright (c) 2009,2010 tarpipe, SA
 * @version 0.9.0
 */
/*
Plugin Name: Share now!
Plugin URI: http://tarpipe.com/tools/widget
Description: Let users share your content without ever leaving your blog.
Author: tarpipe
Version: 0.9.0
Author URI: http://tarpipe.com/
*/

function tp_share_now_widget_show($text)
{
    $e = error_reporting(0);
    $title = html_entity_decode(get_the_title($post->ID), ENT_QUOTES, 'UTF-8');
    if (!is_feed()) {
        $text .= '<p style="white-space:nowrap"><script type="text/javascript" src="http://tarpipe.com/js/widget.js">' .
                 '{title:"' . $title . '",url:"' . get_permalink($post->ID) . '"}' .
                 '</script></p>';
    } else {
        $text .= '<p style="white-space:nowrap"><img style="border:0px" src="http://tarpipe.com/img/tarpipe.png" />&nbsp;' .
                 '<a target="_blank" href="http://tarpipe.com/share/?t=' . urlencode($title) .
                 '&u=' . urlencode(get_permalink($post->ID)) .
                 '&b=Reading ' . urlencode('"' . $title . '"') .
                 '">' . 'Share now!</a></p>';
    }
    error_reporting($e);
    return $text;
}

add_filter('the_content', 'tp_share_now_widget_show');
?>