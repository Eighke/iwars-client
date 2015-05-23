<?php
/**
 * Package      Templates
 * Subpackage   System
 * File         ally.php
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
<h1><?php echo ILang::_('Ally'); ?></h1>
<?php $this->renderMsgs(); ?>
<?php if (!$this->getData('get')) : ?>
<div class="center">
	<?php if ($this->getData('alliance')->leaderId != $this->user->id) : ?>
	<div>
		<?php if ($this->getData('alliance')->id == 0) : ?><a href="./cally.php" class="button" data-load="cache"><?php echo ILang::_('JoinAlly'); ?></a><?php else : ?> <a href="./ally.php?quit=1" class="button" data-load="cache"><?php echo ILang::_('ExitAlly'); ?></a><?php endif; ?>
		<a href="./mally.php" class="button" data-load="cache"><?php echo ILang::_('MakeAlly'); ?></a>
	</div>
	<?php endif; ?>
	<?php if ($this->getData('alliance')->leaderId == $this->user->id) : ?>
	<div><a href="./aally.php" class="button" data-load="cache"><?php echo ILang::_('Administration'); ?></a> <a href="./diplomacy.php" class="button" data-load="cache"><?php echo ILang::_('Diplomacy'); ?></a></div><br />
	<div>
		<?php if ($this->getData('requests')) : ?>
		<strong>( <a href="./allym.php" data-load="cache"><?php echo ILang::_('ApplyRequest'); ?></a> )</strong>
		<?php else : ?>
		( <?php echo ILang::_('NoApplyRequest'); ?> )
		<?php endif; ?>
	</div>
	<?php endif; ?>
</div><br />
<?php endif; ?>
<div class="block center">
	<?php if (file_exists( $this->alliance->getLogo() )) : ?>
	<img src="<?php echo $this->alliance->getLogo(); ?>" />
	<?php endif; ?>
</div>
<?php if ($this->getData('alliance')->id != 0) : ?>
<h2><?php echo $this->getData('alliance')->name; ?> [#<?php echo $this->getData('alliance')->tag; ?>]</h2>
<div class="content">
	<dl>
		<dt><?php echo ILang::_('Leader:'); ?></dt> <dd><a href="player.php?id=<?php echo $this->getData('alliance')->leaderId; ?>" data-load="cache"><?php echo $this->getData('alliance')->leaderName; ?></a></dd>
		<dt><?php echo ILang::_('Members:'); ?></dt>
			<dd>
				<?php echo ILang::number($this->getData('alliance')->members); ?>
				<span class="">&nbsp;<a href="./allym.php<?php echo $this->getData('get') ? '?id='.$this->getData('get') : NULL; ?>" class="button" data-load="cache"><?php echo ILang::_('SeeMembers'); ?></a></span>
			</dd>
		<?php if (!empty($this->getData('alliance')->link)) : ?><dt><?php echo ILang::_('Website'); ?></dt> <dd><a href="<?php echo $this->getData('alliance')->link; ?>"><?php echo ILang::_('Link'); ?></a></dd><?php endif; ?>
	</dl>
</div>
<div class="subcontent">
	<dl class="four_cols">
		<dt>&nbsp;</dt>
			<dd class="bold"><?php echo ILang::_('Points'); ?></dd>
			<dd class="bold"><?php echo ILang::_('ByMember'); ?></dd>
			<dd class="bold"><?php echo ILang::_('Rank'); ?></dd>
		<dt><?php echo ILang::_('DevPoints'); ?></dt>
			<dd><?php echo ILang::number($this->getData('alliance')->points['devPoints']); ?></dd>
			<dd><?php echo ILang::number(round($this->getData('alliance')->points['devPoints']/$this->getData('alliance')->members)); ?></dd>
			<dd><?php echo ILang::number($this->getData('alliance')->ranks['dev']); ?></dd>
		<dt><?php echo ILang::_('FightPoints'); ?></dt>
			<dd><?php echo ILang::number($this->getData('alliance')->points['unitPoints']); ?></dd>
			<dd><?php echo ILang::number(round($this->getData('alliance')->points['unitPoints']/$this->getData('alliance')->members)); ?></dd>
			<dd><?php echo ILang::number($this->getData('alliance')->ranks['fight']); ?></dd>
		<dt><?php echo ILang::_('TotalPoints'); ?></dt>
			<dd><?php echo ILang::number($this->getData('alliance')->points['totalPoints']); ?></dd>
			<dd><?php echo ILang::number(round($this->getData('alliance')->points['totalPoints']/$this->getData('alliance')->members)); ?></dd>
			<dd><?php echo ILang::number($this->getData('alliance')->ranks['grank']); ?></dd>
	</dl>
</div>
<?php if ($pacts = $this->getData('pacts')) : ?>
<h2><?php echo ILang::_('Pacts'); ?></h2>
<div class="content">
	<dl class="three_cols">
		<dt class="bold"><?php echo ILang::_('Ally'); ?></dt>
			<dd class="bold"><?php echo ILang::_('End'); ?></dd>
			<dd class="bold"><?php echo ILang::_('Type'); ?></dd>
		<?php foreach ($pacts as $type => $tpacts) : ?>
		<?php foreach ($tpacts as $pact) :  ?>
		<dt class="bold"><a href="ally.php?id=<?php echo $pact->allyId; ?>" data-load="cache"><?php echo $pact->allyName; ?></a></dt>
			<dd><?php echo $pact->date != 0 ? date('d M Y, H:i:s', $pact->date) : 'Unlimited'; ?></dd>
			<dd><?php echo ILang::_($type); ?></dd>
			<?php endforeach; ?>
		<?php endforeach; ?>
	</dl>
</div>
<?php endif; ?>
<h2><?php echo ILang::_('Description'); ?></h2>
<div class="content">
	<?php if ($this->getData('get') || $this->getData('desc')) : ?>
	<?php echo ftext($this->getData('alliance')->desc); ?>
	<?php else : ?>
	<div class="center"><strong>( <a href="./ally.php?desc=1" data-load="cache"><?php echo ILang::_('SeeDescription'); ?></a> )</strong></div>
	<?php endif; ?>
</div>
<div class="clr"></div>
<?php if(!$this->getData('get')) : ?>
<h2><?php echo ILang::_('Private'); ?></h2>
<div class="content">
	<?php echo ftext($this->getData('alliance')->pDesc); ?>
</div>
<h2>Miaou</h2>
<div>
	<div class="center">
		<form action="ally.php?task=sendMessage" method="POST">
			<textarea name="msg" id="msg"></textarea><br />
			<input type="submit" name="chat" value="<?php echo ILang::_('Send'); ?>" /> - <?php echo ILang::_('Character'); ?> : <span id="msg_counter" class="counter">500</span>
		</form>
	</div>
	<?php if($chats = $this->getData('chats')) : ?>
	<?php foreach($chats as $chat) : ?>
	<div class="bg<?php echo $chat->class; ?>" style="border-top:1px solid #4a6f88;">
		<div class="left bg3" style="width:150px; padding:4px; margin-right:4px;<?php echo $chat->usrId == $this->user->id ? 'background:#74674c;' : NULL; ?>">
			<div><b><?php echo $chat->usrName; ?></b></div>
			<div><i>(<?php echo fdate($chat->date, 1); ?>)</i></div>
			<?php if ($this->getData('alliance')->leaderId == $this->user->id) : ?><div><a href="ally.php?task=deleteMessage&amp;msg=<?php echo $chat->id; ?>" data-load="cache">[<?php echo ILang::_('Delete'); ?>]</a></div><?php endif; ?>
		</div>
		<div style="margin-left:158px;padding:4px;"><?php echo fQuickText($chat->body); ?></div>
		<div class="clr"></div>
	</div>
	<?php endforeach; ?>
	<?php else : ?>
	<div class="bg1 center">
		<?php echo ILang::_('NoMessage'); ?>
	</div>
	<?php endif; ?>
</div>
<?php endif; ?>
<?php endif; ?>