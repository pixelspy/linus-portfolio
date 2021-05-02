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
define( 'DB_NAME', 'linus_portfolio' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '(J*yST8[D8O96^,;X$DQ3cQcZnwVW|b_.>,S8y@ubeyMBE}NK`9^^_RbO,p32=u7' );
define( 'SECURE_AUTH_KEY',  'y2&bm.T-$RF-xF3;di&[C?6kYgBp2g?7+zb/zaWLj9&H%:Y;^].ZADN6Ac6z!dMR' );
define( 'LOGGED_IN_KEY',    'VI$jPp1wr>:TZCGZEyI6x:J1Ebgc?~0Hy-:PIW2?Ozdx<<vy  y<Qfw7voqXSp&,' );
define( 'NONCE_KEY',        'Au%My]wtyA!sM]V L2fKQ&c`x-Uq>ouw>4 e`K(b!LQ3?dg|x*b;vZt5J6S!rS[i' );
define( 'AUTH_SALT',        'GEZ i,yJLNVJ!2~xDb}v`,1SibB2xG<LeYT^-P8.jptgsK7BqO18AAE<KP)pm4F|' );
define( 'SECURE_AUTH_SALT', '-H@l%<,Mw,Y5j;=/u)5|~YaKA|HB%`R.8z%1bHj#xcuE;F/1?:tGB!!.zV]!9)x0' );
define( 'LOGGED_IN_SALT',   '#!S)I_+j*5 /^01pM@px-oWcR+(E$*?&QV~5p5ezNzI%H/l%*E?lYGQ-Oz;#D<F|' );
define( 'NONCE_SALT',       'hkT<^.O|<EK&/)O*h/F#f7HU[A.!{yS-q${*{am*(X_?3Z!vhsQE--Eo#d`ifY%P' );

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
define( 'WP_MEMORY_LIMIT', '96M' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
