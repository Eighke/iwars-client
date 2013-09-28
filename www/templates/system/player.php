<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			player.php
 *
 * Licence		Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright	Copyright (C) 2005 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric V. (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2013-02-18 - Eighke
 */
if (!session_id()) exit();
?>
<h1><?php echo ILang::_('Profil of'); ?> <?php echo $this->getData('player')->name; ?></h1>
<?php $this->renderMsgs(); ?>
<div class="one_two">
	<dl>
		<dt>&nbsp;</dt> <dd>&nbsp;</dd>
		<dt><?php echo ILang::_('Player'); ?></dt> <dd><a href="m_msg.php?id=<?php echo $this->getData('player')->id; ?>"><?php echo $this->getData('player')->name; ?></a></dd>
		<dt><?php echo ILang::_('Alliance:'); ?></dt> <dd>#<a href="ally.php?id=<?php echo $this->getData('player')->allyId; ?>"><?php echo $this->getData('player')->allyTag; ?></a></dd>
		<dt><?php echo ILang::_('Country:'); ?></dt> <dd><img src="./skin/default/imgs/flags/pack_1/16/<?php echo $this->getData('player')->country; ?>.png" title="<?php echo $this->getData('player')->countryName; ?>" /></dd>
		<dt>&nbsp;</dt> <dd>&nbsp;</dd>
		<?php if (!$this->getData('id')) : ?>
		<dt>Premium</dt> <dd><?php echo $this->getData('player')->premium == 0 ? ILang::_('Disabled') : ILang::_('Enabled') ; ?></dd>
		<dt><?php echo ILang::_('End'); ?></dt> <dd><?php echo $this->getData('player')->premium == 0 ? ILang::_('Disabled') : $this->getData('player')->premiumEnd ; ?></dd>
		<?php endif; ?>
	</dl>
</div>
<div class="one_two">
	<dl class="three_cols">
		<dt>&nbsp;</dt>
			<dd class="bold"><?php echo ILang::_('Rank')?></dd>
			<dd class="bold"><?php echo ILang::_('Points')?></dd>
		<dt><?php echo ILang::_('BuildPoints'); ?></dt>
			<dd><?php echo $this->getData('player')->ranks['build']; ?></dd>
			<dd><?php echo ILang::number($this->getData('player')->points['build']); ?></dd>
		<dt><?php echo ILang::_('TechPoints'); ?></dt>
			<dd><?php echo $this->getData('player')->ranks['tech']; ?></dd>
			<dd><?php echo ILang::number($this->getData('player')->points['tech']); ?></dd>
		<dt><?php echo ILang::_('UnitPoints'); ?></dt>
			<dd><?php echo $this->getData('player')->ranks['unit']; ?></dd>
			<dd><?php echo ILang::number($this->getData('player')->points['unit']); ?></dd>
		<dt><?php echo ILang::_('DevPoints'); ?></dt>
			<dd><?php echo $this->getData('player')->ranks['dev']; ?></dd>
			<dd class="bold"><?php echo ILang::number($this->getData('player')->points['build']+$this->getData('player')->points['tech']+$this->getData('player')->points['unit']); ?></dd>
		<dt><?php echo ILang::_('FightPoints'); ?></dt>
			<dd><?php echo $this->getData('player')->ranks['fight']; ?></dd>
			<dd><?php echo ILang::number($this->getData('player')->points['fight']); ?></dd>
		<dt class="bold"><?php echo ILang::_('TotalPoints'); ?></dt>
			<dd class="bold"><?php echo $this->getData('player')->ranks['grank']; ?></dd>
			<dd class="bold"><?php echo ILang::number($this->getData('player')->points['build']+$this->getData('player')->points['tech']+$this->getData('player')->points['unit']+$this->getData('player')->points['fight']); ?></dd>
	</dl>
</div>
<div class="clr"></div>

<div class="one_two">
	<h2><?php echo ILang::_('Player'); ?></h2>
	<div class="contenant center">
		<?php if ($this->getData('id')) : ?>
		<a href="m_msg.php?id=<?php echo $this->getData('player')->id; ?>"><b><?php echo ILang::_('Contact'); ?></b></a><br />
		<a href="player.php?t=blist&id=<?php echo $this->getData('player')->id; ?>"><b><?php echo ILang::_('Blacklist'); ?></b></a>
		<?php else : ?>
		<?php endif; ?>
	</div>
</div>

<div class="one_two">
	<h2><?php echo ILang::_('Planets'); ?></h2>
	<div class="contenant center">
		<?php if($this->getData('player')->towns) : ?>
		<?php foreach($this->getData('player')->towns as $town) : ?>
		<div class="bg<?php echo ($j = $j == 2 ? 1 : 2); ?>">
			<a href="p_town.php?id=<?php echo $town->id; ?>"><?php echo $town->name; ?> : <?php echo $town->X; ?>:<?php echo $town->Y; ?>:<?php echo $town->Z; ?></a> (<?php echo $town->points; ?> <?php echo ILang::_('points'); ?>)
		</div>
		<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>
<div class="clr"></div>