<?php
/**
 * Package		Templates
 * Subpackage	Light
 * File			_menu.php
 *
 * Licence		Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright	Copyright (C) 2005 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric V. (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2013-10-15 - Eighke
 */
if (!session_id()) exit();
?>
<!-- Menu Block -->
<?php if ($this->getData('userMenu') != 3) : ?>
<div id="menu" class="col-xs-6">
	<div class="m-top"></div>
	<div class="m-middle">
		<nav class="navbar" role="navigation">
			<div class="navbar-collapse">
				<div class="col-xs-6 col-md-12">
					<div class="m-coords"><form action="?" method="post">
						 <select name="CCity" onChange="this.form.submit();" class="form-control">
								 <?php foreach($this->user->towns as $row) : ?>
								 <option value="<?php echo $row->id; ?>"<?php echo $row->id == $this->town->id ? ' selected="selected"' : ''; ?>><?php echo $row->X; ?>:<?php echo $row->Y; ?>:<?php echo $row->Z; ?></option>
								 <?php endforeach; ?>
						 </select>
					</form></div>
				</div>
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-globe"></span> <?php echo ILang::_('Planet'); ?><b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li<?php if ($this->name == 'main') echo ' class="active"'; ?>><a href="./main.php" title="<?php echo ILang::_('Overview'); ?>"><span class="glyphicon glyphicon-eye-open"></span> <?php echo ILang::_('Overview'); ?></a></li>
							<li<?php if ($this->name == 'builds') echo ' class="active"'; ?>><a href="./builds.php" title="<?php echo ILang::_('Buildings'); ?>"><span class="glyphicon glyphicon-home"></span> <?php echo ILang::_('Buildings'); ?></a></li>
							<li<?php if ($this->name == 'technos') echo ' class="active"'; ?>><a href="./technos.php" title="<?php echo ILang::_('Research'); ?>"><span class="glyphicon glyphicon-briefcase"></span> <?php echo ILang::_('Research'); ?></a></li>
							<li<?php if ($this->name == 'units') echo ' class="active"'; ?>><a href="./units.php" title="<?php echo ILang::_('Production'); ?>"><span class="glyphicon glyphicon-plane"></span> <?php echo ILang::_('Production'); ?></a></li>
							<li<?php if ($this->name == 'defs') echo ' class="active"'; ?>><a href="./defs.php" title="<?php echo ILang::_('Defense'); ?>"><span class="glyphicon glyphicon-tower"></span> <?php echo ILang::_('Defense'); ?></a></li>
							<li class="divider"></li>
							<li<?php if ($this->name == 'move') echo ' class="active"'; ?>><a href="./move.php" title="<?php echo ILang::_('Fleets'); ?>"><span class="glyphicon glyphicon-send"></span> <?php echo ILang::_('Fleets'); ?></a></li>
							<li<?php if ($this->name == 'map') echo ' class="active"'; ?>><a href="./map.php" title="<?php echo ILang::_('Galaxy'); ?>"><span class="glyphicon glyphicon-th"></span> <?php echo ILang::_('Galaxy'); ?></a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-star-empty"></span> <?php echo ILang::_('Empire'); ?><b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li<?php if ($this->name == 'index') echo ' class="active"'; ?>><a href="./index.php" title="<?php echo ILang::_('Overview'); ?>"><span class="glyphicon glyphicon-eye-open"></span> <?php echo ILang::_('Overview'); ?></a></li>
							<li<?php if ($this->name == 'towns') echo ' class="active"'; ?>><a href="./towns.php" title="<?php echo ILang::_('Planets'); ?>"><span class="glyphicon glyphicon-globe"></span> <?php echo ILang::_('Planets'); ?></a></li>
							<?php if ($this->user->premium == 0) : ?><li><a href="./premium.php" style="color:red;"><?php echo ILang::_('Premium'); ?></a></li><?php endif; ?>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</div>
	<div class="m-bottom"></div>
</div>

<?php else : ?>
<div id="menu">
	<div class="m-title"><span class="m-text"><b>Alliance</b></span></div>
	<div>
	<ul>
	<?php foreach($menu['ally'] as $value) : ?>
		<li><?php if ($value['name']) echo '&raquo;'; else echo '&nbsp;'; ?> <a href="./<?php echo $value['page']; ?>" title="<?php echo $value['name']; ?>"><?php echo $value['name']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</div>
</div>
<? endif; ?>
<!-- /Menu Block -->