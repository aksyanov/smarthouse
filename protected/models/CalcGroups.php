<?php

class CalcGroups extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'tbl_user':
	 * @var integer $id
	 * @var string $login
	 * @var string $password
	 * @var string $companies
	 * @var string $salt
	 */

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'tbl_calc_groups';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('id,name,sinonym', 'required'),
			array('sinonym,name', 'length', 'max'=>255),
            array('id', 'numerical', 'integerOnly'=>true),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
        return array(
            'calcElements'=>array(self::HAS_MANY, 'CalcElements', 'calc_groups_id'),
            'calcTemplates'=>array(self::HAS_MANY, 'CalcTemplates', 'calc_groups_id'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
            'sinonym' => 'Sinonym',
		);
	}
}