<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MasterTransaksi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="master-transaksi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_transaksi')->textInput() ?>

    <?= $form->field($model, 'id_operator')->textInput() ?>

    <?= $form->field($model, 'tgl_gen')->textInput() ?>

    <?= $form->field($model, 'periode')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
