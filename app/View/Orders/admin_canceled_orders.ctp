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


if (!empty($unfinishedOrders)) {
    ?>
    <div class="row">
        <div class="col-xs-12">
            <h1>Nevyřízená storna</h1>
            <table class="table table-condensed datatable table-bordered" data-page-length="25" data-order="[[ 4, &quot;desc&quot; ]]">
                <thead>
                    <tr>
                        <th>Kód</th>
                        <th><?php echo 'Zákazník'; ?></th>
                        <th><?php echo 'Objekt'; ?></th>
                        <th><?php echo 'Termín'; ?></th>
                        <th><?php echo 'Stornováno dne'; ?></th>
                        <th><?php echo 'Stornováno dnů před nástupem'; ?></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($unfinishedOrders as $order) {
                        ?>
                        <tr>
                            <td><?php echo $this->Html->link($order['Order']['code'], ['action' => 'edit', $order['Order']['id']], ['escape' => false]); ?></td>
                            <td> <?php echo $this->Html->link($order['User']['full_name'], ['action' => 'edit', $order['Order']['id']], ['escape' => false]); ?></td>
                            <td> <?php echo $this->Html->link($order['HouseDate']['House']['full_name'], ['action' => 'edit', $order['Order']['id']], ['escape' => false]); ?></td>
                            <td>
                                <?php
                                echo $this->Time->format($order['Order']['start_day'], '%e. %m. %y') . ' - ' . $this->Time->format($order['Order']['end_day'], '%e. %m. %y');
                                ?>
                            </td>
                            <td><?php
                              
//echo $this->Time->format($order['Order']['canceled'], '%e. %m. %y');
                            echo $order['Order']['canceled'];
                                
                                ?></td>
                            <td><?php
                              $canceled = new DateTime($order['Order']['canceled']);
                              $startDay = new DateTime($order['Order']['start_day']);
                            echo $canceled->diff($startDay)->format('%R%a');
//                                echo $order['Order']['owner_overdue'];
                                ?></td>
                            <td>
                                <?php echo $this->Html->link(__('Otevřít'), ['action' => 'edit', $order['Order']['id']], ['class' => 'btn btn-xs btn-primary', 'escape' => false]); ?>
                                <?php echo $this->Html->link(__('Platby'), ['action' => 'edit', $order['Order']['id'], '#' => 'payment-section'], ['class' => 'btn btn-xs btn-success', 'escape' => false]); ?>
                            </td>
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
