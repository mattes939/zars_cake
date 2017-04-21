<div class="specialOffers form">
<?php echo $this->Form->create('SpecialOffer'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Special Offer'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('lft');
		echo $this->Form->input('rght');
		echo $this->Form->input('parent_id');
		echo $this->Form->input('house_id');
		echo $this->Form->input('content');
		echo $this->Form->input('from');
		echo $this->Form->input('to');
		echo $this->Form->input('referential');
		echo $this->Form->input('hidden');
		echo $this->Form->input('html_title');
		echo $this->Form->input('html_keywords');
		echo $this->Form->input('html_description');
		echo $this->Form->input('Portal');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SpecialOffer.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('SpecialOffer.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Special Offers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Special Offers'), array('controller' => 'special_offers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Special Offer'), array('controller' => 'special_offers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), array('controller' => 'houses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), array('controller' => 'houses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Portals'), array('controller' => 'portals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Portal'), array('controller' => 'portals', 'action' => 'add')); ?> </li>
	</ul>
</div>
