<?php
/**
 * Package      Templates
 * Subpackage   System
 * File         builds.php
 *
 * Licence      Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright    Copyright (C) 2005 - 2014 Frédéric Vandebeuque. All rights reserved.
 * Contrib      Frédéric V. (fred.vdb@newebtime.com)
 *              Eighke (eighke@multi-site.net)
 *
 * Version      2014-02-13 - Eighke
 */
if (!session_id()) exit();
?>
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
	<?php if ($work->new) :  ?>
		<span class="bld_name"><?php echo ILang::build($work->id, 'name'); ?> (<?php echo $this->town->getBuild($work->id); ?>)</span>
		<span class="bld_time">00:00:00</span>
		<span class="bld_end"> - </span>
		<span class="bld_cent"><i class="badge">0%</i></span>
		<div class="clr"></div>
	<?php else : ?>
		<span class="bld_name"><?php echo ILang::build($work->typeId, 'name'); ?> (<?php echo $work->nber; ?>)</span>
		<span class="bld_time countdown" offset="<?php echo $work->uTime; ?>"><?php echo $work->time; ?></span>
		<span class="bld_end"><?php echo MySQLtoFormat($work->end); ?></span>
		<span class="bld_cent"><i class="badge"><?php echo $key == 0 ? ($work->percent) : 0; ?>%</i></span>
		<div class="bld_cancel button"><a href="builds.php?task=cancel&id=<?php echo $work->id; ?>" data-load="cache"><?php echo ($key == 0 && $this->getData('work') != 1) ? ILang::_('CancelAll') : ILang::_('Cancel'); ?></a></div>
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
		<span class="elem-name"><b><a href="builds.php?bid=<?php echo $build->id; ?>" data-level="<?php echo $this->town->getBuild($build->id); ?>"><?php echo ILang::build($build->id, 'name'); ?></a></b> (<?php echo $this->town->getBuild($build->id); ?>)</span>
		<?php if(!$this->getData('inWork')
				& $this->resources[1] >= $build->ress[1]
				& $this->resources[2] >= $build->ress[2]
				& $this->resources[3] >= $build->ress[3]) : ?><span class=" button right"><a href="builds.php?task=build&id=<?php echo $build->id; ?>&town=<?php echo $this->town->id; ?>" data-load="cache"><?php echo ILang::_('BuildNow'); ?></a></span>
		<?php elseif ($this->getData('inWork') == 1
				& $this->resources[1] >= ceil($build->ress[1]/100)
				& $this->resources[2] >= ceil($build->ress[2]/100)
				& $this->resources[3] >= ceil($build->ress[3]/100)) : ?><span class="button right"><a href="builds.php?task=build&id=<?php echo $build->id; ?>&town=<?php echo $this->town->id; ?>" data-load="cache"><?php echo ILang::_('Queue'); ?></a></span>
		<?php endif; ?>
		<div class="elem-ress">
			<span class="line"><?php echo $build->ress[1] ? ILang::_('T').': '.ILang::number($build->ress[1]).' &nbsp;' : FALSE; ?>
				<?php echo $build->ress[2] ? ILang::_('S').': '.ILang::number($build->ress[2]).' &nbsp;' : FALSE; ?>
				<?php echo $build->ress[3] ? ILang::_('H').': '.ILang::number($build->ress[3]) : FALSE; ?></span><br />
			<span class="<?php echo $this->user->premium ? 'line' : 'end'; ?>"><?php echo ILang::_('Time'); ?> : <?php echo IWBuild::getFormatTime($build->time/($this->getData('qg')*$this->conf['time_coef'])); ?></span><?php if ($this->user->premium) : ?><br /><?php endif; ?>
			<?php if ($this->user->premium) : ?><span class="end"><?php echo ILang::_('Waiting'); ?> : <?php echo getWaitTime($build->ress, $this->town); ?></span><?php endif; ?>
		</div>
	</div>
	<?php endforeach; ?>
	<?php endif; ?>
</div>
<div class="one_two left_aside">
	<div id="sticky" >
		<div id="b<?php echo $this->getData('info')->id; ?>">
			<div class="right button"><a href="build.php?id=<?php echo $this->getData('info')->id; ?>" data-load="cache"><?php echo ILang::_('Detail'); ?></a></div>
			<h2><?php echo ILang::build($this->getData('info')->id, 'name'); ?></h2>
			<div>
				<div>
					<span class="left" style="margin:0 5px 5px 0;"><img src="<?php echo SKIN; ?>build/b<?php echo $this->getData('info')->id; ?>k10.jpg" alt="" /></span>
					<span><i><span class="points"><?php echo round($this->getData('info')->points, 1); ?></span> <?php echo ILang::_('points'); ?></i></span>
				</div>
				<div>
					<?php if ($this->getData('info')->ress[1]) : ?><span class="r1 line"><strong style="display:inline-block; width:80px;"><?php echo ILang::_('Titanium'); ?></strong><span><?php echo ILang::number($this->getData('info')->ress[1]); ?></span></span><br /><?php endif; ?>
					<?php if ($this->getData('info')->ress[2]) : ?><span class="r2 line"><strong style="display:inline-block; width:80px;"><?php echo ILang::_('Silicon'); ?></strong><span><?php echo ILang::number($this->getData('info')->ress[2]); ?></span></span><br /><?php endif; ?>
					<?php if ($this->getData('info')->ress[3]) : ?><span class="r3 line"><strong style="display:inline-block; width:80px;"><?php echo ILang::_('Hydrogen'); ?></strong><span><?php echo ILang::number($this->getData('info')->ress[3]); ?></span></span><br /><?php endif; ?>
					<span class="time end"><strong style="display:inline-block; width:80px;"><?php echo ILang::_('Time'); ?></strong><span><?php echo IWBuild::getFormatTime($this->getData('info')->time); ?></span></span>
				</div>
				<hr class="clr" />
				<div style="margin: 2px;">
					<i class="desc"><?php echo ILang::build($this->getData('info')->id, 'desc'); ?></i><br />&nbsp;
				</div>
			</div>
			<?php if ($special = $this->getData('info')->special) : ?>
			<div id="normInfo">
				<h2><?php echo ILang::_('Information'); ?></h2>
				<table class="table table table-striped table-condensed">
					<thead>
						<tr>
							<th class="text-center"><?php echo ILang::_('Level'); ?></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($special as $key => $info) : ?>
						<tr<?php echo $key > $this->town->getBuild($this->getData('info')->id) ? ' class="danger"' : NULL; ?>>
							<td class="text-center"><?php echo $key; ?></td>
							<td><?php echo ILang::number($info); ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div><br />
			<?php endif; ?>
			<?php if ($advanced = $this->getData('info')->advanced) : ?>
			<div id="advInfo">
				<h2><?php echo ILang::_('Advanced'); ?></h2>
				<table class="table table table-striped table-condensed">
					<thead>
						<tr>
							<th class="text-center"><?php echo ILang::_('Level'); ?></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($advanced as $info) : ?>
						<tr<?php echo $info->level > $this->town->getBuild($this->getData('info')->id) ? ' class="danger"' : NULL; ?>>
							<td class="text-center"><?php echo $info->level; ?></td>
							<td><?php echo $info->text; ?></td>
						</tr>
						<?php if ($info->level > $this->town->getBuild($this->getData('info')->id)) break; ?>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<div class="clr"></div>
<script type="text/javascript">
	var serverTime = <?php echo time(); ?>;
	var skin = "<?php echo SKIN; ?>";
</script>