<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\pelanggan */
?>
<div class="pelanggan-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_pelanggan',
			'no_pelanggan',
			'no_rumah',
            'no_kk',
            'alamat:ntext',
            'nmr_telp_rmh',
            'nama',
			'username',
			'password',
            'status',
        ],
    ]) ?>

</div>
