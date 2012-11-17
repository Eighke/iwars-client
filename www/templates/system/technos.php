<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			technos.php
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
						<h1><?php echo ILang::_('Researchs'); ?></h1>
						<?php $this->renderMsgs(); ?>
						<?php if($wrks = $this->getData('works')) : ?>
						<div class="wrk">
							<div>
								<span class="bld_nb">#</span>
								<span class="bld_name"><?php echo ILang::_('Research'); ?></span>
								<span class="bld_time"><?php echo ILang::_('Time'); ?></span>
								<span class="bld_end"><?php echo ILang::_('End'); ?></span>
								<span class="bld_cent">(%)</span>
								<span class="spacer">&nbsp;</span>
							</div>
							<?php foreach($wrks as $key => $wrk) : ?>
							<div>
							<?php if ($wrk->new) : ?>
								<span class="bld_nb"><?php echo $key+1; ?></span>
								<span class="bld_name"><?php echo qftext($wrk->techName); ?> (<?php echo $this->user->getTech($wrk->techId); ?>)</span>
								<span class="bld_time">00:00:00</span>
								<span class="bld_end"> - </span>
								<span class="bld_cent">(0%)</span>
								<span class="spacer">&nbsp;</span>
							<?php else : ?>
								<span class="bld_nb"><?php echo $key+1; ?></span>
								<span class="bld_name"><?php echo qftext(IWTech::getName($wrk->typeId)); ?> (<?php echo $wrk->nber; ?>)</span>
								<span class="bld_time countdown" id="bx[<?php echo $key; ?>]" title="<?php echo $wrk->uTime; ?>"><?php echo $wrk->time; ?></span>
								<span class="bld_end"><?php echo $wrk->end; ?></span>
								<span class="bld_cent">(<?php echo $key == 0 ? ($wrk->percent) : 0; ?>%)</span>
								<span class="bld_cancel">[ <a href="?work=cancel&id=<?php echo $wrk->id; ?>"><?php echo ($key == 0 && $this->getData('work') != 1) ? ILang::_('CancelAll') : ILang::_('Cancel'); ?></a> ]</span>
								<span class="spacer">&nbsp;</span>
							<?php endif; ?>
							</div>
							<?php endforeach; ?>
						</div>
						<?php endif; ?>
						<?php if($techs = $this->getData('technos')) : ?>
						<div class="one_two div_content">
							<?php foreach($techs as $tech) : ?>
							<div>
								<span class="elem-name"><b><a class="nolink" href="?info=<?php echo $tech->id; ?>"><?php echo ILang::research($tech->id, 'name'); ?></a></b> (<?php echo $usr->tech[$tech->id]; ?>)</span>
								<?php if(!$inwork
										& $this->resources[1] >= $tech->ress[1]
										& $this->resources[2] >= $tech->ress[2]
										& $this->resources[3] >= $tech->ress[3]) : ?><span class="elem-build right"> [ <a href="?work=tech&id=<?php echo $tech->id; ?>&town=<?php echo $this->town->id; ?>"><?php echo ILang::_('ResearchNow'); ?></a> ]</span>
								<?php endif; ?>
								<div class="elem-ress">
									<span class="line"><?php echo $tech->ress[1] ? ILang::_('T').': '.ILang::number($tech->ress[1]).' &nbsp;' : FALSE; ?>
										<?php echo $tech->ress[2] ? ILang::_('S').': '.ILang::number($tech->ress[2]).' &nbsp;' : FALSE ?>
										<?php echo $tech->ress[3] ? ILang::_('H').': '.ILang::number($tech->ress[3]) : FALSE; ?></span>
								</div>
								<span class="end"><?php echo ILang::_('Time'); ?>: <?php echo IWTech::getFormatTime($tech->buildTime); ?></span>
							</div>
							<?php endforeach; ?>
						</div>
						<div class="one_two left_aside">
							<div>
								<div>
									<span class="left" style="margin:0 5px 5px 0; border:1px solid #0a131a;"><img src="<?php echo SKIN; ?>research/f<?php echo $this->getData('info')->id; ?>k10.jpg" alt="" /></span>
									<span><b><?php echo ILang::research($this->getData('info')->id, 'name'); ?></b><br /><i><?php echo $this->getData('info')->points; ?> points</i></span>
								</div>
								<div>
									<?php if ($this->getData('info')->ress[1]) : ?><span class="left" style="margin-left:10px; width:80px;"><img src="<?php echo SKIN; ?>imgs/1.gif" /><?php echo ILang::_('Titanium'); ?></span><span><?php echo ILang::number($this->getData('info')->ress[1]); ?></span><br /><?php endif; ?>
									<?php if ($this->getData('info')->ress[2]) : ?><span class="left" style="margin-left:10px; width:80px;"><img src="<?php echo SKIN; ?>imgs/1.gif" /><?php echo ILang::_('Silicon'); ?></span><span><?php echo ILang::number($this->getData('info')->ress[2]); ?></span><br /><?php endif; ?>
									<?php if ($this->getData('info')->ress[3]) : ?><span class="left" style="margin-left:10px; width:80px;"><img src="<?php echo SKIN; ?>imgs/1.gif" /><?php echo ILang::_('Hydrogen'); ?></span><span><?php echo ILang::number($this->getData('info')->ress[3]); ?></span><br /><?php endif; ?>
									<span class="left" style="margin-left:10px; width:80px;"><img src="<?php echo SKIN; ?>imgs/2.gif" /><?php echo ILang::_('Time'); ?></span><span><?php echo IWTech::getFormatTime($this->getData('info')->time); ?></span>
								</div>
								<hr class="clr" />
								<div style="margin: 2px; height:75px;">
									<span><i><?php echo ILang::research($this->getData('info')->id, 'desc'); ?></i><br />&nbsp;</span>
								</div>
								<?php if ($special = $this->getData('info')->special) : ?>
								<h2><?php echo ILang::_('Information'); ?></h2>
								<div>
									<?php
									$i = 1;
									foreach($special as $key => $info) :
										if ($i > 2)
											$j = 3;
										else
											$j = $j == 2 ? 1 : 2;
										$i++;
									?>
									<div class="bg<?php echo $j; ?>"><span class="left"><?php echo ILang::_('Level'); ?> <?php echo $key; ?></span><span><?php echo $info; ?></span></div>
									<?php endforeach; ?>
								</div><br />
								<?php endif; ?>
								<?php if ($advanced = ILang::research($this->getData('info')->id, 'advanced')) : ?>
								<h2><?php echo ILang::_('Advanced'); ?></h2>
								<div>
									<?php
									$j = 0;
									foreach($advanced as $info) :
										if ($j == 3) break;
										if ($info->level > $this->user->getTech($this->getData('info')->id))
											$j = 3;
										else
											$j = $j == 2 ? 1 : 2;
									?>
									<div class="bg<?php echo $j; ?>"><span class="left" style="margin: 0 5px; width:70px;"><?php echo ILang::_('Level'); ?> <?php echo $info->level; ?></span><span><?php echo $info->text; ?></span></div>
									<?php endforeach; ?>
								</div> 
								<?php endif; ?>
							</div>
						</div>
						<div class="clr"></div>
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