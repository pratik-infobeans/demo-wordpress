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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '`r#v,D ti.MY)PG]QRZ-|2*cImksYL6Kl7i7 <R1F/Y&#ut#QJ4tBgU_AMsG<hE8' );
define( 'SECURE_AUTH_KEY',  ';-u4[py)2tvis<D%`Enp:LMroD}Wv-lMt$hmUIKG}kj&3}=*gDPI*o>4lB|$:-I0' );
define( 'LOGGED_IN_KEY',    '(Vh2()jBLUcag;+A%c_#7d~=u8(of8MUF%9]UzbFDK?yw5wLLbA{0/J{^NNIS>fx' );
define( 'NONCE_KEY',        'dDYa-tXyJD{&bVl>MI?:&p/4iZXJwh?L673j1/4xRmhrUO,lff}tV/w~fTZn;Q%L' );
define( 'AUTH_SALT',        '}Me$Xf/6?r!$uxBaj!8mK8lZZZ55k|G.MMB5w)%c%kGMdpdc%ei(WO5fSOCrf?<e' );
define( 'SECURE_AUTH_SALT', 'S$?_)$HL1iH}YwbwD{6uFpKFGWJ(n`2`SGAE(++#?C*LT1i*mR38_[~v6Q&P2NQl' );
define( 'LOGGED_IN_SALT',   'Q_h&V(a,Jf}f~fX3/-(z3D<s~;0AElB/MWEQF,V&<^@;~)p<824R`KOohGmZ7lW0' );
define( 'NONCE_SALT',       'P9j-F@A|->=UO{pi.XXrX1wjpBJrX/RqHG.@Wd$(iVCXgWj[V1x>Bu%8:Fapw#Lb' );

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
