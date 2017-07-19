<h2>Záznamy <span class="text-primary"><?php echo empty($userId)?'všechny':$users[$userId];?></span></h2>
    <?php 
echo $this->Html->link('VŠE', ['controller' => 'audits', 'action' => 'index'], ['class' => 'btn  btn-default']);
foreach ($users as $id => $user){
        echo $this->Html->link($user, ['controller' => 'audits', 'action' => 'index', $id], ['class' => 'btn btn-primary']);
    }
    ?>
<br><br>
   <table class="table table-condensed datatable table-bordered" data-page-length="25" data-order="[[ 5, &quot;desc&quot; ]]">
        <thead>
            <tr>
                <th>Akce</th>
                <th>Model</th>
                <th>ID entity</th>
                <th>Uživatel</th>
                <!--<th>ID zdroje</th>-->
                <th>Datum a čas</th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($audits as $audit): ?>
                <tr>
                    <td><?php echo h($audit['Audit']['event']); ?>&nbsp;</td>
                    <td><?php echo h($audit['Audit']['model']); ?>&nbsp;</td>
                    <td><?php echo h($audit['Audit']['entity_id']); ?>&nbsp;</td>
                    <td><?php echo h($audit['Audit']['description']); ?>&nbsp;</td>
                    <!--<td><?php echo h($audit['Audit']['source_id']); ?>&nbsp;</td>-->
                    <td><?php echo h($audit['Audit']['created']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('Detail'), array('action' => 'view', $audit['Audit']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Odstranit'), array('action' => 'delete', $audit['Audit']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $audit['Audit']['id']))); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
