<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			m_msg.php
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
<h1><?php echo ILang::_('NewMsg'); ?></h1>
<?php $this->renderMsgs(); ?>
<form action="m_msg.php" method="POST">
<?php if (!$this->getData('id') && $this->getData('step') != 1 && $this->getData('step') != 2) : ?>
<div class="center"><?php echo ILang::_('EnterName:'); ?> <input type="text" name="name" /> |
	<input type="submit" value="<?php echo ILang::_('Search'); ?>" name="step1" />
</div>
<?php elseif ($this->getData('step') == 1 && $this->getData('results')) : ?>
<div class="center">
	<select name="id">
	<?php foreach($this->getData('results') as $result) : ?>
		<option value="<?php echo $result->id; ?>"><?php echo $result->name; ?></option>
	<?php endforeach; ?>
	</select> |
	<input type="submit" value="<?php echo ILang::_('Validate'); ?>" />
</div>
<?php elseif ($this->getData('step') == 1) : ?>
<div class="center"><?php echo ILang::_('NoResult'); ?></div>
<?php elseif ($this->getData('step') == 2) : ?>
<div class="center"><?php echo ILang::_('MsgSent'); ?> ~ [ <a href="./msgs.php"><?php echo ILang::_('Back'); ?></a> ]</div>
<?php else : ?>
<div class="contenant">
	<div>
		<span class="left" style="width:100px;"><?php echo ILang::_('Recipient:'); ?></span>
		<span><b><?php echo $this->getData('usrName'); ?></b></span>
	</div>
	<div>
		<span class="left" style="width:100px;"><?php echo ILang::_('Title:'); ?></span>
		<span><input type="text" name="title"<?php echo $this->getData('banList') == 1 ? ' disabled="disabled" class="disabled"' : FALSE; ?> /></span>
	</div><br />
	<div>
		<textarea name="body" style="width:500px; height:200px"<?php echo $this->getData('banList') == 1 ? ' disabled="disabled" class="disabled"' : FALSE; ?>></textarea>
	</div><br />
	<input type="hidden" name="to_id" value="<?php echo $this->getData('id'); ?>" />
	<?php if ($this->getData('banList') != 1) : ?><input type="submit" value="<?php echo ILang::_('Send'); ?>" name="step2" /><? endif; ?>
</div>
<?php endif; ?>
</form>