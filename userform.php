<?php
use yii\helpers\html;
use yii\widgets\activeform;
?>
<?php
if(Yii::$app->session->hasFlash('success')){
	echo Yii::$app->session->getFlash('success');
}
?>

<?php $form = ActiveForm::begin();?>
<?= $form->field($model,'name');?>
<?= $form->field($model,'email');?>
<?= html::submitButton('submit',['class'=>'btn btn-success']);?>

