<?php
App::uses('AppModel', 'Model');
/**
 * Article Model
 *
 * @property Article $ParentArticle
 * @property Article $ChildArticle
 * @property Area $Area
 */
class Article extends AppModel {
    
    public $actsAs = ['Media.Media' => [
            'path' => './files/images/articles/%id/%f'
    ], 'Tree'];

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = [
		'ParentArticle' => [
			'className' => 'Article',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		]
	];

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = [
		'ChildArticle' => [
			'className' => 'Article',
			'foreignKey' => 'parent_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		]
	];


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = [
		'Area' => [
			'className' => 'Area',
			'joinTable' => 'areas_articles',
			'foreignKey' => 'article_id',
			'associationForeignKey' => 'area_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		]
	];

}
