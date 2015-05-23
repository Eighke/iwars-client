<?php
/**
 * Package      Templates
 * Subpackage   System
 * File         aally.php
 *
 * Licence      Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright    Copyright (C) 2005 - 2014 Frédéric Vandebeuque. All rights reserved.
 * Contrib      Frédéric V. (fred.vdb@newebtime.com)
 *              Eighke (eighke@multi-site.net)
 */
if (!session_id()) exit();
?>

<h1><?php echo ILang::_('Administration'); ?></h1>
<?php $this->renderMsgs(); ?>
<?php if ($this->alliance->isLeader($this->user->id)) : ?>
<ul class="nav nav-tabs">
	<li><a href="#tabGeneral" data-toggle="tab"><?php echo ILang::_('General'); ?></a></li>
	<li class="active"><a href="#tabDescriptions" data-toggle="tab"><?php echo ILang::_('Description'); ?></a></li>

	<li class="dropdown">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			<?php echo ILang::_('More'); ?> <span class="caret"></span>
		</a>
		<ul class="dropdown-menu">
			<li><a href="#tabLeader" data-toggle="tab"><?php echo ILang::_('ChangeLeader'); ?></a></li>
			<?php if ($this->conf['game']->lockMember == 0) : ?><li><a href="#tabDelete" data-toggle="tab"><?php echo ILang::_('DeleteAlly'); ?></a></li><?php endif; ?>
		</ul>
	</li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
	<div class="tab-pane fade" id="tabGeneral">
		<div class="block">
			<h2><?php echo ILang::_('Logo'); ?></h2>
			<form action="./aally.php" enctype="multipart/form-data" method="POST">
				<input type="hidden" name="task" value="logo" />
				<?php if (file_exists( $this->alliance->getLogo() )) : ?>
				<div class="text-center">
					<img src="<?php echo $this->alliance->getLogo(); ?>" />
				</div><br />
				<?php else : ?>
				<div class="text-center"><?php echo ILang::_('NoLogo'); ?></div><br />
				<?php endif; ?>
				<p class="alert alert-info text-center"><i class="glyphicon glyphicon-info-sign"></i> <strong><?php echo ILang::_('AlowedFiles'); ?></strong></p>
				<div class="form-group">
					<label for="field-logo" class="col-xs-4 control-label"> </label>
					<div class="col-xs-4">
						<input type="file" id="field-logo" name="logo" class="form-control" />
					</div>
					<input type="submit" value="<?php echo ILang::_('Upload'); ?>" class="col-xs-4" />
				</div>
				<div class="clr"> </div>
			</form>
		</div>
		<hr />
		<form action="./aally.php" method="POST" class="form-horizontal">
			<input type="hidden" name="task" value="link" />
			<div class="block">
				<h2><?php echo ILang::_('General'); ?></h2>
				<div class="form-group">
					<label for="field-link" class="col-xs-4 control-label"><?php echo ILang::_('Website'); ?></label>
					<div class="col-xs-6">
						<input value="<?php echo $this->alliance->link; ?>" type="text" id="field-link" name="link" class="form-control" placeholder="http://" />
						<p class="help-block"><?php echo ILang::_('InsertAllianceLink'); ?></p>
					</div>
				</div>
				<div class="clr"></div>
			</div>
			<div>
				<span><button type="submit" id="loading-example-btn" class="btn-block btn btn-primary"><?php echo ILang::_('Save'); ?></button></span>
			</div>
		</form>
	</div>
	<div class="tab-pane active fade in" id="tabDescriptions">
		<form action="./aally.php" method="POST" class="form-horizontal">
			<input type="hidden" name="task" value="desc" />
			<div class="block center">
				<h2><?php echo ILang::_('AllyDesc'); ?></h2>
				<h3><strong><?php echo ILang::_('PublicDescription'); ?></strong></h3>
				<div class="block">
					<div><textarea name="desc" id="desc"><?php echo $this->alliance->desc; ?></textarea></div>
					<div>
						<span><?php echo ILang::_('Character'); ?> : <span id="desc_counter">50000</span></span>
					</div>
				</div>
				<h3><strong><?php echo ILang::_('PrivateDescription'); ?></strong></h3>
				<div class="block">
					<div><textarea name="pdesc" id="pdesc"><?php echo $this->alliance->pDesc; ?></textarea></div>
					<div>
						<span><?php echo ILang::_('Character'); ?> : <span id="pdesc_counter">50000</span></span>
					</div>
				</div>
				<div>
					<span><input type="submit" value="<?php echo ILang::_('Save'); ?>" class="form-control" /></span>
				</div>
			</div>
		</form>
	</div>
	<div class="tab-pane fade" id="tabLeader">
		<form action="./aally.php" method="POST" class="form-horizontal">
			<input type="hidden" name="task" value="leader" />
			<div class="block">
				<h2><?php echo ILang::_('ChangeLeader'); ?></h2>
				<div class="form-group">
					<label for="field-usr" class="col-xs-4 control-label"><?php echo ILang::_('NewLeader'); ?></label>
					<div class="col-xs-4">
						<select name="usr" id="field-usr" class="form-control">
							<?php if ($members =& $this->alliance->getMembers()) : ?>
							<?php foreach($members as $member) : ?>
							<option value="<?php echo $member->id; ?>"<?php echo ( $this->user->id == $member->id ? ' selected="selected"' : '' ); ?>><?php echo $member->name; ?></option>
							<?php endforeach; ?>
							<?php endif; ?>
						</select>
						<p class="help-block"><?php echo ILang::_('SelectNewLeader'); ?></p>
					</div>
				</div>
				<p class="alert alert-warning text-center"><i class="glyphicon glyphicon-info-sign"></i> <strong><?php echo ILang::_('WeNeedPassword'); ?></strong></p>
				<div class="form-group">
					<label for="field-password" class="col-xs-4 control-label"><?php echo ILang::_('Password'); ?></label>
					<div class="col-xs-4">
						<input type="password" id="field-password" name="password" class="form-control" />
					</div>
					<input type="submit" value="<?php echo ILang::_('Save'); ?>" class="col-xs-4" />
				</div>
				<div class="clr"></div>
			</div>
		</form>
	</div>
	<?php if ($this->conf['game']->lockMember == 0) : ?>
	<div class="tab-pane fade" id="tabDelete">
		<form action="./aally.php" method="POST" class="form-horizontal">
			<input type="hidden" name="task" value="destroy" />
			<div class="block">
				<h2><?php echo ILang::_('DeleteAlly'); ?></h2>
				<div class="form-group">
					<label for="field-del" class="col-xs-4 control-label"><?php echo ILang::_('DelAlly'); ?></label>
					<div class="col-xs-4">
						<select name="del" id="field-del" class="form-control">
							<option value="0" selected="selected"><?php echo ILang::_('No'); ?></option>
							<option value="1"><?php echo ILang::_('Yes'); ?></option>
						</select>
					</div>
				</div>
				<p class="alert alert-warning text-center"><i class="glyphicon glyphicon-info-sign"></i> <strong><?php echo ILang::_('WeNeedPassword'); ?></strong></p>
				<div class="form-group">
					<label for="field-password" class="col-xs-4 control-label"><?php echo ILang::_('Password'); ?></label>
					<div class="col-xs-4">
						<input type="password" id="field-password" name="password" class="form-control" />
					</div>
					<input type="submit" value="<?php echo ILang::_('Save'); ?>" class="col-xs-4" />
				</div>
				<div class="clr"></div>
			</div>
		</form>
	</div>
	<?php endif; ?>
</div>
<?php endif; ?>

<div class="clr"></div>