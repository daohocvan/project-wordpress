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
define( 'DB_NAME', 'nhom11' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '0Q@)+7=#aSWd0e0hTOcHxkTF2:vdj1T:9jFT=eBCJR`k=Tw0.aJ~vX `R>`n>PX9' );
define( 'SECURE_AUTH_KEY',  '2<i X|t/64R,kKZS,&/.D%-=XB|k)>Lewi>TL1=QK8sQj}50K9iOVw8-@Uj9eoy-' );
define( 'LOGGED_IN_KEY',    'C7$`5;&yq(DT`JIw$2N!7rmS(ZMpk)+B6qcv`?xdl;.U575 ,79nmv%P=+R?du|]' );
define( 'NONCE_KEY',        'FfkfZMK1:Qh<fp|l=~6n$1krQRVy<91mK.E**X.<:<+T^6i+Mn>;X~u(92W^jwlE' );
define( 'AUTH_SALT',        'o|%hU2/NAcKI0C]=kfK+3wS08fQT]E%ns<Q0jz^6~h6YRho#5D.H#W-6~I8<$8%3' );
define( 'SECURE_AUTH_SALT', 'u-}9Vg#2r8POICe^;TB}9IxfbCaxNo7:CWe&vFX}ABFWdlLGKuo7c$*UqkB0hF=6' );
define( 'LOGGED_IN_SALT',   '~Cr+GN}I} I];D1~g5JS3.HBKDQd&hhW+`/;w3^ChGK2U_Yz0(K$P+;oOx=Jz6Zg' );
define( 'NONCE_SALT',       '*EYLR@6BlEDNguyk2A*wi20p$2g8oQE3b*VNk,&2LJNDU,bHH=aZ(rr#VS~3[*o!' );

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
