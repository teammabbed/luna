<?php

/**
 * This is the model class for table "tbl_employee".
 *
 * The followings are the available columns in table 'tbl_employee':
 * @property string $emp_number
 * @property string $emp_lname
 * @property string $emp_fname
 * @property string $emp_gender
 * @property string $emp_mname
 * @property string $emp_nickname
 * @property string $emp_birthday
 * @property string $emp_birthplace
 * @property string $emp_marital_status
 * @property string $emp_sss_num
 * @property string $emp_gsis_num
 * @property string $emp_philhealth_num
 * @property string $emp_hdmf_num
 * @property string $emp_policy_num
 * @property string $emp_bp_num
 * @property string $emp_unified_num
 * @property string $emp_tin_num
 * @property string $emp_ctc_num
 * @property string $emp_ctc_date
 * @property integer $emp_status
 * @property integer $position_code
 * @property string $emp_address
 * @property string $emp_address_current
 * @property integer $emp_town
 * @property integer $emp_province
 * @property integer $dept_code
 * @property string $emp_supervisor
 * @property string $emp_hm_tel
 * @property string $emp_mobile
 * @property string $emp_work_tel
 * @property string $emp_work_email
 * @property string $emp_oth_email
 * @property integer $sal_grade_code
 * @property string $joined_date
 * @property string $orig_appointment
 * @property string $promoted_date
 * @property string $promoted_position
 * @property string $termination_date
 * @property string $termination_position
 * @property string $termination_reason
 * @property string $isActive
 * @property string $lastEdited
 * @property string $lastEditedBy
 *
 * The followings are the available model relations:
 * @property TblDepartment[] $tblDepartments
 * @property TblEmpAffiliation[] $tblEmpAffiliations
 * @property TblEmpAttachment[] $tblEmpAttachments
 * @property TblEmpAward[] $tblEmpAwards
 * @property TblEmpCivic[] $tblEmpCivics
 * @property TblEmpDeduction[] $tblEmpDeductions
 * @property TblEmpDependent[] $tblEmpDependents
 * @property TblEmpEducation[] $tblEmpEducations
 * @property TblEmpEmergContact[] $tblEmpEmergContacts
 * @property TblEmpIncome[] $tblEmpIncomes
 * @property TblEmpLicense[] $tblEmpLicenses
 * @property TblEmpLoan[] $tblEmpLoans
 * @property TblEmpPayroll[] $tblEmpPayrolls
 * @property TblEmpPicture $tblEmpPicture
 * @property TblEmpPremium[] $tblEmpPremia
 * @property TblEmpSalaryProfile $tblEmpSalaryProfile
 * @property TblEmpTraining[] $tblEmpTrainings
 * @property TblEmpWorkExperience[] $tblEmpWorkExperiences
 * @property TblDepartment $deptCode
 * @property Employee $empSupervisor
 * @property Employee[] $tblEmployees
 * @property TblEmpStatus $empStatus
 * @property TblPosition $positionCode
 * @property TblProvince $empProvince
 * @property TblTown $empTown
 */
