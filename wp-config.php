<?php
//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL

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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'dealspotr' );

/** MySQL database username */
define( 'DB_USER', 'dealspotr' );

/** MySQL database password */
define( 'DB_PASSWORD', 'infotech' );

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
define( 'AUTH_KEY',         'jx7I~Tv9!Q!I&A|GbnAk+S/;CE peJS6fU=c((FeT!2Ov2m.=R*7s!/A06vf|DAo' );
define( 'SECURE_AUTH_KEY',  'mzUc$AIc <IY#_)UPKzh_gR9oQWTj~wRjs1fg(v@z:t,OG;End;QcV,,K: YgE_3' );
define( 'LOGGED_IN_KEY',    '#)tY{r<vUZ{_q5*/Fsk|%=nP|L>k-smjuL!Z2&<T(VfUOyjudfpKrXxRl#F6UA.3' );
define( 'NONCE_KEY',        '7%X3${(bfkqqP>z.^jT@aYIE#MZd`oE6O:%+NL@ED4&Hcr.%q,A39y?;CP a1gwK' );
define( 'AUTH_SALT',        '[)42Ft-&t~^{l]S@yM2J?6>hKl&:ym/VE`3caj3:Axh-%/0VI1o=dPG2!3.,9~i8' );
define( 'SECURE_AUTH_SALT', 'MZ TNjils7AaQf8eq.[:p^Wq(%(6w>$p_C}=f8G9f0dJc1zX=v?oz(`HwBZqjvq#' );
define( 'LOGGED_IN_SALT',   'A!D;ubGlHac:jhl-(3KPOl!T[XtYAD3Xdm*$65A}j8$Bneo8qQL8GfG@8nnf((!>' );
define( 'NONCE_SALT',       'qwA2?iT-hlcwkKK*_~V+qo<Li%k,C=WTVVr}*4*{$)]>!1>ORS_h-PNa:?arXBL`' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
