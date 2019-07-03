<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Transaksi;

/**
 * TransaksiSearch represents the model behind the search form about `app\models\Transaksi`.
 */
class TransaksiSearch extends Transaksi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jmlbln_lalu', 'jmlbln_ini', 'harga_satuanm3', 'jumlah_bayar'], 'integer'],
            [['id_transaksi_dtl', 'id_transaksi', 'id_pelanggan','tgl_bayar', 'status_bayar'], 'safe'],
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
        $query = Transaksi::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_transaksi_dtl' => $this->id_transaksi_dtl,
            'id_transaksi' => $this->id_transaksi,
            'id_pelanggan' => $this->id_pelanggan,
            'jmlbln_lalu' => $this->jmlbln_lalu,
            'jmlbln_ini' => $this->jmlbln_ini,
            'harga_satuanm3' => $this->harga_satuanm3,
            'tgl_bayar' => $this->tgl_bayar,
            'jumlah_bayar' => $this->jumlah_bayar,
        ]);

        $query->andFilterWhere(['like', 'status_bayar', $this->status_bayar]);

        return $dataProvider;
    }

    public function tunggakan($params, $params2)
    {
        $query = Transaksi::find()->where(['status_bayar'=>$params2]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $params2);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_transaksi_dtl' => $this->id_transaksi_dtl,
            'id_transaksi' => $this->id_transaksi,
            'id_pelanggan' => $this->id_pelanggan,
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
