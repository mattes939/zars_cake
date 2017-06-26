<?php $today = new DateTime(); ?>
<div class="row">
    <div class="col-xs-12">
        <ul class="nav nav-tabs">
            <li role="presentation" class="<?php echo $status == 1 ? 'active' : ''; ?>"><?php echo $this->Html->link('Aktivní objednávky', ['controller' => 'orders', 'action' => 'index', 1]); ?></li>
            <li role="presentation" class="<?php echo $status == 2 ? 'active' : ''; ?>"><?php echo $this->Html->link('Stornované objednávky', ['controller' => 'orders', 'action' => 'index', 2]); ?></li>
            <li role="presentation" class="<?php echo $status == 3 ? 'active' : ''; ?>"><?php echo $this->Html->link('Vyřízené objednávky', ['controller' => 'orders', 'action' => 'index', 3]); ?></li>
        </ul>      
    </div>
</div>
<?php
if (!empty($overdueOrders['depositOverdue'])) {
//    debug($overdueOrders['depositOverdue']);
    ?>
    <div class="row">
        <div class="col-xs-12">
            <h1>Opožděné platby zákazníka</h1>
            <table class="table table-condensed datatable table-bordered" data-page-length="25" data-order="[[ 6, &quot;asc&quot; ]]">
                <thead>
                    <tr>
                        <th>Kód</th>
                        <th><?php echo 'Zákazník'; ?></th>
                        <th><?php echo 'Objekt'; ?></th>
                        <th><?php echo 'Termín'; ?></th>
                        <th><?php echo 'Do nástupu'; ?></th>
                        <th><?php echo 'Kontrola'; ?></th>
                        <th><?php echo 'Zpoždění'; ?></th>

            <!--<th class="actions">Upomínky</th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($overdueOrders['depositOverdue'] as $order) {
                        ?>
                        <tr>
                            <td><?php echo $this->Html->link($order['Order']['code'], array('action' => 'edit', $order['Order']['id']), ['escape' => false]); ?></td>
                            <td> <?php echo $this->Html->link($order['User']['full_name'], array('action' => 'edit', $order['Order']['id']), ['escape' => false]); ?></td>
                            <td> <?php echo $this->Html->link($order['HouseDate']['House']['full_name'], array('action' => 'edit', $order['Order']['id']), ['escape' => false]); ?></td>
                            <td>
                                <?php
                                echo $this->Time->format($order['Order']['start_day'], '%e. %m. %y') . ' - ' . $this->Time->format($order['Order']['end_day'], '%e. %m. %y');
                                ?>
                            </td>
                            <td><?php
                                $startDay = new DateTime($order['Order']['start_day']);

                                echo $today->diff($startDay)->format('%R%a');
                                ?></td>
                            <td><?php
                                foreach ($order['Deposit'] as $deposit) {
                                    if (!empty($deposit['overdue'])) {
                                        echo $deposit['DepositType']['name'] . '<br>';
                                    }
                                }
                                ?></td>
                            <td><?php
                                foreach ($order['Deposit'] as $deposit) {
                                    if (!empty($deposit['overdue'])) {
                                        echo '<b>' . $deposit['overdue'] . ' </b>';
                                        ?>
                                        <span class="pull-right">
                                            <?php
                                            if (!empty($deposit['Reminder'])) {
                                                echo 'upomínka: ';
                                                foreach ($deposit['Reminder'] as $reminder) {
                                                    echo $this->Html->link($this->Time->format($reminder['created'], '%e. %m. %y'), ['controller' => 'reminders', 'action' => 'view', $reminder['id']], ['class' => 'btn btn-xs btn-primary', 'target' => '_blank']) . ', ';
                                                }
                                            }
                                            echo $this->Html->link('Zaslat upomínku', ['controller' => 'reminders', 'action' => 'add', $deposit['id']], ['target' => '_blank', 'class' => 'btn btn-xs btn-primary']);
                                            ?></span>
                                        <?php
                                    }
                                }
                                ?></td>


                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}

if (!empty($overdueOrders['ownerOverdue'])) {
    ?>
    <div class="row">
        <div class="col-xs-12">
            <h1>Opožděné platby majiteli</h1>
            <table class="table table-condensed datatable table-bordered" data-page-length="25" data-order="[[ 4, &quot;asc&quot; ]]">
                <thead>
                    <tr>
                        <th>Kód</th>
                        <th><?php echo 'Zákazník'; ?></th>
                        <th><?php echo 'Objekt'; ?></th>
                        <th><?php echo 'Termín'; ?></th>
                        <th><?php echo 'Do nástupu'; ?></th>
                        <th><?php echo 'Zpoždění'; ?></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($overdueOrders['ownerOverdue'] as $order) {
                        ?>
                        <tr>
                            <td><?php echo $this->Html->link($order['Order']['code'], array('action' => 'edit', $order['Order']['id']), ['escape' => false]); ?></td>
                            <td> <?php echo $this->Html->link($order['User']['full_name'], array('action' => 'edit', $order['Order']['id']), ['escape' => false]); ?></td>
                            <td> <?php echo $this->Html->link($order['HouseDate']['House']['full_name'], array('action' => 'edit', $order['Order']['id']), ['escape' => false]); ?></td>
                            <td>
                                <?php
                                echo $this->Time->format($order['Order']['start_day'], '%e. %m. %y') . ' - ' . $this->Time->format($order['Order']['end_day'], '%e. %m. %y');
                                ?>
                            </td>
                            <td><?php
                                $startDay = new DateTime($order['Order']['start_day']);

                                echo $today->diff($startDay)->format('%R%a');
                                ?></td>
                            <td><?php
                                echo $order['Order']['owner_overdue'];
                                ?></td>

                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>


    <?php
}
?>
<h1>Objednávky</h1>
<?php
echo $this->element('admin/orders');
?>