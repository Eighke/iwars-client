<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			header.php
 *
 * Licence		GNU Lesser General Public License version 3; see http://www.gnu.org/licenses/lgpl-3.0.en.html
 * Copyright	Copyright (C) 2005 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric Vandebeuque (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2013-02-18 - Eighke
 */
if (!session_id()) exit();
?>
<div id=out>
	<div id="in">
		<!-- #Container -->
		<div id="container">
			<div id="top"></div>
			<!-- #Header -->
			<div id="header">
				<div id="top-menu">
					<div id="header-menu">
						<div>
							<span class="green"> .: </span>
							<span class="mleft">
								<b><a href="#"><?php echo $this->user->name; ?></a></b>
								<span>
									<ul>
										<li><b><a href="./player.php"><?php echo ILang::_('Profile'); ?></a></b></li>
										<li><b><a href="./ally.php"><?php echo ILang::_('Ally'); ?></a></b></li>
										<li><b><a href="./options.php"><?php echo ILang::_('Parameters'); ?></a></b></li>
									</ul>
								</span>
							</span>
							<span class="green"> : </span>
							<b>#<a href="./ally.php"><?php echo $this->alliance->tag; ?></a></b>
							<span class="green"> :. :</span>
							<b><a href="?log=out"><?php echo ILang::_('Logout'); ?></a></b>
							<span class="green">:.</span>
						</div>
						<div>
							<span class="green">.:</span>
							<b><a href="http://board.infinite-wars.com" target="_new"><?php echo ILang::_('Forum'); ?></a></b>
							<span class="green">:.:</span>
							<span>
								<b><a href="#"><?php echo ILang::_('Messages'); ?> (<?php echo $this->user->getNewMsg(); ?>)</a></b>
								<span class="mright">
									<ul>
										<li><b><a href="./msgs.php"><?php echo ILang::_('Private'); ?> (<?php echo $this->user->getNewMsg('pms'); ?>)</a> / <a href="./notices.php"><?php echo ILang::_('Notices'); ?> (<?php echo $this->user->getNewMsg('notices'); ?>)</a></b></li>
									</ul>
								</span>
							</span>
							<span class="green">::</span>
						</div><br />
						<div>
							<span class="green">.:</span>
							<b><a href="./search.php"><?php echo ILang::_('Search'); ?></a></b>
							<span class="green">:</span> <b><a href="./rank.php"><?php echo ILang::_('Highscore'); ?></a></b>
							<span class="green">.:</span>
						</div>
						<div class="spacer"></div>
					</div>
				</div>
				<div id="ress">
					<ul>
						<li class="rt"><span><?php echo ILang::_('T'); ?></span> <span><?php echo ILang::number($this->resources['1']); ?></span></li>
						<li class="rs"><span><?php echo ILang::_('S'); ?></span> <span><?php echo ILang::number($this->resources['2']); ?></span></li>
						<li class="rw"><span><?php echo ILang::_('W'); ?></span> <span><?php echo ILang::number($this->resources['4']); ?></span></li>
						<li class="rh"><span><?php echo ILang::_('H'); ?></span> <span><?php echo ILang::number($this->resources['3']); ?></span></li>
					</ul>
				</div>
			</div>
			<!-- /#Header -->
