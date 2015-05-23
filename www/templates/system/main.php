<?php
/**
 * Package      Templates
 * Subpackage   System
 * File         main.php
 *
 * Licence      Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright    Copyright (C) 2005 - 2014 Frédéric Vandebeuque. All rights reserved.
 * Contrib      Frédéric V. (fred.vdb@newebtime.com)
 *              Eighke (eighke@multi-site.net)
 *
 * Version      2014-02-13 - Eighke
 */
if (!session_id()) exit();
?>
<h1><?php echo ILang::_('General'); ?></h1>
<?php $this->renderMsgs(); ?>
<?php if ($this->getData('AdminMSG')) : ?>
<div class="block light">
	<?php echo $this->getData('AdminMSG'); ?>
</div>
<?php endif; ?>

<?php if($actions = $this->getData('actions')) : ?>
<h2><?php echo ILang::_('UnitsMove'); ?></h2>
<div class="moves">
	<?php foreach($actions as $action) : ?>
	<div class="<?php echo $action->class; ?> tip pleft" data-toggle="tooltip" content="<?php echo ILang::_($action->type); ?>::Units: <?php echo $action->unit; ?>&lt;br /&gt;<?php if (isset($action->ress)) : ?>&lt;b&gt;T:&lt;/b&gt; <?php echo $action->ress[0]; ?>&lt;br /&gt; &lt;b&gt;S:&lt;/b&gt; <?php echo $action->ress[1]; ?>&lt;br /&gt; &lt;b&gt;E:&lt;/b&gt; <?php echo $action->ress[3]; ?>&lt;br /&gt; &lt;b&gt;H:&lt;/b&gt; <?php echo $action->ress[2]; ?><?php endif; ?>">
		<span class="left">
			<span class="countdown" time="<?php echo time()+$action->uTime; ?>"><?php echo $action->wait; ?></span>
			| <?php echo $action->msg; ?></span>
		<?php if ($action->cancel) : ?>
		<span class="right button"><a href="main.php?task=cancel&id=<?php echo $action->id; ?>" data-load="cache"><?php echo ILang::_('Cancel'); ?></a></span>
		<?php endif; ?>
		<span class="clr">&nbsp;</span>
	</div>
	<?php endforeach; ?>
</div>
<div class="center"><a href="index.php" class="button" data-load="cache"><?php echo ILang::_('SeeAllMoves'); ?></a></div>
<?php else : ?>
<div class="alert alert-info btn-toolbar">
	<strong class=""><?php echo ILang::_('NoMove'); ?></strong>
	<a href="move.php" class="btn btn-default pull-right btn-xs" title="<?php echo ILang::_('ViewFleets'); ?>" data-load="cache"><span class="glyphicon glyphicon-plane"></span></a>
</div>
<?php endif; ?>

<?php if($builds = $this->getData('builds')) : ?>
<h2><?php echo ILang::_('Buildings'); ?></h2>
<div class="wrk">
	<div>
		<span class="bld_nb">#</span>
		<span class="bld_name"><?php echo ILang::_('Building'); ?></span>
		<span class="bld_time"><?php echo ILang::_('Time'); ?></span>
		<span class="bld_end"><?php echo ILang::_('End'); ?></span>
		<span class="bld_cent">(%)</span>
		<span class="bld_cancel" ><?php echo ILang::_('Planet'); ?></span>
		<div class="clr">&nbsp;</div>
	</div>
	<?php foreach($builds as $build) : ?>
	<div>
		<span class="bld_nb"><?php echo ++$ii; ?></span>
		<span class="bld_name"><?php echo ILang::build($build->typeId, 'name'); ?> (<?php echo $build->nb; ?>)</span>
		<span class="bld_time countdown" offset="<?php echo $build->uTime; ?>"><?php echo $build->time; ?></span>
		<span class="bld_end"><?php echo ILang::date($build->end, 'sql'); ?></span>
		<span class="bld_cent">(<?php echo $build->percent; ?>%)</span>
		<span class="bld_cancel"><a href="?CCity=<?php echo $build->townId; ?>"><?php echo $build->X; ?>:<?php echo $build->Y; ?>:<?php echo $build->Z; ?></a></span>
		<div class="clr">&nbsp;</div>
	</div>
	<?php endforeach; ?>
