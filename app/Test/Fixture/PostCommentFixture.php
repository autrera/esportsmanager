<?php
/* PostComment Fixture generated on: 2012-03-14 04:33:58 : 1331696038 */

/**
 * PostCommentFixture
 *
 */
class PostCommentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'comment' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 180, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'charset' => 'latin1'),
		'created' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'collate' => NULL, 'comment' => ''),
		'posts_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'users_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_post_comments_posts1' => array('column' => 'posts_id', 'unique' => 0), 'fk_post_comments_users1' => array('column' => 'users_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_spanish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'comment' => 'Lorem ipsum dolor sit amet',
			'created' => 1331696038,
			'posts_id' => 1,
			'users_id' => 1
		),
	);
}
