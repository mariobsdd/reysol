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
define('AUTH_KEY',         ':HW{b3oWdTbj<M}y7,a`7D|a1V:nmnfVocd&aZ7TW8-~ _;~9Owzyx+Cp$yJGTx)');
define('SECURE_AUTH_KEY',  '1dJx;c=I~LRW:zZopZ[ouve4}kRg3Me;%zxI+FUJH$vP+ z|}M,.yz~]WdUa$q?b');
define('LOGGED_IN_KEY',    'C{{pFeqRW)_2^b+9/*a9X_rQ=ANrA<|[:*9Ge#VuxvF#S(t.wrV-EFR N]1lP/lV');
define('NONCE_KEY',        'j@;*q-dXg*:~6GxF1G|btGJ(*AZco0Lti 51_L9-x}sCyrK46,:f%x6LDL?(j9#3');
define('AUTH_SALT',        '(U,&)k36~O68vrU#/~!4|AgxlL1Lnfd*JMw!%WrUamda[!IF_A?tqo!RF~!*`/&+');
define('SECURE_AUTH_SALT', '<~o|{^L_Kq|-YZpgKgu[@F9S=U0#3+<-j :Bv@kWm )D&qWZ.NcFtdm#a.0[tk].');
define('LOGGED_IN_SALT',   '56Lp5LrC45JT22h?g>cS2p$>_:Gg9~V;,rV}A_be49)ZU:8vTXqrnhag2NJnIuj%');
define('NONCE_SALT',       '3Y+._*asJUi{{hyn-,$2FjjWGYPu/#T(;__qE,>fgb5)d?RWCE1a^TzVkpw]` <;');

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

/* Modifies the upload max size*/
@ini_set( ‘upload_max_size’ , ’25MB’ );
