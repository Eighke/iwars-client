<?php
/**
 * Package		Templates
 * Subpackage	Light
 * File			_header.php
 *
 * Licence		GNU General Public License version 3; see http://www.gnu.org/licenses/lgpl-3.0.en.html
 * Copyright	Copyright (C) 2005 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric Vandebeuque (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2013-10-14 - Eighke
 */
if (!session_id()) exit();
?>
<div id="out">
	<div id="in">
		<!-- #Container -->
		<div id="container">
			<div id="top"></div>
			<!-- #Header -->
			<div id="header">
				<div id="topmenu"></div>
				<nav class="navbar col-xs-8 col-md-12 pull-right" role="navigation">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!--a class="navbar-brand" href="#">Infinity Wars</a-->
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav">
							<?php if ($this->user->premium == 0) : ?><li><a href="./premium.php" style="color:red;"><?php echo ILang::_('Premium'); ?></a></li><?php endif; ?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-collapse-down"></span> <?php echo ILang::_('General'); ?><b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li<?php if ($this->name == 'rank') echo ' class="active"'; ?>><a href="./rank.php"><span class="glyphicon glyphicon-stats"></span> <?php echo ILang::_('Highscore'); ?></a></li>
									<li<?php if ($this->name == 'ally') echo ' class="active"'; ?>><a href="./ally.php"><span class="glyphicon glyphicon-flag"></span> <?php echo ILang::_('Ally'); ?></a></li>
									<li<?php if ($this->name == 'techtree') echo ' class="active"'; ?>><a href="./techtree.php" title="Techniques" rel="page"><span class="glyphicon glyphicon-tree-deciduous"></span> <?php echo ILang::_('Techniques'); ?></a></li>
									<li<?php if ($this->name == 'search') echo ' class="active"'; ?>><a href="./search.php"><span class="glyphicon glyphicon-search"></span> <?php echo ILang::_('Search'); ?></a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-share-alt"></span> Community<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="http://board.infinite-wars.com" target="_blank"><span class="glyphicon glyphicon-link"></span> <?php echo ILang::_('Forum'); ?></a></li>
									<li><a href="https://www.transifex.com/projects/p/iwars-clients/" target="_blank"><span class="glyphicon glyphicon-link"></span> Transifex</a></li>
									<li><a href="https://github.com/Eighke/iwars-client/" target="_blank"><span class="glyphicon glyphicon-link"></span> Github</a></li>
								</ul>
							</li>
						</ul>
						<div class="col-sm-4 hidden-sm">
							<form class="navbar-form navbar-left" role="search" method="post" action="./search.php">
								<div class="input-group">
									<input type="text" class="form-control" name="name" placeholder="<?php echo ILang::_('Search'); ?>">
									<span class="input-group-btn">
										<button type="submit" class="btn btn-default"> <span class="glyphicon glyphicon-search"></span></button>
									</span>
								</div>
								<input type="hidden" name="search" value="1" />
							</form>
						</div>
						<div class="nav navbar-btn navbar-right btn-group">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
									<span class="glyphicon glyphicon-envelope"></span>
									<span class="badge"><?php echo $this->user->getNewMsg(); ?></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="./msgs.php"><span class="glyphicon glyphicon-comment"></span> <?php echo ILang::_('Messages'); ?> <span class="badge pull-right"><?php echo $this->user->getNewPMs(); ?></span></a></li>
									<li><a href="./notices.php"><span class="glyphicon glyphicon-bell"></span> <?php echo ILang::_('Notices'); ?> <span class="badge pull-right"><?php echo $this->user->getNewNots(); ?></span></a></li>
								</ul>
							</div>
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
									<span class="glyphicon glyphicon-cog"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="./player.php"><span class="glyphicon glyphicon-user"></span> <?php echo ILang::_('Profile'); ?></a></li>
									<li><a href="./options.php"><span class="glyphicon glyphicon-wrench"></span> <?php echo ILang::_('Parameters'); ?></a></li>
									<li><a href="?log=out"><span class="glyphicon glyphicon-log-out"></span> <?php echo ILang::_('Logout'); ?></a></li>
								</ul>
							</div>
						</div>
					</div><!-- /.navbar-collapse -->
				</nav>
				<div id="ress" class="navbar-fixed-bottom">
					<div class="container">
						<div>
							<span class="glyphicon glyphicon-user"></span> <a href="./player.php"><?php echo $this->user->name; ?></a>
						</div>
						<div>
							<span class="glyphicon glyphicon-flag"></span> #<a href="./ally.php"><?php echo $this->alliance->tag; ?></a>
						</div>
						<ul>
							<li class="r1" data-toggle="tooltip" content="<?php echo ILang::_('Titanium'); ?>"><span class="glyphicon glyphicon-magnet"></span> <span><?php echo ILang::number($this->resources['1']); ?></span></li>
							<li class="r2" data-toggle="tooltip" content="<?php echo ILang::_('Silicon'); ?>"><span class="glyphicon glyphicon-flash" ></span> <span><?php echo ILang::number($this->resources['2']); ?></span></li>
							<li class="r4" data-toggle="tooltip" content="<?php echo ILang::_('Water'); ?>"><span class="glyphicon glyphicon-tint"></span> <span><?php echo ILang::number($this->resources['4']); ?></span></li>
							<li class="r3" data-toggle="tooltip" data-placement="bottom" content="<?php echo ILang::_('Hydrogen'); ?>"><span class="glyphicon glyphicon-fire"></span> <span><?php echo ILang::number($this->resources['3']); ?></span></li>
							<li><a href="./ress.php"><span class="glyphicon glyphicon-info-sign"></span></a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /#Header -->