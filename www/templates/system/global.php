<!-- #Main -->
<div style="width:1000px; margin: 50px auto 0 auto; overflow-x: auto;">
	<div class="content">
		<?php if(!empty($err)) : ?><div class="err"><?=$err?></div><?php endif; ?>
		<?php if(!empty($nfo)) : ?><div class="nfo"><?=$nfo?></div><?php endif; ?>

		<div class="contenant">
			<div><a href="?limit=<?php echo $limit-50; ?>">&lsaquo;&lsaquo; -50 &lsaquo;</a> | <a href="?limit=<?php echo $limit+50; ?>">&rsaquo; +50 &rsaquo;&rsaquo;</a></div>
			<table>
				<thead>
					<tr>
						<th colspan="<?=$i+1?>" class="title">Global<?=$lang['Global']?></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th>
							Coordonné
						</th>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<th class="center">
							<a href="#"><?=$rows['loc'][$j]?></a>
						</th>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							<?=$lang['Titanium']?>
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center"<?=$rows['ress1'][$j]['fact_qtt'] == $rows['ress1'][$j]['fact_max'] ? ' style="background:red;"' : ($rows['ress1'][$j]['fact_qtt'] > ($rows['ress1'][$j]['fact_max']/10) ? ' style="background:orange;"' : NULL)?>>
							<?=$rows['ress1'][$j]['fact_qtt']?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							<?=$lang['Silicon']?>
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center"<?=$rows['ress2'][$j]['fact_qtt'] == $rows['ress2'][$j]['fact_max'] ? ' style="background:red;"' : ($rows['ress2'][$j]['fact_qtt'] > ($rows['ress2'][$j]['fact_max']/10) ? ' style="background:orange;"' : NULL)?>>
							<?=$rows['ress2'][$j]['fact_qtt']?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							<?=$lang['Water']?>
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center"<?=$rows['ress4'][$j]['fact_qtt'] == $rows['ress4'][$j]['fact_max'] ? ' style="background:red;"' : ($rows['ress4'][$j]['fact_qtt'] > ($rows['ress4'][$j]['fact_max']/10) ? ' style="background:orange;"' : NULL)?>>
							<?=$rows['ress4'][$j]['fact_qtt']?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							<?=$lang['Hydrogen']?>
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center"<?=$rows['ress3'][$j]['fact_qtt'] == $rows['ress3'][$j]['fact_max'] ? ' style="background:red;"' : ($rows['ress3'][$j]['fact_qtt'] > ($rows['ress3'][$j]['fact_max']/10) ? ' style="background:orange;"' : NULL)?>>
							<?=$rows['ress3'][$j]['fact_qtt']?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							Centre de cité
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?=$rows['build1'][$j] ? $rows['build1'][$j] : '-'?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							Centre de recherche
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?=$rows['build8'][$j] ? $rows['build8'][$j] : '-'?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							Mine de Titane
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?=$rows['build3'][$j] ? $rows['build3'][$j] : '-'?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							Usine de Silicium
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?=$rows['build4'][$j] ? $rows['build4'][$j] : '-'?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							Tour de forage
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?=$rows['build6'][$j] ? $rows['build6'][$j] : '-'?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							Synthétiseur d'hydrogène
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?=$rows['build5'][$j] ? $rows['build5'][$j] : '-'?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							Synthétiseur avancé d'hydrogène
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?=$rows['build7'][$j] ? $rows['build7'][$j] : '-'?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							Hangar à titane
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?=$rows['build13'][$j] ? $rows['build13'][$j] : '-'?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							Entrepôts de silicium
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?=$rows['build14'][$j] ? $rows['build14'][$j] : '-'?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							Réservoir d'eau
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?=$rows['build16'][$j] ? $rows['build16'][$j] : '-'?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							Réservoir d'hydrogène
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?=$rows['build15'][$j] ? $rows['build15'][$j] : '-'?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							Usine de vaisseaux
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?=$rows['build18'][$j] ? $rows['build18'][$j] : '-'?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							Chantier orbitale
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?=$rows['build20'][$j] ? $rows['build20'][$j] : '-'?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							Plateforme de défense
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?=$rows['build19'][$j] ? $rows['build19'][$j] : '-'?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							Réacteur du bouclier
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?=$rows['build26'][$j] ? $rows['build26'][$j] : '-'?>
						</td>
						<?php endfor; ?>
					</tr>
					<tr>
						<td>
							Bouclier énergétique
						</td>
						<?php for ($j = 0; $j < $i; $j++) : ?>
						<td class="center">
							<?=$rows['build27'][$j] ? $rows['build27'][$j] : '-'?>
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
