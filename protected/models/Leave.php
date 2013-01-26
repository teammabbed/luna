<?php

/**
 * This is the model class for table "tbl_emp_leave".
 *
 * The followings are the available columns in table 'tbl_emp_leave':
 * @property string $leave_id
 * @property string $emp_number
 * @property integer $leave_type
 * @property string $additional_details
 * @property string $leave_reason
 * @property string $status
 * @property double $leave_days
 * @property string $date_filed
 * @property string $head1
 * @property string $head2
 * @property string $remarks
 * @property string $date_created
 * @property integer $leave_year
 *
 * The followings are the available model relations:
 * @property Employee $empNumber
 * @property Employee $head10
 * @property Employee $head20
 * @property LeaveType $leaveType
 * @property EmpLeaveDetail[] $empLeaveDetails
 */
class Leave extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Leave the static model class
	 */
	public $datesList, $fullname;

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
			array('leave_id, emp_number, leave_type, status, datesList ,leave_days, approved_for, date_filed, head1, head2, leave_year', 'required'),
			array('head1,head2','compare','compareAttribute'=>'emp_number','operator'=>'!='),
			array('leave_year', 'numerical', 'integerOnly'=>true),
			array('leave_days', 'numerical', 'min'=>0.5),
			array('leave_days, is_outofcountry', 'numerical'),
			array('leave_id', 'length', 'max'=>16),
			array('emp_number, head1, head2', 'length', 'max'=>10),
			array('additional_details, leave_reason, remarks', 'length', 'max'=>100),
			array('status', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('leave_id, emp_number, leave_type, additional_details, leave_reason, status, leave_days, date_filed, head1, head2, remarks, date_created, leave_year', 'safe', 'on'=>'search'),
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
			'employee' => array(self::BELONGS_TO, 'Employee', 'emp_number'),
			'head10' => array(self::BELONGS_TO, 'Employee', 'head1'),
			'head20' => array(self::BELONGS_TO, 'Employee', 'head2'),
			'leaveType' => array(self::BELONGS_TO, 'LeaveType', 'leave_type'),
			'LeaveDetails' => array(self::HAS_MANY, 'LeaveDetail', 'leave_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'leave_id' => 'Leave',
			'emp_number' => 'Employee',
			'leave_type' => 'Type',
			'is_outofcountry' => 'Out of Country',
			'additional_details' => 'Additional Details',
			'leave_reason' => 'Reason',
			'status' => 'Status',
			'leave_days' => 'Leave Days',
			'date_filed' => 'Date Filed',
			'head1' => 'Head1',
			'head2' => 'Head2',
			'remarks' => 'Remarks',
			'date_created' => 'Date Created',
			'datesList' => '',
			'leave_year' => 'Year',
			'approved_for' => 'Approved for',
			'dateList'=>'Leave Days',
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
		$sort=new CSort;

		$criteria->compare('leave_id',$this->leave_id,true);
		$criteria->compare('emp_number',$this->emp_number,true);
		$criteria->compare('leave_type',$this->leave_type);
		$criteria->compare('additional_details',$this->additional_details,true);
		$criteria->compare('leave_reason',$this->leave_reason,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('leave_days',$this->leave_days);
		$criteria->compare('date_filed',$this->date_filed,true);
		$criteria->compare('head1',$this->head1,true);
		$criteria->compare('head2',$this->head2,true);
		$criteria->compare('remarks',$this->remarks,true);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('leave_year',$this->leave_year);
		$criteria->compare('emp_lname',$this->fullname,true);
		$criteria->compare('emp_fname',$this->fullname,true,"OR");

		$criteria->with = array('employee');

		$sort->attributes = array(
			'fullname' => array(
				'asc' => 'emp_fname',
				'desc' => 'emp_lname'
			),
			'*',
		);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
			'pagination' => array(
				'pageSize' => 5,
			),
		));
	}

	public function getTypes() 
	{
		return array(
			'sl' => 'Sick',
			'vl' => 'Vacation',
			'pl' => 'Paternity',
			'ml' => 'Maternity',
		);
	}

	public function getApproveTypes() 
	{
		return array(
			'wp' => 'with pay',
			'np' => 'no pay',
		);
	}

	public function getLeaveDesc()
	{
		switch ($this->leave_type) 
		{
			case 'sl':
				return 'Sick';
				break;
			case 'vl':
				return 'Vacation';
				break;
			case 'ml':
				return 'Maternity';
				break;
			case 'pl':
				return 'Paternity';
				break;
		}
	}

	public function getStatus()
	{
		switch ($this->status) 
		{
			case 'AP':
				return 'Approved';
				break;
			case 'DA':
				return 'Disapproved';
				break;
			case 'CN':
				return 'Cancelled';
				break;
			case 'PD':
				return 'Pending';
				break;
		}
	}
}