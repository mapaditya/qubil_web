<?php
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'header' => 'ID',
        'attribute'=>'id_pelanggan',
        'width' => '5%',
        'hAlign' => 'center',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'no_pelanggan',
    ],
	[
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'no_rumah',
    ],
	[
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'no_kk',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'alamat',
        'hAlign' => 'center',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'nmr_trlp_rmh',
        'header' => 'Nomor Telp. Rumah',
        'hAlign' => 'right',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'namas',
        'width' => '30%',
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'status_anggota',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'Tampilkan','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Ubah', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Hapus', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   