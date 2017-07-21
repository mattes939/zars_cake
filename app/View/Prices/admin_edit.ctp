<h1>Ceník objektu <?php echo $house['House']['full_name']; ?></h1>
<?php
echo $this->Form->create('Price', ['inputDefaults' => [
        'div' => ['class' => 'form-group'],
        'class' => 'form-control',
        'label' => false
]]);
//debug($travelDateTypes);
//debug($this->request->data);
switch ($house['House']['pricelist_id']) {
    case 1: echo 'Ceník za objekt a týden';
        break;
    case 2:
    case 3:
        echo 'Ceník za objekt a týden do X osob';
        break;
    case 4:
        echo 'Ceník za osobu a týden';
        break;
}
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Sezóna</th>
            <th>Cena majiteli za týden</th>
            <th>Katalogová cena za týden</th>
            <th>Min. počet nocí kratší pobyty</th>
            <th>Min. počet osob</th>
            <th>Zkrácený pobyt objekt za noc</th>
            <th>Zkrácený pobyt katalogová cena za noc</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($this->request->data as $i => $value) {
            ?>
            <tr>
                <td><?php
                    echo $travelDateTypes[$i + 1];
                    echo $this->Form->input('Price.' . $i . '.id', ['type' => 'hidden', 'value' => $value['Price']['id']]);
//                echo $this->Form->input('Price.' . $i . '.travel_date_type_id', ['value' => $i, 'type' => 'hidden']);                
                    ?></td>
                <td><?php echo $this->Form->input('Price.' . $i . '.owner_basic', ['value' => $value['Price']['owner_basic']]); ?></td>
                <td><?php echo $this->Form->input('Price.' . $i . '.customer_basic', ['value' => $value['Price']['customer_basic']]); ?></td>
                <td><?php echo $this->Form->input('Price.' . $i . '.min_nights', ['value' => $value['Price']['min_nights'], 'placeholder' => 'ne']); ?></td>
                <td><?php echo $this->Form->input('Price.' . $i . '.min_persons', ['value' => $value['Price']['min_persons']]); ?></td>
                <td><?php echo $this->Form->input('Price.' . $i . '.owner_extra', ['value' => $value['Price']['owner_extra']]); ?></td>
                <td><?php echo $this->Form->input('Price.' . $i . '.customer_extra', ['value' => $value['Price']['customer_extra']]); ?></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

<?php
$priceListId = $house['Pricelist']['id'];
//debug($priceListId);
if ($priceListId == 3 || $priceListId == 2) {
    if ($priceListId == 2) {
        echo 'Ceník za objekt nad X osob';
    } else {
        echo 'Ceny za každou osobu nad X osob';
    }
    ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Sezóna</th>
                <th>Práh</th>
                <th>Majitel základ</th>
                <th>Zákazník základ</th>
                <th>Zkrácený pobyt majitel za noc</th>
                <th>Zkrácený pobyt zákazník za noc</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($this->request->data as $i => $value) {
                ?>
                <tr>
                    <td><?php echo $travelDateTypes[$i + 1];
                ?></td>
                    <td><?php echo $this->Form->input('Price.' . $i . '.treshold', ['value' => $value['Price']['treshold']]); ?></td>
                    <td><?php echo $this->Form->input('Price.' . $i . '.owner_beyond_basic', ['value' => $value['Price']['owner_beyond_basic']]); ?></td>
                    <td><?php echo $this->Form->input('Price.' . $i . '.customer_beyond_basic', ['value' => $value['Price']['customer_beyond_basic']]); ?></td>
                    <td><?php echo $this->Form->input('Price.' . $i . '.owner_beyond_extra', ['value' => $value['Price']['owner_beyond_extra']]); ?></td>
                    <td><?php echo $this->Form->input('Price.' . $i . '.customer_beyond_extra', ['value' => $value['Price']['customer_beyond_extra']]); ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <?php
}
foreach ($this->request->data as $i => $value) {
    ?><div class="col-xs-6">
        <?php
        echo $this->Form->input('Price.' . $i . '.notes', ['label' => 'Poznámky ' . $travelDateTypes[$i + 1], 'value' => $value['Price']['notes']]);
        ?>
    </div>
    <?php
}

echo $this->Form->submit('Uložit', ['class' => 'btn btn-success btn-lg pull-right']);
echo $this->Form->end();
?>
