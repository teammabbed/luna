<?php

/**
 * This is the model class for table "tbl_emp_education".
 *
 * The followings are the available columns in table 'tbl_emp_education':
 * @property integer $edu_code
 * @property string $emp_number
 * @property string $degree_course
 * @property string $level
 * @property string $school
 * @property string $yr_start
 * @property string $yr_end
 * @property integer $remarks
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
			array('emp_number,degree_course,level,school,yr_start,yr_end','required'),
			array('remarks', 'length', 'max'=>200),
			array('emp_number', 'length', 'max'=>10),
			array('degree_course, level', 'length', 'max'=>50),
			array('school', 'length', 'max'=>100),
			array('yr_start, yr_end', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('edu_code, emp_number, degree_course, level, school, yr_start, yr_end, remarks', 'safe', 'on'=>'search'),
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
			'edu_code' => 'Code',
			'emp_number' => 'Employee Number',
			'degree_course' => 'Degree Course',
			'level' => 'Level',
			'school' => 'School',
			'yr_start' => 'Year Started',
			'yr_end' => 'Year Ended',
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

		$criteria->compare('edu_code',$this->edu_code);
		$criteria->compare('emp_number',$this->emp_number,true);
		$criteria->compare('degree_course',$this->degree_course,true);
		$criteria->compare('level',$this->level,true);
		$criteria->compare('school',$this->school,true);
		$criteria->compare('yr_start',$this->yr_start,true);
		$criteria->compare('yr_end',$this->yr_end,true);
		$criteria->compare('remarks',$this->remarks);

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