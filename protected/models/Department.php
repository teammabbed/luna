<?php

/**
 * This is the model class for table "tbl_department".
 *
 * The followings are the available columns in table 'tbl_department':
 * @property integer $dept_code
 * @property string $name
 * @property string $shortname
 * @property integer $supervisor
 *
 * The followings are the available model relations:
 * @property Employee $supervisor0
 * @property Employee[] $employees
 */
class Department extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Department the static model class
	 */

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
		return 'tbl_department';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('dept_code, name,shortname','required'),
			array('name, shortname, dept_code', 'length', 'max'=>50),
			array('dept_code','unique'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('dept_code, name, shortname, supervisor, fullname', 'safe', 'on'=>'search'),
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
			'deptSupervisor' => array(self::BELONGS_TO, 'Employee', 'supervisor'),
			'employees' => array(self::HAS_MANY, 'Employee', 'dept_code'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'dept_code' => 'Office Code',
			'name' => 'Name',
			'shortname' => 'Shortname',
			'supervisor' => 'Head',
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

		$criteria->compare('dept_code',$this->dept_code);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('shortname',$this->shortname,true);
		$criteria->compare('supervisor',$this->supervisor);
		$criteria->compare('emp_lname', $this->fullname,true);
		$criteria->compare('emp_fname',$this->fullname,true,"OR");

		$criteria->with=array(
			'deptSupervisor',
		);

		$sort->attributes=array(
			'fullname'=>array(
				'asc' => 'emp_lname, emp_fname',
				'desc' => 'emp_lname DESC, emp_fname DESC',
			),	
			'*',
		);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
		));
	}

	public function getDepartments() {
        return $list = CHtml::listData($this->model()->findAll(array(
	       'order' => 'shortname',
        )),'dept_code','shortname');
    }
}