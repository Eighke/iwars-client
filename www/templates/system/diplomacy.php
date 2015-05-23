<?php
/**
 * Package      Templates
 * Subpackage   System
 * File         diplomacy.php
 *
 * Licence      Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright    Copyright (C) 2005 - 2014 Frédéric Vandebeuque. All rights reserved.
 * Contrib      Frédéric V. (fred.vdb@newebtime.com)
 *              Eighke (eighke@multi-site.net)
 *
 * Version      2014-02-13 - Eighke
 */
if (!session_id()) exit();
?>
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
				<label for="field-pact"><?php echo ILang::_('Pact'); ?></label>
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
<?php if ($requests = $this->getData('requests')) : ?>
<h2><?php echo ILang::_('Requests'); ?></h2>
<div class="content">
	<dl class="three_cols">
		<dt class="bold"><?php echo ILang::_('Ally'); ?></dt>
			<dd class="bold"><?php echo ILang::_('End'); ?></dd>
			<dd class="bold"><?php echo ILang::_('Type'); ?></dd>
		<?php foreach ($requests as $type => $tpacts) : ?>
		<?php foreach ($tpacts as $pact) :  ?>
		<dt class="bold"><a href="ally.php?id=<?php echo $pact->allyId; ?>" data-load="cache"><?php echo $pact->allyName; ?></a></dt>
			<dd><?php echo $pact->date != 0 ? date('d M Y, H:i:s', $pact->date) : ILang::_('Unlimited'); ?></dd>
			<dd><?php echo ILang::_($type); ?> <span><a class="right button" href="diplomacy.php?reject=<?php echo $pact->allyId.':'.$pact->type; ?>" data-load="cache"><?php echo ILang::_('Reject'); ?></a></span> <span><a class="right button" href="diplomacy.php?accept=<?php echo $pact->allyId.':'.$pact->type; ?>" data-load="cache"><?php echo ILang::_('Accept'); ?></a></span></dd>
			<?php endforeach; ?>
		<?php endforeach; ?>
	</dl>
</div>
<?php endif; ?>
<?php if ($pacts = $this->getData('pacts')) : ?>
<h2><?php echo ILang::_('Pactes'); ?></h2>
<div class="content">
	<dl class="three_cols">
		<dt class="bold"><?php echo ILang::_('Ally'); ?></dt>
			<dd class="bold"><?php echo ILang::_('End'); ?></dd>
			<dd class="bold"><?php echo ILang::_('Type'); ?></dd>
		<?php foreach ($pacts as $type => $tpacts) : ?>
		<?php foreach ($tpacts as $pact) :  ?>
		<dt class="bold"><a href="ally.php?id=<?php echo $pact->allyId; ?>" data-load="cache"><?php echo $pact->allyName; ?></a></dt>
			<dd><?php echo $pact->date != 0 ? date('d M Y, H:i:s', $pact->date) : ILang::_('Unlimited'); ?></dd>
			<dd><?php echo ILang::_($type); ?><?php if ($pact->date == 0) : ?><span><a class="right button" href="diplomacy.php?cancel=<?php echo $pact->allyId.':'.$pact->type; ?>" data-load="cache"><?php echo ILang::_('Cancel'); ?></a></span><?php endif; ?></dd>
			<?php endforeach; ?>
		<?php endforeach; ?>
	</dl>
</div>
<?php endif; ?>
<div class="clr"></div>