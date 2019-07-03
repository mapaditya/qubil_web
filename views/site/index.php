<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
// use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use kartik\nav\NavX;
use kartik\helpers\Html;
use kartik\widgets\ActiveForm;

$this->title = 'Qu-Bil - Your Aqua Billing';
?>

<?php $form = ActiveForm::begin(['id' => 'searchId']); ?>

<div class="site-index">

<img src="<?php echo Yii::$app->homeUrl ?>../../../web/img/header.png" alt=" style="text-align:center;>

        <div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="<?php echo Yii::$app->homeUrl ?>../../../web/img/profile.png" alt="">
      <div class="caption">
      <h3 style="text-align:center;">See Your Profile</h3> 
        <button type="button" class="btn btn-primary" style="margin-left:130px;" data-toggle="modal" data-target="#datadiri">Data Diri</button>
      </div>
    </div>
  </div>
  
  <?php $form = ActiveForm::begin(['action'=>'index.php?r=pelanggan%2Fdatadiri']);?>
<div class="modal fade" id="datadiri" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cari berdasarkan ID</h4>
            </div>
            <div class="modal-body">
                <?= $form->field($searchModel, 'id_pelanggan',['showLabels'=>false])->textInput(['placeholder'=>'Masukkan ID anda']);?>
            </div>
            <div class="modal-footer">
                <div class="pull-left">
                    <?= Html::submitButton('<i class="glyphicon glyphicon-search"></i> Cari', ['class'=>'btn btn-primary'])?>
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>      
    </div>
</div>
<?php ActiveForm::end(); ?>

  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="<?php echo Yii::$app->homeUrl ?>../../../web/img/invoice.png" alt="">
      <div class="caption">
      <h3 style="text-align:center;">See Your Invoice</h3> 
		<button type="button" class="btn btn-primary" style="margin-left:130px;" data-toggle="modal" data-target="#tunggakan">Tagihan</button>
      </div>
    </div>
  </div>
  
  <?php $form = ActiveForm::begin(['action'=>'index.php?r=transaksi%2Ftunggakan']);?>
<div class="modal fade" id="tunggakan" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cari berdasarkan ID</h4>
            </div>
            <div class="modal-body">
                <?= $form->field($searchModel, 'id_pelanggan',['showLabels'=>false])->textInput(['placeholder'=>'Masukkan ID anda']);?>
            </div>
            <div class="modal-footer">
                <div class="pull-left">
                    <?= Html::submitButton('<i class="glyphicon glyphicon-search"></i> Cari', ['class'=>'btn btn-primary'])?>
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>      
    </div>
</div>
<?php ActiveForm::end(); ?>

  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="<?php echo Yii::$app->homeUrl ?>../../../web/img/history.png" alt="">
      <div class="caption">
        <h3 style="text-align:center;">See Your History</h3>
        <button type="button" class="btn btn-primary" style="margin-left:110px;" data-toggle="modal" data-target="#riwayat">Riwayat Tagihan</button>
      </div>
    </div>
  </div>
</div>
</div>

<?php $form = ActiveForm::begin(['action'=>'index.php?r=transaksi%2Friwayat']);?>
<div class="modal fade" id="riwayat" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cari berdasarkan ID</h4>
            </div>
            <div class="modal-body">
                <?= $form->field($searchModel, 'id_pelanggan',['showLabels'=>false])->textInput(['placeholder'=>'Masukkan ID anda']);?>
            </div>
            <div class="modal-footer">
                <div class="pull-left">
                    <?= Html::submitButton('<i class="glyphicon glyphicon-search"></i> Cari', ['class'=>'btn btn-primary'])?>
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>      
    </div>
</div>
<?php ActiveForm::end(); ?>

    </div>
</div>
