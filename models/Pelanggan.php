<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pelanggan".
 *
 * @property int $id_pelanggan
 * @property int $no_kk
 * @property string $alamat
 * @property int $nomor_telphone_hp
 * @property int $no_telp_rmh
 * @property string $nama
 * @property string $status
 *
 * @property TransaksiDetail[] $transaksiDetails
 */
class Pelanggan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pelanggan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_kk', 'alamat', 'no_telp_rmh', 'nama', 'status'], 'required'],
            [['no_pelanggan','no_rumah','no_kk', 'no_telp_rmh'], 'integer'],
            [['alamat'], 'string'],
            [['nama'], 'string', 'max' => 32],
			[['password'], 'string', 'max' => 100],
            [['username','status'], 'string', 'max' => 16],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pelanggan' => 'Id pelanggan',
			'no_pelanggan' => 'No Pelanggan',
			'no_rumah' => 'No Rumah',
            'no_kk' => 'No Kk',
            'alamat' => 'Alamat',
            'no_telp_rmh' => 'Nomor Telphone Rumah',
            'nama' => 'Nama Lengkap',
            'status' => 'Status pelanggan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiDetails()
    {
        return $this->hasMany(TransaksiDetail::className(), ['id_pelanggan' => 'id_pelanggan']);
    }
}
