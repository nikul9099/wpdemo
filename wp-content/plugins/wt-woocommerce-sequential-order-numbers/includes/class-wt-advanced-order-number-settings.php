<?php

/**
 *	WooCommerce settings page 
 * 
 *	This code creates a full WooCommerce settings page by extending the WC_Settings_Page class.
 *	By extending the WC_Settings_Page class, we can control every part of the settings page.
 *
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Wt_Advanced_Order_Number_Settings_Page' ) ) :

class Wt_Advanced_Order_Number_Settings_Page extends WC_Settings_Page {
	
	public function __construct() {

		$this->id = 'wts_settings';
		$this->label = __('Sequential Order Number','wt-woocommerce-sequential-order-numbers');
		/**
		 *	Define all hooks instead of inheriting from parent
		 */

		// parent::__construct();

		// Add the tab to the tabs array
		add_filter( 'woocommerce_settings_tabs_array', array( $this, 'add_settings_page' ), 20 );

		// Add settings
		add_action( 'woocommerce_settings_' . $this->id, array( $this, 'output' ) , 20 );

		// Process/save the settings
		add_action( 'woocommerce_settings_save_' . $this->id, array( $this, 'save' ) ,20 );
	}

	

	/**
	 *	Get settings array
	 *
	 *	@return array
	 */
	public function get_settings() {

			$settings = array(

				array(
					'name' =>__('Settings Page','wt-woocommerce-sequential-order-numbers'),
					'type' => 'title',
					'desc' =>  __( 'Set custom sequential order numbers for WooCommerce orders.', 'wt-woocommerce-sequential-order-numbers' ),
					'id' => 'wt_sequencial_settings_page',
				),
				array(
					'title' => __( 'Start Number', 'wt-woocommerce-sequential-order-numbers' ),
					'type' => 'number',
					'desc' => __( 'The start number will be the first number for your order. For eg, if you enter 100 as starting number, the first order number will be 100.','wt-woocommerce-sequential-order-numbers'),
					'desc_tip' => true,
					'id'	=> 'wt_sequence_order_number_start',
					'default'  => 1,
					'css' => 'min-width:300px;',
				),
				array(
					'title' => __( 'Prefix', 'wt-woocommerce-sequential-order-numbers' ),
					'type' => 'text',
					'desc' => __( 'Prefix will be appended at the beginning of the order number. For eg, if you enter WT as the prefix with start number as 100, then your first order number will be WT100.','wt-woocommerce-sequential-order-numbers'),
					'desc_tip' => true,
					'id'	=> 'wt_sequence_order_number_prefix',
					'css' => 'min-width:300px;',

				),
				array(
					'name'     => __( 'Order number length', 'wt-woocommerce-sequential-order-numbers' ),
					'type' => 'number',
					'desc' => __( 'Maintains a fixed length for order number padded with ‘0’ excluding prefix. E.g, Entering order number length as 7 with order number 123 and prefix ‘wt’ will generate a sequential order number as wt0000123.','wt-woocommerce-sequential-order-numbers'),
					'desc_tip' => true,
					'id'	=> 'wt_sequence_order_number_padding',
					'default'  => 0,
					'css' => 'min-width:300px;',
				),
				array(
					'title' => __( 'Apply for all orders', 'wt-woocommerce-sequential-order-numbers' ),
					'desc'    => '<span >&#9888;</span><span style="color:red;">'.__( ' Enable to apply the above format for all existing orders.', 'wt-woocommerce-sequential-order-numbers' ).'</span>',
					'desc_tip' => __( 'Leave it unchecked to apply number format only for new orders.','wt-woocommerce-sequential-order-numbers' ),
					'id'	=> 'wt_renumerate',
					'default' => 'no',
					'type' => 'checkbox',
					'css' => 'min-width:300px;',
				),
				array(
					'title'   => __( 'Track orders', 'wt-woocommerce-sequential-order-numbers' ),
					'desc'    => __( 'Enable', 'wt-woocommerce-sequential-order-numbers' ),
					'id'      => 'wt_custom_order_number_tracking_enabled',
					'desc_tip' => __( 'Enable to track sequential order numbers. Facilitated via shortcode [woocommerce_order_tracking].','wt-woocommerce-sequential-order-numbers' ),
					'default' => 'yes',
					'type'    => 'checkbox',
					'css' => 'min-width:300px;',
				),
				array(
					'title'   => __( 'Search orders', 'wt-woocommerce-sequential-order-numbers' ),
					'desc'    => __( 'Enable', 'wt-woocommerce-sequential-order-numbers' ),
					'id'      => 'wt_custom_order_number_search',
					'desc_tip' => __( 'Enable to search the sequential order numbers from WooCommerce orders page.','wt-woocommerce-sequential-order-numbers' ),
					'default' => 'yes',
					'type'    => 'checkbox',
					'css' => 'min-width:300px;',
				),
				array(
					'type' => 'sectionend',
					'id' => 'wts_settings'
				),
			);

		return apply_filters( 'woocommerce_get_settings_' . $this->id, $settings );
	}

	/**
	 *	Output the settings
	 */
	public function output() {
		$settings = $this->get_settings();
		WC_Admin_Settings::output_fields( $settings );
	}

	/**
	 *	Process save
	 *
	 *	@return array
	 */
	public function save() {

		$settings = $this->get_settings();

		WC_Admin_Settings::save_fields( $settings );
		
		Wt_Advanced_Order_Number::save_settings();

	}
}

endif;

new Wt_Advanced_Order_Number_Settings_Page;