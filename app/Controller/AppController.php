<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $components = [
        'Acl',
        'Auth' => [
            'authorize' => [
                'Actions' => ['actionPath' => 'controllers']
            ]
        ],
        'Session',
        'Tools.Common',
        'TinymceElfinder.TinymceElfinder',
//        'DebugKit.Toolbar',
//        'Security'
    ];
    public $helpers = ['Tools.Common', 'Tools.Tree', 'TinymceElfinder.TinymceElfinder'];

    public function beforeFilter() {
        parent::beforeFilter();

        $this->_authorize();

        $this->_setLayout();

        if (!empty($this->request->data) && empty($this->request->data[$this->Auth->userModel])) {
            $user = [];
            $user['User']['id'] = $this->Auth->user('id');
            $this->request->data[$this->Auth->userModel] = $user;
        }
    }

    protected function _authorize() {
//        $this->Auth->allow();
        // password hasher
        $this->Auth->authenticate = [
            'Form' => [
                'passwordHasher' => 'Blowfish']];
        // přihlášení, odhlášení
        $this->Auth->loginAction = [
            'controller' => 'users',
            'action' => 'login',
            'admin' => FALSE
        ];
        $this->Auth->logoutRedirect = [
            'controller' => 'users',
            'action' => 'login',
            'admin' => FALSE
        ];
        $this->Auth->loginRedirect = [
            'controller' => 'houses',
            'action' => 'index',
            'admin' => TRUE
        ];
        //povolené akce pro veřejnost
        $this->Auth->allow([
            'index',
            'view',
            'search',
            'tree',
            'login',
            'add',
            'finished'
        ]);
    }

    protected function _setLayout() {
        if ((isset($this->params['prefix']) && ($this->params['prefix'] == 'admin'))) {
            $this->layout = 'admin';
        } else {
            $this->layout = 'front';
        }
    }

    public function canUploadMedias($model, $id) {
        return true;
    }

    public function elfinder() {
        $this->TinymceElfinder->elfinder();
    }

    public function connector() {
        $this->TinymceElfinder->connector();
    }

}
