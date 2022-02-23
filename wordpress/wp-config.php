<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'data' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'password' );

/** Database hostname */
define( 'DB_HOST', 'db' );

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
define( 'AUTH_KEY',         '.H`hQcO#-l$!IcMl>mG:EXF;l90kkJ*>g62Lj/RH+ht+)V=jnN^8fL0@#@MrgiyB' );
define( 'SECURE_AUTH_KEY',  '2i~U5Z=}$0jTs[LcnANK2xoHW0OHM[&w#/ak[JTR4O~0;.1&mp.?,Tf2nWKE||vr' );
define( 'LOGGED_IN_KEY',    ']1s{{6m)mriehPRQfH0b_3C@?See],%}Ntx}O85noUrwV*/5Ezd-OUXZY?<XkD7$' );
define( 'NONCE_KEY',        '(lIo|0=6TBkec^;-)wHi8{nKzL@7&#]0E+w8YX_F40eV5m^LhtFy$f>J7<S.Xg`/' );
define( 'AUTH_SALT',        '~&}![_Lt=f@EJYHJCUBzQp8bAt1d7h:zen5ITP>`4u|4UEcx?tJ/7Gt,i4 $.8!H' );
define( 'SECURE_AUTH_SALT', '_aP&v#JCCu=7W~dpo|I)X~ypY_D$7wq)Rq865B(/xZM1~gzE#u5=sjHhgS;-;CLS' );
define( 'LOGGED_IN_SALT',   'I>0uI8WjS_1zPK#O#PqNm9fesp^w$X:`=wP@|`!lc7d.@>p*Cf)QFIFR4;9~_.ci' );
define( 'NONCE_SALT',       'W:U8#f t^ulb~4U)Sf|1W=sb2wf]Fn?z}}0Y9x$0x`H-tt8#;3WLgp[},cZhw[eJ' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
