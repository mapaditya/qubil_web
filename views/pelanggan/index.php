<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use kartik\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $searchModel app\models\PelangganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pelanggan';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<div class="anggota-index">
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
</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
