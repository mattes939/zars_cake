<div class="row">
    <div class="col-xs-12">
        <ul class="nav nav-tabs">
            <li role="presentation" class="<?php echo $status == 1 ? 'active' : ''; ?>"><?php echo $this->Html->link('Nové objednávky', ['controller' => 'orders', 'action' => 'index', 1]); ?></li>
            <li role="presentation" class="<?php echo $status == 2 ? 'active' : ''; ?>"><?php echo $this->Html->link('Stornované objednávky', ['controller' => 'orders', 'action' => 'index', 2]); ?></li>
            <li role="presentation" class="<?php echo $status == 3 ? 'active' : ''; ?>"><?php echo $this->Html->link('Vyřízené objednávky', ['controller' => 'orders', 'action' => 'index', 3]); ?></li>
        </ul>
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Kód</th>
                    <th><?php echo $this->Paginator->sort('user_id', 'Zákazník'); ?></th>
                    <th><?php echo $this->Paginator->sort('house_id', 'Objekt'); ?></th>
                    <th><?php echo $this->Paginator->sort('travel_date_id', 'Termín'); ?></th>
                    <th><?php echo $this->Paginator->sort('created', 'Vytvořeno'); ?></th>
                    <th><?php echo $status == 2 ? $this->Paginator->sort('canceled', 'Stornováno') : $this->Paginator->sort('confirmed', 'Potvrzeno'); ?></th>
                    <!--<th><?php echo $this->Paginator->sort('canceled', 'Stornováno'); ?></th>-->
                    <th><?php echo $this->Paginator->sort('billing_price', 'Cena'); ?></th>
                    <th><?php echo $this->Paginator->sort('modified', 'Naposledy upraveno'); ?></th>
                    <th class="actions"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr class="<?php echo empty($order['Order']['confirmed']) ? 'warning' : ''; ?>">
                        <td class="text-center"><?php
                $orderCode = empty($order['Order']['confirmed']) ? '<span class="glyphicon glyphicon-star text-warning"></span>' : $order['Order']['code'];
                echo $this->Html->link($orderCode, array('action' => 'edit', $order['Order']['id']), ['escape' => false]);
                    ?></td>
                        <td>
                            <?php echo $this->Html->link($order['User']['first_name'] . ' ' . $order['User']['last_name'], array('action' => 'edit', $order['Order']['id']), ['escape' => false]); ?>
                        </td>
                        <td>
                            <?php
                            if (!empty($order['HouseDate']['House']['id'])) {
                                echo $this->Html->link($order['HouseDate']['House']['name'], array('controller' => 'houses', 'action' => 'edit', $order['HouseDate']['House']['id']));
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if (!empty($order['HouseDate']['TravelDate']['id'])) {
                                echo $this->Html->link($this->Time->format($order['HouseDate']['TravelDate']['start'], '%e. %m. %y') . ' - ' . $this->Time->format($order['HouseDate']['TravelDate']['end'], '%e. %m. %y'), array('controller' => 'travel_dates', 'action' => 'view', $order['HouseDate']['TravelDate']['id']));
                            }
                            ?>
                        </td>
                        <td><?php echo h($this->Time->format($order['Order']['created'], '%e. %m. %y, %k:%M')); ?>&nbsp;</td>
                        <td><?php
                        echo $status == 2 ? h($order['Order']['canceled']) : h($this->Time->format($order['Order']['confirmed'], '%e. %m. %y'));
                            ?>&nbsp;</td>
                        <!--<td><?php echo h($this->Time->format($order['Order']['canceled'], '%e. %m. %y')); ?>&nbsp;</td>-->
                        <td><?php echo h($order['Order']['billing_price']); ?>&nbsp;</td>
                        <td><?php echo h($this->Time->format($order['Order']['modified'], '%e. %m. %y, %k:%M')); ?>&nbsp;</td>
                        <td class="actions">
    <?php
//                            echo $this->Form->postLink(__('Stornovat'), array('action' => 'cancel', $order['Order']['id']), array(
//                                'confirm' => __('Stornovat objednávku # %s?', $order['Order']['id']),
//                                'class' => 'btn btn-xs btn-danger', 'escape' => false));
//echo $this->Form->postLink(__('Potvrdit'), array('action' => 'accept', $order['Order']['id']), array('confirm' => __('Potvrdit objednávku # %s?', $order['Order']['id']), 'class' => 'btn btn-xs btn-success', 'escape' => false));                            
    ?>
                            <?php // echo $this->Html->link(__('View'), array('action' => 'view', $order['Order']['id'])); ?>
                            <?php echo $this->Html->link(__('Otevřít'), array('action' => 'edit', $order['Order']['id']), ['class' => 'btn btn-xs btn-primary', 'escape' => false]); ?>
                            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $order['Order']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $order['Order']['id']))); ?>
                        </td>
                    </tr>
<?php endforeach; ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-xs-12 extraPadding">
<?php echo $this->element('pagination'); ?>
                <?php echo $this->element('pagination-counter'); ?>
            </div>
        </div>
    </div>
</div>
