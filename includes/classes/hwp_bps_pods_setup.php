<?php
/**
 * Setup Topic Pod for this plugin
 *
 * @package   hwp_bpp
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2014 Josh Pollock
 */

class hwp_bpi_pods_setup {

	function __construct( ) {

		add_filter( 'hwp_bpp_topic_fields', array( $this, 'fields' ) );
		$this->setup();

	}

	/**
	 * Adds fields to the topic Pod, and if need be extends the topic CPT.
	 *
	 * @return hwp_bpp_configure_pods
	 */
	function setup() {
		$create = $meta = true;
		$api = pods_api();
		if ( $api->pod_exists( $params[ 'name'] = 'topic' ) ) {
			$create = false;
			$pod = $api->load_pod( $params[ 'name'] = 'topic' );
			if ( 'table' === pods_v( 'storage', $pod ) ) {
				$meta = false;
			}
		}

		return hwp_bbp_setup_pods( $meta, $create, true );

	}

	function fields() {

		return array(
			'priority' => array(
				'name' => 'priority',
				'label' => 'Priority',
				'description' => '',
				'help' => '',
				'default' => NULL,
				'type' => 'boolean',
			),

		);

	}


} 
