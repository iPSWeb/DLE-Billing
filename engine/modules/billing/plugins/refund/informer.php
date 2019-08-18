<?php	if( ! defined( 'BILLING_MODULE' ) ) die( "Hacking attempt!" );
/**
 * DLE Billing
 *
 * @link          https://github.com/iPSWeb/DLE-Billing
 * @author        PSWeb.ru <i@psweb.ru> / mr_Evgen <dle-billing@ya.ru>
 * @copyright     Copyright (c) 2019, pligin / mr_Evgen
 */

$this->LQuery->DbWhere( array( "refund_date_return = '0' " => 1 ) );

return $this->TopInformerView(
	"?mod=billing&c=refund",
	$this->lang['refund_informer_title'],
	$this->LQuery->DbGetRefundNum(),
	$this->lang['refund_informer'],
	"icon-credit-card",
	"red"
);
?>
