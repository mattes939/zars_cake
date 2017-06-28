<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CakePHP Helper
 * @author Nyan
 */
class CodeHelper extends AppHelper {

    public $helpers = ['Html'];

//    public $settings = null;
//    public $view = null;
//
//    function __construct($settings) {
//        $this->settings = $settings;
//
//        $this->view = ClassRegistry::getObject('view');
//    }
//    function beforeRender() {
//        
//    }
//
//    function afterRender() {
//        
//    }
//
//    function beforeLayout() {
//        
//    }
//
//    function afterLayout() {
//        
//    }

    public function generateList($properties) {
        $result = '';
//        debug($properties);
        foreach ($properties as $property) {
            $br = false;
            if ($property['Value'][0]['switch']) {
                $result .= $property['name'];
                $br = true;
            }
            if (!empty($property['Value'][0]['value'])) {
                $result .= ' ' . $property['Value'][0]['value'];
                $br = true;
            }
            if (!empty($property['Value'][0]['value2'])) {
                $result .= ' ' . $property['Value'][0]['value2'];
                $br = true;
            }
            if ($br) {
                $result .= '<br>';
            }
        }

        return $result;
    }

    public function getProperty($property, $bool = true) {
        $result = '';
        if ($bool) {
            if ($property['Value'][0]['switch']) {
                $result = 'ano';
            } else {
                $result = 'ne';
            }
        } elseif ($property['Value'][0]['switch']) {

            if (!empty($property['Value'][0]['value'])) {
                $result .= $property['Value'][0]['value'];
            }
            if (!empty($property['Value'][0]['value2'])) {
                $result .= ' ' . $property['Value'][0]['value2'];
            }
        }

        return $result;
    }

    public function getCompositionVacancy($houseDates, $houseDateId) {
        $sameConditions = true;
        for ($i = 1; $i < count($houseDates); $i++) {
            if ($houseDates[$i]['date_condition_id'] != $houseDates[$i - 1]['date_condition_id']) {
                $sameConditions = FALSE;
                break;
            }
        }
        if ($sameConditions) {
            return $this->orderCell($houseDates[0]['date_condition_id'], $houseDateId);
        } else {
//            debug($houseDates);
            $table = '<table class="table table-bordered table-condensed table-hover">';
            $table .= '<thead><tr>';
            foreach ($houseDates as $houseDate) {
                $table .= '<th>' . $this->Html->link($houseDate['House']['code'] . '-' . $houseDate['House']['name'], ['controller' => 'houses', 'action' => 'view', $houseDate['House']['slug']], ['target' => 'blank']) . '</th>';
                if (!isset($order)) {
                    $order = '<td>' . $this->orderCell($houseDate['date_condition_id'], $houseDate['id']) . '</td>';
                } else {
                    $order .= '<td>' . $this->orderCell($houseDate['date_condition_id'], $houseDate['id']) . '</td>';
                }
            }
            $table .= '</tr></thead><tbody><tr>' . $order . '</tr></tbody></table>';

            return $table;
        }
    }

    public function orderCell($dateConditionId, $houseDateId) {
        $order = '';
        switch ($dateConditionId) {
            case 1:
                $order = $this->Html->link('Objednat pobyt', ['controller' => 'orders', 'action' => 'add', $houseDateId], ['class' => ['btn btn-xs btn-success']]);
                break;
            case 2: $order = 'obsazeno';
                break;
            case 3:
                $order = 'částečně obsazeno';
                break;
        }
        return $order;
    }

    public function classDisabled($field = null) {

        return empty($field) ? ' disabled' : '';
    }

}
