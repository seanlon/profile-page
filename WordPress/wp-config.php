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
define('DB_NAME', 'seanlohc_wp339');

/** MySQL database username */
define('DB_USER', 'seanlohc_wp339');

/** MySQL database password */
define('DB_PASSWORD', 'P35N10-J@S');

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
define('AUTH_KEY',         '7pnjfsiima35gc7a7mrntrhkqvlqwwaxvm6auoaanavae5kkgmuitndflv8a4mhv');
define('SECURE_AUTH_KEY',  'lowdfrkb0v0pbzfwtxswojhrfwcelgrttqkbufxztoqvo2pfo9qyceyxfy8jzykx');
define('LOGGED_IN_KEY',    'x0we5upa1q5fecxynjpokaad6ks0sc9mtjzcdsewrpbybfiheouap5awivkjyqp3');
define('NONCE_KEY',        'fl8wkeg5g0xy7w7xslpaomooqlnswplvhpwqqz7ekwdwj0oyv4b0pkc3nrl9dvou');
define('AUTH_SALT',        'hhpvfbvygue4jofhkh3kulnczswnrfywbw2imsit1qsktweb5ogndcuknupf1sk1');
define('SECURE_AUTH_SALT', 'fhieveulzxey8ykzfkcgkgs6ckqqjo69yda11ytvxhcdkt7tpige1hac21mzsath');
define('LOGGED_IN_SALT',   'w1u2hu0svcs86sjeaazisgrf0xfgtfncnlnot64mbtvhx5bkotywdsqydkfdkm3q');
define('NONCE_SALT',       '81s8mlt221hrhieaqsyaah912fmpi8y7jmm6yeofotwg4qotlfz95vdnet1wwnjs');

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
