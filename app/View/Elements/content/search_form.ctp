<?php

echo $this->Form->create('House', ['type' => 'get', 'url' => ['action' => 'search'], 'id' => 'FilterHouses']);
$this->Form->inputDefaults([
    'div' => 'form-group',
    'class' => 'form-control'
]);
echo $this->Form->input('country', ['label' => 'Země']);
echo $this->Form->input('area', [
    'empty' => 'Nerozhoduje',
    'label' => 'Oblast'
]);
echo $this->Form->input('travelDate', [
    'empty' => 'Nerozhoduje',
    'label' => 'Termín'
]);
echo $this->Form->input('persons', [
//    'type' => 'select',
//    'empty' => 'Nerozhoduje',
//    'options' => [1 => '1 - 8', 2 => '9 - 15', 3 => '16 a více'],
    'label' => 'Počet osob (číslo)',
    'type' => 'number',
    'min' => 1,
    'step' => 1,
//    'value' => $this->request->query['persons']
]);
echo $this->Form->input('bedrooms', [
    'type' => 'select',
    'empty' => 'Nerozhoduje',
    'options' => [1, 2, 3, 4, 5, 6, 7, 8, 9],
    'label' => 'Počet ložnic'
]);
echo $this->Form->submit('Hledat', ['class' => 'btn btn-default']);
echo $this->Form->end();
