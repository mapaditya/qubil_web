<?php

use yii\helpers\Url;
// use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use kartik\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Transaksi';
?>

<div class="jumbotron">
    <h1>Transaksi</h1>
    <h4>Jumlah Transaksi seluruh Pelanggan</h4>
</div>

<?php
$id = Html::encode($searchModel->id_pelanggan);
$dataProvider = $searchModel->search($id);

$counter = Yii::$app->db->createCommand("SELECT COUNT(id_transaksi) AS jumlah FROM transaksi")->queryAll();
foreach ($counter as $counters) {
    $jumlah[] = ($counters['jumlah']);
}
?>

<?php
$data = [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id_pelanggan',
        'hAlign'=>'center',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'jmlbln_lalu',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'jmlbln_ini',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'tgl_bayar',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'status_bayar',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'jumlah_bayar',
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],
];
?>

<div class="operator-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => $data,         
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-time"></i> Riwayat Transaksi',
                'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
                'after'=>'Total Transaksi : '.(int)$jumlah[0]
            ]
        ])?>
    </div>
</div>