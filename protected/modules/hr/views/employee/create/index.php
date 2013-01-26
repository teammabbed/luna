<?php
$this->breadcrumbs=array(
	'PMIS (Create Employee)'
);

?>
<?php
	if($this->emp_number==0){
		$this->renderPartial('create/personalInfo',array(
			'model'=>$model,
		));
	}else{
		$this->renderPartial('create/miscInfo',array(
			'model_fambg'=>$model_fambg,
			'model_lic'=>$model_lic,
			'model_wrkExp'=>$model_wrkExp,
			'model_training'=>$model_training,
			'model_emerg'=>$model_emerg,
			'model_educ'=>$model_educ,
			'dataProvider_educ'=>$dataProvider_educ,
			'dataProvider_emerg'=>$dataProvider_emerg,
			'dataProvider_training'=>$dataProvider_training,
			'dataProvider_wrk'=>$dataProvider_wrk,
			'dataProvider_lic'=>$dataProvider_lic,
			'dataProvider_fambg'=>$dataProvider_fambg,
		));
	}
?>