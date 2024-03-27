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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'tradeservice' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'Ah D/_Drq->qT1jPv8L0CM[{L?h~`)T7Z#Gwtcvm`{aT-i[<-K)-GC1&7:sR9^-3' );
define( 'SECURE_AUTH_KEY',  '2N2h&tOPaX9ypXT/sZB3<->P+&KL/hr{;B<jh-7m)Z/!3cryUBI.wUAiS)&A^[8,' );
define( 'LOGGED_IN_KEY',    'gl7w`j(^s(:AiiBb<4]0gqM>6-8A7~?*,3G n`^<DH2qeQbVrR9:[(Xo]j+_p2@/' );
define( 'NONCE_KEY',        '~.)Mj7VRbt2mojG(qcHi*;[gLM e6@b{|[gOvw/F%!:-V6j2.S~C|!3Y%~uL{,H$' );
define( 'AUTH_SALT',        '`V,qKoFz52!1HACX^@(;DbjyiyJY wj%VVx-P<F1w7?^2]&`eZ(K!Cg(.ve{;H1?' );
define( 'SECURE_AUTH_SALT', 'NoXU<>hasPnlj;>b5;>cL~c@B$VxxgB[-)!wf[k^@Ue-K`|&p0hYI Idh+20JwUV' );
define( 'LOGGED_IN_SALT',   'ScLw3Rj!.(1j)s(@gh0*7*!i:U}>GSZS<HHHO;{iEYc46GuCil1NwncCsRg6s}]:' );
define( 'NONCE_SALT',       '?rO%ul/PZY4+hA`H;0/ehoE|@pvFtI|#}J`(!E0{w#AgPBgtN,c6tim8bE_) L5|' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
