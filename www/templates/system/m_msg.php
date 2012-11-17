<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			m_msg.php
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
						<h1><?php echo ILang::_('NewMsg'); ?></h1>
						<?php $this->renderMsgs(); ?>
						<?php if (!$this->getData('id') && $this->getData('step') != 1 && $this->getData('step') != 2) : ?>
						<form action="m_msg.php" method="POST">
						<div class="center"><?php echo ILang::_('EnterName:'); ?> <input type="text" name="name" /> |
							<input type="submit" value="<?php echo ILang::_('Search'); ?>" name="step1" />
						</div>
						<?php elseif ($this->getData('step') == 1 && $this->getData('results')) : ?>
						<div class="center">
							<select name="id">
							<?php foreach($this->getData('results') as $result) : ?>
								<option value="<?php echo $result['usrId']; ?>"><?php echo $result['usrName']; ?></option>
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
								<span><input type="texte" name="title"<?php echo !empty($this->getData('banList')) ? ' disabled="disabled" class="disabled"' : FALSE; ?> /></span>
							</div><br />
							<div>
								<textarea name="body" style="width:500px; height:200px"<?php echo !empty($this->getData('banList')) ? ' disabled="disabled" class="disabled"' : FALSE; ?>></textarea>
							</div><br />
							<input type="hidden" name="to_id" value="<?php echo $this->getData('id'); ?>" />
							<?php if (empty($this->getData('banList'))) : ?><input type="submit" value="<?php echo ILang::_('Send'); ?>" name="step2" /><? endif; ?>
						</div>
						</form>
						<?php endif; ?>
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