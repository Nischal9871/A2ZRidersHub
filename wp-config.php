<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '3>;yHZvU~q0>nJWoLH?qHr<b]&^<3L-(=mO=.i@&T{ooY[*%4R8)C[T@z19K6v!S' );
define( 'SECURE_AUTH_KEY',   'f>c0,LtR8X7iZ$>NX@vzEiFgA4R@U-1ZCvr.m(`unD*810!2-`-ph9C}3}F|b!/(' );
define( 'LOGGED_IN_KEY',     'm{6?oImT/p~l|p=wJO2!V<vt9p cES4]c5cJT21Z)2Ab?(]_rADoDa?~3g-UTF6<' );
define( 'NONCE_KEY',         'MQ^AqeG6xDFzYu_3I?Ky+iG9<nlV_I-+;m6$5h;J|BRFFZ*dCAN|={L8hnK-p5[-' );
define( 'AUTH_SALT',         ')HmLA5v/a@0u@m|tF8L59tWO+%_:5dz^D;$8lrZ]8_iq(WS)DoU[B1B$:elBUvxc' );
define( 'SECURE_AUTH_SALT',  '(F7{a<ZNoN-^lCYTQ=be2C*L<*oaLtE+vXcV69.1eqkj0AI9V*jv5qt:x%4>JGPR' );
define( 'LOGGED_IN_SALT',    'B:EE,.78e_YKJbzWNvgj$ZJ~fTmqd/olvF)|/jvXXA<PKx/vdSIG+-wIzk/yz2[~' );
define( 'NONCE_SALT',        '*2Yz$Wb(~rUigNI%HxlJ9pKXtH&DVS_u_pEQ{_.G6G0kyIahyi,(nxL,1)2xTWhc' );
define( 'WP_CACHE_KEY_SALT', '9q*6TJ:a~+H7n})&X1m*{re]&g1,{9k63nv{Z5gJ9RaQBZ`[Q{l/-)VsVznsHHuv' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
