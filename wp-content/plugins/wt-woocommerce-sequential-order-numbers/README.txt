=== Sequential Order Number for WooCommerce ===
Contributors: webtoffee
Donate link: https://www.webtoffee.com/plugins/
Tags: sequential order number, woocommerce order number, woocommerce sequential order number, woocommerce custom order number, advanced order number, WooCommerce order number, Order number, Sequential, custom order numbers, sequential order, custom order number, change order number
Requires at least: 3.0.1
Tested up to: 5.7
Stable tag: 1.3.5
Requires PHP: 5.6
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

This sequential order number plugin is the best option to format or generate sequential order numbers for your existing and new WooCommerce orders.

== Description ==

This free sequential order number for WooCommerce plugin enables you to re-arrange or format your existing and new order numbers into a sequential format.

WordPress uses an ID system for posts, pages, and media files. WooCommerce uses the same ID for order numbers too. When a new WooCommerce order is created it may not always get the next order in sequence as the ID may have already been used up by another post or page. Using this custom order number plugin, you will always get sequential numbers for your WooCommerce orders.

If you have no orders in your store, your orders will start counting from order number 1. If you have existing orders, the order number will pick up from your highest order number.

== Features of the Sequential Order Number for WooCommerce Plugin ==

* Supports **sequential order numbers** for WooCommerce
* Option to set **custom starting number** for orders.
* Option to add **prefix** to order number.
* Option to set **custom order number width**.
* Option to keep **existing order numbers**.
* Option to **admin order search** by custom order number.
* Supports **Subscription orders**.
* Option to enable **order tracking** with sequential order numbers.
* **WPML** Compatible.
* Supports WooCommerce custom order numbers (add a prefix, starting order number, etc.)
* Compatibility with WooCommerce Subscriptions and WebToffee subscriptions plugins.
* Tested OK with PHP 8
* Tested OK with WooCommerce 5.3.


>If you like to make your other plugin (invoice/payment/shipment) compatible with Sequential Order Numbers for WooCommerce, please make the below tweak.

>Instead of referencing $order->id or $order->get_id() when fetching order data, use $order->get_order_number()

== Installation and Setup of the Sequential Order Number Plugin ==

To learn about the installation and setup of the plugin visit the <a rel="nofollow" href="https://www.webtoffee.com/sequential-order-number-woocommerce-plugin-user-guide/"> WooCommerce sequential order number plugin</a> documentation. 

== Importance of Sequential Order Numbers for WooCommerce ==

Usually, a WooCommerce store receives hundreds and thousands of orders each day. Each of these orders has to be recorded for the smooth functioning of the store and any future reference of the same. When WooCommerce order numbers are in sequence it makes order management easy.

The WooCommerce Sequential order number plugin helps make store management effortless by converting all order numbers to a sequential format. You can sort, delete, or change order numbers without taking up much time.

A sequential order number system has its advantages in improving the efficiency of the store and the pace of its transactions. Therefore enabling your store to generate sequential or custom order numbers is a must for the effective management of your WooCommerce store orders.

== Benefits of Sequential Order Numbers for WooCommerce ==

**Makes store management easy** - Using sequential order numbers helps make store management easy and flexible. Order numbers being in a sequence helps easily estimate the orders received each day hence making order management easy for the store.

**Helps you to find and track orders fast** – If you have a huge WooCommerce store with orders pouring in each day. Tracking a particular order is going to be a tiresome task. Thus by assigning a unique identity to each order, it gets easy to track or find a particular order among thousands of orders.

**Effortless estimation of the number of orders received** – When order numbers are given in a sequence of natural numbers or alphabets it becomes easy to estimate the number of orders in your store within seconds.

**Easier recording of orders** – Sequential order numbers helps to record orders easily. When random numbers are given for orders store owner will have a hard time keeping a record of the orders.  


= About WebToffee.com =

<a rel="nofollow" href="https://www.webtoffee.com/">WebToffee</a> creates quality WordPress/WooCommerce plugins that are easy to use and customize. We are proud to have thousands of customers actively using our plugins across the globe.


== Frequently Asked Questions ==

= Can I do custom formatting for the order number? =

Yes, you can set a custom prefix and start number.

= Does it work with subscription orders? =

Yes, The plugin supports WooCommerce subscriptions.

= Can I set an order number prefix/suffix? =

You can set a custom prefix for order numbers using the plugin.

= Can I add custom order number width? =

Yes, you can set a custom order number width.

= How to make my payment gateway plugin compatible with the plugin? =

Using the below tweak you can make your payment/invoice/shipping plugin compatible with the Sequential orders. Instead of referencing $order->id or $order->get_id() when fetching order data, use $order->get_order_number()

= Is it possible to add order date prefix to sequential order numbers? =

Yes. It's possible to add order date prefix. Please Refer to <a rel="nofollow" href="https://www.webtoffee.com/add-order-date-prefix-to-woocommerce-sequential-order-numbers/">this article</a>.

