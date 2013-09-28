<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			_menu.php
 *
 * Licence		Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright	Copyright (C) 2005 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric V. (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2013-09-29 - Eighke
 */
if (!session_id()) exit();
?>
<!-- Menu Block -->
<?php if ($this->getData('userMenu') != 3) : ?>
<div id="menu">
	<div class="m-top"></div>
	<div class="m-middle">
		<div class="m-coords"><form action="?" method="post">
			 <select name="CCity" onChange="this.form.submit();">
					 <?php foreach($this->user->towns as $row) : ?>
					 <option value="<?php echo $row->id; ?>"<?php echo $row->id == $this->town->id ? ' selected="selected"' : ''; ?>><?php echo $row->X; ?>:<?php echo $row->Y; ?>:<?php echo $row->Z; ?></option>
					 <?php endforeach; ?>
			 </select>
		</form></div>
		<div>
			<div class="m-title">
				<span class="m-text"><b><?php echo ILang::_('Planet'); ?></b></span>
			</div>
			<div class="items">
				<ul>
					<li><a href="./main.php" title="<?php echo ILang::_('Overview'); ?>"><?php echo ILang::_('Overview'); ?></a></li>
					<li><a href="./builds.php" title="<?php echo ILang::_('Buildings'); ?>"><?php echo ILang::_('Buildings'); ?></a></li>
					<li><a href="./technos.php" title="<?php echo ILang::_('Research'); ?>"><?php echo ILang::_('Research'); ?></a></li>
					<li><a href="./units.php" title="<?php echo ILang::_('Production'); ?>"><?php echo ILang::_('Production'); ?></a></li>
					<li><a href="./defs.php" title="<?php echo ILang::_('Defense'); ?>"><?php echo ILang::_('Defense'); ?></a></li>
					<li>&nbsp;</li>
					<li><a href="./move.php" title="<?php echo ILang::_('Fleets'); ?>"><?php echo ILang::_('Fleets'); ?></a></li>
					<li><a href="./map.php" title="<?php echo ILang::_('Galaxy'); ?>"><?php echo ILang::_('Galaxy'); ?></a></li>
				</ul>
			</div>
		</div>
		<div>
			<div class="m-title"><span class="m-text"><b><?php echo ILang::_('General'); ?></b></span>
			</div>
			<div class="items">
				<ul>
					<li><a href="./index.php" title="<?php echo ILang::_('Overview'); ?>"><?php echo ILang::_('Overview'); ?></a></li>
					<li><a href="./towns.php" title="<?php echo ILang::_('Planets'); ?>"><?php echo ILang::_('Planets'); ?></a></li>
					<li>&nbsp;</li>
					<li><a href="./techtree.php" title="Techniques" rel="page"><?php echo ILang::_('Techniques'); ?></a></li>
					<?php if ($this->user->premium == 0) : ?><li><a href="./premium.php" style="color:red;"><?php echo ILang::_('Premium'); ?></a></li><?php endif; ?>
				</ul>
			</div>
		</div>
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