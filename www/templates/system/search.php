<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			search.php
 *
 * Licence		Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright	Copyright (C) 2005 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric V. (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2013-10-27 - Eighke
 */
if (!session_id()) exit();
?>
<h1><?php echo ILang::_('Search'); ?></h1>
<?php $this->renderMsgs(); ?>
<form action="search.php" method="post" class="form-horizontal">
			<div class="form-group">
				<label for="field-name" class="col-xs-5 control-label"><?php echo ILang::_('EnterName:'); ?></label>
				<div class="input-group col-xs-6">
					<span class="input-group-addon glyphicon glyphicon-user"></span>
					<input type="text" name="name" id="field-name" class="form-control" value="<?php echo $this->getData('name'); ?>" />
				</div>
			</div>
			<div class="form-group">
				<label for="field-ally" class="col-xs-5 control-label"><?php echo ILang::_('Ally:'); ?></label>
				<div class="input-group col-xs-6">
					<span class="input-group-addon glyphicon glyphicon-flag"></span>
					<select name="ally" id="field-ally" class="form-control">
						<option value=""></option>
						<?php foreach ($this->getData('alliances') as $alliance) : ?>
						<option value="<?php echo $alliance->id; ?>"<?php echo $this->getData('ally') == $alliance->id ? ' selected="selected"' : NULL; ?>><?php echo $alliance->name; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
		<div class="contenant">
		<div class="center">
			<div><input type="submit" value="Rechercher" name="search" /></div>
		</div>
	</div>
</form>
<?php if ($results = $this->getData('results')) : ?>
<h2><?php echo ILang::_('Result'); ?></h2>
<div class="content">
	<div class="bg_3">
		<div class="left" style="width:150px;">Nom</div>
		<div class="left" style="width:120px;">Alliance</div>
		<div class="left" style="width:120px;">Points</div>
		<div class="right">#</div>
		<div class="clr"></div>
	</div>
	<?php foreach($results as $result) : ?>
	<div class="bg_<?php echo ($i = $i == 2 ? 1 : 2); ?>">
		<div class="left" style="width:150px;"><a href="player.php?id=<?php echo $result->userId; ?>"><?php echo $result->userName; ?></a></div>
		<div class="left" style="width:120px;">#<a href="ally.php?id=<?php echo $result->allyId; ?>"><?php echo $result->allyTag; ?></a></div>
		<div class="left" style="width:120px;"><?php echo $result->totalPoints; ?></div>
		<div class="right"><a href="m_msg.php?id=<?php echo $result->userId; ?>"><?php echo ILang::_('Contact'); ?></a></div>
		<div class="clr"></div>
	</div>
	<?php endforeach; ?>
</div>
<?php elseif ($this->getData('search')) : ?>
<div class="content">
	<div class="center"><?php echo ILang::_('NoResult'); ?></div>
</div>
<?php endif; ?>
<div class="clr"></div>