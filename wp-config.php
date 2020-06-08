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
define( 'DB_NAME', 'cadaver_exquisito' );

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
define( 'AUTH_KEY',         'mSL1b$tN9]e&=fII=m:DiZs%@:^v6v A==8gf_]p3(f5xdMXo2NG+j28yReHF#5y' );
define( 'SECURE_AUTH_KEY',  'R^+<_`]250_zuoL5(]4rs5N5!?#wQ^G!ut8ODG>Y_=GUn#9r`Xh5,v+!J0!AH(;+' );
define( 'LOGGED_IN_KEY',    '2*n(g>:VAHrSdkTz1=3Q}LprWN.?o4(<S-XQ>M^%KCB*kn5J!92!U#}BvAuSN[$p' );
define( 'NONCE_KEY',        'oSd_c_V!]`+LsI~/-v8US,`K Sx.QCP&+auY+Z0+UD|vDpS?5W;/Nj`.+c+Qa/1g' );
define( 'AUTH_SALT',        'Q]?O`4r4-QEJy<|)ZL_?uszi5#-p(By,h:d#}aLKDh&Q*`NekDJ7|Etp|0UOwkj*' );
define( 'SECURE_AUTH_SALT', '[lm1UQnu`>U&_|2Y_fe`XsgM),%Li@b-LCL7}$nfXj?Lu%:%%./n#DinCaHZT}%(' );
define( 'LOGGED_IN_SALT',   'Uy >De!sD8S7t3PdR:;BG(R:p!UhUsV[j(2r}(k-h^k+JXYFX;,Xo?0X {iI<@5_' );
define( 'NONCE_SALT',       'sRvPtP)oxUsa3ARX0E9QOhfy>s90qYrm%izs]_[%@%s[?H3F}j*hA~0ze#S[*u#!' );

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
