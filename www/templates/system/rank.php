<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			rank.php
 *
 * Licence		Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright	Copyright (C) 2005 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric V. (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2013-11-10 - Eighke
 */
if (!session_id()) exit();
?>
<h1><?php echo ILang::_('Highscore'); ?></h1>
<?php $this->renderMsgs(); ?>

<div class="panel panel-primary">
	<div class="panel-heading panel-collapse">
		<strong><a data-toggle="collapse" data-target="#options">Options
			<span class="glyphicon glyphicon-chevron-down pull-right"></span></a></strong>
	</div>
	<div id="options" class=" collapse">
		<div class="panel-body">
			<form class="form-horizontal" role="form">
				<div class="form-group">
					<label class="col-sm-2 control-label"><?php echo ILang::_('Highscore'); ?></label>
					<div class="col-sm-2">
						<a href="?rank=player" class="btn btn-primary form-control"><?php echo ILang::_('Players'); ?></a>
					</div>
					<div class="col-sm-2">
						<a href="?rank=alliance" class="btn btn-primary form-control"><?php echo ILang::_('Alliances'); ?></a>
					</div>
					<div class="col-sm-2">
						<a href="?rank=planet" class="btn btn-primary form-control"><?php echo ILang::_('Planets'); ?></a>
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword" class="col-xs-3 col-sm-2 control-label">Top</label>
					<div class="col-xs-9 col-sm-4">
						<select name="page" onChange="this.form.submit();" class="form-control">
							<?php for($i = 1; $i <= $this->getData('pageMax'); $i++) : ?>
							<option value="<?php echo $i; ?>"<?php echo ( $i == $this->getData('page') ? ' selected="selected"' : '' ); ?>><?php echo (($i-1)*100)+1; ?>-<?php echo ($i*100); ?></option>
							<?php endfor; ?>
						</select>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-striped">
		<?php if ($this->getData('type') == 'alliance') : ?>
			<thead>
				<tr>
					<th>#</th>
					<th><?php echo ILang::_('Name'); ?></th>
					<th><a href="?rank=alliance&page=<?php echo $this->getData('page'); ?>&by=devs"><?php echo ILang::_('Development'); ?></a></th>
					<th><a href="?rank=alliance&page=<?php echo $this->getData('page'); ?>&by=units"><?php echo ILang::_('Unit'); ?></a></th>
					<th><a href="?rank=alliance&page=<?php echo $this->getData('page'); ?>&by=total"><?php echo $this->conf['game']->rankType == 1 ? ILang::_('Total') : ILang::_('Fight'); ?></a></th>
					<th><a href="?rank=alliance&page=<?php echo $this->getData('page'); ?>&by=ptsmmbs"><?php echo ILang::_('/members'); ?></a></th>
					<th><a href="?rank=alliance&page=<?php echo $this->getData('page'); ?>&by=mmbs"><?php echo ILang::_('Members'); ?></a></th>
				</tr>
			</thead>
			<tbody>
		<?php
			$i = $this->getData('offset')+1;
			foreach($this->getData('ranks') as $rank) : ?>
				<tr class="<?php echo $this->alliance->id == $rank->allyId ? 'success' : NULL; ?>">
					<td><?php echo $i++; ?><span class="<?php echo $rank->grank < $i ? 'rkdown' : ($rank->grank > $i ? 'rkup' : 'rkequal'); ?>"></span></td><?php //TODO: Mettre une fonction ?>
					<td>
						<div><a href="./ally.php?id=<?php echo $rank->allyId; ?>"><?php echo $ally->id == $rank->allyId ? '<span style="color:#fff"><b>'. subtext($rank->allyName, 18) .'</b></span>' : subtext($rank->allyName, 18); ?></a></div>
						<div><span class="label label-primary">#<a href="./ally.php?id=<?php echo $rank->allyId; ?>"><?php echo $rank->allyTag; ?></a></span></div>
					</td>
					<td><?php echo ILang::number($rank->devPoints); ?></td>
					<td><?php echo ILang::number($rank->unitPoints); ?></td>
					<td><?php echo ILang::number($rank->totalPoints); ?></td>
					<td><?php echo ILang::number($rank->mmbsPoints); ?></td>
					<td><?php echo $rank->allyUsers; ?></td>
				</tr>
		<?php endforeach; ?>
			</tbody>
		<?php elseif ($this->getData('type') == 'planet') : ?>
			<thead>
				<tr>
					<th width="50px">#</th>
					<th><?php echo ILang::_('Name'); ?></th>
					<th><?php echo ILang::_('Player'); ?></th>
					<th><a href="?rank=planet&page=<?php echo $this->getData('page'); ?>&by=devs"><?php echo ILang::_('Building'); ?></a></th>
				</tr>
			</thead>
			<tbody>
		<?php
			$i = $this->getData('offset')+1;
			foreach($this->getData('ranks') as $rank) : ?>
				<tr class="<?php echo $this->alliance->id == $rank->allyId ? 'success' : NULL; ?>">
					<td><?php echo $i++; ?></td>
					<td><a href="./p_town.php?id=<?php echo $rank->twnId; ?>"><?php echo $rank->twnName; ?></a></td>
					<td>
						<div><a href="./player.php?id=<?php echo $rank->usrId; ?>"><?php echo $this->user->id == $rank->usrId ? '<span style="color:#fff"><b>'. subtext($rank->usrName, 18) .'</b></span>' : subtext($rank->usrName, 18); ?></a></div>
						<div><span class="label label-primary">#<a href="./ally.php?id=<?php echo $rank->allyId; ?>"><?php echo $rank->allyTag; ?></a></span></div>
					</td>
					<td><?php echo ILang::number($rank->buildPoints); ?></td>
				</tr>
		<?php endforeach; ?>
			</tbody>
		<?php else : ?>
			<thead>
				<tr>
					<th>#</th>
					<th><?php echo ILang::_('Name'); ?></th>
					<th><a href="?page=<?php echo $this->getData('page'); ?>&by=builds"><?php echo ILang::_('Building'); ?></a></th>
					<th><a href="?page=<?php echo $this->getData('page'); ?>&by=researchs"><?php echo ILang::_('Research'); ?></a></th>
					<th><a href="?page=<?php echo $this->getData('page'); ?>&by=units"><?php echo ILang::_('Unit'); ?></a></th>
					<th><a href="?page=<?php echo $this->getData('page'); ?>&by=total"><?php echo $this->conf['game']->rankType == 1 ? ILang::_('Total') : ILang::_('Fight'); ?></a></th>
					<th><a href="?page=<?php echo $this->getData('page'); ?>&by=twns"><?php echo ILang::_('Planet'); ?></a></th>
				</tr>
			</thead>
			<tbody>
		<?php
			$i = $this->getData('offset')+1;
			foreach($this->getData('ranks') as $rank) : ?>
		<?php if ($rank->usrGroup == -2) : ?>
				<tr class="danger">
		<?php elseif ($rank->allyId == $this->alliance->id) : ?>
				<tr class="<?php echo $rank->usrId==$this->user->id ? 'active' : 'success'; ?>">
		<?php else : ?>
				<tr>
		<?php endif; ?>
					<td><?php echo $i++; ?><span class="<?php echo $rank->grank < $i ? 'rkdown' : ($rank->grank > $i ? 'rkup' : 'rkequal'); ?>"></span></td><?php //TODO: Mettre une fonction ?>
					<td>
						<div><a href="./player.php?id=<?php echo $rank->usrId; ?>"><?php echo $this->user->id == $rank->usrId ? '<span style="color:#fff"><b>'. subtext($rank->usrName, 18) .'</b></span>' : subtext($rank->usrName, 18); ?></a></div>
						<div><span class="label label-primary">#<a href="./ally.php?id=<?php echo $rank->allyId; ?>"><?php echo $rank->allyTag; ?></a></span></div>
					</td>
					<td><?php echo ILang::number($rank->buildPoints); ?></td>
					<td><?php echo ILang::number($rank->techPoints); ?></td>
					
					<td><?php echo ILang::number($rank->unitPoints); ?></td>
					<td><?php echo ILang::number($rank->totalPoints); ?></td>
					<td><?php echo ILang::number($rank->usrTowns); ?></td>
				</tr>
		<?php endforeach; ?>
			</tbody>
		<?php endif; ?>
		</table>
	</div>
	<div class="panel-footer">
		<form class="col-xs-5 col-sm-3 pull-right" role="form">
			<select name="page" onChange="this.form.submit();" class="form-control">
				<?php for($i = 1; $i <= $this->getData('pageMax'); $i++) : ?>
				<option value="<?php echo $i; ?>"<?php echo ( $i == $this->getData('page') ? ' selected="selected"' : '' ); ?>><?php echo (($i-1)*100)+1; ?>-<?php echo ($i*100); ?></option>
				<?php endfor; ?>
			</select>
		</form>
		<hr class="clr clearfix"/>
	</div>
</div>