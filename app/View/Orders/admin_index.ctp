<?php
//debug($orders);
switch ($status) {
    case 1: $title = 'Nové objednávky';
        break;
    case 2: $title = 'Stornované objednávky';
        break;
    case 3: $title = 'Vyřízené objednávky';
        break;
}
?>
<div class="row">
    <div class="col-xs-12">
        <h2><?php echo $title; ?></h2>
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('user_id'); ?></th>
                    <th><?php echo $this->Paginator->sort('house_id'); ?></th>
                    <th><?php echo $this->Paginator->sort('travel_date_id'); ?></th>
                    <th><?php echo $this->Paginator->sort('created'); ?></th>
                    <th><?php echo $this->Paginator->sort('confirmed'); ?></th>
                    <th><?php echo $this->Paginator->sort('canceled'); ?></th>
                    <th><?php echo $this->Paginator->sort('billing_price'); ?></th>
                    <th><?php echo $this->Paginator->sort('modified'); ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td>
                            <?php echo $this->Html->link($order['User']['first_name'] . ' ' . $order['User']['last_name'], array('controller' => 'users', 'action' => 'edit', $order['User']['id'])); ?>
                        </td>
                        <td>
                            <?php echo $this->Html->link($order['HouseDate']['House']['name'], array('controller' => 'houses', 'action' => 'edit', $order['HouseDate']['House']['id'])); ?>
                        </td>
                        <td>
                            <?php
                            echo $this->Html->link($order['HouseDate']['TravelDate']['start'] . ' - ' . $order['HouseDate']['TravelDate']['end'], array('controller' => 'travel_dates', 'action' => 'view', $order['HouseDate']['TravelDate']['id'])); 
//                            echo $this->Html->link($order['TravelDate']['start'] . ' - ' . $order['TravelDate']['end'], array('controller' => 'travel_dates', 'action' => 'view', $order['TravelDate']['id'])); 
                            ?>
                        </td>
                        <td><?php echo h($order['Order']['created']); ?>&nbsp;</td>
                        <td><?php echo h($order['Order']['confirmed']); ?>&nbsp;</td>
                        <td><?php echo h($order['Order']['canceled']); ?>&nbsp;</td>
                        <td><?php echo h($order['Order']['billing_price']); ?>&nbsp;</td>
                        <td><?php echo h($order['Order']['modified']); ?>&nbsp;</td>
                        <td class="actions">
                            <?php
                           echo $this->Form->postLink(__('Stornovat'),
                                   array('action' => 'cancel', $order['Order']['id']),
                                   array(
                                       'confirm' => __('Stornovat objednávku # %s?', $order['Order']['id']), 
                                       'class' => 'btn btn-xs btn-danger', 'escape' => false));
echo $this->Form->postLink(__('Potvrdit'), array('action' => 'accept', $order['Order']['id']), array('confirm' => __('Potvrdit objednávku # %s?', $order['Order']['id']), 'class' => 'btn btn-xs btn-success', 'escape' => false));                            ?>
                            <?php // echo $this->Html->link(__('View'), array('action' => 'view', $order['Order']['id'])); ?>
                            <?php echo $this->Html->link(__('Otevřít'), array('action' => 'edit', $order['Order']['id']), [ 'class' => 'btn btn-xs btn-primary', 'escape' => false]); ?>
                            <?php // echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $order['Order']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $order['Order']['id']))); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p>
            <?php
            echo $this->Paginator->counter(array(
                'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
            ));
            ?>	</p>
        <div class="paging">
            <?php
            echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
            echo $this->Paginator->numbers(array('separator' => ''));
            echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
            ?>
        </div>
    </div>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Order'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Houses'), array('controller' => 'houses', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New House'), array('controller' => 'houses', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Travel Dates'), array('controller' => 'travel_dates', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Travel Date'), array('controller' => 'travel_dates', 'action' => 'add')); ?> </li>
    </ul>
</div>
