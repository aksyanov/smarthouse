<?php

class DevicesCatalog extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'tbl_user':
	 * @var integer $id
	 * @var varchar(150) $name
	 * @var varchar(100) $address
	 * @var int $type_id
	 */

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'tbl_devices_catalog';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('id,name,address,type_id', 'required'),
			array('name', 'length', 'max'=>150),
            array('address', 'length', 'max'=>100),
            array('cur_value', 'length', 'max'=>150),
            array('id,type_id', 'numerical', 'integerOnly'=>true),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
        return array(
            'DevicesType'=>array(self::BELONGS_TO, 'DevicesType', array('type_id'=>'id')),
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