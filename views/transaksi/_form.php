<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TransaksiDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transaksi-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_transaksi')->textInput() ?>

    <?= $form->field($model, 'id_pelanggan')->textInput() ?>

    <?= $form->field($model, 'jmlbln_lalu')->textInput() ?>

    <?= $form->field($model, 'jmlbln_ini')->textInput() ?>

    <?= $form->field($model, 'harga_satuanm3')->textInput() ?>

    <?= $form->field($model, 'tgl_bayar')->textInput() ?>

    <?= $form->field($model, 'status_bayar')->dropDownList([ 'Sudah Bayar' => 'Sudah Bayar', 'Belum Bayar' => 'Belum Bayar', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'jumlah_bayar')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
