<?php
/**
 * File wp-config.php
 *
 * PHP version 5
 *
 * @category ClientName
 * @package  ClientName
 * @author   Douglas Linsmeyer <douglas.linsmeyer@nerdery.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://client-website.com
 */

/*
 * Load the Composer autoloader
 *
 * This will allow us to autoload any libraries or packages
 * that we may need for our installation.
 */
require_once dirname(__FILE__) . '/../vendor/autoload.php';

/*
 * Load the environment configuration
 *
 * Instead of hard-coding the environment variables here in the wp-config.php
 * file, environment specific configuration settings are kept in a
 * parameters.yml file outside of the web root. Here we load that file and set
 * the configuration values.
 */
$yamlParser = new Symfony\Component\Yaml\Parser();
$environmentConfig = $yamlParser->parse(
    file_get_contents(dirname(__FILE__) . '/../parameters.yml')
);
$environmentConfig = $environmentConfig['parameters'];

/**
 * Home & site URL.
 *
 * This will override the home/site URL settings
 * in the General Settings of wp-admin.
 */
define('WP_HOME', $environmentConfig['wp_home']);
define('WP_SITEURL', $environmentConfig['wp_home']);

define('DB_NAME', $environmentConfig['db_name']);

// Database username
define('DB_USER', $environmentConfig['db_user']);

// Database password
define('DB_PASSWORD', $environmentConfig['db_password']);

// Database host (usually 'localhost')
define('DB_HOST', $environmentConfig['db_host']);

// Database character set
define('DB_CHARSET', $environmentConfig['db_charset']);

// The database collation. Leave this blank unless otherwise required.
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
define('AUTH_KEY', $environmentConfig['auth_key']);
define('SECURE_AUTH_KEY', $environmentConfig['secure_auth_key']);
define('LOGGED_IN_KEY', $environmentConfig['logged_in_key']);
define('NONCE_KEY', $environmentConfig['nonce_key']);
define('AUTH_SALT', $environmentConfig['auth_salt']);
define('SECURE_AUTH_SALT', $environmentConfig['secure_auth_salt']);
define('LOGGED_IN_SALT', $environmentConfig['logged_in_salt']);
define('NONCE_SALT', $environmentConfig['nonce_salt']);
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = $environmentConfig['table_prefix'];

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define('WPLANG', $environmentConfig['wp_lang']);


/**
 * Content directory and URL.
 *
 * For WordPress installations using SVN externals and keeping the
 * content directory separate from WordPress core code.
 */
define('WP_CONTENT_DIR', dirname(__FILE__) . '/wp-content');
define('WP_CONTENT_URL', $environmentConfig['wp_home'] . '/wp-content');

/**
 * Admin cookie path.
 *
 * A path must be defined for the WordPress login cookie because
 * WordPress core is located in a subdirectory of the site.
 */
define('ADMIN_COOKIE_PATH', '/');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if (! defined('ABSPATH'))
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
