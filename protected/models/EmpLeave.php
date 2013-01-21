<?php

/**
 * This is the model class for table "tbl_emp_leave".
 *
 * The followings are the available columns in table 'tbl_emp_leave':
 * @property string $leave_id
 * @property integer $leave_type
 * @property string $emp_number
 * @property string $leave_reason
 * @property string $status
 * @property double $leave_days
 * @property string $date_filed
 * @property string $head1
 * @property string $head2
 * @property string $head1_action_date
 * @property string $head2_action_date
 * @property string $head1_action
 * @property string $head2_action
 * @property string $remarks
 * @property string $date_created
 * @property integer $leave_year
 *
 * The followings are the available model relations:
 * @property TblEmployee $empNumber
 * @property TblEmployee $head10
 * @property TblEmployee $head20
 * @property TblLeaveType $leaveType
 * @property TblEmpLeaveDetail[] $tblEmpLeaveDetails
 */
class EmpLeave extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EmpLeave the static model class
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
		return 'tbl_emp_leave';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('leave_id, leave_type, emp_number, leave_reason, status, leave_days, date_filed, head1, head2, remarks, date_created, leave_year', 'required'),
			array('leave_type, leave_year', 'numerical', 'integerOnly'=>true),
			array('leave_days', 'numerical'),
			array('leave_id', 'length', 'max'=>13),
			array('emp_number, head1, head2', 'length', 'max'=>10),
			array('leave_reason, head1_action, head2_action, remarks', 'length', 'max'=>100),
			array('status', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('leave_id, leave_type, emp_number, leave_reason, status, leave_days, date_filed, head1, head2, remarks, date_created, leave_year', 'safe', 'on'=>'search'),
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
			'empNumber' => array(self::BELONGS_TO, 'TblEmployee', 'emp_number'),
			'head1' => array(self::BELONGS_TO, 'TblEmployee', 'head1'),
			'head2' => array(self::BELONGS_TO, 'TblEmployee', 'head2'),
			'leaveType' => array(self::BELONGS_TO, 'LeaveType', 'leave_type'),
			'tblEmpLeaveDetails' => array(self::HAS_MANY, 'TblEmpLeaveDetail', 'leave_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'leave_id' => 'Leave',
			'leave_type' => 'Leave Type',
			'emp_number' => 'Employee',
			'leave_reason' => 'Reason',
			'status' => 'Status',
			'leave_days' => 'Days',
			'date_filed' => 'Date Filed',
			'head1' => 'Head1',
			'head2' => 'Head2',
			'head1_action_date' => 'Head1 Action Date',
			'head2_action_date' => 'Head2 Action Date',
			'head1_action' => 'Head1 Action',
			'head2_action' => 'Head2 Action',
			'remarks' => 'Remarks',
			'date_created' => 'Date Created',
			'leave_year' => 'Leave Year',
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

		$criteria->compare('leave_id',$this->leave_id,true);
		$criteria->compare('leave_type',$this->leave_type);
		$criteria->compare('emp_number',$this->emp_number,true);
		$criteria->compare('leave_reason',$this->leave_reason,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('leave_days',$this->leave_days);
		$criteria->compare('date_filed',$this->date_filed,true);
		$criteria->compare('head1',$this->head1,true);
		$criteria->compare('head2',$this->head2,true);
		$criteria->compare('head1_action_date',$this->head1_action_date,true);
		$criteria->compare('head2_action_date',$this->head2_action_date,true);
		$criteria->compare('head1_action',$this->head1_action,true);
		$criteria->compare('head2_action',$this->head2_action,true);
		$criteria->compare('remarks',$this->remarks,true);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('leave_year',$this->leave_year);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}