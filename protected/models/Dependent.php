<?php

/**
 * This is the model class for table "tbl_emp_dependent".
 *
 * The followings are the available columns in table 'tbl_emp_dependent':
 * @property integer $dependent_id
 * @property string $emp_number
 * @property string $name
 * @property string $relationship
 * @property string $date_of_birth
 *
 * The followings are the available model relations:
 * @property Employee $empNumber
 */
class Dependent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Dependent the static model class
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
		return 'tbl_emp_dependent';
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
			array('name', 'length', 'max'=>100),
			array('relationship', 'length', 'max'=>50),
			array('date_of_birth', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('dependent_id, emp_number, name, relationship, date_of_birth', 'safe', 'on'=>'search'),
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
			'dependent_id' => 'Dependent',
			'emp_number' => 'Emp Number',
			'name' => 'Name',
			'relationship' => 'Relationship',
			'date_of_birth' => 'Date Of Birth',
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

		$criteria->compare('dependent_id',$this->dependent_id);
		$criteria->compare('emp_number',$this->emp_number,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('relationship',$this->relationship,true);
		$criteria->compare('date_of_birth',$this->date_of_birth,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}