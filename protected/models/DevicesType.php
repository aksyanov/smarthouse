<?php

class DevicesType extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'tbl_devices_catalog':
	 * @var integer $id
	 * @var varchar(150) $name
	 */

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'tbl_devices_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('id,name', 'required'),
			array('name', 'length', 'max'=>150),
            array('id', 'numerical', 'integerOnly'=>true),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
            'DevicesCatalog'=>array(self::HAS_MANY, 'DevicesCatalog', 'type_id'),
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