<?php
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
define( 'DB_NAME', 'karma' );

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
define( 'AUTH_KEY',         '4c{;^}bmm:v0fP-<:Y_^_D3C3 `ybjdJ6m-nc?5+zAyW7[5k5rH-,|F`DtHE.JF8' );
define( 'SECURE_AUTH_KEY',  'b<)Wu2eD=c sxd?rNHM}9A>2;* V%d8h=519UrA`N^/O+gpyCV9X//z>mZ<fn{NB' );
define( 'LOGGED_IN_KEY',    't4,nOZ:g?Pk0r*1IIq!0)FpzD00?tFtuzyg3bL|^&L^O<fUnxrWXv.T?O~>0)]>:' );
define( 'NONCE_KEY',        '<;`2`$| ; z{x<m=]$<&(fRQY y:DnQ~IOYf-ubu^~;fsRog#;&qb=rdE^? +O{s' );
define( 'AUTH_SALT',        '4Q^Gf8fa)naP,(r{et)ou<a5sCMp_DvFxIE5$>cvwUtO0}lY&P95]N(%9_9z}XfQ' );
define( 'SECURE_AUTH_SALT', '90_)n%)gL,[V1gTj%v8!&hx2mf^Gvx56{,)4Kom}zsn%[/E,U~,0hq DP2>No8qu' );
define( 'LOGGED_IN_SALT',   '}<K]@Qj{fl&H3xf9vS 6Jq_8d&di4NZgF21V)6UU#_l=w&#JR%`EE[lML-GLLEQX' );
define( 'NONCE_SALT',       'L:<sp`0x2+]jL9hoPOxL|+X((1PV:zBY|GSXl>QUm@2kqX((FIIWkWu]:2a,bTK4' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'km_';

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
define('FS_METHOD', 'direct');
define( 'WPCF7_AUTOP', false );
define( 'WP_AUTO_UPDATE_CORE', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
