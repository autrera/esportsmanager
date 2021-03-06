<?php
App::uses('AppModel', 'Model');
/**
 * News Model
 *
 * @property Users $Users
 * @property Comment $Comment
 */
class News extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field can\'t be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
				'rule' => array('isUnique'),
				'message' => 'The title you choosed is already taken, please, choose another.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'slug' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field can\'t be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            'unique' => array(
                'rule' => array('isUnique'),
                'message' => 'The title you choosed is already taken, please, choose another.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
		),
		'description' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field can\'t be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				// 'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'banner' => array(
			'checkfeatured' => array(
				'rule' => 'whenfeatured',
				'message' => 'This field can\'t be empty when the featured option is checked',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'checkfeatured2' => array(
				'rule' => 'whenfeaturedupdate',
				'message' => 'This field can\'t be empty when the featured option is checked',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'update', // Limit validation to 'create' or 'update' operations
			),
		),
		'content' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field can\'t be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'users_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Only numbers are allowed on this field',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'games_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Only numbers are allowed on this field',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Users' => array(
			'className' => 'Users',
			'foreignKey' => 'users_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		),
		'Games' => array(
			'className' => 'Games',
			'foreignKey' => 'games_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
        'Comments' => array(
            'className'     => 'NewsComment',
            'foreignKey'    => 'news_id',
            // 'conditions'    => array('Comment.status' => '1'),
            // 'order'         => 'Comment.created DESC',
            // 'limit'         => '5',
            // 'dependent'     => true
        )
    );

    public function whenfeatured(){
    	echo "<pre>";
    	echo "1";
    	print_r($this->data);
    	echo "</pre>";
    	if (   isset($this->data['News']['featured'])
    		&& $this->data['News']['featured'] == 1
    	) {
    		if (! empty($this->data['News']['banner'])){
    			return true;
    		} else {
    			return false;
    		}
    	}
    	return true;
    }

    public function whenfeaturedupdate(){
    	$banner = $this->field('banner');
    	if (!empty ($banner)){
    		return true;
    	} else {
	    	if (   isset($this->data['News']['featured'])
	    		&& $this->data['News']['featured'] == 1
	    	) {
	    		return false;
		    } else {
		    	return true;
		    }
    	}
    }

}
