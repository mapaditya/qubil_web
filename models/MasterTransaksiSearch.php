<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MasterTransaksi;

/**
 * MasterTransaksiSearch represents the model behind the search form about `app\models\MasterTransaksi`.
 */
class MasterTransaksiSearch extends MasterTransaksi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_transaksi', 'id_operator'], 'string'],
            [['tgl_gen', 'periode'], 'safe'],
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
        $query = MasterTransaksi::find();

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
            'id_transaksi' => $this->id_transaksi,
            'id_operator' => $this->id_operator,
            'tgl_gen' => $this->tgl_gen,
            'periode' => $this->periode,
        ]);

        return $dataProvider;
    }
}
