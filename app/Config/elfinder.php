<?php

$config = [
    'Elfinder' => [
        'title' => __('Elfinder File Manager'),
        'width' => 900,
        'height' => 500,
        'resizable' => 'yes',
        /**
         * 
         * for urls
         * before cake 2.4 use FULL_BASE_URL
         * starting cake 2.4 Router::url('/', true)
         * 
         * window_url - the url by which the elfinder window is called
         * if we set 'window_url' => Router::url('/', true).'/posts/elfinderWindow',
         *  		 'connector_url' => Router::url('/', true).'/posts/elfinderConnector',
         * than we should create actions elfinderWindow and elfinderConnector in posts controller like this
         * public function elfinderWindow() {
         * 		$this->TinymceElfinder->elfinder();
         * }
         * public function elfinderConnector() {
         * 		$this->TinymceElfinder->connector();
         * }
         *  			
         */
        'window_url' => Router::url('/', true) . '/articles/elfinder', // call elfinder window
        'connector_url' => Router::url('/', true) . '/articles/connector', // connect to retrive files
        'locale' => 'cs',
        /**
         * for full list of options as well as documentation 
         * visit https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options
         *  		
         */
        'options' => [
            //'debug' => true,
            'roots' => [
                [
                    'driver' => 'LocalFileSystem', // driver for accessing file system (REQUIRED)
                    'URL' => Router::url('/', true) . '/files', // upload main folder
//                    'path' => IMAGES . 'Uploads', // path to files (REQUIRED)
                    'path' => WWW_ROOT . 'files',
                    'accessControl' => 'access', // disable and hide dot starting files (OPTIONAL)
                    'attributes' => [
                        [
                            'pattern' => '!\.html$!',
                            'hidden' => true
                        ]
                    ],
                    'tmbPath' => 'tumbnails',
                    'uploadOverwrite' => false,
                ]
            ]
        ]
    ]
];
