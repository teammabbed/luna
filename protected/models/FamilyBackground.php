<?php

/**
 * This is the model class for table "tbl_emp_familybg".
 *
 * The followings are the available columns in table 'tbl_emp_familybg':
 * @property integer $faf_id
 * @property string $emp_number
 * @property string $fname
 * @property string $mi
 * @property string $lname
 * @property string $relationship
 * @property string $date_of_birth
 * @property string $occupation
 * @property string $status
 */
class FamilyBackground extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FamilyBackground the static model class
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
		return 'tbl_emp_familybg';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('emp_number,fname,lname,relationship,date_of_birth', 'required'),
			array('fname,lname', 'length', 'max'=>100),
			array('mi', 'length', 'max'=>5),
			array('relationship, occupation', 'length', 'max'=>50),
			array('status', 'length', 'max'=>30),
			array('date_of_birth', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('faf_id, emp_number, fname, mi, lname, relationship, date_of_birth, occupation, status', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'faf_id' => 'ID',
			'emp_number' => 'Employee No',
			'fname' => 'First Name',
			'mi' => 'M.I.',
			'lname' => 'Last Name',
			'relationship' => 'Relationship',
			'date_of_birth' => 'Date Of Birth',
			'occupation' => 'Occupation',
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

		$criteria->compare('faf_id',$this->faf_id);
		$criteria->compare('emp_number',$this->emp_number,true);
		$criteria->compare('fname',$this->fname,true);
		$criteria->compare('mi',$this->mi,true);
		$criteria->compare('lname',$this->lname,true);
		$criteria->compare('relationship',$this->relationship,true);
		$criteria->compare('date_of_birth',$this->date_of_birth,true);
		$criteria->compare('occupation',$this->occupation,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getFamBgByEmp($empNumber){
		return new CActiveDataProvider('FamilyBackground', array(
		    'criteria' => array(
		        'condition' => 'emp_number=:emp_number',
		        'params' => array(':emp_number' => $empNumber),
		    ),
		    'pagination' => array(
		        'pageSize' => 31,
		    ),
        ));
	}
}