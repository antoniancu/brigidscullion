<?php
# Database Configuration
define( 'DB_NAME', 'wp_brokerscorner' );
define( 'DB_USER', 'brokerscorner' );
define( 'DB_PASSWORD', 'JHyzsmyBICu2WUER0Xxv' );
define( 'DB_HOST', '127.0.0.1' );
define( 'DB_HOST_SLAVE', '127.0.0.1' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         'n.]^K2|JHMaR=z4}xk:^L4-TAO$Zs!zy|Qs?g9l,fL3^108/9}^u,~.YZ>s>h,%?');
define('SECURE_AUTH_KEY',  '}i]e{A=sT=W;/<l770-+U{1u-/;Luz4xu+~U+Z@/_DxTh|7P)Du+YJ}{&c-P1[Ol');
define('LOGGED_IN_KEY',    'i.EF-9w[-XVb_@i$v<f[UJrTHNprw#i4,lGbi|xeO1{rP$)(mfH+A[{|:YOM~UXL');
define('NONCE_KEY',        'Q@zYzTQ%HuonbJX-|>)eVP>dVc)A,|PqNke~IsjMH:=t|U+(-KF4QHB(FdvMpH&!');
define('AUTH_SALT',        'm#-j?KlZ(8KQ_F%?tvgvLj5vL<`N)/elK-!SNxNUw!(F1?!SJx|Q;,+q%l|*)r`&');
define('SECURE_AUTH_SALT', '@Kp0?U#S>L.Mu>.q_%!xU#})WBwn!$z<FxlwXpk+syV.F]I-i=Z3n3}c9<_ 3xqH');
define('LOGGED_IN_SALT',   '1o+[F[e_KBHEn~0q 6uX?@0lmbF.UUMyOo<4xC7H}-/e$L.U]C-a9q83Rt-#AUR(');
define('NONCE_SALT',       'ETAUp9-@o|F3=.erO%<2HIeRv9mE$DLTsg/DA2O#w#kW*k9,F*/@b0Kt->R )L.+');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'brokerscorner' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', 'd6539a2ed74321594946352f72ab6961292d5f63' );

define( 'WPE_CLUSTER_ID', '101012' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'brigidscullion.com', 1 => 'brigidscullion.ca', 2 => 'brokerscorner.wpengine.com', 3 => 'www.brigidscullion.com', );

$wpe_varnish_servers=array ( 0 => 'pod-101012', );

$wpe_special_ips=array ( 0 => '104.198.14.88', );

$wpe_ec_servers=array ( );

$wpe_largefs=array ( );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );

define( 'WP_SITEURL', 'http://brigidscullion.com' );

define( 'WP_HOME', 'http://brigidscullion.com' );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');

$_wpe_preamble_path = null; if(false){}
