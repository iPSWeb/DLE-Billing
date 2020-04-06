/**
 * DLE Billing
 *
* @link          https://dle-billing.com/
 * @author        dle-billing.com <pligin@psweb.ru>
 * @copyright     Copyright (c) 2012-2020
 */

function BillingNews()
{
	this.post_id = 0;
	this.days = 0;

	this.tags = [
		"#fixednewstpl",
		"#upnewstpl",
		"#mainnewstpl"
	];

	this.type = [
		"fixed",
		"up",
		"main"
	];

	this.Form = function( tag, post_id, pay = 0 )
	{
		$(this.tags[tag]).remove();

		this.post_id = post_id;

		ShowLoading('');

		$.get("/engine/ajax/BillingAjax.php", { plugin: "fixednews", type: this.type[tag], post_id: post_id, days: this.days, pay: pay }, function(data)
		{
			HideLoading('');

			BillingNews.ShowModal( tag, data );
			BillingNews.Days();
		});
	};

	this.Days = function()
	{
		var change = $("#BillingFixedDays option:selected");
		var balance = parseFloat($("#BillingFixedMyBalance").val());
		var price = change.attr('data-price');

		this.days = change.val();

		$("#BillingFixedBalancePay").html( price + ' ' + change.attr('data-currency'));

		if( price > balance )
		{
			$("#BillingFixedBalanceSum").html( ( balance - price ).toFixed(2) + ' ' + BillingNews.Declension( parseInt( price - balance ), $("#BillingFixedCurrency").val() ) );
			$("#BillingFixedBtnPayClick").attr("onClick", "window.location.href = '/billing.html/pay/main/sum/" + ( price - balance ).toFixed(2) + "'");
			$("#BillingFixedNeedPay").html( ( price - balance ).toFixed(2) + ' ' + BillingNews.Declension( parseInt( price - balance ), $("#BillingFixedCurrency").val() ) );

			$("#BillingFixedBtn").hide();
			$("#BillingFixedBtnPay").show();
			$("#BillingFixedBalance").css('color', 'red');
		}
		else
		{
			$("#BillingFixedBalanceSum").html( ( balance - price ).toFixed(2) + ' ' + BillingNews.Declension( parseInt( balance - price ), $("#BillingFixedCurrency").val() ) );

			$("#BillingFixedBtnPay").hide();
			$("#BillingFixedBtn").show();
			$("#BillingFixedBalance").css('color', 'green');
		}
	}

	this.Pay = function( tag )
	{
		BillingNews.Form( tag, this.post_id, 1 );
	}

	this.ShowModal = function( tag, modal )
	{
		$("body").append(modal);

		$(this.tags[tag]).dialog(
		{
			autoOpen: true,
			show: 'fade',
			hide: 'fade',
			resizable: false,
			width: 500,
			position: 'middle'
		});

		$(this.tags[tag]).dialog( "option", "position", ['0','0'] );
	}

	this.Declension = function( number, currency )
	{
		currency = currency.split(',');
		cases = [2, 0, 1, 1, 1, 2];

		return ' ' + currency[ (number%100>4 && number%100<20)? 2 : cases[(number%10<5)?number%10:5] ];
	}
}

var BillingNews = new BillingNews();