class Employee extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Employee the static model class
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
		return 'tbl_employee';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('emp_number,emp_lname,emp_fname,dept_code,emp_supervisor', 'required'),
			array('emp_status, position_code, emp_town, emp_province, dept_code, sal_grade_code', 'numerical', 'integerOnly'=>true),
			array('emp_number, emp_supervisor', 'length', 'max'=>10),
			array('emp_lname, emp_fname, emp_mname, emp_nickname, emp_hm_tel, emp_mobile, emp_work_tel, emp_work_email, emp_oth_email, orig_appointment, promoted_position, termination_position, lastEditedBy', 'length', 'max'=>50),
			array('emp_gender', 'length', 'max'=>6),
			array('emp_birthplace, emp_address, emp_address_current', 'length', 'max'=>100),
			array('emp_marital_status, emp_sss_num, emp_gsis_num, emp_philhealth_num, emp_hdmf_num, emp_policy_num, emp_bp_num, emp_unified_num, emp_tin_num, emp_ctc_num', 'length', 'max'=>20),
			array('termination_reason', 'length', 'max'=>256),
			array('isActive', 'length', 'max'=>1),
			array('emp_birthday, emp_ctc_date, joined_date, promoted_date, termination_date, lastEdited', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('emp_number, emp_lname, emp_fname, emp_gender, emp_mname, emp_nickname, emp_birthday, emp_birthplace, emp_marital_status, emp_sss_num, emp_gsis_num, emp_philhealth_num, emp_hdmf_num, emp_policy_num, emp_bp_num, emp_unified_num, emp_tin_num, emp_ctc_num, emp_ctc_date, emp_status, position_code, emp_address, emp_address_current, emp_town, emp_province, dept_code, emp_supervisor, emp_hm_tel, emp_mobile, emp_work_tel, emp_work_email, emp_oth_email, sal_grade_code, joined_date, orig_appointment, promoted_date, promoted_position, termination_date, termination_position, termination_reason, isActive, lastEdited, lastEditedBy', 'safe', 'on'=>'search'),
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
			'departments' => array(self::HAS_MANY, 'Department', 'supervisor'),
			'tblEmpAffiliations' => array(self::HAS_MANY, 'TblEmpAffiliation', 'emp_number'),
			'tblEmpAttachments' => array(self::HAS_MANY, 'TblEmpAttachment', 'emp_number'),
			'tblEmpAwards' => array(self::HAS_MANY, 'TblEmpAward', 'emp_number'),
			'tblEmpCivics' => array(self::HAS_MANY, 'TblEmpCivic', 'emp_number'),
			'tblEmpDeductions' => array(self::HAS_MANY, 'TblEmpDeduction', 'emp_number'),
			'tblEmpDependents' => array(self::HAS_MANY, 'TblEmpDependent', 'emp_number'),
			'tblEmpEducations' => array(self::HAS_MANY, 'TblEmpEducation', 'emp_number'),
			'tblEmpEmergContacts' => array(self::HAS_MANY, 'TblEmpEmergContact', 'emp_number'),
			'tblEmpIncomes' => array(self::HAS_MANY, 'TblEmpIncome', 'emp_number'),
			'tblEmpLicenses' => array(self::HAS_MANY, 'TblEmpLicense', 'emp_number'),
			'tblEmpLoans' => array(self::HAS_MANY, 'TblEmpLoan', 'emp_number'),
			'tblEmpPayrolls' => array(self::HAS_MANY, 'TblEmpPayroll', 'emp_number'),
			'tblEmpPicture' => array(self::HAS_ONE, 'TblEmpPicture', 'emp_number'),
			'tblEmpPremia' => array(self::HAS_MANY, 'TblEmpPremium', 'emp_number'),
			'tblEmpSalaryProfile' => array(self::HAS_ONE, 'TblEmpSalaryProfile', 'emp_number'),
			'tblEmpTrainings' => array(self::HAS_MANY, 'TblEmpTraining', 'emp_number'),
			'tblEmpWorkExperiences' => array(self::HAS_MANY, 'TblEmpWorkExperience', 'emp_number'),
			'department' => array(self::BELONGS_TO, 'Department', 'dept_code'),
			'supervisor' => array(self::BELONGS_TO, 'Employee', 'emp_supervisor'),
			'tblEmployees' => array(self::HAS_MANY, 'Employee', 'emp_supervisor'),
			'status' => array(self::BELONGS_TO, 'Status', 'emp_status'),
			'position' => array(self::BELONGS_TO, 'Position', 'position_code'),
			'province' => array(self::BELONGS_TO, 'Province', 'emp_province'),
			'town' => array(self::BELONGS_TO, 'Town', 'emp_town'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'emp_number' => 'Employee ID',
			'emp_lname' => 'Lastname',
			'emp_fname' => 'Firstname',
			'emp_gender' => 'Gender',
			'emp_mname' => 'Middle Name',
			'emp_nickname' => 'Nickname',
			'emp_birthday' => 'Birthday',
			'emp_birthplace' => 'Birthplace',
			'emp_marital_status' => 'Marital Status',
			'emp_sss_num' => 'SSS No',
			'emp_gsis_num' => 'GSIS No',
			'emp_philhealth_num' => 'PhilHealth No',
			'emp_hdmf_num' => 'HDMF No',
			'emp_policy_num' => 'Policy No',
			'emp_bp_num' => 'BP No',
			'emp_unified_num' => 'Unified No',
			'emp_tin_num' => 'Tin No',
			'emp_ctc_num' => 'CTC No',
			'emp_ctc_date' => 'CTC Date',
			'emp_status' => 'Status',
			'position_code' => 'Position',
			'emp_address' => 'Address',
			'emp_address_current' => 'Current Address',
			'emp_town' => 'Town',
			'emp_province' => 'Emp Province',
			'dept_code' => 'Department',
			'emp_supervisor' => 'Supervisor',
			'emp_hm_tel' => 'Home Tel',
			'emp_mobile' => 'Mobile',
			'emp_work_tel' => 'Work Tel',
			'emp_work_email' => 'Work Email',
			'emp_oth_email' => 'Alternative Email',
			'sal_grade_code' => 'Sal Grade Code',
			'joined_date' => 'Joined Date',
			'orig_appointment' => 'Orig Appointment',
			'promoted_date' => 'Promoted Date',
			'promoted_position' => 'Promoted Position',
			'termination_date' => 'Termination Date',
			'termination_position' => 'Termination Position',
			'termination_reason' => 'Termination Reason',
			'isActive' => 'Is Active',
			'lastEdited' => 'Last Edited',
			'lastEditedBy' => 'Last Edited By',
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
		$criteria->compare('emp_lname',$this->emp_lname,true);
		$criteria->compare('emp_fname',$this->emp_fname,true);
		$criteria->compare('emp_gender',$this->emp_gender,true);
		$criteria->compare('emp_mname',$this->emp_mname,true);
		$criteria->compare('emp_nickname',$this->emp_nickname,true);
		$criteria->compare('emp_birthday',$this->emp_birthday,true);
		$criteria->compare('emp_birthplace',$this->emp_birthplace,true);
		$criteria->compare('emp_marital_status',$this->emp_marital_status,true);
		$criteria->compare('emp_sss_num',$this->emp_sss_num,true);
		$criteria->compare('emp_gsis_num',$this->emp_gsis_num,true);
		$criteria->compare('emp_philhealth_num',$this->emp_philhealth_num,true);
		$criteria->compare('emp_hdmf_num',$this->emp_hdmf_num,true);
		$criteria->compare('emp_policy_num',$this->emp_policy_num,true);
		$criteria->compare('emp_bp_num',$this->emp_bp_num,true);
		$criteria->compare('emp_unified_num',$this->emp_unified_num,true);
		$criteria->compare('emp_tin_num',$this->emp_tin_num,true);
		$criteria->compare('emp_ctc_num',$this->emp_ctc_num,true);
		$criteria->compare('emp_ctc_date',$this->emp_ctc_date,true);
		$criteria->compare('emp_status',$this->emp_status);
		$criteria->compare('position_code',$this->position_code);
		$criteria->compare('emp_address',$this->emp_address,true);
		$criteria->compare('emp_address_current',$this->emp_address_current,true);
		$criteria->compare('emp_town',$this->emp_town);
		$criteria->compare('emp_province',$this->emp_province);
		$criteria->compare('dept_code',$this->dept_code);
		$criteria->compare('emp_supervisor',$this->emp_supervisor,true);
		$criteria->compare('emp_hm_tel',$this->emp_hm_tel,true);
		$criteria->compare('emp_mobile',$this->emp_mobile,true);
		$criteria->compare('emp_work_tel',$this->emp_work_tel,true);
		$criteria->compare('emp_work_email',$this->emp_work_email,true);
		$criteria->compare('emp_oth_email',$this->emp_oth_email,true);
		$criteria->compare('sal_grade_code',$this->sal_grade_code);
		$criteria->compare('joined_date',$this->joined_date,true);
		$criteria->compare('orig_appointment',$this->orig_appointment,true);
		$criteria->compare('promoted_date',$this->promoted_date,true);
		$criteria->compare('promoted_position',$this->promoted_position,true);
		$criteria->compare('termination_date',$this->termination_date,true);
		$criteria->compare('termination_position',$this->termination_position,true);
		$criteria->compare('termination_reason',$this->termination_reason,true);
		$criteria->compare('isActive',$this->isActive,true);
		$criteria->compare('lastEdited',$this->lastEdited,true);
		$criteria->compare('lastEditedBy',$this->lastEditedBy,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getFullname()
	{
		return $this->emp_lname.', '.$this->emp_fname;
	}

	public function getDeptHeads() 
	{
		return $this::model()->with('position')->findAll(array(
                            'order' => 'emp_lname',
                            'condition' => 'isActive=:isActive and position.category=:category',
                            'params' => array(':isActive' => 'Y', 'category' => 'head')
               ));
	}
}