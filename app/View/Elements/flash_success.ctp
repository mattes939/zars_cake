<?php echo $this->Html->script('flash.js', ['inline' => true]); ?>
<div class="alert alert-success flash-msg">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<?php echo $message; ?>
</div>
