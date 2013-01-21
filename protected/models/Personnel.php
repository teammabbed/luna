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
 * @property Department[] $departments
 * @property EmpAffiliation[] $empAffiliations
 * @property EmpAttachment[] $empAttachments
 * @property EmpAward[] $empAwards
 * @property EmpCivic[] $empCivics
 * @property EmpDeduction[] $empDeductions
 * @property EmpDependent[] $empDependents
 * @property EmpEducation[] $empEducations
 * @property EmpEmergContact[] $empEmergContacts
 * @property EmpIncome[] $empIncomes
 * @property EmpLicense[] $empLicenses
 * @property EmpLoan[] $empLoans
 * @property EmpPayroll[] $empPayrolls
 * @property EmpPicture $empPicture
 * @property EmpPremium[] $empPremia
 * @property EmpSalaryProfile $empSalaryProfile
 * @property EmpTraining[] $empTrainings
 * @property EmpWorkExperience[] $empWorkExperiences
 * @property Department $deptCode
 * @property Personnel $empSupervisor
 * @property Personnel[] $employees
 * @property EmpStatus $empStatus
 * @property Position $positionCode
 * @property Province $empProvince
 * @property Town $empTown
 */
class Personnel extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Personnel the static model class
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
			array('emp_number', 'required'),
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
			'empAffiliations' => array(self::HAS_MANY, 'EmpAffiliation', 'emp_number'),
			'empAttachments' => array(self::HAS_MANY, 'EmpAttachment', 'emp_number'),
			'empAwards' => array(self::HAS_MANY, 'EmpAward', 'emp_number'),
			'empCivics' => array(self::HAS_MANY, 'EmpCivic', 'emp_number'),
			'empDeductions' => array(self::HAS_MANY, 'EmpDeduction', 'emp_number'),
			'empDependents' => array(self::HAS_MANY, 'EmpDependent', 'emp_number'),
			'empEducations' => array(self::HAS_MANY, 'EmpEducation', 'emp_number'),
			'empEmergContacts' => array(self::HAS_MANY, 'EmpEmergContact', 'emp_number'),
			'empIncomes' => array(self::HAS_MANY, 'EmpIncome', 'emp_number'),
			'empLicenses' => array(self::HAS_MANY, 'EmpLicense', 'emp_number'),
			'empLoans' => array(self::HAS_MANY, 'EmpLoan', 'emp_number'),
			'empPayrolls' => array(self::HAS_MANY, 'EmpPayroll', 'emp_number'),
			'empPicture' => array(self::HAS_ONE, 'EmpPicture', 'emp_number'),
			'empPremia' => array(self::HAS_MANY, 'EmpPremium', 'emp_number'),
			'empSalaryProfile' => array(self::HAS_ONE, 'EmpSalaryProfile', 'emp_number'),
			'empTrainings' => array(self::HAS_MANY, 'EmpTraining', 'emp_number'),
			'empWorkExperiences' => array(self::HAS_MANY, 'EmpWorkExperience', 'emp_number'),
			'deptCode' => array(self::BELONGS_TO, 'Department', 'dept_code'),
			'empSupervisor' => array(self::BELONGS_TO, 'Personnel', 'emp_supervisor'),
			'employees' => array(self::HAS_MANY, 'Personnel', 'emp_supervisor'),
			'empStatus' => array(self::BELONGS_TO, 'EmpStatus', 'emp_status'),
			'positionCode' => array(self::BELONGS_TO, 'Position', 'position_code'),
			'empProvince' => array(self::BELONGS_TO, 'Province', 'emp_province'),
			'empTown' => array(self::BELONGS_TO, 'Town', 'emp_town'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'emp_number' => 'Emp Number',
			'emp_lname' => 'Emp Lname',
			'emp_fname' => 'Emp Fname',
			'emp_gender' => 'Emp Gender',
			'emp_mname' => 'Emp Mname',
			'emp_nickname' => 'Emp Nickname',
			'emp_birthday' => 'Emp Birthday',
			'emp_birthplace' => 'Emp Birthplace',
			'emp_marital_status' => 'Emp Marital Status',
			'emp_sss_num' => 'Emp Sss Num',
			'emp_gsis_num' => 'Emp Gsis Num',
			'emp_philhealth_num' => 'Emp Philhealth Num',
			'emp_hdmf_num' => 'Emp Hdmf Num',
			'emp_policy_num' => 'Emp Policy Num',
			'emp_bp_num' => 'Emp Bp Num',
			'emp_unified_num' => 'Emp Unified Num',
			'emp_tin_num' => 'Emp Tin Num',
			'emp_ctc_num' => 'Emp Ctc Num',
			'emp_ctc_date' => 'Emp Ctc Date',
			'emp_status' => 'Emp Status',
			'position_code' => 'Position Code',
			'emp_address' => 'Emp Address',
			'emp_address_current' => 'Emp Address Current',
			'emp_town' => 'Emp Town',
			'emp_province' => 'Emp Province',
			'dept_code' => 'Dept Code',
			'emp_supervisor' => 'Emp Supervisor',
			'emp_hm_tel' => 'Emp Hm Tel',
			'emp_mobile' => 'Emp Mobile',
			'emp_work_tel' => 'Emp Work Tel',
			'emp_work_email' => 'Emp Work Email',
			'emp_oth_email' => 'Emp Oth Email',
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
}