<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'robios_wp_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'YUG:z2xS*yUOcW>4)pR8&x9-* |!)5#yxy^>y6f+IX2Qpf&1^XM-6m`bwuHELc]q');
define('SECURE_AUTH_KEY',  'pu_y}^}-OC|#bN4 C5>{||4x=i^.11OY20Nur@lH f+pw8g_NEVi6wId<RLj-->V');
define('LOGGED_IN_KEY',    '92D2R:)]vU0l*|xLs#Py9>IX+)$^j-)G/$WL@1?;n0P<aKQ8$:-+E`LqhP}a7>d4');
define('NONCE_KEY',        '%g+6+f)9`vUQMo%Ft{51])e]yJn@U`QJ[8rHb9zm:,x6#8?R*4bhUn2jpWF#?;xr');
define('AUTH_SALT',        '-RT<EHfmjfq,4+=Ihi cI?mkhs&G1+{emZAT4,x*_<[PbgfK*ABM?[B`93i*qV9y');
define('SECURE_AUTH_SALT', 'ZnhCPjQg:hY@w8?wu_=RllXQeDa5i?~s+NBvHXqf4AXsW-UnAh-aJQdM#Bh^gIj5');
define('LOGGED_IN_SALT',   '(_aHFskp-A7D^-QT9S;?|j%I{67&X*oQ},e<Rns[Ux]^F x=pz4Qt:^+lxXS-c<.');
define('NONCE_SALT',       '|=h#qD*vM{vMVP?|bKjTv&[!P*|!7!c|{>Qo._jU|3Sb|:7?s)M-;8A7Ja;CDBO@');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
