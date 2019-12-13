<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CarOrderForm;

/**
 * OrdersSearch represents the model behind the search form of `app\models\CarOrderForm`.
 */
class OrdersSearch extends CarOrderForm
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'pick_up_location', 'dropp_off_location', 'gender', 'payment_type', 'car_id', 'status', 'created_at', 'updated_at', 'cancelled_at'], 'integer'],
            [['amount'], 'number'],
            [['car_extras', 'free_car_extras', 'name_and_surname', 'email', 'phone_number', 'cell_phone_number', 'comment', 'reserved_dates'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = CarOrderForm::find();

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
            'id' => $this->id,
            'amount' => $this->amount,
            'pick_up_location' => $this->pick_up_location,
            'dropp_off_location' => $this->dropp_off_location,
            'gender' => $this->gender,
            'payment_type' => $this->payment_type,
            'car_id' => $this->car_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'cancelled_at' => $this->cancelled_at,
        ]);

        $query->andFilterWhere(['like', 'car_extras', $this->car_extras])
            ->andFilterWhere(['like', 'free_car_extras', $this->free_car_extras])
            ->andFilterWhere(['like', 'name_and_surname', $this->name_and_surname])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'cell_phone_number', $this->cell_phone_number])
            ->andFilterWhere(['like', 'comment', $this->comment])
            ->andFilterWhere(['like', 'reserved_dates', $this->reserved_dates]);

        return $dataProvider;
    }
}
