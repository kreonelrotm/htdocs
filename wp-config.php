<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_figma' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '2E<?dpXtEu=8+e<%qOFuwOREfa>a<EJLZG=+#=0<F/y}=-UfF=~i:t=O:tY_HG)g' );
define( 'SECURE_AUTH_KEY',  'eONacg,Dw]UM=r+1_nPk0`kqOt(J#tZcEiZc[o)-dIz,6xg@7rhw]xm2TOw!<*z*' );
define( 'LOGGED_IN_KEY',    '$?DZg$D@x#$Vg&H]^/8`[?A(JqD,%v94_X }9BD2/~*6bII|@h@+OJ(T$2sA0Z)?' );
define( 'NONCE_KEY',        'Oy37vf6z#tL7BSP^.Bf*rq}5(q-avs,[6X/MD*?T~J[E%4q#r*V6^.<JF;Pia$dh' );
define( 'AUTH_SALT',        'HWGPW>A8%^L_Lu:V>vDZkC =aSSx%LrS>XOMo[%8{~7|~*k9{nZ,jihnjQ.Gy+*j' );
define( 'SECURE_AUTH_SALT', '4gn4)6bgMYj|EuDZJf>Mv@3swbjsxKY1E)3)f<0?9&e_x@;aI ^@I1a66]NcV*zD' );
define( 'LOGGED_IN_SALT',   ']UTB=#q-|`o?Ym[y%+~:1oIo j1vw^o55noWX.n|?PB8y]glam5VL h 0rF*K){@' );
define( 'NONCE_SALT',       'H+_x.l+vaXh^i}BZP@To%2u,B|_}*9 ZqI1%uD#Q(2|km9g:! N@BEuL5l2r](wb' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
