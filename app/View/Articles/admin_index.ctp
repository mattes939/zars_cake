<div class="articles index">
	<h2><?php echo __('Articles'); ?></h2>
	<table class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('lft'); ?></th>
			<th><?php echo $this->Paginator->sort('rght'); ?></th>
			<th><?php echo $this->Paginator->sort('parent_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('content'); ?></th>
			<th><?php echo $this->Paginator->sort('hidden'); ?></th>
			<th><?php echo $this->Paginator->sort('slug'); ?></th>
			<th><?php echo $this->Paginator->sort('html_title'); ?></th>
			<th><?php echo $this->Paginator->sort('html_keywords'); ?></th>
			<th><?php echo $this->Paginator->sort('html_description'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($articles as $article): ?>
	<tr>
		<td><?php echo h($article['Article']['id']); ?>&nbsp;</td>
		<td><?php echo h($article['Article']['lft']); ?>&nbsp;</td>
		<td><?php echo h($article['Article']['rght']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($article['ParentArticle']['title'], ['controller' => 'articles', 'action' => 'view', $article['ParentArticle']['id']]); ?>
		</td>
		<td><?php echo h($article['Article']['title']); ?>&nbsp;</td>
		<td><?php echo h($article['Article']['content']); ?>&nbsp;</td>
		<td><?php echo h($article['Article']['hidden']); ?>&nbsp;</td>
		<td><?php echo h($article['Article']['slug']); ?>&nbsp;</td>
		<td><?php echo h($article['Article']['html_title']); ?>&nbsp;</td>
		<td><?php echo h($article['Article']['html_keywords']); ?>&nbsp;</td>
		<td><?php echo h($article['Article']['html_description']); ?>&nbsp;</td>
		<td><?php echo h($article['Article']['created']); ?>&nbsp;</td>
		<td><?php echo h($article['Article']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), ['action' => 'view', $article['Article']['id']]); ?>
			<?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $article['Article']['id']]); ?>
			<?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $article['Article']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $article['Article']['id'])]); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter([
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	]);
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), [], null, ['class' => 'prev disabled']);
		echo $this->Paginator->numbers(['separator' => '']);
		echo $this->Paginator->next(__('next') . ' >', [], null, ['class' => 'next disabled']);
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Article'), ['action' => 'add']); ?></li>
		<li><?php echo $this->Html->link(__('List Articles'), ['controller' => 'articles', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Article'), ['controller' => 'articles', 'action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Areas'), ['controller' => 'areas', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Area'), ['controller' => 'areas', 'action' => 'add']); ?> </li>
	</ul>
</div>
