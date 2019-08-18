<?php	if( ! defined( 'DATALIFEENGINE' ) ) die( "Hacking attempt!" );
/**
 * DLE Billing
 *
 * @link          https://github.com/iPSWeb/DLE-Billing
 * @author        PSWeb.ru <i@psweb.ru> / mr_Evgen <dle-billing@ya.ru>
 * @copyright     Copyright (c) 2019, pligin / mr_Evgen
 */

define( 'MODULE_PATH', ENGINE_DIR . "/modules/billing" );

$List = opendir( MODULE_PATH . "/plugins/" );

while ( $name = readdir($List) )
{
	if ( in_array($name, array(".", "..", "/", "index.php", ".htaccess")) ) continue;

	if( file_exists( MODULE_PATH . "/plugins/" . $name . "/template.tags.php" ) )
	{
		include( MODULE_PATH . "/plugins/" . $name . "/template.tags.php" );
	}
}
?>
