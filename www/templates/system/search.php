<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			search.php
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
						<h1><?php echo ILang::_('Search'); ?></h1>
						<?php $this->renderMsgs(); ?>
						<form action="search.php" method="POST">
							<div class="contenant">
								<div class="center">
									<div><?php echo ILang::_('EnterName:'); ?> <input type="text" name="name" /></div><br />
									<div><?php echo ILang::_('Ally'); ?>
										<select name="ally">
											<option value=""></option>
											<?php foreach ($this->getData('alliances') as $alliance) : ?>
											<option value="<?php echo $alliance->id; ?>"><?php echo $alliance->name; ?></option>
											<?php endforeach; ?>
										</select>
									</div><br />
									<div><input type="submit" value="Rechercher" name="search" /></div>
								</div>
							</div>
						</form>
						<h2><?php echo ILang::_('Result'); ?></h2>
						<?php if ($results = $this->getData('results')) : ?>
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
						<?php elseif ($this->getData('noresult')) : ?>
						<div class="content">
							<div class="center"><?php echo ILang::_('NoResult'); ?></div>
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