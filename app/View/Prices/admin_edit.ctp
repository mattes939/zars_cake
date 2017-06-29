<?php
echo $this->Form->create('Price', ['inputDefaults' => [
        'div' => ['class' => 'form-group'],
        'class' => 'form-control',
        'label' => false
]]);
?>
<table class="table">
    <thead>
        <tr>
            <th>Sezóna</th>
            <th>Majitel základ</th>
            <th>Zákazník základ</th>
            <th>Min. počet nocí kratší pobyty</th>
            <th>Min. počet osob</th>
            <th>Majitel osoba/noc</th>
            <th>Zákazník osoba/noc</th>
            <th>Poznámky</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($travelDateTypes as $i => $travelDateType) {
            ?>
            <tr>
                <td><?php echo $travelDateType; 
                echo $this->Form->input('Price.' . $i . '.id', ['type' => 'hidden']);      
                echo $this->Form->input('Price.' . $i . '.travel_date_type_id', ['value' => $i, 'type' => 'hidden']);                
                ?></td>
                <td><?php echo $this->Form->input('Price.' . $i . '.owner_basic'); ?></td>
                <td><?php echo $this->Form->input('Price.' . $i . '.customer_basic'); ?></td>
                <td><?php echo $this->Form->input('Price.' . $i . '.min_nights'); ?></td>
                <td><?php echo $this->Form->input('Price.' . $i . '.min_persons'); ?></td>
                <td><?php echo $this->Form->input('Price.' . $i . '.owner_extra'); ?></td>
                <td><?php echo $this->Form->input('Price.' . $i . '.customer_extra'); ?></td>
                <td><?php echo $this->Form->input('Price.' . $i . '.notes'); ?></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<?php ?>

<?php 

echo $this->Form->submit('Uložit', ['class' => 'btn btn-success btn-lg pull-right']);
echo $this->Form->end(); ?>
