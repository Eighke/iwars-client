<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			global.php
 *
 * Licence		GNU General Public License version 3; see http://www.gnu.org/licenses/lgpl-3.0.en.html
 * Copyright	Copyright (C) 2005 - 2012 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric Vandebeuque (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2012-11-18 - Eighke
 */
if (!session_id()) exit();

//TODO
$rows = $this->getData('rows');
?>
<!-- #Main -->
<div style="width:1000px; margin: 50px auto 0 auto; overflow-x: auto;">
	<div class="content">
		<?php $this->renderMsgs(); ?>

		<div class="contenant">
			<div><a href="?limit=<?php echo $this->getData('limit')-50; ?>">&lsaquo;&lsaquo; -50 &lsaquo;</a> | <a href="?limit=<?php echo $this->getData('limit')+50; ?>">&rsaquo; +50 &rsaquo;&rsaquo;</a></div>
			<table>
				<thead>
					<tr>
						<th colspan="<?php echo $i+1; ?>" class="title">Global<?php echo $lang['Global']; ?></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th>
							Coordonné
						</th>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<th class="center">
							<a href="#"><?php echo $rows['loc'][$j]; ?></a>
						</th>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							<?php echo $lang['Titanium']; ?>
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center"<?php echo $rows['ress1'][$j]['fact_qtt'] == $rows['ress1'][$j]['fact_max'] ? ' style="background:red;"' : ($rows['ress1'][$j]['fact_qtt'] > ($rows['ress1'][$j]['fact_max']/10) ? ' style="background:orange;"' : NULL); ?>>
							<?php echo $rows['ress1'][$j]['fact_qtt']; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							<?php echo $lang['Silicon']; ?>
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center"<?php echo $rows['ress2'][$j]['fact_qtt'] == $rows['ress2'][$j]['fact_max'] ? ' style="background:red;"' : ($rows['ress2'][$j]['fact_qtt'] > ($rows['ress2'][$j]['fact_max']/10) ? ' style="background:orange;"' : NULL); ?>>
							<?php echo $rows['ress2'][$j]['fact_qtt']; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							<?php echo $lang['Water']; ?>
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center"<?php echo $rows['ress4'][$j]['fact_qtt'] == $rows['ress4'][$j]['fact_max'] ? ' style="background:red;"' : ($rows['ress4'][$j]['fact_qtt'] > ($rows['ress4'][$j]['fact_max']/10) ? ' style="background:orange;"' : NULL); ?>>
							<?php echo $rows['ress4'][$j]['fact_qtt']; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							<?php echo $lang['Hydrogen']; ?>
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center"<?php echo $rows['ress3'][$j]['fact_qtt'] == $rows['ress3'][$j]['fact_max'] ? ' style="background:red;"' : ($rows['ress3'][$j]['fact_qtt'] > ($rows['ress3'][$j]['fact_max']/10) ? ' style="background:orange;"' : NULL); ?>>
							<?php echo $rows['ress3'][$j]['fact_qtt']; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							Centre de cité
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?php echo $rows['build1'][$j] ? $rows['build1'][$j] : '-'; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							Centre de recherche
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?php echo $rows['build8'][$j] ? $rows['build8'][$j] : '-'; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							Mine de Titane
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?php echo $rows['build3'][$j] ? $rows['build3'][$j] : '-'; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							Usine de Silicium
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?php echo $rows['build4'][$j] ? $rows['build4'][$j] : '-'; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							Tour de forage
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?php echo $rows['build6'][$j] ? $rows['build6'][$j] : '-'; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							Synthétiseur d'hydrogène
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?php echo $rows['build5'][$j] ? $rows['build5'][$j] : '-'; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							Synthétiseur avancé d'hydrogène
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?php echo $rows['build7'][$j] ? $rows['build7'][$j] : '-'; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							Hangar à titane
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?php echo $rows['build13'][$j] ? $rows['build13'][$j] : '-'; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							Entrepôts de silicium
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?php echo $rows['build14'][$j] ? $rows['build14'][$j] : '-'; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							Réservoir d'eau
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?php echo $rows['build16'][$j] ? $rows['build16'][$j] : '-'; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							Réservoir d'hydrogène
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?php echo $rows['build15'][$j] ? $rows['build15'][$j] : '-'; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							Usine de vaisseaux
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?php echo $rows['build18'][$j] ? $rows['build18'][$j] : '-'; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							Chantier orbitale
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?php echo $rows['build20'][$j] ? $rows['build20'][$j] : '-'; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							Plateforme de défense
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?php echo $rows['build19'][$j] ? $rows['build19'][$j] : '-'; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							Réacteur du bouclier
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?php echo $rows['build26'][$j] ? $rows['build26'][$j] : '-'; ?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							Bouclier énergétique
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
	<div></div>
</div>
<!-- /#Main -->
