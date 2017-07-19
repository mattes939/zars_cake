<span><?php 
echo $this->Html->link('<span class="glyphicon glyphicon-arrow-up"></span>', ['action' => 'up', $data['Article']['id']], ['escape' => false, 'class' => '']);
echo $this->Html->link('<span class="glyphicon glyphicon-arrow-down"></span>', ['action' => 'down', $data['Article']['id']], ['escape' => false, 'class' => '']);
echo $data['Article']['title'];
echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['action' => 'edit', $data['Article']['id']], ['escape' => false, 'class' => '']);
echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>', ['action' => 'add', $data['Article']['id']], ['escape' => false, 'class' => 'text-success']);

echo $this->Gallery->link('article', $data['Article']['id'], ['target' => '_blank', 'escape' => false], '<span class="glyphicon glyphicon-camera"></span>');

echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', ['action' => 'delete', $data['Article']['id']], ['confirm' => __('Opravdu chcete smazat článek "%s" a všechny, které pod něj spadají?', $data['Article']['title']), 'escape' => false, 'class' => ['text-danger']]);
?></span>
