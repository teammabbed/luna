<?php

/**
 * This is the model class for table "tbl_emp_leave_detail".
 *
 * The followings are the available columns in table 'tbl_emp_leave_detail':
 * @property string $detail_id
 * @property string $leave_id
 * @property string $leave_dates
 * @property string $leave_duration
 * @property string $leave_credit
 *
 * The followings are the available model relations:
 * @property EmpLeave $leave
 */
class LeaveDetail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LeaveDetail the static model class
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
		return 'tbl_emp_leave_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('detail_id, leave_id, leave_dates, leave_duration, leave_credit', 'required'),
			array('detail_id,leave_id', 'length', 'max'=>16),
			array('leave_duration', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('detail_id, leave_id, leave_dates, leave_duration, leave_credit', 'safe', 'on'=>'search'),
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
			'leave' => array(self::BELONGS_TO, 'Leave', 'leave_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'detail_id' => 'Detail',
			'leave_id' => 'Leave',
			'leave_dates' => 'Dates',
			'leave_duration' => 'Duration',
			'leave_credit' => 'Credit',
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

		$criteria->compare('detail_id',$this->detail_id,true);
		$criteria->compare('leave_id',$this->leave_id,true);
		$criteria->compare('leave_dates',$this->leave_dates,true);
		$criteria->compare('leave_duration',$this->leave_duration,true);
		$criteria->compare('leave_credit',$this->leave_credit,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

}