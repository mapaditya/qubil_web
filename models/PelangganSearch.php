<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pelanggan;

/**
 * PelangganSearch represents the model behind the search form about `app\models\Pelanggan`.
 */
class PelangganSearch extends Pelanggan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_pelanggan', 'no_rumah', 'no_kk', 'no_telp_rmh'], 'integer'],
            [['id_pelanggan','username' , 'password' , 'alamat', 'nama', 'status'], 'safe'],
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
        $query = Pelanggan::find();

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
            'id_pelanggan' => $this->id_pelanggan,
            'no_kk' => $this->no_kk,
            'no_telp_rmh' => $this->no_telp_rmh,
        ]);

        $query->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
