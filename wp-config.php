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
define('DB_NAME', 'wp_reysol');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'pUntk+Q##S+HVv)OI?ON0/k^+?a%5k;NXQ(pWx[YIjC#M(.1l#0p6%>hZwO>^-o-');
define('SECURE_AUTH_KEY',  '|BbW]^bb7t=_P_T_?I]V^OJ9R^3.kHAuV6;n>oDc16u3Iv[?h)NkO.nGhA80hyWk');
define('LOGGED_IN_KEY',    '8RvIbku?T!lyv~HAkYGQ_S!:$%iqbRA/1+Oo&7?!+edVE7aC$8BjL[.A_!HqIt4h');
define('NONCE_KEY',        '3SWYL_<$iHeDZ]<a]qyCV0?do4Lo^,^kdotb+#nZSra<34~h6:!aft6CXTJaf2<P');
define('AUTH_SALT',        'X,EJPex-#`C!QcCjp^<w2r250XQ~C,8;bJkK)F}CC8:J**YZgqEtnC.`ad`S8z26');
define('SECURE_AUTH_SALT', 'D0bewhV>3p%j/]I/$2CLJh~`UKBqz=urm[er4B9w`_J>#7{&`.[a!3@NCNGFNV0s');
define('LOGGED_IN_SALT',   'tw0iS>?QF%#eDo2=,ugh(z{g~k&g-A-8f.pdSu#3qSg`mX+e5%qSyP13J{xhhFS0');
define('NONCE_SALT',       'f`>Y;p0G<xml@l%/DskHZkBR`WU$t-/63@TpW #RM&DbW1C0Hy,~m0Csv ^N,~)H');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
