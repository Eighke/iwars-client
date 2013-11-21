<?php
/**
 * Package		Template
 * Subpackage	System
 * File			global.php
 *
 * Licence		Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright	Copyright (C) 2005 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric V. (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2013-11-09 - Eighke
 */
if (!session_id()) exit();

$limit = $this->getData('limit');
$rows = $this->getData('rows');
$i = $this->getData('i');
?>
<h1><?php echo ILang::_('Global'); ?></h1>
<?php $this->renderMsgs(); ?>
<div class="content">
	<div class="contenant">
		<div><a href="?limit=<?php echo $limit-50; ?>">&lsaquo;&lsaquo; -50 &lsaquo;</a> | <a href="?limit=<?php echo $limit+50; ?>">&rsaquo; +50 &rsaquo;&rsaquo;</a></div>
		<div class="table-responsive" style="overflow-x: scroll; overflow-y: hidden;">
			<table class="table table-striped">
				<thead>
					<tr>
						<th style="min-width:155px;">
							Coordonné
						</th>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<th class="center">
							<a href="#"><?php echo $rows['loc'][$j]; ?></a>
						</th>
						<?php endfor; ?>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<?php echo ILang::_('Titanium'); ?>
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center"<?php echo $rows['ress1'][$j]['fact_qtt'] == $rows['ress1'][$j]['fact_max'] ? ' style="background:red;"' : ($rows['ress1'][$j]['fact_qtt'] > ($rows['ress1'][$j]['fact_max']/10) ? ' style="background:orange;"' : NULL); ?>>
							<?php echo $rows['ress1'][$j]['fact_qtt']; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							<?php echo ILang::_('Silicon'); ?>
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center"<?php echo $rows['ress2'][$j]['fact_qtt'] == $rows['ress2'][$j]['fact_max'] ? ' style="background:red;"' : ($rows['ress2'][$j]['fact_qtt'] > ($rows['ress2'][$j]['fact_max']/10) ? ' style="background:orange;"' : NULL); ?>>
							<?php echo $rows['ress2'][$j]['fact_qtt']; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							<?php echo ILang::_('Water'); ?>
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center"<?php echo $rows['ress4'][$j]['fact_qtt'] == $rows['ress4'][$j]['fact_max'] ? ' style="background:red;"' : ($rows['ress4'][$j]['fact_qtt'] > ($rows['ress4'][$j]['fact_max']/10) ? ' style="background:orange;"' : NULL); ?>>
							<?php echo $rows['ress4'][$j]['fact_qtt']; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							<?php echo ILang::_('Hydrogen'); ?>
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center"<?php echo $rows['ress3'][$j]['fact_qtt'] == $rows['ress3'][$j]['fact_max'] ? ' style="background:red;"' : ($rows['ress3'][$j]['fact_qtt'] > ($rows['ress3'][$j]['fact_max']/10) ? ' style="background:orange;"' : NULL); ?>>
							<?php echo $rows['ress3'][$j]['fact_qtt']; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							<?php echo ILang::build(1, 'name'); ?>
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?php echo $rows['build1'][$j] ? $rows['build1'][$j] : '-'; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							<?php echo ILang::build(8, 'name'); ?>
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?php echo $rows['build8'][$j] ? $rows['build8'][$j] : '-'; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							<?php echo ILang::build(3, 'name'); ?>
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?php echo $rows['build3'][$j] ? $rows['build3'][$j] : '-'; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							<?php echo ILang::build(4, 'name'); ?>
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?php echo $rows['build4'][$j] ? $rows['build4'][$j] : '-'; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							<?php echo ILang::build(6, 'name'); ?>
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?php echo $rows['build6'][$j] ? $rows['build6'][$j] : '-'; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							<?php echo ILang::build(5, 'name'); ?>
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?php echo $rows['build5'][$j] ? $rows['build5'][$j] : '-'; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							<?php echo ILang::build(7, 'name'); ?>
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?php echo $rows['build7'][$j] ? $rows['build7'][$j] : '-'; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							<?php echo ILang::build(13, 'name'); ?>
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?php echo $rows['build13'][$j] ? $rows['build13'][$j] : '-'; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							<?php echo ILang::build(14, 'name'); ?>
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?php echo $rows['build14'][$j] ? $rows['build14'][$j] : '-'; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							<?php echo ILang::build(16, 'name'); ?>
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?php echo $rows['build16'][$j] ? $rows['build16'][$j] : '-'; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							<?php echo ILang::build(15, 'name'); ?>
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?php echo $rows['build15'][$j] ? $rows['build15'][$j] : '-'; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							<?php echo ILang::build(18, 'name'); ?>
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?php echo $rows['build18'][$j] ? $rows['build18'][$j] : '-'; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							<?php echo ILang::build(20, 'name'); ?>
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?php echo $rows['build20'][$j] ? $rows['build20'][$j] : '-'; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							<?php echo ILang::build(19, 'name'); ?>
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?php echo $rows['build19'][$j] ? $rows['build19'][$j] : '-'; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							<?php echo ILang::build(26, 'name'); ?>
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?php echo $rows['build26'][$j] ? $rows['build26'][$j] : '-'; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							<?php echo ILang::build(27, 'name'); ?>
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?php echo $rows['build27'][$j] ? $rows['build27'][$j] : '-'; ?>
						</td>
						<?php endfor; ?>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- /#Main -->
