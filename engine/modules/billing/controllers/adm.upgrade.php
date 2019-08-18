<?php	if( ! defined( 'BILLING_MODULE' ) ) die( "Hacking attempt!" );
/**
 * DLE Billing
 *
 * @link          https://github.com/iPSWeb/DLE-Billing
 * @author        PSWeb.ru <i@psweb.ru> / mr_Evgen <dle-billing@ya.ru>
 * @copyright     Copyright (c) 2019, pligin / mr_Evgen
 */

Class ADMIN
{
	function main()
	{
		$List = opendir( MODULE_PATH . '/upgrades/' );

		while ( $name = readdir($List) )
		{
			if ( in_array($name, array(".", "..", "/", "index.php", ".htaccess")) ) continue;

			if( substr($name, 0, (iconv_strlen($name)-4)) > $this->Dashboard->config['version'] )
			{
			 	return include MODULE_PATH . '/upgrades/' . $name;

				break;
			}
		}
	}
}
?>
