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
define( 'DB_NAME', 'ynz' );

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
define( 'AUTH_KEY',         'rg&g^VWs2!qe&sEpFmF.fK[yA5%&ME&z.),HpwMUj&>4@wIbWbS^HgLk/A:b15Q;' );
define( 'SECURE_AUTH_KEY',  '^[hQLb _d/LDBU]?rVH~$acVHpyPGy7DuKSM4jR(hDg57 wc@&w?CzV!]MEQb *#' );
define( 'LOGGED_IN_KEY',    '2`[WJsK{S6m{8ixWDk4+$PK5y@T&IRMrQjO24nj+N[$=k%r3DcjHZxqGVUHpr;+I' );
define( 'NONCE_KEY',        '`E3}hw^+YaUf~=hDIgJIkFh.8AKMbB/jTh._eZQna$0(m8N[DU`O-B,0TRSWUA6[' );
define( 'AUTH_SALT',        '-i_#/7=5WES bqw;+ry~?D/?2/Ah[l}=$Ss}adMYCmXv0AJ!iS1&)-+/Tt3{LQ~h' );
define( 'SECURE_AUTH_SALT', '<Zg1tGVDF,O~WGjC0mkaYv  o-9Wz} -ewor{v4uOtDVg+GsAQOJ-PiH2PZ$jsFt' );
define( 'LOGGED_IN_SALT',   'y;!uMAAM/RN7xg Qv)`mk/D+fcCZ[9S1~|(x|~dc@r1g. pD[m7~Hz6qDA,OYCZ$' );
define( 'NONCE_SALT',       ';%[vLYJ^tfxXUnXFpu8CF>&,+oS=5W7F|` 5:E^-.;|p6X;x&`[[|@* yeEKg3Pv' );

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
