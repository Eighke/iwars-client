<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			rank.php
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
						<h1><?php echo ILang::_('Highscore'); ?></h1>
						<?php $this->renderMsgs(); ?>
						<div class="center">
							.: Par [ <a href="?rank=player"><?php echo ILang::_('Players'); ?></a> ] [ <a href="?rank=ally"><?php echo ILang::_('Alliances'); ?></a> ] :.
						</div><br />
						<div class="center">
							<form>
								<select name="page" onChange="this.form.submit();">
									<?php for($i = 1; $i <= $this->getData('pageMax'); $i++) : ?>
									<option value="<?php echo $i; ?>"<?php echo ( $i == $this->getData('page') ? ' selected="selected"' : '' ); ?>><?php echo (($i-1)*100)+1; ?>-<?php echo ($i*100); ?></option>
									<?php endfor; ?>
								</select>
							</form>
						</div>
						<div>
							<?php if ($this->getData('type') == 'ally') : ?>
							<div class="bg3">
								<div class="rank-id">#</div>
								<div class="rank-name"><?php echo ILang::_('Name'); ?></div>
								<div class="rank-build"><a href="?rank=ally&page=<?php echo $this->getData('page'); ?>&by=devs"><?php echo ILang::_('Development'); ?></a></div>
								<div class="rank-unit"><a href="?rank=ally&page=<?php echo $this->getData('page'); ?>&by=units"><?php echo ILang::_('Unit'); ?></a></div>
								<div class="rank-total"><a href="?rank=ally&page=<?php echo $this->getData('page'); ?>&by=total"><?php echo ILang::_('Total'); ?></a></div>
								<div class="rank-tech"><a href="?rank=ally&page=<?php echo $this->getData('page'); ?>&by=ptsmmbs"><?php echo ILang::_('/members'); ?></a></div>
								<div class="rank-planet"><a href="?rank=ally&page=<?php echo $this->getData('page'); ?>&by=mmbs"><?php echo ILang::_('Members'); ?></a></div>
								<div class="clr"></div>
							</div>
							<?php $i=$this->getData('offset')+1; foreach($this->getData('ranks') as $rank) : ?>
							<div class="bg<?php echo $rank->class; ?>" <?php echo $this->alliance->id == $rank->allyId ? ' style="background:#74674c;"' : NULL; ?>>
								<div class="rank-id <?php echo $rank->grank < $i ? 'rkdown' : ($rank->grank > $i ? 'rkup' : 'rkequal'); ?>"><?php echo $i++; ?></div><?php //TODO: Mettre une fonction ?>
								<div class="rank-name">
									<div><a href="./ally.php?id=<?php echo $rank->allyId; ?>"><?php echo $ally->id == $rank->allyId ? '<span style="color:#fff"><b>'. subtext($rank->allyName, 18) .'</b></span>' : subtext($rank->allyName, 18); ?></a></div>
									<div>[#<a href="./ally.php?id=<?php echo $rank->allyId; ?>"><?php echo $rank->allyTag; ?></a>]</div>
								</div>
								<div class="rank-build"><?php echo ILang::number($rank->devPoints); ?></div>
								<div class="rank-unit"><?php echo ILang::number($rank->unitPoints); ?></div>
								<div class="rank-total"><?php echo ILang::number($rank->totalPoints); ?></div>
								<div class="rank-tech"><?php echo ILang::number(@round($rank->totalPoints/$rank->allyUsers)); ?><?//=$rank->mmbs_pts?></div>
								<div class="rank-planet"><?php echo $rank->allyUsers; ?></div>
								<div class="clr"></div>
							</div>
							<?php endforeach; ?>
							<?php else : ?>
							<div class="bg3">
								<div class="rank-id">#</div>
								<div class="rank-name"><?php echo ILang::_('Name'); ?></div>
								<div class="rank-build"><a href="?page=<?php echo $this->getData('page'); ?>&by=builds"><?php echo ILang::_('Building'); ?></a></div>
								<div class="rank-tech"><a href="?page=<?php echo $this->getData('page'); ?>&by=researchs"><?php echo ILang::_('Research'); ?></a></div>
								<div class="rank-unit"><a href="?page=<?php echo $this->getData('page'); ?>&by=units"><?php echo ILang::_('Unit'); ?></a></div>
								<div class="rank-total"><a href="?page=<?php echo $this->getData('page'); ?>&by=total"><?php echo ILang::_('Total'); ?></a></div>
								<div class="rank-planet"><a href="?page=<?php echo $this->getData('page'); ?>&by=twns"><?php echo ILang::_('Planet'); ?></a></div>
								<div class="clr"></div>
							</div>
							<?php $i=$this->getData('offset')+1; foreach($data as $var) : ?>
							<?php if ($rank->usrGroup == -2) : ?>
							<div class="bg3">
							<?php elseif ($rank->allyId == $this->alliance->id) : ?>
							<div class="bg<?php echo $rank->class; ?>"<?php echo $rank->usrId==$this->user->id ? ' style="background:#74674c;"' : ' style="background:#50744c;"'; ?>>
							<?php else : ?>
							<div class="bg<?php echo $rank->class; ?>">
							<?php endif; ?>
								<div class="rank-id <?php echo $rank->grank < $i ? 'rkdown' : ($rank->grank > $i ? 'rkup' : 'rkequal'); ?>"><?php echo $i++; ?></div>
								<div class="rank-name">
									<div><a href="./player.php?id=<?php echo $rank->usrId; ?>"><?php echo $this->user->id == $rank->usrId ? '<span style="color:#fff"><b>'. subtext($rank->usrName, 18) .'</b></span>' : subtext($rank->usrName, 18); ?></a></div>
									<div>[#<a href="./ally.php?id=<?php echo $rank->allyId; ?>"><?php echo $rank->allyTag; ?></a>]</div>
								</div>
								<div class="rank-build"><?php echo ILang::number($rank->buildPoints); ?></div>
								<div class="rank-tech"><?php echo ILang::number($rank->techPoints); ?></div>
								<div class="rank-unit"><?php echo ILang::number($rank->unitPoints); ?></div>
								<div class="rank-total"><?php echo ILang::number($rank->totalPoints); ?></div>
								<div class="rank-planet"><?php echo ILang::number($rank->usrTowns); ?></div>
								<div class="clr"></div>
							</div>
							<?php endforeach; ?>
							<?php endif; ?>
						</div>
						<div class="center">
							<form>
								<select name="page" onChange="this.form.submit();">
									<?php for($i = 1; $i <= $this->getData('pageMax'); $i++) : ?>
									<option value="<?php echo $i; ?>"<?php echo ( $i == $this->getData('page') ? ' selected="selected"' : '' ); ?>><?php echo (($i-1)*100)+1; ?>-<?php echo ($i*100); ?></option>
									<?php endfor; ?>
								</select>
							</form>
						</div>
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