</div>
<?php if (count($builds) == 20) : ?><div class="center">[ <a href="main.php?all=1" data-load="cache"><?php echo ILang::_('SeeAllBuilds'); ?></a> ]</div><?php endif; ?>
<?php else : ?>
<div class="alert alert-info btn-toolbar">
	<strong class=""><?php echo ILang::_('NoBuild'); ?></strong>
	<a href="builds.php" class="btn btn-default pull-right btn-xs" title="<?php echo ILang::_('ViewBuilds'); ?>" data-load="cache"><span class="glyphicon glyphicon-home"></span></a>
</div>

<?php endif; ?>

<h2><?php echo ILang::_('InfosOf'); ?> <?php echo $this->town->loc['X']; ?>:<?php echo $this->town->loc['Y']; ?>:<?php echo $this->town->loc['Z']; ?></h2>
<div>
	<div class="imgpl text-center col-xs-12 col-sm-8">
		<div>
			<?php if (file_exists( $this->town->getLogo() )) : ?>
			<img src="<?php echo $this->town->getLogo(); ?>" class="img-responsive" />
			<?php else : ?>
			<img src="./skin/pl_default.jpg" class="img-responsive" />
			<?php endif; ?>
			<div class="upload">
				<div style="<?php echo isset($_GET['upload']) ? NULL : 'display:none;'; ?>">
					<form action="main.php?task=upload" enctype="multipart/form-data" method="POST">
						<div>
							<span><?php echo ILang::_('FileSpec'); ?></span>
							<span><input type="file" size="20" name="logo" /></span>
							<span><input type="submit" value="<?php echo ILang::_('Upload'); ?>" /></span>
							<span class="clr">&nbsp;</span>
						</div>
					</form>
				</div>
				<span><a href="main.php?upload=1" class="button"><?php echo ILang::_('Upload'); ?></a></span>
			</div>
		</div>
	</div>
	<div class="col-xs-6 col-sm-4">
		<h2><?php echo ILang::_('Planet'); ?></h2>
		<div>
			<div><span class="bold"><?php echo ILang::_('BuildPoints'); ?></span> <span class="right"><?php echo ILang::number($this->town->points); ?></span></div>
		</div><br />
		<div class="bnorm">
			<div class="bg3">
				<span class="left" style="width:87px">&nbsp;</span>
				<span class="left center" style="width:40px;"><a class="tip help" data-toggle="tooltip" content="<?php echo ILang::_('TipStock'); ?>"><?php echo ILang::_('Stock'); ?></a></span>
				<span class="aright" style="display:inline-block;width:75px"><a class="tip help" data-toggle="tooltip" content="<?php echo ILang::_('TipProduction'); ?>"><?php echo ILang::_('Production'); ?></a></span>
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
			<div class="bg3"><a href="./ress.php" data-load="cache"><?php echo ILang::_('MoreInfos'); ?></a></div>
		</div><br /><br />
	</div>
	<div class="col-xs-6 col-sm-4">
		<h2><?php echo ILang::_('Empire'); ?></h2>
		<div>
			<div><span class="bold"><a data-toggle="tooltip" content="<?php echo ILang::_('TipPower'); ?>" class="tip help"><?php echo ILang::_('Power'); ?></a></span> <span class="right"><?php echo $this->getData('empire')->power; ?>%</span></div>
			<div><span class="bold"><a data-toggle="tooltip" content="<?php echo ILang::_('TipPlanets'); ?>" class="tip help"><?php echo ILang::_('Planets'); ?></a></span> <span class="right"><?php echo $this->getData('empire')->planets; ?> / <?php echo $this->getData('empire')->maxColo; ?></span></div>
		</div><br />
		<div>
			<div><span class="bold"><?php echo ILang::_('BuildPoints'); ?></span> <span class="right"><?php echo ILang::number($this->getData('empire')->points['buildPoints']); ?></span></div>
			<div><span class="bold"><?php echo ILang::_('ResearchPoints'); ?></span> <span class="right"><?php echo ILang::number($this->getData('empire')->points['techPoints']); ?></span></div>
			<div><span class="bold"><?php echo ILang::_('UnitPoints'); ?></span> <span class="right"><?php echo ILang::number($this->getData('empire')->points['unitPoints']); ?></span></div>
			<div><span class="bold"><?php echo ILang::_('TotalPoints'); ?></span> <span class="right"><?php echo ILang::number($this->getData('empire')->points['totalPoints']); ?></span></div>
		</div><br />
		<div>
			<div class="center"><strong><a class="button" href="./global.php" target="_new"><?php echo ILang::_('GlobalView'); ?></a></strong></div>
		</div>
	</div>
