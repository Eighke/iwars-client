<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			mkpm.php
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
<h1><?php echo ILang::_('MakePM'); ?></h1>
<?php $this->renderMsgs(); ?>
<div class="block">
	<form action="mkpm.php" method="post" name="mkpm">
		<?php if ($this->getData('step') != 5) : ?>
		<?php if ($this->user->haveTown() == FALSE) : ?>
		<div class="f_radiobox">
			<div class="coords">
				<input type="radio" name="choice" value="rand" checked="checked" />
				<label><?php echo ILang::_('Random'); ?></label>
				<span><?php echo $this->getData('rand')->x; ?>:<?php echo $this->getData('rand')->y; ?>:<?php echo $this->getData('rand')->z; ?></span>
			</div>
			<div class="hidden"> </div>
			<div class="coords">
				<input type="radio" name="choice" value="partial" />
				<label><?php echo ILang::_('Partial'); ?></label>
				<span class="hidden"><?php echo $this->getData('rand')->x; ?>:<?php echo $this->getData('rand')->y; ?>:<span id="CrdPP">P</span></span>
			</div>
			<div>
				<div>
					<span style="width:20px;display:inline-block;">P</span>
					<span>
						<input type="text" size="3" maxlength="3" name="PIZ" id="PIZ" onfocus="IWMkpm.set('PIZ', 'CrdPP', 'partial')"> (1-255)
					</span>
				</div>
			</div>
			<div class="coords">
				<input type="radio" name="choice" value="manual" />
				<label><?php echo ILang::_('Manual'); ?></label>
				<span class="hidden"><span id="CrdMG">G</span>:<span id="CrdMS">S</span>:<span id="CrdMP">P</span></span>
			</div>
			<div>
				<div>
					<span style="width:20px;display:inline-block;">G</span> <input type="text" size="3" maxlength="2" name="IX" id="IX" onfocus="IWMkpm.set('IX', 'CrdMG', 'manual')"> (1-<?php echo $this->conf['game']->maxX; ?>)
				</div>
				<div>
					<span style="width:20px;display:inline-block;">S</span> <input type="text" size="3" maxlength="2" name="IY" id="IY" onfocus="IWMkpm.set('IY', 'CrdMS', 'manual')"> (1-<?php echo $this->conf['game']->maxY; ?>)
				</div>
				<div>
					<span style="width:20px;display:inline-block;">P</span> <input type="text" size="3" maxlength="3" name="IZ" id="IZ" onfocus="IWMkpm.set('IZ', 'CrdMP', 'manual')"> (1-<?php echo $this->conf['game']->maxZ; ?>)
				</div>
			</div>
			<hr />
			<span class="left label">&nbsp;</span><span><input type="submit" value="<?php echo ILang::_('Continue'); ?>"></span>
		
		</div>
		<?php endif; ?>
		<?php elseif ($this->getData('step') == 5) : ?>
		<div>[ <a href="./"><?php echo ILang::_('Continue'); ?></a> ]</div>
		<?php endif; ?>
	</form>
</div>