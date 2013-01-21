<?php

/**
 * This is the model class for table "tbl_emp_award".
 *
 * The followings are the available columns in table 'tbl_emp_award':
 * @property integer $award_code
 * @property string $emp_number
 * @property string $award_description
 * @property string $awarding_body
 * @property string $award_date
 * @property string $award_remarks
 *
 * The followings are the available model relations:
 * @property Employee $empNumber
 */
class Award extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Award the static model class
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
		return 'tbl_emp_award';
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
			array('award_description, awarding_body, award_remarks', 'length', 'max'=>150),
			array('award_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('award_code, emp_number, award_description, awarding_body, award_date, award_remarks', 'safe', 'on'=>'search'),
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
			'award_code' => 'Award Code',
			'emp_number' => 'Emp Number',
			'award_description' => 'Award Description',
			'awarding_body' => 'Awarding Body',
			'award_date' => 'Award Date',
			'award_remarks' => 'Award Remarks',
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

		$criteria->compare('award_code',$this->award_code);
		$criteria->compare('emp_number',$this->emp_number,true);
		$criteria->compare('award_description',$this->award_description,true);
		$criteria->compare('awarding_body',$this->awarding_body,true);
		$criteria->compare('award_date',$this->award_date,true);
		$criteria->compare('award_remarks',$this->award_remarks,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}