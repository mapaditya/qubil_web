<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MasterTransaksi */
?>
<div class="master-transaksi-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_transaksi',
            'id_operator',
            'tgl_gen',
            'periode',
        ],
    ]) ?>

</div>
