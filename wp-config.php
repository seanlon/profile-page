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
define('DB_NAME', 'seanlohc_wp433');

/** MySQL database username */
define('DB_USER', 'seanlohc_wp433');

/** MySQL database password */
define('DB_PASSWORD', 'R9oS@P4]p9');

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
define('AUTH_KEY',         'ofwzc1ygqgenpqcscej5adla0xlb5ynzotaqrkuw1idbmomy9q3z8auqfhrvwlqg');
define('SECURE_AUTH_KEY',  'ksylqvedsfgrtotmqju8dnyfdfqyc2sabuaq7nnjoc85f8cvz2msdvubkpzf8lpu');
define('LOGGED_IN_KEY',    'ruggpsoevpn0yyja7s9c0bzhnp3bgvfxymgjojmzsizqlfa93tr84tjss3rz4cwj');
define('NONCE_KEY',        'gf5jrsf5psxi8lppr91zfgfmwhpatnxqbuandtplmvre90vydczp84dg70durzlq');
define('AUTH_SALT',        'gcegg24fjfjotleorsjzcdh76vsbmdttu7xvqsxaojtlv0gcuend3r03qonz7oxa');
define('SECURE_AUTH_SALT', 'gkqqlx4npopjmizk267hfgwmtexxhjxwf43e5nbpjzlwjsqmeiaa12vsqotbz2ss');
define('LOGGED_IN_SALT',   'fxxpamojyynw8ihj3qeot0edih1hdaxucejvuuth8cbxrctumerwb3eoyutkyfsp');
define('NONCE_SALT',       'qydnxo9qssabsnik9ap3gpqm6aweojfy9rzxlelcgqhi34mjxxwooewawkinj9ls');

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
