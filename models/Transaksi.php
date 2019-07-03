<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaksi_detail".
 *
 * @property int $id_transaksi_dtl
 * @property int $id_transaksi
 * @property int $id_pelanggan
 * @property int $jmlbln_lalu
 * @property int $jmlbln_ini
 * @property int $harga_satuanm3
 * @property string $tgl_bayar
 * @property string $status_bayar
 * @property int $jumlah_bayar
 *
 * @property Anggota $anggota
 * @property MasterTransaksi $trxMst
 */
class Transaksi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaksi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_transaksi', 'id_pelanggan', 'jmlbln_lalu', 'jmlbln_ini', 'harga_satuanm3', 'tgl_bayar', 'status_bayar', 'jumlah_bayar'], 'required'],
            [['jmlbln_lalu', 'jmlbln_ini', 'harga_satuanm3', 'jumlah_bayar'], 'integer'],
            [['id_transaksi', 'id_pelanggan' ,'tgl_bayar'], 'safe'],
            [['status_bayar'], 'string'],
            [['id_pelanggan'], 'exist', 'skipOnError' => true, 'targetClass' => Pelanggan::className(), 'targetAttribute' => ['id_pelanggan' => 'id_pelanggan']],
            [['id_transaksi'], 'exist', 'skipOnError' => true, 'targetClass' => MasterTransaksi::className(), 'targetAttribute' => ['id_transaksi' => 'id_transaksi']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_transaksi_dtl' => 'Id Transaksi Detail',
            'id_transaksi' => 'Id Transaksi Master',
            'id_pelanggan' => 'Id Pelanggan',
            'jmlbln_lalu' => 'Jumlah Bulan Lalu',
            'jmlbln_ini' => 'Jumlah Bulan Ini',
            'harga_satuanm3' => 'Harga Satuan Per Kubik',
            'tgl_bayar' => 'Tanggal Bayar',
            'status_bayar' => 'Status Bayar',
            'jumlah_bayar' => 'Jumlah Bayar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelanggan()
    {
        return $this->hasOne(Pelanggan::className(), ['id_pelanggan' => 'id_pelanggan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiM()
    {
        return $this->hasOne(transaksi_m::className(), ['id_transaksi' => 'id_transaksi']);
    }
}
