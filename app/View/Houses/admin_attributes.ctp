<?php 
echo $this->Form->create('House');
echo $this->Form->input('id',['type' => 'text']);
$i = 0;
foreach ($properties as $property) {
    echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
    echo $this->Form->input('Value.' . $i . '.property_id', ['type' => 'hidden', 'value' => $property['Property']['id']]);
    echo $this->Form->input('Value.' . $i . '.switch', ['label' => $property['Property']['name'], 'type' => 'checkbox']);
    echo $this->Form->input('Value.' . $i . '.value', ['label' => 'value']);
    echo $this->Form->input('Value.' . $i . '.value2', ['label' => 'value2']);
    $i++;
}
//while ($i < 150){
//    echo $this->Form->input('Value.' . $i . '.id', array('type' => 'hidden'));
//    echo $this->Form->input('Value.' . $i . '.property_id', array('type' => 'hidden', 'value' => $properties[$i]['Property']['id']));
//    echo $this->Form->input('Value.' . $i . '.switch', array('label' => $properties[$i]['Property']['name'], 'type' => 'checkbox'));
//    echo $this->Form->input('Value.' . $i . '.value', array('label' => 'value'));
//    echo $this->Form->input('Value.' . $i . '.value2', array('label' => 'value2'));
//    $i++;
//}
//while($i < 350){
//    echo $this->Form->input('Hodnota.' . $i . '.id', array('type' => 'hidden'));
//    echo $this->Form->input('Hodnota.' . $i . '.property_id', array('type' => 'hidden', 'value' => $properties[$i]['Property']['id']));
//    echo $this->Form->input('Hodnota.' . $i . '.switch', array('label' => $properties[$i]['Property']['name'], 'type' => 'checkbox'));
//    echo $this->Form->input('Hodnota.' . $i . '.value', array('label' => 'value'));
//    echo $this->Form->input('Hodnota.' . $i . '.value2', array('label' => 'value2'));
//    $i++;
//}

debug($i);
echo $this->Form->submit('OK');
echo $this->Form->end();
?>
