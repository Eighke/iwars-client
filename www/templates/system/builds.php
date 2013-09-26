<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			builds.php
 *
 * Licence		GNU General Public License version 3; see http://www.gnu.org/licenses/lgpl-3.0.en.html
 * Copyright	Copyright (C) 2005 - 2012 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric Vandebeuque (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2012-11-19 - Eighke
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
						<h1><?php echo ILang::_('Buildings'); ?></h1>
						<?php $this->renderMsgs(); ?>
						<?php if($works = $this->getData('works')) : ?>
						<div class="wrk">
							<div>
								<span class="bld_name"><?php echo ILang::_('Building'); ?></span>
								<span class="bld_time"><?php echo ILang::_('Time'); ?></span>
								<span class="bld_end"><?php echo ILang::_('End'); ?></span>
								<span class="bld_cent">(%)</span>
								<div class="clr"></div>
							</div>
							<?php foreach($works as $key => $work) : ?>
							<div>
							<?php if ($work->new) : ?>
								<span class="bld_name"><?php echo ILang::build($work->buildId, 'name'); ?> (<?php echo $this->town->getBuild($work->buildId); ?>)</span>
								<span class="bld_time">00:00:00</span>
								<span class="bld_cent">(0%)</span>
								<div class="clr"></div>
							<?php else : ?>
								<span class="bld_name"><?php echo ILang::build($work->typeId, 'name'); ?> (<?php echo $work->nber; ?>)</span>
								<span class="bld_time countdown" id="bx[<?php echo $key; ?>]" title="<?php echo $work->uTime; ?>"><?php echo $work->time; ?></span>
								<span class="bld_end"><?php echo MySQLtoFormat($work->end); ?></span>
								<span class="bld_cent">(<?php echo $key == 0 ? ($work->percent) : 0; ?>%)</span>
								<span class="bld_cancel">[ <a href="?work=cancel&id=<?php echo $work->id; ?>"><?php echo ($key == 0 && $this->getData('work') != 1) ? ILang::_('CancelAll') : ILang::_('Cancel'); ?></a> ]</span>
								<div class="clr"></div>
							<?php endif; ?>
							</div>
							<?php endforeach; ?>
						</div>
						<?php endif; ?>
						<div class="one_two div_content">
							<?php if ($builds = $this->getData('builds')) : ?>
							<?php foreach($builds as $build) : ?>
							<div>
								<span class="elem-name"><b><a class="nolink" href="?bid=<?php echo $build->id; ?>"><?php echo ILang::build($build->id, 'name'); ?></a></b> (<?php echo $this->town->getBuild($build->id); ?>)</span>
								<?php if(!$inwork
										& $this->resources[1] >= $build->ress[1]
										& $this->resources[2] >= $build->ress[2]
										& $this->resources[3] >= $build->ress[3]) : ?><span class=" button right"><a href="?work=build&id=<?php echo $build->id; ?>&town=<?php echo $this->town->id; ?>"><?php echo ILang::_('BuildNow'); ?></a></span>
								<?php elseif ($inwork == 1
										& $this->resources[1] >= ceil($build->ress[1]/100)
										& $this->resources[2] >= ceil($build->ress[2]/100)
										& $this->resources[3] >= ceil($build->ress[3]/100)) : ?><span class="button right"><a href="?work=build&id=<?php echo $build->id; ?>&town=<?php echo $this->town->id; ?>"><?php echo ILang::_('Queue'); ?></a></span>
								<?php endif; ?>
								<div class="elem-ress">
									<span class="line"><?php echo $build->ress[1] ? ILang::_('T').': '.ILang::number($build->ress[1]).' &nbsp;' : FALSE; ?>
										<?php echo $build->ress[2] ? ILang::_('S').': '.ILang::number($build->ress[2]).' &nbsp;' : FALSE; ?>
										<?php echo $build->ress[3] ? ILang::_('H').': '.ILang::number($build->ress[3]) : FALSE; ?></span><br />
									<span class="<?php echo $this->user->premium ? 'line' : 'end'; ?>"><?php echo ILang::_('Time'); ?> : <?php echo IWBuild::getFormatTime($build->buildTime); ?></span><?php if ($this->user->premium) : ?><br /><?php endif; ?>
									<?php if ($this->user->premium) : ?><span class="end"><?php echo ILang::_('Waiting'); ?> : <?php echo getWaitTime($build->ress, $this->town); ?></span><?php endif; ?>
								</div>
							</div>
							<?php endforeach; ?>
							<?php endif; ?>
						</div>
						<div class="one_two left_aside">
							<div id="sticky" >
								<div>
									<span class="left" style="margin:0 5px 5px 0;"><img src="<?php echo SKIN; ?>build/b<?php echo $this->getData('info')->id; ?>k10.jpg" alt="" /></span>
									<span><b><?php echo ILang::build($this->getData('info')->id, 'name'); ?></b><br /><i><?php echo $this->getData('info')->points; ?> points</i></span>
								</div>
								<div>
									<?php if ($this->getData('info')->ress[1]) : ?><span class="left" style="margin-left:10px; width:80px;"><img src="<?php echo SKIN; ?>imgs/1.gif" /><?php echo ILang::_('Titanium'); ?></span><span><?php echo ILang::number($this->getData('info')->ress[1]); ?></span><br /><?php endif; ?>
									<?php if ($this->getData('info')->ress[2]) : ?><span class="left" style="margin-left:10px; width:80px;"><img src="<?php echo SKIN; ?>imgs/1.gif" /><?php echo ILang::_('Silicon'); ?></span><span><?php echo ILang::number($this->getData('info')->ress[2]); ?></span><br /><?php endif; ?>
									<?php if ($this->getData('info')->ress[3]) : ?><span class="left" style="margin-left:10px; width:80px;"><img src="<?php echo SKIN; ?>imgs/1.gif" /><?php echo ILang::_('Hydrogen'); ?></span><span><?php echo ILang::number($this->getData('info')->ress[3]); ?></span><br /><?php endif; ?>
									<span class="left" style="margin-left:10px; width:80px;"><img src="<?php echo SKIN; ?>imgs/2.gif" /><?php echo ILang::_('Time'); ?></span><span><?php echo IWBuild::getFormatTime($this->getData('info')->time); ?></span>
								</div>
								<hr class="clr" />
								<div style="margin: 2px; height:75px;">
									<span><i><?php echo ILang::build($this->getData('info')->id, 'desc'); ?></i><br />&nbsp;</span>
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
									<div class="bg<?php echo $j; ?>"><span class="left" style="margin: 0 5px; width:71px;"><?php echo ILang::_('Level'); ?> <?php echo $key; ?></span><span><?php echo ILang::number($info); ?></span></div>
									<?php endforeach; ?>
								</div><br />
								<?php endif; ?>
								<?php if ($advanced = ILang::build($this->getData('info')->id, 'advanced')) : ?>
								<h2><?php echo ILang::_('Advanced'); ?></h2>
								<div>
									<?php
									$j = 0;
									foreach($advanced as $info) :
										if ($j == 3) break;
										if ($info->level > $this->town->getBuild($this->getData('info')->id))
											$j = 3;
										else
											$j = $j == 2 ? 1 : 2;
									?>
									<div class="bg<?php echo $j; ?>"><span class="left" style="margin: 0 5px; width:71px;"><?php echo ILang::_('Level'); ?> <?php echo $info->level; ?></span><span><?php echo $info->text; ?></span></div>
									<?php endforeach; ?>
								</div> 
								<?php endif; ?>
							</div>
						</div>
						<div class="clr"></div>
					</div>
					<!-- /#Main -->
				</div>
			</div>
		</div>
		<!-- /Middle -->
		<script type="text/javascript">

			$(document).ready(function(){
			var topHeight = $('#top').height() + 30;

			var obj = $('#sticky');
			var offset = obj.offset();
			var topOffset = offset.top-topHeight;
			var leftOffset = offset.left;
			var marginTop = obj.css("marginTop");
			var marginLeft = obj.css("marginLeft");
			
			$(window).scroll(function() {
			var scrollTop = $(window).scrollTop();
			
				if (scrollTop >= topOffset){
			
					obj.css({
						marginTop: -topOffset,
						position: 'fixed',
					});
				}
			
				if (scrollTop < topOffset){
			
					obj.css({
						marginTop: marginTop,
						position: 'relative',
					});
				}
			});
			});
		</script>
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