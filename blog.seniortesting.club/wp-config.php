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
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/www/web/blog.seniortesting.club/wp-content/plugins/wp-super-cache/' );
define( 'DB_NAME', 'wp_data' );

/** MySQL database username */
define( 'DB_USER', 'syscorer' );

/** MySQL database password */
define( 'DB_PASSWORD', 'cLPJ@Hw$fXbO%kCr&PYo3qq)0Z4cpg=' );

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
define( 'AUTH_KEY',         'S/+@6])^ITZ8LvBaFn,$K3?Oo%5G}=-9(Zq53cB3ZrIt?9!aG^Z/v#{>?>)lmL6?' );
define( 'SECURE_AUTH_KEY',  ':A%f&%pLB>QLSTU|=Qph>)IYIejA,yjH?]s3cph}^B?eYer^jP?q&k@z+[R>.vJq' );
define( 'LOGGED_IN_KEY',    'G};d~./NUS:,&~TE!{:mERcI:7LVl$5LpJiost&E|TP!lLVhe-A&[n*UO6N :ld8' );
define( 'NONCE_KEY',        '6NmS)|Uv72k?!L`qc-uQ.W);mEJ2%QtjWtQ(&m7e}fBr)gczPrqxZnO%wNeh4!i@' );
define( 'AUTH_SALT',        'mSc@B&%b!C,@~_]u%`I$dR5A;{sexik|6<$>un^gGR;=BDx0w>oRGxzC~#[l(->i' );
define( 'SECURE_AUTH_SALT', '}Wp2_kBJ?Gx.w#Qscb64cb2HZ:AG.K`I)MZXOSLex<Y_ecJ/6l-W%5p!5#30K6<-' );
define( 'LOGGED_IN_SALT',   '54{kwn[2pU!f/&W.;wmz-`GOpGUi+<m,T{5sv{3wvEh!UcK:-+&l=RF*gdq][E9j' );
define( 'NONCE_SALT',       ')?WpNyC|ZQknI62x#hWh <kp_g_4CLWAdeoBCL,<N^0_u|jQq[|Lq9#tf_{C<AWB' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'blog_7ba9_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
// 修复错误： Fatal error: Maximum execution time of 30 seconds exceeded in D:\WWW\wp-includes\Requests\Transport\cURL.php on line 441
set_time_limit(300);
// 这段代码可以限制WordPress网站只保留每篇博文或网页最近4次的修改记录，也就是说之前的修改记录会自动取消。
define('WP_POST_REVISION', 4);
