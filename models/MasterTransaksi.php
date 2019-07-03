<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaksi_m".
 *
 * @property int $id_transaksi
 * @property int $id_operator
 * @property string $tgl_gen
 * @property string $periode
 *
 * @property Operator $operator
 * @property Transaksi[] $transaksiDetails
 */
class MasterTransaksi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transaksi_m';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_transaksi', 'id_operator', 'tgl_gen', 'periode'], 'required'],
            [['id_transaksi', 'id_operator'], 'string'],
            [['tgl_gen', 'periode'], 'safe'],
            [['id_transaksi'], 'unique'],
            [['id_operator'], 'exist', 'skipOnError' => true, 'targetClass' => Operator::className(), 'targetAttribute' => ['id_operator' => 'id_operator']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_transaksi' => 'Id Mst Transaksi',
            'id_operator' => 'Id Operator',
            'tgl_gen' => 'Tanggal Generate',
            'periode' => 'periode',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOperator()
    {
        return $this->hasOne(Operator::className(), ['id_operator' => 'id_operator']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksis()
    {
        return $this->hasMany(Transaksi::className(), ['id_transaksi' => 'id_transaksi']);
    }
}
