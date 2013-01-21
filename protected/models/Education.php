<?php

/**
 * This is the model class for table "tbl_emp_education".
 *
 * The followings are the available columns in table 'tbl_emp_education':
 * @property integer $edu_code
 * @property string $emp_number
 * @property string $degree
 * @property string $school
 * @property string $start_date
 * @property string $end_date
 *
 * The followings are the available model relations:
 * @property Employee $empNumber
 */
class Education extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Education the static model class
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
		return 'tbl_emp_education';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('degree,school,start_date,end_date','required'),
			array('emp_number', 'length', 'max'=>10),
			array('degree', 'length', 'max'=>50),
			array('school', 'length', 'max'=>100),
			array('start_date, end_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('edu_code, emp_number, degree, school, start_date, end_date', 'safe', 'on'=>'search'),
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
			'edu_code' => 'Edu Code',
			'emp_number' => 'Emp Number',
			'degree' => 'Degree',
			'school' => 'School',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
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

		$criteria->compare('edu_code',$this->edu_code);
		$criteria->compare('emp_number',$this->emp_number,true);
		$criteria->compare('degree',$this->degree,true);
		$criteria->compare('school',$this->school,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getEducationByEmp($emp_number)
	{
		return new CActiveDataProvider($this,array(
			'criteria'=>array(
				'condition' => 'emp_number = :emp_number',
				'params'	=> array(':emp_number' => $emp_number),
			),
		));
	}
}