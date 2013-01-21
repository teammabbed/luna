<?php

/**
 * This is the model class for table "tbl_emp_training".
 *
 * The followings are the available columns in table 'tbl_emp_training':
 * @property integer $tra_code
 * @property string $emp_number
 * @property string $title
 * @property string $place
 * @property string $start_date
 * @property string $end_date
 * @property string $remarks
 *
 * The followings are the available model relations:
 * @property Employee $empNumber
 */
class Training extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Training the static model class
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
		return 'tbl_emp_training';
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
			array('title, place', 'length', 'max'=>100),
			array('remarks', 'length', 'max'=>200),
			array('start_date, end_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('tra_code, emp_number, title, place, start_date, end_date, remarks', 'safe', 'on'=>'search'),
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
			'tra_code' => 'Tra Code',
			'emp_number' => 'Emp Number',
			'title' => 'Title',
			'place' => 'Place',
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

		$criteria->compare('tra_code',$this->tra_code);
		$criteria->compare('emp_number',$this->emp_number,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('place',$this->place,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('remarks',$this->remarks,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}