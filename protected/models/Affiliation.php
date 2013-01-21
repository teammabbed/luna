<?php

/**
 * This is the model class for table "tbl_emp_affiliation".
 *
 * The followings are the available columns in table 'tbl_emp_affiliation':
 * @property integer $mem_code
 * @property string $emp_number
 * @property string $mem_name
 * @property string $mem_place
 * @property string $start_date
 * @property string $end_date
 * @property string $remarks
 *
 * The followings are the available model relations:
 * @property Employee $empNumber
 */
class Affiliation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Affiliation the static model class
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
		return 'tbl_emp_affiliation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('emp_number', 'length', 'max'=>10),
			array('mem_name, remarks', 'length', 'max'=>150),
			array('mem_place', 'length', 'max'=>100),
			array('start_date, end_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('mem_code, emp_number, mem_name, mem_place, start_date, end_date, remarks', 'safe', 'on'=>'search'),
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
			'mem_code' => 'Mem Code',
			'emp_number' => 'Emp Number',
			'mem_name' => 'Mem Name',
			'mem_place' => 'Mem Place',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'remarks' => 'Remarks',
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

		$criteria->compare('mem_code',$this->mem_code);
		$criteria->compare('emp_number',$this->emp_number,true);
		$criteria->compare('mem_name',$this->mem_name,true);
		$criteria->compare('mem_place',$this->mem_place,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('remarks',$this->remarks,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}