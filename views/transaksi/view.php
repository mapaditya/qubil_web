<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TransaksiDetail */
?>
<div class="transaksi-detail-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_transaksi_dtl',
            'id_transaksi',
            'id_pelanggan',
            'jmlbln_lalu',
            'jmlbln_ini',
            'harga_satuanm3',
            'tgl_bayar',
            'status_bayar',
            'jumlah_bayar',
        ],
    ]) ?>

</div>
