<?php

/**
 * This is the model class for table "tbl_emp_attachment".
 *
 * The followings are the available columns in table 'tbl_emp_attachment':
 * @property integer $attach_code
 * @property string $emp_number
 * @property string $description
 * @property string $filename
 * @property double $size
 * @property string $attachment
 * @property string $type
 *
 * The followings are the available model relations:
 * @property Employee $empNumber
 */
class Attachment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Attachment the static model class
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
		return 'tbl_emp_attachment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('size', 'numerical'),
			array('emp_number', 'length', 'max'=>10),
			array('description, filename, type', 'length', 'max'=>100),
			array('attachment', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('attach_code, emp_number, description, filename, size, attachment, type', 'safe', 'on'=>'search'),
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
			'attach_code' => 'Attach Code',
			'emp_number' => 'Emp Number',
			'description' => 'Description',
			'filename' => 'Filename',
			'size' => 'Size',
			'attachment' => 'Attachment',
			'type' => 'Type',
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

		$criteria->compare('attach_code',$this->attach_code);
		$criteria->compare('emp_number',$this->emp_number,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('size',$this->size);
		$criteria->compare('attachment',$this->attachment,true);
		$criteria->compare('type',$this->type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}