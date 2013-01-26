<?php

/**
 * This is the model class for table "tbl_emp_leave_credit".
 *
 * The followings are the available columns in table 'tbl_emp_leave_credit':
 * @property string $leave_credit_id
 * @property string $emp_number
 * @property string $leave_year
 * @property double $leave_allocated_sl
 * @property double $leave_allocated_vl
 * @property double $leave_committed_sl
 * @property double $leave_committed_vl
 * @property double $leave_used_sl
 * @property double $leave_used_vl
 * @property double $leave_used_others
 *
 * The followings are the available model relations:
 * @property Employee $empNumber
 */
class LeaveCredit extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LeaveCredit the static model class
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
		return 'tbl_emp_leave_credit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('leave_credit_id, emp_number, leave_year, leave_allocated_sl, leave_allocated_vl', 'required'),
			array('leave_allocated_sl, leave_allocated_vl, leave_committed_sl, leave_committed_vl, leave_used_sl, leave_used_vl, leave_used_others', 'numerical'),
			array('leave_credit_id', 'length', 'max'=>13),
			array('emp_number, leave_year', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('leave_credit_id, emp_number, leave_year, leave_allocated_sl, leave_allocated_vl, leave_committed_sl, leave_committed_vl, leave_used_sl, leave_used_vl, leave_used_others', 'safe', 'on'=>'search'),
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
			'leave_credit_id' => 'Leave Credit',
			'emp_number' => 'Emp Number',
			'leave_year' => 'Leave Year',
			'leave_allocated_sl' => 'Leave Allocated Sl',
			'leave_allocated_vl' => 'Leave Allocated Vl',
			'leave_committed_sl' => 'Leave Committed Sl',
			'leave_committed_vl' => 'Leave Committed Vl',
			'leave_used_sl' => 'Leave Used Sl',
			'leave_used_vl' => 'Leave Used Vl',
			'leave_used_others' => 'Leave Used Others',
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

		$criteria->compare('leave_credit_id',$this->leave_credit_id,true);
		$criteria->compare('emp_number',$this->emp_number,true);
		$criteria->compare('leave_year',$this->leave_year,true);
		$criteria->compare('leave_allocated_sl',$this->leave_allocated_sl);
		$criteria->compare('leave_allocated_vl',$this->leave_allocated_vl);
		$criteria->compare('leave_committed_sl',$this->leave_committed_sl);
		$criteria->compare('leave_committed_vl',$this->leave_committed_vl);
		$criteria->compare('leave_used_sl',$this->leave_used_sl);
		$criteria->compare('leave_used_vl',$this->leave_used_vl);
		$criteria->compare('leave_used_others',$this->leave_used_others);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

}