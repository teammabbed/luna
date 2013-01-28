<?php

/**
 * This is the model class for table "tbl_emp_loan".
 *
 * The followings are the available columns in table 'tbl_emp_loan':
 * @property integer $loan_id
 * @property string $emp_number
 * @property integer $type_id
 * @property double $amount
 * @property string $terms
 * @property integer $payment_periods
 * @property double $monthly_amort
 * @property string $loan_date
 * @property string $payment_start
 * @property string $payment_end
 * @property string $status
 *
 * The followings are the available model relations:
 * @property TblEmployee $empNumber
 * @property TblLoanType $type
 * @property TblEmpLoanpayment[] $tblEmpLoanpayments
 */
class Loan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Loan the static model class
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
		return 'tbl_emp_loan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('emp_number, monthly_amort, type_id, amount, apr, loan_date, payment_periods, terms','required'),
			array('type_id, payment_periods', 'numerical', 'integerOnly'=>true),
			array('amount, monthly_amort, apr', 'numerical'),
			array('status', 'length', 'max'=>10),
			array('terms', 'length', 'max'=>50),
			array('loan_date, payment_start, payment_end', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('loan_id, emp_number, type_id, amount, terms, payment_periods, monthly_amort, loan_date, payment_start, payment_end, status', 'safe', 'on'=>'search'),
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
			'type' => array(self::BELONGS_TO, 'TblLoanType', 'type_id'),
			'tblEmpLoanpayments' => array(self::HAS_MANY, 'TblEmpLoanpayment', 'loan_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'loan_id' => 'Loan',
			'emp_number' => 'Employee',
			'type_id' => 'Type',
			'amount' => 'Amount',
			'apr' => 'APR (%)',
			'terms' => 'Terms',
			'payment_periods' => 'Payment Period (months)',
			'monthly_amort' => 'Amortization',
			'loan_date' => 'Loan Date',
			'payment_start' => 'Payment Start',
			'payment_end' => 'Payment End',
			'status' => 'Status',
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

		$criteria->compare('loan_id',$this->loan_id);
		$criteria->compare('emp_number',$this->emp_number,true);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('terms',$this->terms,true);
		$criteria->compare('payment_periods',$this->payment_periods);
		$criteria->compare('monthly_amort',$this->monthly_amort);
		$criteria->compare('loan_date',$this->loan_date,true);
		$criteria->compare('payment_start',$this->payment_start,true);
		$criteria->compare('payment_end',$this->payment_end,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}