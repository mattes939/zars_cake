<div class="row">
    <div class="col-xs-12">
    <h2><?php echo __('Seznam objektů'); ?></h2>
    <table class="table dt" id="housesTable">
        <thead>
            <tr>
                <th>Číslo</th>
                <th>Název</th>
                <th>Majitel</th>
                <th>Kraj</th>
                <th>Okres</th>			
                <th>Upraveno</th>
                <!--<th class="actions"><?php echo __('Možnosti'); ?></th>-->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($houses as $house): ?>
                <tr>
                    <td><?php echo h($house['House']['code']); ?></td>
                    <td><?php 
                    echo $this->Html->link(h($house['House']['name']), array('action' => 'edit', $house['House']['id']));
                    
                    ?></td>
                    <td>
                        <?php echo $this->Html->link($house['User']['username'], array('controller' => 'users', 'action' => 'view', $house['User']['id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($house['Region']['name'], array('controller' => 'regions', 'action' => 'view', $house['Region']['id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($house['District']['name'], array('controller' => 'districts', 'action' => 'view', $house['District']['id'])); ?>
                    </td>
                    <td>
                            <?php echo $house['House']['modified'];?>
                    </td>
<!--                    <td class="actions">                      
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $house['House']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $house['House']['id']))); ?>
                    </td>-->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

</div>
