<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			technos.php
 *
 * Licence		Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright	Copyright (C) 2005 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric V. (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2013-11-03 - Eighke
 */
if (!session_id()) exit();
?>
<h1><?php echo ILang::_('Researchs'); ?></h1>
<?php $this->renderMsgs(); ?>
<?php if($works = $this->getData('works')) : ?>
<div class="wrk">
	<div>
		<span class="bld_name"><?php echo ILang::_('Research'); ?></span>
		<span class="bld_time"><?php echo ILang::_('Time'); ?></span>
		<span class="bld_end"><?php echo ILang::_('End'); ?></span>
		<span class="bld_cent">(%)</span>
		<div class="clr"></div>
	</div>
	<?php foreach($works as $key => $work) : ?>
	<div>
	<?php if ($work->new) : ?>
		<span class="bld_name"><?php echo ILang::research($work->id, 'name'); ?> (<?php echo $this->user->getTech($work->id); ?>)</span>
		<span class="bld_time">00:00:00</span>
		<span class="bld_end"> - </span>
		<span class="bld_cent">(0%)</span>
		<div class="clr"></div>
	<?php else : ?>
		<span class="bld_name"><?php echo ILang::research($work->typeId, 'name'); ?> (<?php echo $work->nber; ?>)</span>
		<span class="bld_time countdown" offset="<?php echo $work->uTime; ?>"><?php echo $work->time; ?></span>
		<span class="bld_end"><?php echo MySQLtoFormat($work->end); ?></span>
		<span class="bld_cent">(<?php echo $key == 0 ? ($work->percent) : 0; ?>%)</span>
		<div class="bld_cancel button"><a href="?task=cancel&id=<?php echo $work->id; ?>"><?php echo ($key == 0 && $this->getData('work') != 1) ? ILang::_('CancelAll') : ILang::_('Cancel'); ?></a></div>
		<div class="clr"></div>
	<?php endif; ?>
	</div>
	<?php endforeach; ?>
</div>
<?php endif; ?>
<div class="one_two div_content">
	<?php if ($builds = $this->getData('researchs')) : ?>
	<?php foreach($builds as $build) : ?>
	<div>
		<span class="elem-name"><b><a class="nolink" href="?bid=<?php echo $build->id; ?>"><?php echo ILang::research($build->id, 'name'); ?></a></b> (<?php echo $this->user->getTech($build->id); ?>)</span>
		<?php if(!$this->getData('inWork')
				& $this->resources[1] >= $build->ress[1]
				& $this->resources[2] >= $build->ress[2]
				& $this->resources[3] >= $build->ress[3]) : ?><span class="button right"> <a href="?task=build&id=<?php echo $build->id; ?>&town=<?php echo $this->town->id; ?>"><?echo ILang::_('ResearchNow'); ?></a></span>
		<?php elseif ($this->getData('inWork') == 1
				& $this->resources[1] >= ceil($build->ress[1]/100)
				& $this->resources[2] >= ceil($build->ress[2]/100)
				& $this->resources[3] >= ceil($build->ress[3]/100)) : ?><span class="button right"><a href="?task=build&id=<?php echo $build->id; ?>&town=<?php echo $this->town->id; ?>"><?php echo ILang::_('Queue'); ?></a></span>
		<?php endif; ?>
		<div class="elem-ress">
			<span class="line"><?php echo $build->ress[1] ? ILang::_('T').': '.ILang::number($build->ress[1]).' &nbsp;' : FALSE; ?>
				<?php echo $build->ress[2] ? ILang::_('S').': '.ILang::number($build->ress[2]).' &nbsp;' : FALSE; ?>
				<?php echo $build->ress[3] ? ILang::_('H').': '.ILang::number($build->ress[3]) : FALSE; ?></span><br />
			<span class="end"><?php echo ILang::_('Time'); ?> : <?php echo IWTech::getFormatTime($build->time/($this->getData('center')*$this->conf['time_coef'])); ?></span>
		</div>
	</div>
	<?php endforeach; ?>
</div>
<div class="one_two left_aside">
	<div id="sticky">
		<div id="t<?php echo $tid; ?>">
			<div class="right button"><a href="research.php?id=<?php echo $tid; ?>"><?php echo ILang::_('Detail'); ?></a></div>
			<h2><?php echo ILang::research($this->getData('info')->id, 'name'); ?></h2>
			<div>
				<div>
					<span class="left" style="margin:0 5px 5px 0;"><img src="<?php echo SKIN; ?>research/f<?php echo $this->getData('info')->id; ?>k10.jpg" alt="" /></span>
					<span><i><?php echo round($this->getData('info')->points, 1); ?> <?php echo ILang::_('points'); ?></i></span>
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
					<div class="bg<?php echo $j; ?>"><span class="left" style="margin: 0 5px; width:71px;"><?php echo ILang::_('Level'); ?> <?php echo $info->level; ?></span><span><?php echo $info->text; ?></span></div>
				<?php endforeach; ?>
			</div> 
			<?php endif; ?>
		</div>
	</div>
</div>
<div class="clr"></div>
<?php endif; ?>
<script type="text/javascript">
	var serverTime = <?php echo time(); ?>;
</script>