<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			diplomacy.php
 *
 * Licence		GNU General Public License version 3; see http://www.gnu.org/licenses/lgpl-3.0.en.html
 * Copyright	Copyright (C) 2005 - 2012 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric Vandebeuque (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2012-11-18 - Eighke
 */
if (!session_id()) exit();
?>
<!--  Wrapper -->
<div id="wrapper">
	<?php $this->renderMenu(); ?>
	<!-- Main Block -->
	<div id="main">
		<!-- Top -->
		<div class="top">
			<div class="left"></div>
			<div class="center"></div>
			<div class="right"></div>
		</div>
		<!-- /Top -->
		<!-- Middle -->
		<div class="middle">
			<div class="outer">
				<div class="inner">
					<!-- #Main -->
					<div class="main">
						<h1><?php echo ILang::_('Diplomacy'); ?></h1>
						<?php $this->renderMsgs(); ?>
						<form action="diplomacy.php" method="POST">
							<div class="block">
								<div class="fields">
									<div class="label">
										<label for="field-alliance"><?php echo ILang::_('Alliance'); ?></label>
									</div>
									<div class="field">
										<select name="alliance" id="field-alliance">
											<?php foreach ($this->getData('alliances') as $alliance) : ?>
											<option value="<?php echo $alliance->id; ?>"><?php echo $alliance->name; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="fields">
									<div class="label">
										<label for="field-pact"><?php echo ILang::_('Pacte'); ?></label>
									</div>
									<div class="field">
										<select name="pact" id="field-pact">
											<option value="NA"><?php echo ILang::_('NA'); ?></option>
											<option value="DEF"><?php echo ILang::_('DEF'); ?></option>
											<option value="FULL"><?php echo ILang::_('FULL'); ?></option>
											<option value="COM"><?php echo ILang::_('COM'); ?></option>
											<option value="WAR"><?php echo ILang::_('WAR'); ?></option>
										</select>
									</div>
								</div>
								<div class="fields">
									<div class="label">
										<label for="field-days"><?php echo ILang::_('Duration'); ?></label>
										<div><?php echo ILang::_('DurationInformation'); ?></div>
									</div>
									<div class="field">
										<input type="text" name="days" id="field-days" />
										<input type="submit" name="act_pact" value="<?php echo ILang::_('Save'); ?>" class="right" />
									</div>
								</div>
								<div class="clr"></div>
							</div>
						</form>
						<?php if ($pacts = $this->getData('pacts')) : ?>
						<h2><?php echo ILang::_('Pactes'); ?></h2>
						<div class="content">
							<dl class="three_cols">
								<dt class="bold"><?php echo ILang::_('Ally'); ?></dt>
									<dd class="bold"><?php echo ILang::_('End'); ?></dd>
									<dd class="bold"><?php echo ILang::_('Type'); ?></dd>
								<?php foreach ($pacts as $type => $tpacts) : ?>
								<?php foreach ($tpacts as $pact) :  ?>
								<dt class="bold"><a href="ally.php?id=2"><?php echo $pact->allyName; ?></a></dt>
									<dd><?php echo $pact->date != 0 ? date('d M Y, H:i:s', $pact->date) : 'Unlimited'; ?></dd>
									<dd><?php echo ILang::_($type); ?></dd>
									<?php endforeach; ?>
								<?php endforeach; ?>
							</dl>
						</div>
						<?php endif; ?>
						<div class="clr"></div>
					</div>
					<!-- /#Main -->
				</div>
			</div>
		</div>
		<!-- /Middle -->
		<!-- Bottom -->
		<div class="bottom">
			<div class="left"></div>
			<div class="center"></div>
			<div class="right"></div>
		</div>
		<!-- /Bottom -->
	</div>
	<!-- /Main Block -->
</div>
<!--  /Wrapper -->