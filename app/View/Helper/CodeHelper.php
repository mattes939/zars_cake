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

//    public $helpers = array();
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

}
