<?php
/**
 * Helper methods.
 *
 * @package Woongkir
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}




if ( ! function_exists( 'woongkir_additional_my_test' ) ) :
	/**
	 * Check if plugin is active
	 *
	 * @since 1.0.0
	 */
	function woongkir_additional_my_test( ) {
		
		// MY TEST
		add_action( 'graphql_register_types', function() {
			register_graphql_object_type(
				'WOONGKIR_JSON',
				[
					'description' => __( 'w Type', '' ),
					'fields'      => [
						'country_url' => [
							'type'        => 'String',
							'description' => __( 'Site logo URL', '' ),
						],
						'country_key' => [
							'type'        => 'String',
							'description' => __( 'Site logo URL', '' ),
						],
						'province_url'    => [
							'type'        => 'String',
							'description' => __( 'Site logo URL', '' ),
						],
						'province_key'    => [
							'type'        => 'String',
							'description' => __( 'Site logo URL', '' ),
						],
						'city_url'        => [
							'type'        => 'String',
							'description' => __( 'Site logo URL', '' ),
						],
						'city_key'        => [
							'type'        => 'String',
							'description' => __( 'Site logo URL', '' ),
						],
						'subdistrict_url' => [
							'type'        => 'String',
							'description' => __( 'Site logo URL', '' ),
						],
						'subdistrict_key' => [
							'type'        => 'String',
							'description' => __( 'Site logo URL', '' ),
						],
					],
				]
			);
		});
		
		add_action( 'graphql_register_types', function() {
			register_graphql_object_type(
				'WOONGKIR_JSON22',
				[
					'description' => __( 'w Type', '' ),
					'fields'      => [
						'state' => [
							'type'        => 'String',
							'description' => __( 'Site logo URL', '' ),
						],
						'city' => [
							'type'        => 'String',
							'description' => __( 'Site logo URL', '' ),
						],
						'address_2' => [
							'type'        => 'String',
							'description' => __( 'Site logo URL', '' ),
						],
						
					],
				]
			);
		});
		add_action( 'graphql_register_types', function() {
			register_graphql_object_type(
				'WOONGKIR_JSON2',
				[
					'description' => __( 'w Type', '' ),
					'fields'      => [
						'placeholder' => [
							'type'        => 'WOONGKIR_JSON22',
							'description' => __( 'Site logo URL', '' ),
						],
						'label' => [
							'type'        => 'WOONGKIR_JSON22',
							'description' => __( 'Site logo URL', '' ),
						],
						
					],
				]
			);
		});

		add_action( 'graphql_register_types', function() {
			register_graphql_object_type(
				'WOONGKIR',
				[
					'description' => __( 'Header Type', '' ),
					'fields'      => [
						'method_id' => [
							'type'        => 'String',
							'description' => __( 'Site logo URL', '' ),
						],
						// 'json' => [
						// 	'type'        => 'WOONGKIR_JSON',
						// 	'description' => __( 'Site logo URL', '' ),
						// ],
						// 'show_settings' => [
						// 	'type'        => 'Boolean',
						// 	'description' => __( 'Site logo URL', '' ),
						// ],
						// 'text' => [
						// 	'type'        => 'WOONGKIR_JSON2',
						// 	'description' => __( 'Site logo URL', '' ),
						// ],
					],
				]
			);
		});
		add_action( 'graphql_register_types', function() {
			register_graphql_object_type(
				'Address',
				[
					'description' => __( 'Header Type', '' ),
					'fields'      => [
						'billing_country' => [
							'type'        => 'String',
							'description' => __( 'Site logo URL', '' ),
						],
						'billing_state' => [
							'type'        => 'String',
							'description' => __( 'Site logo URL', '' ),
						],
						'billing_city' => [
							'type'        => 'String',
							'description' => __( 'Site logo URL', '' ),
						],
						'billing_district' => [
							'type'        => 'String',
							'description' => __( 'Site logo URL', '' ),
						],
						'shipping_country' => [
							'type'        => 'String',
							'description' => __( 'Site logo URL', '' ),
						],
						'shipping_state' => [
							'type'        => 'String',
							'description' => __( 'Site logo URL', '' ),
						],
						'shipping_city' => [
							'type'        => 'String',
							'description' => __( 'Site logo URL', '' ),
						],
						'shipping_district' => [
							'type'        => 'String',
							'description' => __( 'Site logo URL', '' ),
						],
					],
				]
			);
		});

		add_action( 'graphql_register_types', function()  {
			register_graphql_field( 'RootQuery', 'getWoongkir', [
			  'type' => 'WOONGKIR',
			  'description' => __( 'Example field added to the Post Type', 'replace-with-your-textdomain' ),
			  'resolve' => function( ) {
				// return woongkir_scripts_params();
				$lib	= new Ongkoskirim_Id_Library();
				global $woocommerce;
				
				// return 'string here';
				return array('method_id' => wp_json_encode($woocommerce->shipping->get_packages()));
				
			  }
			] );
		  });
		add_action( 'graphql_register_types', function()  {
			register_graphql_field( 'RootQuery', 'getCustomerAddress', [
			  'type' => 'Address',
			  'description' => __( 'Example field added to the Post Type', 'replace-with-your-textdomain' ),
			  'resolve' => function( ) {
				// return woongkir_scripts_params();
				$lib	= new Ongkoskirim_Id_Library();
				
				$customer	= array();
				$customer['billing_country']	= get_user_meta(get_current_user_id(), 'billing_country', true);
			$customer['billing_state']		= get_user_meta(get_current_user_id(), 'billing_state', true);
			$customer['billing_city']		= get_user_meta(get_current_user_id(), 'billing_city', true);
			$customer['billing_district']	= get_user_meta(get_current_user_id(), 'billing_district', true);
			$customer['shipping_country']	= get_user_meta(get_current_user_id(), 'shipping_country', true);
			$customer['shipping_state']		= get_user_meta(get_current_user_id(), 'shipping_state', true);
			$customer['shipping_city']		= get_user_meta(get_current_user_id(), 'shipping_city', true);
			$customer['shipping_district']	= get_user_meta(get_current_user_id(), 'shipping_district', true);
				
				
				// return array('method_id'=> json_encode($lib->remote_get_cities()));
				// return array('method_id'=> json_encode($customer));
				return $customer;
			  }
			] );
		  });
	}
endif;
