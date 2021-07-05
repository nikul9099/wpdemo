<?php
define( 'WP_CACHE', false ); 
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wpdemo' );
/** MySQL database username */
define( 'DB_USER', 'root' );
/** MySQL database password */
define( 'DB_PASSWORD', '' );
/** MySQL hostname */
define( 'DB_HOST', 'localhost' );
/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );
/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '/xu:mKl//UbTe&ZV6(~V1V|vM=>z3ux5k:+2]gN^k 9!yllI_5N<!8aOFy|tKdy!' );
define( 'SECURE_AUTH_KEY',  'Fx*]{Q-`:R3KmG#IE@J&7/5K.$Ajc@;CUXP_>%])M<?n0&$8mpi43(Gjh <1g^ET' );
define( 'LOGGED_IN_KEY',    'h!O~Sm+p*/D4o$b6*)lYF!}4kImw_-YS6yDZ95Ti+qMdR*FOWF@KxP}=8nBB<>j)' );
define( 'NONCE_KEY',        'i%RdCpw={@k so+d99Kf@)M`/NFKVwY%E!leWAz`%AT6M@`)?C5BXXYUkrHVcOB?' );
define( 'AUTH_SALT',        '.)E_FRn;CUO IbyGBC6Z2F;ITvUn.IoP6eeZv3)[Dzx{KK~yZ!4.s$61^EGw27[n' );
define( 'SECURE_AUTH_SALT', 'e@,qmJJR+{-gM^d,fdf$q@M}t_@20I+,]/-A3ft>5H=Re8Hpvo91dkK(Xe=f};7j' );
define( 'LOGGED_IN_SALT',   'qKcIqu J,gj<O#vuvT%W/C*i ]d[MDP|=5Y!ppmSfjIp|q@(]FC&!v}4^!q4K`Y5' );
define( 'NONCE_SALT',       'ca|HPDp&p=S+XQG&oYL)vW}{3[#k7Q[iss,s]pQcH]X4v1F;+R(Do+Z(f!&DZ9nR' );
/**#@-*/
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';
/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';