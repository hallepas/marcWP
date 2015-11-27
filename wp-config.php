<?php
/**
 * In dieser Datei werden die Grundeinstellungen f�r WordPress vorgenommen.
 *
 * Zu diesen Einstellungen geh�ren: MySQL-Zugangsdaten, Tabellenpr�fix,
 * Secret-Keys, Sprache und ABSPATH. Mehr Informationen zur wp-config.php gibt es auf der {@link http://codex.wordpress.org/Editing_wp-config.php
 * wp-config.php editieren} Seite im Codex. Die Informationen f�r die MySQL-Datenbank bekommst du von deinem Webhoster.
 *
 * Diese Datei wird von der wp-config.php-Erzeugungsroutine verwendet. Sie wird ausgef�hrt, wenn noch keine wp-config.php (aber eine wp-config-sample.php) vorhanden ist,
 * und die Installationsroutine (/wp-admin/install.php) aufgerufen wird.
 * Man kann aber auch direkt in dieser Datei alle Eingaben vornehmen und sie von wp-config-sample.php in wp-config.php umbenennen und die Installation starten.
 *
 * @package WordPress
 */

/**  MySQL Einstellungen - diese Angaben bekommst du von deinem Webhoster. */
/**  Ersetze database_name_here mit dem Namen der Datenbank, die du verwenden m�chtest. */
define('DB_NAME', 'c9');

/** Ersetze username_here mit deinem MySQL-Datenbank-Benutzernamen */
define('DB_USER', 'hallepas');

/** Ersetze password_here mit deinem MySQL-Passwort */
define('DB_PASSWORD', '');

/** Ersetze localhost mit der MySQL-Serveradresse */
define('DB_HOST', 'localhost');

/** Der Datenbankzeichensatz der beim Erstellen der Datenbanktabellen verwendet werden soll */
define('DB_CHARSET', 'utf8');

/** Der collate type sollte nicht ge�ndert werden */
define('DB_COLLATE', '');

/**#@+
 * Sicherheitsschl�ssel
 *
 * �ndere jeden KEY in eine beliebige, m�glichst einzigartige Phrase. 
 * Auf der Seite {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service} kannst du dir alle KEYS generieren lassen.
 * Bitte trage f�r jeden KEY eine eigene Phrase ein. Du kannst die Schl�ssel jederzeit wieder �ndern, alle angemeldeten Benutzer m�ssen sich danach erneut anmelden.
 *
 * @seit 2.6.0
 */
define('AUTH_KEY',         ':/!me]JFY#$K^m~H&>.hLsiZsM3A+;c@j0H|?`+nK+pLUdE9OoP,@|PEW@uB_UYP');
define('SECURE_AUTH_KEY',  'fJvawEtZrm|n-{Wb>/VnGzj<QGRA<?1fds(Lc:HxG;-P.U4YrqsqE0psESj*[t9#');
define('LOGGED_IN_KEY',    'fh}2v_7?v`z,4`BeN6X#OZ_}I3=ukRPu$8_It8!Irx|1UD-;e;i=6+^<ePKwKzS;');
define('NONCE_KEY',        'sG>5su(NxQEDJ`M0KV|HfuEUe7I1)$rys;>+sA[zK%U!4M6NxvhslBP,LWZvoCb,');
define('AUTH_SALT',        ' rR|A)k17p<LebJtdc+v?;:Wqob}+#FmG +Y#<PE>B+!KVU_D~$+%x+thCd|-I6V');
define('SECURE_AUTH_SALT', '|{^*44D%X+rV=QD/iL V4sijPih$GpOTf)Hb62t+qae@fyrj?2)V+WS-ci@.[<dS');
define('LOGGED_IN_SALT',   '/T8j8Wx3$MbV^Rn|iZ66]g?+$.G15<_y:*%VRsIfHD?f6=~&yG(vhK~6v7TGY+x>');
define('NONCE_SALT',       '-@cPpoRonvsxRlLF5;fAPr%9Vyp((GNk@,1v@:QJs2h0(- dgnyo s<-SLZ4%8[t');

/**#@-*/

/**
 * WordPress Datenbanktabellen-Pr�fix
 *
 *  Wenn du verschiedene Pr�fixe benutzt, kannst du innerhalb einer Datenbank
 *  verschiedene WordPress-Installationen betreiben. Nur Zahlen, Buchstaben und Unterstriche bitte!
 */
$table_prefix  = 'mh_wp_';

/**
 * WordPress Sprachdatei
 *
 * Hier kannst du einstellen, welche Sprachdatei benutzt werden soll. Die entsprechende
 * Sprachdatei muss im Ordner wp-content/languages vorhanden sein, beispielsweise de_DE.mo
 * Wenn du nichts eintr�gst, wird Englisch genommen.
 */
define('WPLANG', 'de_DE');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');