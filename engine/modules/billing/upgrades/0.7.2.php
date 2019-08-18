<?php	if( ! defined( 'BILLING_MODULE' ) ) die( "Hacking attempt!" );
/**
 * DLE Billing
 *
 * @link          https://github.com/iPSWeb/DLE-Billing
 * @author        PSWeb.ru <i@psweb.ru> / mr_Evgen <dle-billing@ya.ru>
 * @copyright     Copyright (c) 2019, pligin / mr_Evgen
 */

$_version = '0.7.2';

if( isset( $_POST['next'] ) )
{
    foreach($tableSchema as $sqlquery)
    {
        $this->Dashboard->LQuery->db->super_query($sqlquery);
    }

    $newConfig = $this->Dashboard->config;
    $newConfig['version'] = $_version;

    $this->Dashboard->SaveConfig("config", $newConfig );
    $this->Dashboard->ThemeMsg( $this->Dashboard->lang['ok'], $this->Dashboard->lang['upgrade_ok'] . $_version, '?mod=billing' );
}

$this->Dashboard->ThemeEchoHeader();

$Content = $this->Dashboard->ThemeHeadStart( $this->Dashboard->lang['upgrade_title'] . $_version );

$Content .= "<div class='quote' style='margin: 10px'><b>" . $this->Dashboard->lang['upgrade_wsql'] . "</b><br><br>";

    foreach( $tableSchema as $sqlquery )
    {
        $Content .= $sqlquery . '<br />';
    }

$Content .= "<br></div>";

$Content .= $this->Dashboard->ThemePadded( $this->Dashboard->MakeButton("next", $this->Dashboard->lang['main_next'], "blue") );

$Content .= $this->Dashboard->ThemeHeadClose();
$Content .= $this->Dashboard->ThemeEchoFoother();

return $Content;
?>
