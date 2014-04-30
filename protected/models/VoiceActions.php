<?php

class VoiceActions extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'tbl_user':
	 * @var integer $id
	 * @var varchar(150) $desc
	 * @var int $type_id
	 */

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'tbl_voice_actions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('id,desc,type_id', 'required'),
			array('desc', 'length', 'max'=>150),
            array('id,type_id', 'numerical', 'integerOnly'=>true),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
        return array(
            'VoiceTypes'=>array(self::BELONGS_TO, 'VoiceTypes', array('type_id'=>'id')),
            'VoiceSynonyms'=>array(self::HAS_MANY, 'VoiceSynonyms', 'action_id'),
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