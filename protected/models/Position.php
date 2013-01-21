<?php

/**
 * This is the model class for table "tbl_position".
 *
 * The followings are the available columns in table 'tbl_position':
 * @property integer $position_code
 * @property string $description
 * @property string $category
 * @property string $shortname
 *
 * The followings are the available model relations:
 * @property Employee[] $employees
 */
class Position extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Position the static model class
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
		return 'tbl_position';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description, shortname','required'),
			array('description, category', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('position_code, description, category', 'safe', 'on'=>'search'),
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
			'employees' => array(self::HAS_MANY, 'Employee', 'position_code'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'position_code' => 'Position Code',
			'description' => 'Description',
			'category' => 'Category',
			'shortname' => 'Short Description'
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

		$criteria->compare('position_code',$this->position_code);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('category',$this->category,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getPositions() {
        return $list = CHtml::listData($this->model()->findAll(array(
	       'order' => 'description',
        )),'position_code','description');
    }
}