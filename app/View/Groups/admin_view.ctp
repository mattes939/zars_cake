<div class="groups view">
<h2><?php echo __('Group'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($group['Group']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($group['Group']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Group'), ['action' => 'edit', $group['Group']['id']]); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Group'), ['action' => 'delete', $group['Group']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $group['Group']['id'])]); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), ['action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), ['action' => 'add']); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), ['controller' => 'users', 'action' => 'index']); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), ['controller' => 'users', 'action' => 'add']); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($group['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Group Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Pin'); ?></th>
		<th><?php echo __('Degree'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Bank Account'); ?></th>
		<th><?php echo __('Hidden'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Birthday'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($group['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['group_id']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['pin']; ?></td>
			<td><?php echo $user['degree']; ?></td>
			<td><?php echo $user['first_name']; ?></td>
			<td><?php echo $user['last_name']; ?></td>
			<td><?php echo $user['bank_account']; ?></td>
			<td><?php echo $user['hidden']; ?></td>
			<td><?php echo $user['active']; ?></td>
			<td><?php echo $user['birthday']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), ['controller' => 'users', 'action' => 'view', $user['id']]); ?>
				<?php echo $this->Html->link(__('Edit'), ['controller' => 'users', 'action' => 'edit', $user['id']]); ?>
				<?php echo $this->Form->postLink(__('Delete'), ['controller' => 'users', 'action' => 'delete', $user['id']], ['confirm' => __('Are you sure you want to delete # %s?', $user['id'])]); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), ['controller' => 'users', 'action' => 'add']); ?> </li>
		</ul>
	</div>
</div>
