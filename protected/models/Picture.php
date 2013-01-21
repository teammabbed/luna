<?php

/**
 * This is the model class for table "tbl_emp_picture".
 *
 * The followings are the available columns in table 'tbl_emp_picture':
 * @property string $emp_number
 * @property string $picture
 * @property string $filename
 * @property string $type
 * @property double $file_size
 *
 * The followings are the available model relations:
 * @property Employee $empNumber
 */
class Picture extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Picture the static model class
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
		return 'tbl_emp_picture';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('emp_number', 'required'),
			array('file_size', 'numerical'),
			array('emp_number', 'length', 'max'=>10),
			array('filename', 'length', 'max'=>100),
			array('type', 'length', 'max'=>50),
			array('picture', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('emp_number, picture, filename, type, file_size', 'safe', 'on'=>'search'),
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
			'emp_number' => 'Emp Number',
			'picture' => 'Picture',
			'filename' => 'Filename',
			'type' => 'Type',
			'file_size' => 'File Size',
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

		$criteria->compare('emp_number',$this->emp_number,true);
		$criteria->compare('picture',$this->picture,true);
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('file_size',$this->file_size);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}