<?php

class CalcElements extends CActiveRecord
{
    public $inMenu = false;
	/**
	 * The followings are the available columns in table 'tbl_user':
	 * @var integer $id
	 * @var string $user_id
	 * @var string $interface_types_id
	 * @var string $name
	 * @var string $synonym
     * @var string $interface_actions_id
     * @var string $button
     * @var string $parent_id
     * @var string $visible
     * @var string $sort
	 */

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'tbl_calc_elements';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('id,name,sinonym,price,calc_groups_id', 'required'),
			array('name,sinonym', 'length', 'max'=>255),
            array('id,price,calc_groups_id', 'numerical', 'integerOnly'=>true),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
            'calcGroups'=>array(self::BELONGS_TO, 'CalcGroups', 'calc_groups_id'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
		);
	}
}