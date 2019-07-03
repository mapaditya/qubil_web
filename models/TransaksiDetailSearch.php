<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Transaksi

/**
 * TransaksiDetailSearch represents the model behind the search form of `app\models\TransaksiDetail`.
 */
class TransaksiDetailSearch extends Transaksi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jmlbln_lalu', 'jmlbln_ini', 'harga_satuanm3', 'jumlah_bayar'], 'integer'],
            [['id_transaksi_dtl', 'id_pelanggan', 'id_transaksi','tgl_bayar', 'status_bayar'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Transaksi::find()->where(['id_pelanggan'=>'1']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_transaksi_dtl' => $this->id_transaksi_dtl,
            'id_pelanggan' => $this->id_pelanggan,
            'id_transaksi' => $this->id_transaksi,
            'jmlbln_lalu' => $this->jmlbln_lalu,
            'jmlbln_ini' => $this->jmlbln_ini,
            'harga_satuanm3' => $this->harga_satuanm3,
            'tgl_bayar' => $this->tgl_bayar,
            'jumlah_bayar' => $this->jumlah_bayar,
        ]);

        $query->andFilterWhere(['like', 'status_bayar', $this->status_bayar]);

        return $dataProvider;
    }
}