== Related plugins from WebToffee ==

* **PDF Invoice, Packing Slips, Delivery notes, and Shipping Label Plugin for WooCommerce -** Automatically generate and print invoice and related shipping documents in your WooCommerce store.
* **Order/Coupon Import Export Plugin -** Custom or bulk export orders and/or coupons to a CSV and import them to your WooCommerce store.
* **Stripe Payment Gateway Plugin for WooCommerce -** Connect your WooCommerce store with Stripe and accept payments through credit/debit cards, Apple pay, Google pay, Alipay, and Stripe checkout via the Stripe payment gateway.
* **PayPal Express Payment Gateway Plugin for WooCommerce -** Connect your WooCommerce store with PayPal Express payment gateway and let your customers pay using credit/debit cards and PayPal money without leaving your website.


== Screenshots ==

1. WooCommerce sequential order number settings
2. Sequencial order numbers in Woocommerce shop order page


== Changelog ==

= 1.3.5 =
 * Bug fix- Activation issue in multisite

= 1.3.4 =
 * WordPress 5.7.2 Tested OK
 * WooCommerce 5.3 Tested OK
 * Readme Update
 
= 1.3.3 =
 * Added option to set order number width.
 * WooCommerce 5.2.2 Tested OK
 * Bug fix - Sequential order number skipping.
 * Uninstall feedback improvement

= 1.3.2 =
 * WooCommerce 5.2.1 Tested OK
 * WordPress 5.7.1 Tested OK
 * Bug fix - Plugin version number missing in uninstall feedback.

= 1.3.1 =
 * WooCommerce 5.1 Tested OK
 * WordPress 5.7 Tested OK
 * FAQ Update.
 * PO File Update.
 * WPML Compatibility

= 1.3.0 =
 * WooCommerce 5.0 Tested OK
 * WordPress 5.6.2 Tested OK
 * Moved plugin settings page to WooCommerce settings page.
 * Added Option to Keep Existing Order Numbers.
 * Added Option to Enable/Disable order tracking using [woocommerce_order_tracking] shortcode.
 * Added Option to Enable/Disable admin order search by sequential order number.
 * Settings Page Style Update.
 * Help text Improvement
 * Screenshot Update.

= 1.2.7 =
 * WooCommerce 4.9.2 Tested OK
 * WordPress 5.6.1 Tested OK
 * Review request banner.
 * Settings Page Style Update.
 * Screenshot Update.

= 1.2.6 =
 * WooCommerce 4.9.1 Tested OK
 * Added support for [woocommerce_order_tracking] shortcode.
 * Readme Update.
 * Screenshot Update.
 * PHP8 Compatibility Updates.

= 1.2.5 =
 * Added compatibility with Woocommerce Subscription
 * Added compatibility with Webtoffee Subscription
 * Bug fix - Duplicating order numbers.

= 1.2.4 =
 * WooCommerce 4.8.0 Tested OK
 * WordPress 5.6 Tested OK

= 1.2.3 =
 * WooCommerce 4.3.3 Tested OK

= 1.2.2 =
 * WooCommerce 4.3.1 Tested OK

= 1.2.1 =
 * WooCommerce 4.0.1 Tested OK
 * WordPress 5.4 Tested OK

= 1.2.0 =
 * WooCommerce 4.0.0 Tested OK

= 1.1.9 =
* Feedback Capture Improvement.

= 1.1.8 =
* Security update.

= 1.1.7 =
* Tested OK with WP 5.4 Beta and  WooCommerce 3.9.1

= 1.1.6 =
* Tested OK with WP 5.3 and  WooCommerce 3.8.1

= 1.1.5 =
* WC tested OK with 3.7.1. 

= 1.1.4 =
* WC tested OK with 3.7.0. 

= 1.1.3 =
* Bug fix with last update. 

= 1.1.2 =
* Introduced Settings 
* Custom Start Number
* Custom Prefix

= 1.1.1 =
* Tested OK with WP 5.2 and  WooCommerce 3.6.5

= 1.1.0 =
* Tested OK with WP 5.1.1 and  WooCommerce 3.5.7

= 1.0.9 =
* Tested OK with WP 5.0.3 and  WooCommerce 3.5.3

= 1.0.8 =
* Content updates.

= 1.0.7 =
* Content updates.

= 1.0.6 =
* Tested OK with WooCommerce 3.5.1

= 1.0.5 =
* WC Tested OK with 3.4.5.

= 1.0.4 =
* Optimization.

= 1.0.3 =
* Minor content changes.

= 1.0.2 =
* Readme content updates.

= 1.0.1 =
* Fixed issue with dashboard order search functionality.

= 1.0.0 =
* Initial commit.

== Upgrade Notice ==

= 1.3.5 =
 * Bug fix- Activation issue in multisite