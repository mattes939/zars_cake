<div class="row">
    <div class="col-xs-12">
        <ul class="nav nav-tabs">
            <li role="presentation" class="<?php echo $status == 1 ? 'active' : ''; ?>"><?php echo $this->Html->link('Aktivní objednávky', ['controller' => 'orders', 'action' => 'index', 1]); ?></li>
            <li role="presentation" class="<?php echo $status == 2 ? 'active' : ''; ?>"><?php echo $this->Html->link('Stornované objednávky', ['controller' => 'orders', 'action' => 'index', 2]); ?></li>
            <li role="presentation" class="<?php echo $status == 3 ? 'active' : ''; ?>"><?php echo $this->Html->link('Vyřízené objednávky', ['controller' => 'orders', 'action' => 'index', 3]); ?></li>
        </ul>
    </div>
</div>
<?php echo $this->element('admin/orders');      