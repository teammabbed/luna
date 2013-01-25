<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property string $username
 * @property string $password
 * @property string $role
 * @property integer $emp_number
 */
class User extends CActiveRecord
{
	public $password_repeat;
	public $new_password;
	public $new_password_repeat;
	public $fullname;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username,password,emp_number', 'required'),
			array('username, password', 'length', 'max'=>50),
			array('role', 'length', 'max' => 10),
            array('password,username', 'required', 'on' => 'login'),
			array('username, emp_number','unique'),
			array('password_repeat, password ,new_password,new_password_repeat, username', 'required', 'on' => 'update'),
            array('new_password_repeat','compare','compareAttribute'=>'new_password', 'on' => 'update'),
            //array('username','exist', 'on'=>'update'),
            array('password_repeat,new_password, new_password_repeat','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('username, role, emp_number, fullname', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'username' => 'Username',
			'password' => 'Password',
			'password_repeat' => 'Old Password',
			'new_password' => 'New Password',
			'new_password_repeat' => 'Re-type Password',
			'role' => 'Role',
			'emp_number' => 'Employee',
			'fullname'=>'Employee Name',
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

		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('emp_number',$this->emp_number);
		$criteria->compare('emp_lname',$this->fullname,true);
		$criteria->compare('emp_fname',$this->fullname,true,'OR');

		$criteria->with=array('employee');
		$sort->attributes=array(
			'fullname'=>array(
				'asc'=>'emp_lname, emp_fname',
				'desc'=>'emp_lname DESC, emp_fname DESC',
			),
			'*',
		);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
		));
	}
}