<?php	if( ! defined( 'BILLING_MODULE' ) ) die( "Hacking attempt!" );
/**
 * DLE Billing
 *
 * @link          https://github.com/dle-billing/DLE-Billing
 * @author        pligin <pligin@psweb.ru>
 * @copyright     Copyright (c) 2020, pligin
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