</div>
<hr class="clr" />

<?php if($cWorks = $this->getData('cWorks')) : ?>
<h2><?php echo ILang::_('Construction'); ?></h2>
<div class="contenant">
	<div class="dark">
		<?php if($build = $cWorks->build) : ?>
		<div class="bg1">
			<span class="left" style="width:90px;"><?php echo ILang::_('Building'); ?></span>
			<span class="left"> <?php echo ILang::build($build->id, 'name'); ?> </span><span class="right"><?php echo ILang::_('Level'); ?> <?php echo $build->wrkNb; ?> ~ <?php echo ILang::_('TimeLeft:'); ?> <span class="countdown" offset="<?php echo $build->uTime; ?>"><?php echo $build->time; ?></span></span>
			<span class="clr">&nbsp;</span>
		</div>
		<?php endif; ?>
		<?php if($tech = $cWorks->tech) : ?>
		<div class="bg2">
			<span class="left" style="width:90px;"><?php echo ILang::_('Research'); ?></span>
			<span class="left"> <?php echo ILang::research($tech->id, 'name'); ?> </span><span class="right"><?php echo ILang::_('Level'); ?> <?php echo $tech->wrkNb; ?> ~ <?php echo ILang::_('TimeLeft:'); ?> <span class="countdown" offset="<?php echo $tech->uTime; ?>"><?php echo $tech->time; ?></span></span>
			<span class="clr">&nbsp;</span>
		</div>
		<?php endif; ?>
		<?php if($unit = $cWorks->factory) : ?>
		<div class="bg1">
			<span class="left" style="width:90px;"><?php echo ILang::_('Factory'); ?></span>
			<span class="left"> <?php echo ILang::unit($unit->id, 'name'); ?> </span><span class="right"><?php echo ILang::_('Level'); ?> <?php echo $unit->wrkNb; ?> ~ <?php echo ILang::_('TimeLeft:'); ?> <span class="countdown" offset="<?php echo $unit->uTime; ?>"><?php echo $unit->time; ?></span></span>
			<span class="clr">&nbsp;</span>
		</div>
		<?php endif; ?>
		<?php if($unit = $cWorks->workshop) : ?>
		<div class="bg2">
			<span class="left" style="width:90px;"><?php echo ILang::_('Workshop'); ?></span>
			<span class="left"> <?php echo ILang::unit($unit->id, 'name'); ?> </span><span class="right"><?php echo ILang::_('Level'); ?> <?php echo $unit->wrkNb; ?> ~ <?php echo ILang::_('TimeLeft:'); ?> <span class="countdown" offset="<?php echo $unit->uTime; ?>"><?php echo $unit->time; ?></span></span>
			<span class="clr">&nbsp;</span>
		</div>
		<?php endif; ?>
		<?php if($unit = $cWorks->plaform) : ?>
		<div class="bg2">
			<span class="left" style="width:90px;"><?php echo ILang::_('Platform'); ?></span>
			<span class="left"> <?php echo ILang::unit($unit->id, 'name'); ?> </span><span class="right"><?php echo ILang::_('Level'); ?> <?php echo $unit->wrkNb; ?> ~ <?php echo ILang::_('TimeLeft:'); ?> <span class="countdown" offset="<?php echo $unit->uTime; ?>"><?php echo $unit->time; ?></span></span>
			<span class="clr">&nbsp;</span>
		</div>
		<?php endif; ?>
	</div>
</div><br />
<?php endif; ?>

<?php if ($this->town->unit) : ?>
<h2><?php echo ILang::_('Garnison'); ?></h2>
<div class="contenant thumbs row">
	<?php foreach ($this->town->unit as $id => $nb) : ?>
	<div class="col-xs-4 col-sm-3">
		<div class="thumbnail">
		<a href="unit.php?id=<?php echo $id; ?>" data-load="cache">
			<span class="top"><?php echo ILang::number($nb); ?></span>
			<img src="<?php echo SKIN; ?>unit/u<?php echo $id; ?>k10.jpg" class="img-responsive" />
			<span class="bottom"><?php echo ILang::unit($id, 'name'); ?></span>
		</a>
		</div>
	</div>
	<?php endforeach; ?>
	<hr class="clr" />
</div>
<?php endif; ?>

<script type="text/javascript">
	var serverTime = <?php echo time(); ?>;
</script>