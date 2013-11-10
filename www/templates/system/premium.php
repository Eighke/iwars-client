<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			premium.php
 *
 * Licence		Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright	Copyright (C) 2005 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric V. (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2013-06-15 - Eighke
 */
if (!session_id()) exit();
?>
<h1>Premium</h1>
<?php $this->renderMsgs(); ?>
<?php if ($this->user->premium == 1) : ?>
<div class="content">
	<?php echo ILang::_('AlreadyPremium'); ?>
</div>
<?php elseif (1 == 2) : ?>
<div class="content">
	<?php echo ILang::_('NoEmailSet'); ?>
</div>
<?php else : ?>
<div class="block">
	<?php echo ILang::_('Description'); ?>
</div>
<h2><?php echo ILang::_('ByCard'); ?> (Paypal)</h2>
<div class="content">
	<?php echo ILang::_('ByCardDescription'); ?>

	<!-- Paypal -->
	<div class="center">
		<form action="payment.php" method="post">
			<strong><?php echo ILang::_('SelectOption'); ?></strong><br />
			<select name="pOption">
				<option value="1 month">1 <?php echo ILang::_('month'); ?> - €1,80 EUR</option>
				<option value="6 months">6 <?php echo ILang::_('months'); ?> - €8,25 EUR</option>
				<option value="1 year">1 <?php echo ILang::_('year'); ?> - €15,00 EUR</option>
			</select><br />
			<input type="image" src="https://www.paypalobjects.com/en_GB/i/btn/btn_paynow_SM.gif" border="0" name="submit" alt="PayPal — The safer, easier way to pay online.">
		</form>
	</div><br />
	<!-- /Paypal -->
</div>
<h2><?php echo ILang::_('ByPhone'); ?></h2>
<div class="content">
	<?php echo ILang::_('ByPhoneDescription'); ?>
</div>

<h2 class="center">15 <?php echo ILang::_('days'); ?></h2>
<div class="one_two">
	<div class="contenant">
		<h3 class="center"><?php echo ILang::_('Prices'); ?></h3>
		<ul>
			<li>Belgium: 1€25</li>
			<li>Deutschland: 2€00</li>
			<li>France: 1€43 (DOM TOM 1€80)</li>
			<li>Italia: 1€80</li>
			<li>Nederland: 1€20</li>
			<li>Polska: 7.63 PLN</li>
		</ul>
	</div>
</div>
<div class="one_two">
	<!-- Rentaliweb -->
	<table border="0" cellpadding="0" cellspacing="0" style="border:5px solid #E5E5E5; margin: 5px auto;"><tr><td>
	<table border="0" cellpadding="0" cellspacing="0" style="width: 300px; border: solid 1px #AAAAAA; ">
		<tr>
			<td style="text-align:left; border-bottom: 1px solid #D8DFEA; height: 30px; background:#fff;"><a href="http://www2.rentabiliweb.com/" target="_blank"><img src="http://payment.rentabiliweb.com/data/i/component/logo-form.gif" width="173" height="20" alt="Paiement sécurisé par Rentabiliweb" style="padding: 1px 0 0 5px; border: none;" /></a></td>
		</tr>
		<tr>
			<td style=" text-align:center; background-color:#ffffff;">
				<div style="text-align:center">
					<p style=" font-family:Arial, Helvetica, sans-serif; padding: 5px; margin: 0px;"> 
						<span style="font-size: 12px; font-weight:bold; color:#3b5998;"><?php echo ILang::_('ChooseYourCountry'); ?></span>
					</p>
					<a href="javascript:;" onclick="javascript:window.open('http://payment.rentabiliweb.com/form/acte/popup.php?docId=<?php echo $this->conf['premium']->renta['15d']; ?>&siteId=<?php echo $this->conf['premium']->renta['site']; ?>&cnIso=FR','bepass_display_popup','toolbar=0,location=0,directories=0,status=0,scrollbars=0,resizable=1,copyhistory=0,menuBar=0,width=300,height=350');"><img src="http://payment.rentabiliweb.com/data/i/flags/25_15/74.gif" width="25" height="15" alt="France" style=" border: none; margin: 5px;" /></a>
					<a href="javascript:;" onclick="javascript:window.open('http://payment.rentabiliweb.com/form/acte/popup.php?docId=<?php echo $this->conf['premium']->renta['15d']; ?>&siteId=<?php echo $this->conf['premium']->renta['site']; ?>&cnIso=DT','bepass_display_popup','toolbar=0,location=0,directories=0,status=0,scrollbars=0,resizable=1,copyhistory=0,menuBar=0,width=300,height=350');"><img src="http://payment.rentabiliweb.com/data/i/flags/25_15/238.gif" width="25" height="15" alt="France DOM TOM" style=" border: none; margin: 5px;" /></a>
					<a href="javascript:;" onclick="javascript:window.open('http://payment.rentabiliweb.com/form/acte/popup.php?docId=<?php echo $this->conf['premium']->renta['15d']; ?>&siteId=<?php echo $this->conf['premium']->renta['site']; ?>&cnIso=DE','bepass_display_popup','toolbar=0,location=0,directories=0,status=0,scrollbars=0,resizable=1,copyhistory=0,menuBar=0,width=300,height=350');"><img src="http://payment.rentabiliweb.com/data/i/flags/25_15/5.gif" width="25" height="15" alt="Germany" style=" border: none; margin: 5px;" /></a>
					<a href="javascript:;" onclick="javascript:window.open('http://payment.rentabiliweb.com/form/acte/popup.php?docId=<?php echo $this->conf['premium']->renta['15d']; ?>&siteId=<?php echo $this->conf['premium']->renta['site']; ?>&cnIso=CA','bepass_display_popup','toolbar=0,location=0,directories=0,status=0,scrollbars=0,resizable=1,copyhistory=0,menuBar=0,width=300,height=350');"><img src="http://payment.rentabiliweb.com/data/i/flags/25_15/38.gif" width="25" height="15" alt="Canada" style=" border: none; margin: 5px;" /></a>
					<a href="javascript:;" onclick="javascript:window.open('http://payment.rentabiliweb.com/form/acte/popup.php?docId=<?php echo $this->conf['premium']->renta['15d']; ?>&siteId=<?php echo $this->conf['premium']->renta['site']; ?>&cnIso=BE','bepass_display_popup','toolbar=0,location=0,directories=0,status=0,scrollbars=0,resizable=1,copyhistory=0,menuBar=0,width=300,height=350');"><img src="http://payment.rentabiliweb.com/data/i/flags/25_15/22.gif" width="25" height="15" alt="Belgium" style=" border: none; margin: 5px;" /></a>
					<a href="javascript:;" onclick="javascript:window.open('http://payment.rentabiliweb.com/form/acte/popup.php?docId=<?php echo $this->conf['premium']->renta['15d']; ?>&siteId=<?php echo $this->conf['premium']->renta['site']; ?>&cnIso=IT','bepass_display_popup','toolbar=0,location=0,directories=0,status=0,scrollbars=0,resizable=1,copyhistory=0,menuBar=0,width=300,height=350');"><img src="http://payment.rentabiliweb.com/data/i/flags/25_15/114.gif" width="25" height="15" alt="Italy" style=" border: none; margin: 5px;" /></a>
					<a href="javascript:;" onclick="javascript:window.open('http://payment.rentabiliweb.com/form/acte/popup.php?docId=<?php echo $this->conf['premium']->renta['15d']; ?>&siteId=<?php echo $this->conf['premium']->renta['site']; ?>&cnIso=NL','bepass_display_popup','toolbar=0,location=0,directories=0,status=0,scrollbars=0,resizable=1,copyhistory=0,menuBar=0,width=300,height=350');"><img src="http://payment.rentabiliweb.com/data/i/flags/25_15/167.gif" width="25" height="15" alt="Netherlands" style=" border: none; margin: 5px;" /></a>
					<a href="javascript:;" onclick="javascript:window.open('http://payment.rentabiliweb.com/form/acte/popup.php?docId=<?php echo $this->conf['premium']->renta['15d']; ?>&siteId=<?php echo $this->conf['premium']->renta['site']; ?>&cnIso=PL','bepass_display_popup','toolbar=0,location=0,directories=0,status=0,scrollbars=0,resizable=1,copyhistory=0,menuBar=0,width=300,height=350');"><img src="http://payment.rentabiliweb.com/data/i/flags/25_15/171.gif" width="25" height="15" alt="Poland" style=" border: none; margin: 5px;" /></a>
					<a href="javascript:;" onclick="javascript:window.open('http://payment.rentabiliweb.com/form/acte/popup.php?docId=<?php echo $this->conf['premium']->renta['15d']; ?>&siteId=<?php echo $this->conf['premium']->renta['site']; ?>&cnIso=CH','bepass_display_popup','toolbar=0,location=0,directories=0,status=0,scrollbars=0,resizable=1,copyhistory=0,menuBar=0,width=300,height=350');"><img src="http://payment.rentabiliweb.com/data/i/flags/25_15/205.gif" width="25" height="15" alt="Switzerland" style=" border: none; margin: 5px;" /></a>
					<div style=" margin: 5px 0 0 0; border-top: solid 1px #D8DFEA; background-color:#F7F7F7;">
						<form id="rweb_tickets_<?php echo $this->conf['premium']->renta['15d']; ?>"  method="get" action="http://payment.rentabiliweb.com/access.php" style="margin: 0px; padding: 0px;" >
							<table width="280" cellpadding="0" cellspacing="0" style=" margin: 2px auto;">
								<tr>
									<td style="text-align: center">
					        			<label for="code_0" style=" font-family:Arial, Helvetica, sans-serif;font-size: 12px; font-weight:bold; color:#3b5998; padding: 2px 2px 5px 2px; margin: 0px;">
											<?php echo ILang::_('PleaseEnterCode'); ?>
										</label>
									</td>
								</tr>
								<tr>
									<td style="text-align: center">
										<input name="code[0]" type="text" id="code_0" size="10" style="border: solid 1px #3b5998; padding: 2px; font-weight: bold; color:#3b5998; text-align: center;"/>
										<input type="hidden" name="docId" value="<?php echo $this->conf['premium']->renta['15d']; ?>" /><input type="button"  alt="Ok" onclick="getElementById('rweb_sub_<?php echo $this->conf['premium']->renta['15d']; ?>').disabled=true;document.getElementById('rweb_tickets_<?php echo $this->conf['premium']->renta['15d']; ?>').submit();" id="rweb_sub_<?php echo $this->conf['premium']->renta['15d']; ?>"  style="width: 40px; height:20px; vertical-align:middle; margin-left: 5px; border: none; background:url(http://payment.rentabiliweb.com/data/i/component/button_ok.gif);"/>
									</td>
								</tr>
							</table>
						</form>
						<div style="text-align: center; padding: 2px; font-family: Arial, Helvetica, sans-serif; clear: both;"><span style="font-weight:bold; font-size: 10px; color: #3b5998;"><?php echo ILang::_('PleaseCheckCookies'); ?></span>
						</div>
					</div>
				</div>
			</td>
		</tr>
	</table></td></tr></table>
	<!-- /Rentaliweb -->
</div>
<div class="clr"></div>

<h2 class="center">1 <?php echo ILang::_('month'); ?></h2>
<div class="one_two">
	<div class="contenant">
		<h3 class="center"><?php echo ILang::_('Prices'); ?></h3>
		<ul>
			<li>Suisse: 6.00 CHF</li>
			<li>Canada: 7.00 CAD</li>
		</ul>
	</div>
</div>
<div class="one_two">
	<!-- Rentaliweb -->
	<table border="0" cellpadding="0" cellspacing="0" style="border:5px solid #E5E5E5; margin: 5px auto;"><tr><td>
	<table border="0" cellpadding="0" cellspacing="0" style="width: 300px; border: solid 1px #AAAAAA; ">
		<tr>
			<td style="text-align:left; border-bottom: 1px solid #D8DFEA; height: 30px; background:#fff;"><a href="http://www2.rentabiliweb.com/" target="_blank"><img src="http://payment.rentabiliweb.com/data/i/component/logo-form.gif" width="173" height="20" alt="Paiement sécurisé par Rentabiliweb" style="padding: 1px 0 0 5px; border: none;" /></a></td>
		</tr>
		<tr>
			<td style=" text-align:center; background-color:#ffffff;">
				<div style="text-align:center">
					<p style=" font-family:Arial, Helvetica, sans-serif; padding: 5px; margin: 0px;"> 
						<span style="font-size: 12px; font-weight:bold; color:#3b5998;"><?php echo ILang::_('ChooseYourCountry'); ?></span> <br />
					</p>
					<a href="javascript:;" onclick="javascript:window.open('http://payment.rentabiliweb.com/form/acte/popup.php?docId=<?php echo $this->conf['premium']->renta['1m']; ?>&siteId=<?php echo $this->conf['premium']->renta['site']; ?>&cnIso=CA','bepass_display_popup','toolbar=0,location=0,directories=0,status=0,scrollbars=0,resizable=1,copyhistory=0,menuBar=0,width=300,height=350');"><img src="http://payment.rentabiliweb.com/data/i/flags/25_15/38.gif" width="25" height="15" alt="Canada" style=" border: none; margin: 5px;" /></a>
					<a href="javascript:;" onclick="javascript:window.open('http://payment.rentabiliweb.com/form/acte/popup.php?docId=<?php echo $this->conf['premium']->renta['1m']; ?>&siteId=<?php echo $this->conf['premium']->renta['site']; ?>&cnIso=US','bepass_display_popup','toolbar=0,location=0,directories=0,status=0,scrollbars=0,resizable=1,copyhistory=0,menuBar=0,width=300,height=350');"><img src="http://payment.rentabiliweb.com/data/i/flags/25_15/65.gif" width="25" height="15" alt="United States" style=" border: none; margin: 5px;" /></a>
					<a href="javascript:;" onclick="javascript:window.open('http://payment.rentabiliweb.com/form/acte/popup.php?docId=<?php echo $this->conf['premium']->renta['1m']; ?>&siteId=<?php echo $this->conf['premium']->renta['site']; ?>&cnIso=CH','bepass_display_popup','toolbar=0,location=0,directories=0,status=0,scrollbars=0,resizable=1,copyhistory=0,menuBar=0,width=300,height=350');"><img src="http://payment.rentabiliweb.com/data/i/flags/25_15/205.gif" width="25" height="15" alt="Switzerland" style=" border: none; margin: 5px;" /></a>
					<div style=" margin: 5px 0 0 0; border-top: solid 1px #D8DFEA; background-color:#F7F7F7;">
						<form id="rweb_tickets_<?php echo $this->conf['premium']->renta['1m']; ?>"  method="get" action="http://payment.rentabiliweb.com/access.php" style="margin: 0px; padding: 0px;" >
							<table width="280" cellpadding="0" cellspacing="0" style=" margin: 2px auto;">
								<tr>
									<td style="text-align: center">
					        			<label for="code_0" style=" font-family:Arial, Helvetica, sans-serif;font-size: 12px; font-weight:bold; color:#3b5998; padding: 2px 2px 5px 2px; margin: 0px;">
											<?php echo ILang::_('PleaseEnterCode'); ?>
										</label>
									</td>
								</tr>
								<tr>
									<td style="text-align: center">
										<input name="code[0]" type="text" id="code_0" size="10" style="border: solid 1px #3b5998; padding: 2px; font-weight: bold; color:#3b5998; text-align: center;"/>
										<input type="hidden" name="docId" value="<?php echo $this->conf['premium']->renta['1m']; ?>" /><input type="button"  alt="Ok" onclick="getElementById('rweb_sub_<?php echo $this->conf['premium']->renta['1m']; ?>').disabled=true;document.getElementById('rweb_tickets_<?php echo $this->conf['premium']->renta['1m']; ?>').submit();" id="rweb_sub_<?php echo $this->conf['premium']->renta['1m']; ?>"  style="width: 40px; height:20px; vertical-align:middle; margin-left: 5px; border: none; background:url(http://payment.rentabiliweb.com/data/i/component/button_ok.gif);"/>
									</td>
								</tr>
							</table>
						</form>
						<div style="text-align: center; padding: 2px; font-family: Arial, Helvetica, sans-serif; clear: both;"><span style="font-weight:bold; font-size: 10px; color: #3b5998;"><?php echo ILang::_('PleaseCheckCookies'); ?></span>
						</div>
					</div>
				</div>
			</td>
		</tr>
	</table></td></tr></table>
	<!-- /Rentaliweb -->
</div>
<div class="clr"></div>
<div class="content center italic">
	<?php echo ILang::_('NoCountryContact'); ?>
</div>
<div class="clr"></div>
<?php endif; ?>