<?php	if( ! defined( 'DATALIFEENGINE' ) ) die( "Hacking attempt!" );
/**
 * DLE Billing
 *
 * @link          https://dle-billing.com/
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
