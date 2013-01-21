<?php

/**
 * This is the model class for table "tbl_town".
 *
 * The followings are the available columns in table 'tbl_town':
 * @property integer $town_code
 * @property string $name
 * @property integer $province_code
 * @property string $zip_code
 *
 * The followings are the available model relations:
 * @property Employee[] $employees
 * @property Province $provinceCode
 */
class Town extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Town the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_town';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('province_code', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			array('zip_code', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('town_code, name, province_code, zip_code', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'employees' => array(self::HAS_MANY, 'Employee', 'emp_town'),
			'provinceCode' => array(self::BELONGS_TO, 'Province', 'province_code'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'town_code' => 'Town Code',
			'name' => 'Name',
			'province_code' => 'Province Code',
			'zip_code' => 'Zip Code',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('town_code',$this->town_code);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('province_code',$this->province_code);
		$criteria->compare('zip_code',$this->zip_code,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}