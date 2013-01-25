<?php

/**
 * This is the model class for table "tbl_emp_license".
 *
 * The followings are the available columns in table 'tbl_emp_license':
 * @property integer $license_code
 * @property string $emp_number
 * @property string $license_number
 * @property string $license_description
 * @property string $license_date
 * @property string $renewal_date
 *
 * The followings are the available model relations:
 * @property Employee $empNumber
 */
class License extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return License the static model class
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
		return 'tbl_emp_license';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('emp_number,license_number,license_description,license_date,renewal_date','required'),
			array('emp_number', 'length', 'max'=>10),
			array('license_number', 'length', 'max'=>20),
			array('license_description', 'length', 'max'=>100),
			array('license_date, renewal_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('license_code, emp_number, license_number, license_description, license_date, renewal_date', 'safe', 'on'=>'search'),
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
			'empNumber' => array(self::BELONGS_TO, 'Employee', 'emp_number'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'license_code' => 'License Code',
			'emp_number' => 'Employee Number',
			'license_number' => 'License Number',
			'license_description' => 'License Name',
			'license_date' => 'License Date',
			'renewal_date' => 'Renewal Date',
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

		$criteria->compare('license_code',$this->license_code);
		$criteria->compare('emp_number',$this->emp_number,true);
		$criteria->compare('license_number',$this->license_number,true);
		$criteria->compare('license_description',$this->license_description,true);
		$criteria->compare('license_date',$this->license_date,true);
		$criteria->compare('renewal_date',$this->renewal_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getLicensesByEmp($empNumber){
		return new CActiveDataProvider('License', array(
		    'criteria' => array(
		        'condition' => 'emp_number=:emp_number',
		        'params' => array(':emp_number' => $empNumber),
		    ),
		    'pagination' => array(
		        'pageSize' => 31,
		    ),
        ));
	}
}