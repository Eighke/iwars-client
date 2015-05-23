<?php
/**
 * Package      Templates
 * Subpackage   System
 * File         report.php
 *
 * Licence      Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright    Copyright (C) 2005 - 2014 Frédéric Vandebeuque. All rights reserved.
 * Contrib      Frédéric V. (fred.vdb@newebtime.com)
 *              Eighke (eighke@multi-site.net)
 *
 * Version      2014-02-13 - Eighke
 */
if (!session_id()) exit();

// TODO
$report = $this->getData('report');
$infos = $report->infos;
$atk = $report->attacker;
$def = $report->defender;
$ress = $report->resources;
$ia = $this->getData('ia');
//
?>
<h1><?php echo ILang::_('CombatReport'); ?></h1>
<?php $this->renderMsgs(); ?>
<?php if ($report) : ?>
<div class="contenant">
	<table style="width:100%;">
		<thead>
			<tr>
				<th colspan="5" style="background:rgba(0,0,0, 0.6); padding: 5px 0;">
					<span><a href="player.php?id=<?php echo $atk[1]; ?>" data-load="cache"><?php echo $atk[0]; ?></a> (<?php echo $atk[2]; ?>) vs <a href="player.php?id=<?php echo $def[1]; ?>" data-load="cache"><?php echo $def[0]; ?></a> (<?php echo $def[2]; ?>)</span>
					- <span><?php echo date('d M Y, H:i', $infos[2]); ?></span>
				</th>
			</tr>
		</thead>
		<tbody style="text-align:center;">
			<tr>
				<th colspan="5" style="background:rgba(0,0,0, 0.4); padding: 5px 0;"><?php echo ILang::_('Informations'); ?></th>
			</tr>
			<tr>
				<th>&nbsp;</th>
				<th colspan="2" style="width:34%;background:rgba(172,31,31, 0.5); font-weight:bold;"><?php echo ILang::_('Attacker'); ?></th>
				<th colspan="2" style="width:34%;background:rgba(172,31,31, 0.5); font-weight:bold;"><?php echo ILang::_('Defender'); ?></th>
			</tr>
			<tr style="background:rgba(255,255,255, 0.1);">
				<td style="padding: 5px; text-align:left;">
					<div><?php echo ILang::_('TotalPoints'); ?></div>
				</td>
				<td colspan="2">
					<div><?php echo ILang::number($atk[3]); ?></div>
				</td>
				<td colspan="2">
					<div><?php echo ILang::number($def[3]); ?></div>
				</td>
			</tr>
			<tr style="background:rgba(255,255,255, 0.1);">
				<td style="padding: 5px; text-align:left;">
					<div><?php echo ILang::_('Power'); ?></div>
				</td>
				<td colspan="2">
					<div><?php echo $atk[4]; ?>%</div>
				</td>
				<td colspan="2">
					<div><?php echo $def[4]; ?>%</div>
				</td>
			</tr>
			<?php foreach ($this->getData('rounds') as $round) : $j++; ?>
			<tr>
				<td colspan="5" style="height:5px;"></td>
			</tr>
			<tr>
				<th colspan="5" style="background:rgba(0,0,0, 0.4); padding: 5px 0;"><?php echo ILang::_('Round'); ?> <?php echo $j; ?></th>
			</tr>
			<tr style="background:rgba(172,31,31, 0.5); text-align:center; font-weight:bold;">
				<td style="padding: 5px 5px; text-align:left;"><?php echo ILang::_('Ship'); ?></td>
				<td style="width:17%;"><?php echo ILang::_('Number'); ?></td>
				<td style="width:17%;"><?php echo ILang::_('Destroyed'); ?></td>
				<td style="width:17%;"><?php echo ILang::_('Number'); ?></td>
				<td style="width:17%;"><?php echo ILang::_('Destroyed'); ?></td>
			</tr>
			<?php foreach ($round as $id => $unit) : $i = 1 - $i; ?>
			<tr style="background:rgba(<?php echo $i == 1 ? '42,56,71' : '75,99,124'; ?>, 0.4); text-align:center;">
				<td style="padding: 5px 5px; text-align:left;">
					<?php echo ILang::unit($id, 'name'); ?>
				</td>
				<td>
					<?php if (isset($unit['atk'])) : ?>
					<?php echo $unit['atk'][1]; ?>
					<?php endif; ?>
				</td>
				<td>
					<?php if (isset($unit['atk'])) : ?>
					<?php echo $unit['atk'][2]; ?>
					<?php endif; ?>
				</td>
				<td>
					<?php if (isset($unit['def'])) : ?>
					<?php echo $unit['def'][1]; ?>
					<?php endif; ?>
				</td>
				<td>
					<?php if (isset($unit['def'])) : ?>
					<?php echo $unit['def'][2]; ?>
					<?php endif; ?>
				</td>
			</tr>
			<?php endforeach; ?>
			<?php endforeach; ?>
		</tbody>
		<tfoot style="text-align:center;">
			<tr>
				<td colspan="5" style="height:5px;"></td>
			</tr>
			<tr>
				<th colspan="5" style="background:rgba(0,0,0, 0.4); padding: 5px;"><?php echo ILang::_('Result'); ?></th>
			</tr>
			<tr>
				<td colspan="5" style="background:rgba(0, 0, 0, 0.6); border:2px solid <?php echo ($infos[3] == 1 ? '#ff2222' : ($infos[3] == 2 ? '#1ad24e' : 'white')); ?>; color:<?php echo ($infos[3] == 1 ? '#ff2222' : ($infos[3] == 2 ? '#1ad24e' : 'white')); ?>; padding: 5px; font-weight:bold">
					<?php echo $ia[$infos[3]]; ?>
				</td>
			</tr>
			<tr style="background:rgba(255,255,255, 0.1);">
				<td style="padding: 5px; text-align:left;">
					<?php echo ILang::_('PointsLost'); ?>
				</td>
				<td colspan="2">
					<?php echo ILang::number($atk[5]); ?>
				</td>
				<td colspan="2">
					<?php echo ILang::number($def[5]); ?>
				</td>
			</tr>
			<tr style="background:rgba(255,255,255, 0.1);">
				<td style="padding: 5px; text-align:left;">
					<?php echo ILang::_('FightPoints'); ?>
				</td>
				<td colspan="2">
					<?php echo ILang::number($atk[6]); ?>
				</td>
				<td colspan="2">
					<?php echo ILang::number($def[6]); ?>
				</td>
			</tr>
			<?php if ($infos[3] == 2) : ?>
			<tr style="background:rgba(255,255,255, 0.1);">
				<td style="padding: 5px; text-align:left;">
					<?php echo ILang::_('Resources'); ?>
				</td>
				<td>
					<strong>T:</strong> <?php echo ILang::number($ress[0]); ?>
				</td>
				<td>
					<strong>S:</strong> <?php echo ILang::number($ress[1]); ?>
				</td>
				<td>
					<strong><?php echo ILang::_('W'); ?>:</strong> <?php echo ILang::number($ress[3]); ?>
				</td>
				<td>
					<strong>H:</strong> <?php echo ILang::number($ress[2]); ?>
				</td>
			</tr>
			<?php endif; ?>
		</tfoot>
	</table><br />
	<div class="center button"><a href="reports.php?task=arch&id=<?php echo $this->getData('id'); ?>" data-load="cache"><?php echo ILang::_('Archive'); ?></a></div>
</div>
<?php endif; ?>