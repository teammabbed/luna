<?php

/**
 * This is the model class for table "tbl_emp_emerg_contact".
 *
 * The followings are the available columns in table 'tbl_emp_emerg_contact':
 * @property integer $eec_code
 * @property string $emp_number
 * @property string $name
 * @property string $relationship
 * @property string $home_no
 * @property string $mobile_no
 * @property string $office_no
 *
 * The followings are the available model relations:
 * @property Employee $empNumber
 */
class EmpEmergContact extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EmpEmergContact the static model class
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
		return 'tbl_emp_emerg_contact';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('emp_number,contact_no,address, name, relationship', 'required'),
			array('emp_number', 'length', 'max'=>10),
			array('contact_no', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('eec_code, emp_number,address, name, relationship, contact_no', 'safe', 'on'=>'search'),
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
			'eec_code' => 'Eec Code',
			'emp_number' => 'Emp Number',
			'name' => 'Name',
			'relationship' => 'Relationship',
			'contact_no'=>'Contact Number',
			'address'=>'Address'
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

		$criteria->compare('eec_code',$this->eec_code);
		$criteria->compare('emp_number',$this->emp_number,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('relationship',$this->relationship,true);
		$criteria->compare('contact_no',$this->contact_no,true);
		$criteria->compare('address',$this->address,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getEmerContactByEmp($emp_number)
	{
		return new CActiveDataProvider($this,array(
			'criteria'=>array(
				'condition' => 'emp_number = :emp_number',
				'params'	=> array(':emp_number' => $emp_number),
			),
		));
	}
}