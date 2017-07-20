<div class="btn-group" role="group" aria-label="články">
    <?php
    echo $this->Html->link('Všechny', ['action' => 'index'], ['class' => 'btn btn-info']);
    foreach ($roots as $id => $title) {
        echo $this->Html->link($title, ['action' => 'index', $id], ['class' => 'btn btn-primary']);
    }
    echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Nový článek/sekce', ['action' => 'add', $parentId], ['escape' => false, 'class' => 'btn btn-success']);
    ?>
</div>
<div class="tree"><?php
    
    echo $this->Tree->generate($tree, ['alias' => 'title', 'element' => 'admin/article_node']);
    ?></div>

