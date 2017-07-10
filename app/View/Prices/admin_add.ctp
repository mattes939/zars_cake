<h1>Ceník objektu <?php echo $house['House']['full_name']; ?></h1>
<?php
echo $this->Form->create('Price', ['inputDefaults' => [
        'div' => ['class' => 'form-group'],
        'class' => 'form-control',
        'label' => false
]]);
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Sezóna</th>
            <th>Majitel základ</th>
            <th>Zákazník základ</th>
            <th>Min. počet nocí kratší pobyty</th>
            <th>Min. počet osob</th>
            <th>Majitel za noc</th>
            <th>Zákazník za noc</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($travelDateTypes as $i => $travelDateType) {
            ?>
            <tr>
                <td><?php echo $travelDateType; 
                echo $this->Form->input('Price.' . $i . '.travel_date_type_id', ['value' => $i, 'type' => 'hidden']);                
                ?></td>
                <td><?php echo $this->Form->input('Price.' . $i . '.owner_basic'); ?></td>
                <td><?php echo $this->Form->input('Price.' . $i . '.customer_basic'); ?></td>
                <td><?php echo $this->Form->input('Price.' . $i . '.min_nights'); ?></td>
                <td><?php echo $this->Form->input('Price.' . $i . '.min_persons'); ?></td>
                <td><?php echo $this->Form->input('Price.' . $i . '.owner_extra'); ?></td>
                <td><?php echo $this->Form->input('Price.' . $i . '.customer_extra'); ?></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<?php 
if($priceListId >= 3){
    ?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Sezóna</th>
            <th>Práh</th>
            <th>Majitel základ</th>
            <th>Zákazník základ</th>
            <th>Majitel za noc</th>
            <th>Zákazník za noc</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($travelDateTypes as $i => $travelDateType) {
            ?>
            <tr>
                <td><?php echo $travelDateType; 
                ?></td>
                <td><?php echo $this->Form->input('Price.' . $i . '.treshold', ['value' => $value['Price']['treshold']]); ?></td>
                <td><?php echo $this->Form->input('Price.' . $i . '.owner_beyond_basic'); ?></td>
                <td><?php echo $this->Form->input('Price.' . $i . '.customer_beyond_basic'); ?></td>
                <td><?php echo $this->Form->input('Price.' . $i . '.owner_beyond_extra'); ?></td>
                <td><?php echo $this->Form->input('Price.' . $i . '.customer_beyond_extra'); ?></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<?php
}
foreach ($travelDateTypes as $i => $travelDateType) {
    ?><div class="col-xs-6">
        <?php
    echo $this->Form->input('Price.' . $i . '.notes', ['label' => 'Poznámky '.$travelDateType]);
    ?>
    </div>
<?php
}

echo $this->Form->submit('Uložit', ['class' => 'btn btn-success btn-lg pull-right']);
echo $this->Form->end(); ?>
