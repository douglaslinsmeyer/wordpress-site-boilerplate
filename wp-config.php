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

require_once 'vendor/autoload.php';

$loader = new \Orno\Config\File\YamlFileLoader(dirname(__FILE__) . '/parameters.yml');
$respository = new \Orno\Config\Repository();
$config = $repository->addFileLoader($loader);

/**
 * Home & site URL.
 *
 * This will override the home/site URL settings
 * in the General Settings of wp-admin.
 */
define('WP_HOME', $config->get('wp_home'));
define('WP_SITEURL', WP_HOME);

define('DB_NAME', 'summitortho');

// Database username
define('DB_USER', $config->get('db_user'));

// Database password
define('DB_PASSWORD', 'toor');

// Database host (usually 'localhost')
define('DB_HOST', '127.0.0.1');

// Database character set
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         ';{1zJw^n:EhAKT(Cr=Wyvu#(5=-.=2X0[M]M} cb->CTKjuGn]y#A?8}WNoLF dg');
define('SECURE_AUTH_KEY',  '`veE:26Sl@YvRC{0_c_4,9Q,;B{d_Eo8=d}pEFK6h3&-_</=+!?uo<XH_DXJ-8(S');
define('LOGGED_IN_KEY',    'm?[)-iSc:t^>P:|6!*2k:lh/q]yV/Tu@)M|64c<eG-]{r!+j RIMvItc?x}7QO|e');
define('NONCE_KEY',        'a5$!(DOIu-c%>Z wiY$s^<3`33RzCao@rR_?C|>[CSOBnzO`|CA5|F[l55n0{-9J');
define('AUTH_SALT',        'dTpON|HE|ANu|:7:XaxoCZZttH^W<GTv#pig- }_bYY!-+9r97f~]yF r@xwOR!|');
define('SECURE_AUTH_SALT', '?v4D$ki(L@bH:!j5:tZKQdv,+FNXSEe`1+gH)z?d;b%q]I9WiqFL|;,*)yAXLi=8');
define('LOGGED_IN_SALT',   'EgC:wJkXS7`^W6u1l~X8lsG7+@epS,9j{rN;#-WZNE.x?Oj^2f-W7<{o, (YqwN#');
define('NONCE_SALT',       'b]X#$D^gQ_>M(kHB+??6+4h?R)TlBF<+7%0*;m-]F%cge6(uj]tU+Y)3[H>kV|[V');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'nrdwp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define('WPLANG', '');


/**
 * Content directory and URL.
 *
 * For WordPress installations using SVN externals and keeping the
 * content directory separate from WordPress core code.
 */
define('WP_CONTENT_DIR', dirname(__FILE__) . '/content');
define('WP_CONTENT_URL', 'http://summit-ortho.dev/content');

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
