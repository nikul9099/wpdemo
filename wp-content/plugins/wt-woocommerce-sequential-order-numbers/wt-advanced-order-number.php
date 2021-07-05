<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              webtoffee.com
 * @since             1.0.0
 * @package           Wt_Advanced_Order_Number
 *
 * @wordpress-plugin
 * Plugin Name:       Sequential Order Numbers for WooCommerce
 * Plugin URI:        https://wordpress.org/plugins/wt-woocommerce-sequential-order-numbers/
 * Description:       Automatically sets sequential order number for WooCommerce orders placed by either customers or by admin through backend.
 * Version:           1.3.5
 * Author:            WebToffee
 * Author URI:        https://www.webtoffee.com/
 * License:           GPLv3
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * WC requires at least: 2.1.0
 * WC tested up to:   5.3
 * Text Domain:       wt-woocommerce-sequential-order-numbers
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WT_SEQUENCIAL_ORDNUMBER_VERSION', '1.3.5' );

if (!defined('WT_SEQUENCIAL_ORDNUMBER_BASE_NAME')) {
    define('WT_SEQUENCIAL_ORDNUMBER_BASE_NAME', plugin_basename(__FILE__));
}

if (!defined('WT_SEQUENCIAL_ORDNUMBER_URL')) {
    define ( 'WT_SEQUENCIAL_ORDNUMBER_URL', plugin_dir_url(__FILE__));
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wt-advanced-order-number-activator.php
 */
function activate_wt_advanced_order_number() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wt-advanced-order-number-activator.php';
	Wt_Advanced_Order_Number_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wt-advanced-order-number-deactivator.php
 */
function deactivate_wt_advanced_order_number() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wt-advanced-order-number-deactivator.php';
	Wt_Advanced_Order_Number_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wt_advanced_order_number' );
register_deactivation_hook( __FILE__, 'deactivate_wt_advanced_order_number' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wt-advanced-order-number.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/class-wt-seqordnum-uninstall-feedback.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
if(!function_exists('run_wt_advanced_order_number'))
{
	function run_wt_advanced_order_number() {

		$plugin = new Wt_Advanced_Order_Number();
		$plugin->run();

	}
}

if(function_exists('run_wt_advanced_order_number'))
{
    if(in_array( 'woocommerce/woocommerce.php',apply_filters('active_plugins',get_option('active_plugins'))) || array_key_exists( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_site_option( 'active_sitewide_plugins', array() ) ) )) 
    {
    	run_wt_advanced_order_number(); 
    }else
    {
        if(!function_exists('WC'))
        {
            add_action('admin_notices', 'wt_seq_require_wc_admin_notice');
            function wt_seq_require_wc_admin_notice()
            {
                ?>
                <div class="error">
                    <p><?php echo sprintf(__('%s Sequential Order Number for WooCommerce %s is enabled but not effective. It requires %s WooCommerce %s in order to work.', 'wt-woocommerce-sequential-order-numbers'), '<b>', '</b>', '<a href="https://wordpress.org/plugins/woocommerce/" target="_blank">', '</a>'); ?></p>
                </div>
                <?php
            }
        }
    }
}