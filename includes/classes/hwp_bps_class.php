<?php
/**
 * Main class for this plugin
 *
 * @package   hwp_bps
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2014 Josh Pollock
 */

class hwp_bps_class {
	function __construct() {
		add_filter( 'the_title', array( $this, 'title' ) );
	}

	function title( $title ) {
		global $post;
		if ( ! is_admin() && is_object( $post ) && $post->post_type == 'topic' ) {
			$title = '<span class="hwp-bps-priority-topic-tag">[Priority]</span>'.$title;
		}

		return $title;
	}

} 
