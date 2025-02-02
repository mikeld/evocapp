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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'dbdk6mesgl7vyc' );

/** MySQL database username */
define( 'DB_USER', 'uprhzkf2g2w7s' );

/** MySQL database password */
define( 'DB_PASSWORD', 'esdydwjim9pv' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'ZhL{630@</^;5IzBj5giBIZJ!(frYr)]Mq5yB.!c?r>zDA9.+zxtvX|vNPuK5)Dj' );
define( 'SECURE_AUTH_KEY',   '(d(&0&Wo`Op(HQyfbA|S+:Kdfq[ITFmUVbHeeXW+t>kDSBxUx9sM)n`/S1R~:1jJ' );
define( 'LOGGED_IN_KEY',     ':C t?)-J9[>Ris{d/n1B )=>{EkQ[EJWitz/,0d9 FV[Jp3pPI5M3zhC#?wuht=<' );
define( 'NONCE_KEY',         'd ZEe6hC79tsE !duOv#OdCI!#]qD* J,W8L.VFoQJgs;nJ;b0Q5Y5j8i./Hd[Oa' );
define( 'AUTH_SALT',         'U_6;Oe-z&Yb[zz%sXBz|D.bZ.916E|GDb_j3KJ^V>Ah|vt{_ 1oT.8@n_}cttpf(' );
define( 'SECURE_AUTH_SALT',  'wdh<4hIe^E559)yzEHK?k5%`i^!4~*0joTgmQ1e1HZMX;XqX<oQ<1t<b=*TmVFao' );
define( 'LOGGED_IN_SALT',    '0RV#jV%mGTjC^e?j8pQbNk&B6>5k2t05V3q8.h/QGe+uax[]>{:P>dphQq^dKij-' );
define( 'NONCE_SALT',        '.CfuughftlAaD@lETfhi ;5W!*8r`;YJ{4KuC<y;b^V&;<|w:}r1`N=Pc`A0frN=' );
define( 'WP_CACHE_KEY_SALT', 'NIax6G&V},4v#cDjthPxx.v%ajCh{3C%oYnUq~idpm5|l;<zI}KKm3TbS>:OPY:j' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'lij_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
@include_once('/var/lib/sec/wp-settings-pre.php'); // Added by SiteGround WordPress management system
require_once ABSPATH . 'wp-settings.php';
@include_once('/var/lib/sec/wp-settings.php'); // Added by SiteGround WordPress management system
