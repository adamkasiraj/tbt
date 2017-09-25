<?php
/**
 * Add WooCommerce support
 *
 * @package understrap
 */
add_action( 'after_setup_theme', 'woocommerce_support' );
if ( ! function_exists( 'woocommerce_support' ) ) {
	/**
	 * Declares WooCommerce theme support.
	 */
	function woocommerce_support() {
		add_theme_support( 'woocommerce' );
		
		// Add New Woocommerce 3.0.0 Product Gallery support
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-zoom' );

		// Gallery slider needs Flexslider - https://woocommerce.com/flexslider/
		//add_theme_support( 'wc-product-gallery-slider' );

		// hook in and customizer form fields.
		add_filter( 'woocommerce_form_field_args', 'wc_form_field_args', 10, 3 );
	}
}
/**
 * Filter hook function monkey patching form classes
 * Author: Adriano Monecchi http://stackoverflow.com/a/36724593/307826
 *
 * @param string $args Form attributes.
 * @param string $key Not in use.
 * @param null   $value Not in use.
 *
 * @return mixed
 */
function wc_form_field_args( $args, $key, $value = null ) {
	// Start field type switch case.
	switch ( $args['type'] ) {
		/* Targets all select input type elements, except the country and state select input types */
		case 'select' :
			// Add a class to the field's html element wrapper - woocommerce
			// input types (fields) are often wrapped within a <p></p> tag.
			$args['class'][] = 'form-group';
			// Add a class to the form input itself.
			$args['input_class']       = array( 'form-control', 'input-lg' );
			$args['label_class']       = array( 'control-label' );
			$args['custom_attributes'] = array(
				'data-plugin'      => 'select2',
				'data-allow-clear' => 'true',
				'aria-hidden'      => 'true',
				// Add custom data attributes to the form input itself.
			);
			break;
		// By default WooCommerce will populate a select with the country names - $args
		// defined for this specific input type targets only the country select element.
		case 'country' :
			$args['class'][]     = 'form-group single-country';
			$args['label_class'] = array( 'control-label' );
			break;
		// By default WooCommerce will populate a select with state names - $args defined
		// for this specific input type targets only the country select element.
		case 'state' :
			// Add class to the field's html element wrapper.
			$args['class'][] = 'form-group';
			// add class to the form input itself.
			$args['input_class']       = array( '', 'input-lg' );
			$args['label_class']       = array( 'control-label' );
			$args['custom_attributes'] = array(
				'data-plugin'      => 'select2',
				'data-allow-clear' => 'true',
				'aria-hidden'      => 'true',
			);
			break;
		case 'password' :
		case 'text' :
		case 'email' :
		case 'tel' :
		case 'number' :
			$args['class'][]     = 'form-group';
			$args['input_class'] = array( 'form-control', 'input-lg' );
			$args['label_class'] = array( 'control-label' );
			break;
		case 'textarea' :
			$args['input_class'] = array( 'form-control', 'input-lg' );
			$args['label_class'] = array( 'control-label' );
			break;
		case 'checkbox' :
			$args['label_class'] = array( 'custom-control custom-checkbox' );
			$args['input_class'] = array( 'custom-control-input', 'input-lg' );
			break;
		case 'radio' :
			$args['label_class'] = array( 'custom-control custom-radio' );
			$args['input_class'] = array( 'custom-control-input', 'input-lg' );
			break;
		default :
			$args['class'][]     = 'form-group';
			$args['input_class'] = array( 'form-control', 'input-lg' );
			$args['label_class'] = array( 'control-label' );
			break;
	} // end switch ($args).
	return $args;
}

// Hides the "Showing X results" message underneath the title on the Gifts page.
remove_action("woocommerce_before_shop_loop", "woocommerce_result_count", 20);

// Removes the "SKU" message on the product pages.
function remove_product_page_skus($enabled) {
	if (!is_admin() && is_product()) {
		return false;
	}

	return $enabled;
}
add_filter('wc_product_sku_enabled', 'remove_product_page_skus');

// Changes the name of the "Add To Cart" buttons
function product_add_to_cart_text() {
	global $product;
	$product_type = $product->product_type;

	switch ($product_type) {
		case 'external':
			return __('Buy product', 'woocommerce');
			break;
		case 'grouped':
			return __('View products', 'woocommerce');
			break;
		case 'simple':
			return __('Add to Bike Bag', 'woocommerce');
			break;
		case 'variable':
			return __('Select options', 'woocommerce');
			break;
		default:
			return __('Read more', 'woocommerce');
	}
}
add_filter('woocommerce_product_add_to_cart_text' , 'product_add_to_cart_text');

// Changes the name of the "Add To Cart" buttons on the product pages
function single_add_to_cart_text() {
	return __('Add to Bike Bag', 'woocommerce');
}
add_filter('woocommerce_product_single_add_to_cart_text', 'single_add_to_cart_text');