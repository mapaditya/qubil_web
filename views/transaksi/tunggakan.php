<?php

use app\models\Transaksi;
use yii\helpers\Url;
// use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use kartik\helpers\Html;
use kartik\detail\DetailView;
/* @var $this yii\web\View */

$this->title = 'Tagihan Pelanggan';
?>

<div class="jumbotron">
    <h1>Tagihan Pelanggan</h1><br>
<?php

$id = Html::encode($searchModel->id_pelanggan);
$dataProvider = $searchModel->search($id);
$query = (new \yii\db\Query())
    ->select(['*'])
    ->from('pelanggan')
    ->where(['id_pelanggan' => $id])
    ->all();

$getData = $query[0];
$name = $getData['nama'];
$alamat = $getData['alamat'];
$noRumah = $getData['no_rumah'];

$query2 = (new \yii\db\Query())
    ->select(['*'])
    ->from('transaksi')
    ->where(['id_pelanggan' => $id])
    ->all();

$sql = Transaksi::find()->where(['id_pelanggan'=>$id,'status_bayar'=>'Belum Lunas'])->all();
if($sql == null){?>
    <div class="panel panel-success">
        <div class="panel-body">Selamat Anda tidak memiliki tunggakan</div>
        <div class="panel-footer">
            <?=Html::a('Go Back', ['/site/index'], ['class'=>'btn btn-primary'])?>
        </div>
    </div><?php
} else {
    $bulanLalu = $sql[0]->jmlbln_lalu;
    $bulanIni = $sql[0]->jmlbln_ini;
    $status = $sql[0]->status_bayar;

$attributes = [
    [
        'group'=>true,
        'label'=>'1 - Informasi Pelanggan',
        'rowOptions'=>['class'=>'info']
    ],
    [
        'columns' => [
            [
                'attribute'=>'id_pelanggan', 
                'label'=>'No. ID',
                'displayOnly'=>true,
                'valueColOptions'=>['style'=>'width:30%']
            ],
           
        ],
    ],
	[
        'columns' => [
            
            [
                'attribute'=>'Nama', 
                'format'=>'raw', 
                'value'=>$name,
                'valueColOptions'=>['style'=>'width:30%'], 
                'displayOnly'=>true
            ],
        ],
    ],
    [
        'columns' => [
            [
                'label'=>'Alamat',
                'value'=>$alamat,
                'valueColOptions'=>['style'=>'width:30%'],
            ],
            
        ],
    ],
	[
        'columns' => [
            
            [
                'label'=>'No. Rumah',
                'format'=>'raw', 
                'value'=>'<kbd>0'.$noRumah.'</kbd>',
                'valueColOptions'=>['style'=>'width:30%'], 
            ],
        ],
    ],
    [
        'group'=>true,
        'label'=>'2 - Tagihan',
        'rowOptions'=>['class'=>'danger']
    ],
    [
        'columns' => [
            [
                'attribute'=>'jmlbln_lalu', 
                'label'=>'Id Tagihan',
                'value'=>$bulanLalu,
                'displayOnly'=>true,
                'valueColOptions'=>['style'=>'width:30%']
            ],
            
        ],
    ],
	[
        'columns' => [
            
            [
                'attribute'=>'jmlbln_ini', 
                'value' =>$bulanIni,
                'format'=>'raw', 
                'valueColOptions'=>['style'=>'width:30%'], 
                'displayOnly'=>true
            ],
        ],
    ],
    [
        'columns' => [
            [
                'label'=>'Status Pembayaran',
                'format'=>'raw',
				'valueColOptions'=>['style'=>'width:30%'],
                'value'=>'<span class="label label-danger">'.$status."</span>",
            ],
        ],
    ],
];

echo DetailView::widget([
        'model' => $searchModel,
        'attributes' => $attributes,
        'mode' => 'view',
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'hAlign'=>'right',
        'vAlign'=>'center',
        'fadeDelay'=>800,
    ]);
}
?>
</div>