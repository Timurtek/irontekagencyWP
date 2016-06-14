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
define('DB_NAME', 'irontekagency');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'BfX*3&+M{fuz&$3*Zx,RCX>8y0%FS[+7IVbT0$_~e<_^E+ :,rAN~.;bsZvA[bPd');
define('SECURE_AUTH_KEY',  'UF}U)K7,+&rg,(B~!|k8S6?5v4n1}tA],o2Wf{v21PDVA?o6IGr HTyDIU;MxBu5');
define('LOGGED_IN_KEY',    'Eje_Xta}++K.{>-`F;;X c{8k 8+]i O3vaXw4KJVS`BAYco}69b{aE&g@L,+bE5');
define('NONCE_KEY',        '~v-C~H/AO<i@9[s||:J:ye]2StNu>@H}`[)R^I2b:#pcha@)p?](0U9Py/~aTse.');
define('AUTH_SALT',        '+;.GNg#pHm2S3y6dhr{ZH!9#!u7QQ< F8&z|7/.{{os]a^RLj=sISwh4/ty!9%:k');
define('SECURE_AUTH_SALT', 'h09`|!<vykC_pAz2&eJB8^6zv2HE*XI;r*ng}jnSk{@|`1pd9PG~?X|1.=C 5rXe');
define('LOGGED_IN_SALT',   ':j2X4}vq>6WT$<pY r5CCOurz>2YD<_sxtBw.(]yWzyxp(>~J@x%%iOp.AiYP@aK');
define('NONCE_SALT',       'Nj*Jt|UDmEj_wf(:2+UgJ#FZ6Iv&&m!B[LT#_f+,LxlYH`.3]T-@^lL53Pg9_jy=');

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
