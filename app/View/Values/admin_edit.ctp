<?php
echo $this->Form->create('Property');
$current = 0;
foreach ($this->request->data as $i => $property) {
    if ($current != $property['Property']['property_type_id']) {
        echo '<h3>' . $property['PropertyType']['name'] . '</h3>';
        $current = $property['Property']['property_type_id'];
    }
    echo $this->Form->input('Value.' . $i . '.id', ['type' => 'hidden']);
    echo $this->Form->input('Value.' . $i . '.property_id', ['type' => 'hidden', 'value' => $property['Property']['id']]);
    echo $this->Form->input('Value.' . $i . '.switch', ['label' => $property['Property']['name'], 'value' => $property['Value'][0]['switch']]);
    echo $this->Form->input('Value.' . $i . '.value', ['label' => $property['Property']['name'], 'value' => $property['Value'][0]['value']]);
    echo $this->Form->input('Value.' . $i . '.value2', ['label' => $property['Property']['name']]);
}

echo $this->Form->end();
?>
