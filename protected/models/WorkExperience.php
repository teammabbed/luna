<?php

/**
 * This is the model class for table "tbl_emp_work_experience".
 *
 * The followings are the available columns in table 'tbl_emp_work_experience':
 * @property integer $wexp_code
 * @property string $emp_number
 * @property string $employer
 * @property string $job_title
 * @property string $from_date
 * @property string $to_date
 * @property string $remarks
 * @property integer $internal
 *
 * The followings are the available model relations:
 * @property Employee $empNumber
 */
class WorkExperience extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return WorkExperience the static model class
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
		return 'tbl_emp_work_experience';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('emp_number,employer,job_title', 'required'),
			array('emp_number', 'length', 'max'=>10),
			array('employer', 'length', 'max'=>100),
			array('job_title', 'length', 'max'=>120),
			array('remarks', 'length', 'max'=>200),
			array('from_date, to_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('wexp_code, emp_number, employer, job_title, from_date, to_date, remarks, internal', 'safe', 'on'=>'search'),
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
			'wexp_code' => 'Wexp Code',
			'emp_number' => 'Employee Number',
			'employer' => 'Employer',
			'job_title' => 'Job Title',
			'from_date' => 'From Date',
			'to_date' => 'To Date',
			'remarks' => 'Remarks',
			'internal' => 'Within Organization',
			'isgovernment'=>'Goverment Service',
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

		$criteria->compare('wexp_code',$this->wexp_code);
		$criteria->compare('emp_number',$this->emp_number,true);
		$criteria->compare('employer',$this->employer,true);
		$criteria->compare('job_title',$this->job_title,true);
		$criteria->compare('from_date',$this->from_date,true);
		$criteria->compare('to_date',$this->to_date,true);
		$criteria->compare('remarks',$this->remarks,true);
		$criteria->compare('internal',$this->internal);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getWorkExpByEmp($emp_number)
	{
		return new CActiveDataProvider($this,array(
			'criteria'=>array(
				'condition' => 'emp_number = :emp_number',
				'params'	=> array(':emp_number' => $emp_number),
			),
		));
	}
}