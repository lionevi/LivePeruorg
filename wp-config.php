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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'liveperu_lp');

/** MySQL database username */
define('DB_USER', 'liveperu_wp');

/** MySQL database password */
define('DB_PASSWORD', 'ImgdFZ6B=nD8');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'T?c[gE=%lB:V1jQZP*xkf5AZw^IwFR:XD-n!Yl*Bvm>>ZD},6M;6ERpH1*w4N^e]');
define('SECURE_AUTH_KEY',  'UJR.2Rb77/TBf[o6>Zq[7.JOw4B.P$TBLH&sMO1;f)Gs]fXL(B!/tf|@?!YQ|cwF');
define('LOGGED_IN_KEY',    'P1FyP^[%r+XH,8YG6N>H+-i3!LP@r>nJj>_3tq3` DQ+-r|>-p}Om9$tF>EXiaYW');
define('NONCE_KEY',        'f8Jq*jfJ-_Z5j8v|HHzU;%UWv0ol.ssx}K-+}ZT0ICZ]DH#U<s0}4(<j9*<iT6a7');
define('AUTH_SALT',        '/qb15jOKg@==c63o3JZq9Dypm=~!z|,V,rWker_]r-D[Ru{`&swrTW1*}xL}q<f}');
define('SECURE_AUTH_SALT', '>iQ#e--5o(dE&5G}0Vz><-V^lB5j*+&-*L0O+9`4j9Nw%EHyU2R!`=xuAzZO18oH');
define('LOGGED_IN_SALT',   'e|}c}}#Tbbwbm)`D^b|-+._|0`/|!?g93fB?|ZIh-CX]+ x{o=Ie-5.jz6}eQ @&');
define('NONCE_SALT',       'B9X..CB ;{nI,K#Ih-zCa:;&ouj=I~PMM0_||6]UD?|itui^Z`b*tHh|}CoZ)-Rc');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);
define('WP_MEMORY_LIMIT', '256M' );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
