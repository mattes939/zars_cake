<div class="tree"><?php 
echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Nový článek/sekce', ['action' => 'add'], ['escape' => false, 'class' => 'pull-right btn btn-success']);
echo $this->Tree->generate($tree, ['alias' => 'title', 'element' => 'admin/article_node']);
?></div>

