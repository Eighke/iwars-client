<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			index.php
 *
 * Licence		GNU General Public License version 3; see http://www.gnu.org/licenses/lgpl-3.0.en.html
 * Copyright	Copyright (C) 2005 - 2012 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric Vandebeuque (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2012-11-19 - Eighke
 */
if (!session_id()) exit();
?>
<!--  Wrapper -->
<div id="wrapper">
	<?php $this->renderMenu(); ?>
	<!-- Main Block -->
	<div id="main">
		<!-- Top -->
		<div class="top">
			<div class="left"></div>
			<div class="center"></div>
			<div class="right"></div>
		</div>
		<!-- /Top -->
		<!-- Middle -->
		<div class="middle">
			<div class="outer">
				<div class="inner">
					<!-- #Main -->
					<div class="main">
						<h1><?php echo ILang::_('General'); ?></h1>
						<?php $this->renderMsgs(); ?>
						<?php if (ILang::_('AdminMSG')) : ?>
						<div class="block light">
							<?php echo ILang::_('AdminMSG'); ?>
						</div>
						<?php endif; ?>
						<h2><?php echo ILang::_('UnitsMove'); ?></h2>
						<?php if($actions = $this->getData('actions')) : ?>
						<div class="moves">
							<?php foreach($actions as $action) : ?>
							<div class="<?php echo $action->class; ?> hasTip" title="<?php echo ILang::_($action->type); ?>::Units: <?php echo $action->unit; ?>&lt;br /&gt; <?php if ($action->ress[0] != '') : ?>&lt;b&gt;T:&lt;/b&gt; <?php echo $action->ress[0]; ?>&lt;br /&gt; &lt;b&gt;S:&lt;/b&gt; <?php echo $action->ress[1]; ?>&lt;br /&gt; &lt;b&gt;E:&lt;/b&gt; <?php echo $action->ress[3]; ?>&lt;br /&gt; &lt;b&gt;H:&lt;/b&gt; <?php echo $action->ress[2]; ?><?php endif; ?>">
								<span class="left">
									<span class="countdown" id="bx[<?php echo $js++; ?>]" title="<?php echo $action->uTime; ?>"><?php echo $action->wait; ?></span>
									| <?php echo $action->msg[0]; ?> <?php echo $action->X1; ?>:<?php echo $action->Y1; ?>:<?php echo $action->Z1; ?>
									<?php echo $action->msg[1]; ?> <?php echo $action->X2; ?>:<?php echo $action->Y2; ?>:<?php echo $action->Z2; ?>
									<?php echo ILang::_('WithOrder'); ?> <?php echo ILang::_($action->type); ?></span>
									<?php if ($action->cancel) : ?>
									<span class="right">[ <a href="?cancel=<?php echo $action->id; ?>"><?php echo ILang::_('Cancel'); ?></a> ]</span>
									<?php endif; ?>
								<span class="clr">&nbsp;</span>
							</div>
							<?php endforeach; ?>
						</div>
						<div class="center">[ <a href="index.php"><?php echo ILang::_('SeeAllMoves'); ?></a> ]</div><br />
						<?php else : ?>
						<div class="center bold"><?php echo ILang::_('NoMove'); ?></div><br />
						<?php endif; ?>
						<h2><?php echo ILang::_('Buildings'); ?></h2>
						<?php if($builds = $this->getData('builds')) : ?>
						<div class="wrk">
							<div>
								<span class="bld_nb">#</span>
								<span class="bld_name"><?php echo ILang::_('Building'); ?></span>
								<span class="bld_time"><?php echo ILang::_('Time'); ?></span>
								<span class="bld_end"><?php echo ILang::_('End'); ?></span>
								<span class="bld_cent">(%)</span>
								<span class="bld_cancel" ><?php echo ILang::_('Planet'); ?></span>
								<span class="clr">&nbsp;</span>
							</div>
							<?php foreach($builds as $build) : ?>
							<div>
								<span class="bld_nb"><?php echo ++$ii; ?></span>
								<span class="bld_name"><?php echo ILang::build($build->typeId, 'name'); ?> (<?php echo $build->nb; ?>)</span>
								<span class="bld_time countdown" id="bx[<?php echo $js++; ?>]" title="<?php echo $build->uTime; ?>"><?php echo $build->time; ?></span>
								<span class="bld_end"><?php echo MySQLtoFormat($build->end); ?></span>
								<span class="bld_cent">(<?php echo ($build->percent); ?>%)</span>
								<span class="bld_cancel"><?php echo $build->X; ?>:<?php echo $build->Y; ?>:<?php echo $build->Z; ?></span>
								<span class="clr">&nbsp;</span>
							</div>
							<?php endforeach; ?>
						</div>
						<?php if (count($builds) == 20) : ?><div class="center">[ <a href="?all=1"><?php echo ILang::_('SeeAllBuilds'); ?></a> ]</div><?php endif; ?>
						<br />
						<?php else : ?>
						<div class="center bold"><?php echo ILang::_('NoBuild'); ?></div><br />
						<?php endif; ?>
						<h2><?php echo ILang::_('InfosOf'); ?> <?php echo $this->town->loc['X']; ?>:<?php echo $this->town->loc['Y']; ?>:<?php echo $this->town->loc['Z']; ?></h2>
						<div>
							<div class="imgpl left center">
								<?php if (file_exists( $this->town->getLogo() )) : ?>
								<img src="<?php echo $this->town->getLogo(); ?>" />
								<?php else : ?>
								<img src="./skin/pl_default.jpg" />
								<?php endif; ?>
								<br />
								<?php if (isset($_GET['upload'])) : ?>
								<form action="./main.php" enctype="multipart/form-data" method="POST">
									<div>
										<span class="op-field">File (PNG/JPG, 500x500, 50Ko) [TM]</span>
										<span class="op-field"><input type="file" size="20" name="logo" /></span>
										<span><input type="submit" name="act_logo" value="Upload" /></span>
										<span class="clr">&nbsp;</span>
									</div>
								</form>
								<?php else : ?>
								<span>( <a href="?upload=1">Upload</a> )</span>
								<?php endif; ?>
							</div>
							<div class="left lcol">
								<h2><?php echo ILang::_('Planet'); ?></h2>
								<div>
									<div><span style="font-weight:bold;"><?php echo ILang::_('BuildPoints'); ?></span> <span class="right"><?php echo ILang::number($this->town->points); ?></span></div>
								</div><br />
								<div class="bnorm">
									<div class="bg3">
										<span class="left" style="width:87px">&nbsp;</span>
										<span class="left center" style="width:40px;"><?php echo ILang::_('Stock'); ?></span>
										<span class="aright" style="display:inline-block;width:75px"><?php echo ILang::_('Production'); ?></span>
									</div>
									<div class="bg2">
										<span class="left" style="width:87px"><?php echo ILang::_('Titanium'); ?></span>
										<span class="left center<?php echo $this->getData('prod')->R1->stock <= 10 ? ' cvld' : ($this->getData('prod')->R1->stock == 100 ? ' cerr' : ($this->getData('prod')->R1->stock >= 80 ? ' cwrn' : NULL)); ?>" style="width:40px;"><?php echo $this->getData('prod')->R1->stock; ?>%</span>
										<span class="aright" style="display:inline-block;width:75px"><?php echo ILang::number($this->getData('prod')->R1->factCoef); ?></span>
									</div>
									<div class="bg1">
										<span class="left" style="width:87px"><?php echo ILang::_('Silicon'); ?></span>
										<span class="left center<?php echo $this->getData('prod')->R2->stock <= 10 ? ' cvld' : ($this->getData('prod')->R2->stock == 100 ? ' cerr' : ($this->getData('prod')->R2->stock >= 80 ? ' cwrn' : NULL)); ?>" style="width:40px;"><?php echo $this->getData('prod')->R2->stock; ?>%</span>
										<span class="aright" style="display:inline-block;width:75px"><?php echo ILang::number($this->getData('prod')->R2->factCoef); ?></span>
									</div>
									<div class="bg2">
										<span class="left" style="width:87px"><?php echo ILang::_('Water'); ?></span>
										<span class="left center<?php echo $this->getData('prod')->R4->stock <= 10 ? ' cvld' : ($this->getData('prod')->R4->stock == 100 ? ' cerr' : ($this->getData('prod')->R4->stock >= 80 ? ' cwrn' : NULL)); ?>" style="width:40px;"><?php echo $this->getData('prod')->R4->stock; ?>%</span>
										<span class="aright<?php echo $this->getData('prod')->R4->factCoef < 0 ? ' cerr' : FALSE; ?>" style="display:inline-block;width:75px"><?php echo ILang::number($this->getData('prod')->R4->factCoef); ?></span>
									</div>
									<div class="bg1">
										<span class="left" style="width:87px"><?php echo ILang::_('Hydrogen'); ?></span>
										<span class="left center<?php echo $this->getData('prod')->R3->stock <= 10 ? ' cvld' : ($this->getData('prod')->R3->stock == 100 ? ' cerr' : ($this->getData('prod')->R3->stock >= 80 ? ' cwrn' : NULL)); ?>" style="width:40px;"><?php echo $this->getData('prod')->R3->stock; ?>%</span>
										<span class="aright" style="display:inline-block;width:75px"><?php echo ILang::number($this->getData('prod')->R3->factCoef); ?></span>
									</div>
									<div class="bg3"><a href="./ress.php"><?php echo ILang::_('MoreInfos'); ?></a></div>
								</div><br /><br />
							</div>
							<div class="left lcol">
								<h2><?php echo ILang::_('Empire'); ?></h2>
								<div>
									<div><span style="font-weight:bold;"><?php echo ILang::_('Power'); ?></span> <span class="right"><?php echo $this->getData('empire')->power; ?>%</span></div>
									<div><span style="font-weight:bold;"><?php echo ILang::_('Planets'); ?></span> <span class="right"><?php echo $this->getData('empire')->planets; ?> / <?php echo $this->getData('empire')->maxcolo; ?></span></div>
								</div><br />
								<div>
									<div><span style="font-weight:bold;"><?php echo ILang::_('BuildPoints'); ?></span> <span class="right"><?php echo ILang::number($this->getData('empire')->points[0]); ?></span></div>
									<div><span style="font-weight:bold;"><?php echo ILang::_('ResearchPoints'); ?></span> <span class="right"><?php echo ILang::number($this->getData('empire')->points[1]); ?></span></div>
									<div><span style="font-weight:bold;"><?php echo ILang::_('UnitPoints'); ?></span> <span class="right"><?php echo ILang::number($this->getData('empire')->points[2]); ?></span></div>
									<div><span style="font-weight:bold;"><?php echo ILang::_('TotalPoints'); ?></span> <span class="right"><?php echo ILang::number($this->getData('empire')->points[0]+$this->getData('empire')->points[1]+$this->getData('empire')->points[2]); ?></span></div>
								</div><br />
								<div>
									<div class="center"><strong><a href="./global.php" target="_new"><?php echo ILang::_('GlobalView'); ?></a></strong></div>
								</div>
							</div>
						</div>
						<hr class="clr" />
				
						<h2><?php echo ILang::_('Construction'); ?></h2>
						<div class="contenant">
							<div class="dark">
								<div class="bg1">
									<span class="left" style="width:90px;"><?php echo ILang::_('Building'); ?></span>
									<span class="left"> <?php if($build = $this->getData('cWorks')->build) : ?> <?php echo qftext($build->name); ?> </span><span class="right"><?php echo ILang::_('Level'); ?> <?php echo $build->wrkNb; ?> ~ <?php echo ILang::_('TimeLeft:'); ?> <span class="countdown" id="bx[<?php echo $js++; ?>]" title="<?php echo $build->uTime; ?>"><?php echo $build->time; ?></span> <?php else : ?> <?php echo ILang::_('Nonee'); ?> <?php endif; ?></span>
									<span class="clr">&nbsp;</span>
								</div>
								<div class="bg2">
									<span class="left" style="width:90px;"><?php echo ILang::_('Research'); ?></span>
									<span class="left"> <?php if($tech = $this->getData('tech')->tech) : ?> <?php echo qftext($tech->name); ?> </span><span class="right"><?php echo ILang::_('Level'); ?> <?php echo $tech->wrkNb; ?> ~ <?php echo ILang::_('TimeLeft:'); ?> <span class="countdown" id="bx[<?php echo $js++; ?>]" title="<?php echo $tech->uTime; ?>"><?php echo $tech->time; ?></span> <?php else : ?> <?php echo ILang::_('Nonee'); ?> <?php endif; ?></span>
									<span class="clr">&nbsp;</span>
								</div>
								<div class="bg1">
									<span class="left" style="width:90px;"><?php echo ILang::_('Factory'); ?></span>
									<span class="left"> <?php if($unit = $this->getData('factory')->factory) : ?> <?php echo qftext($unit->name); ?> </span><span class="right"><?php echo ILang::_('Level'); ?> <?php echo $unit->wrkNb; ?> ~ <?php echo ILang::_('TimeLeft:'); ?> <span class="countdown" id="bx[<?php echo $js++; ?>]" title="<?php echo $unit->uTime; ?>"><?php echo $unit->time; ?></span> <?php else : ?> <?php echo ILang::_('Nonee'); ?> <?php endif; ?></span>
									<span class="clr">&nbsp;</span>
								</div>
								<div class="bg2">
									<span class="left" style="width:90px;"><?php echo ILang::_('Workshop'); ?></span>
									<span class="left"> <?php if($unit = $this->getData('workshop')->workshop) : ?> <?php echo qftext($unit->name); ?> </span><span class="right"><?php echo ILang::_('Level'); ?> <?php echo $unit->wrkNb; ?> ~ <?php echo ILang::_('TimeLeft:'); ?> <span class="countdown" id="bx[<?php echo $js++; ?>]" title="<?php echo $unit->uTime; ?>"><?php echo $unit->time; ?></span> <?php else : ?> <?php echo ILang::_('Nonee'); ?> <?php endif; ?></span>
									<span class="clr">&nbsp;</span>
								</div>
							</div>
						</div><br />
				
						<?php if ($this->town->unit) : ?>
						<h2><?php echo ILang::_('Garnison'); ?></h2>
						<div class="contenant thumbs">
							<?php foreach ($this->town->unit as $id => $nb) : ?>
							<div>
								<a href="unit.php?id=<?php echo $id; ?>">
									<span class="top"><?php echo ILang::number($nb); ?></span>
									<img src="<?php echo SKIN?>unit/u<?php echo $id; ?>k10.jpg" />
									<span class="bottom"><?php echo ILang::unit($id, 'name'); ?></span>
								</a>
							</div>
							<?php endforeach; ?>
							<hr class="clr" />
						</div>
						<?php endif; ?>
					</div>
					<!-- /#Main -->
				</div>
			</div>
		</div>
		<!-- /Middle -->
		<!-- Bottom -->
		<div class="bottom">
			<div class="left"></div>
			<div class="center"></div>
			<div class="right"></div>
		</div>
		<!-- /Bottom -->
	</div>
	<!-- /Main Block -->
</div>
<!--  /Wrapper -->