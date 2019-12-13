<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cars;

/**
 * CarSearch represents the model behind the search form about `app\models\Cars`.
 */
class CarSearcha extends Cars
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['car_id', 'manual', 'fuel', 'condin', 'radio', 'manufactureyear', 'price', 'isreserved', 'beginlocation', 'endlocation', 'created_by', 'price_from', 'price_to', 'category'], 'integer'],
            [['airbag', 'rasxod', 'km', 'datefrom', 'timefrom', 'dateto','location'], 'safe'],
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
        $query = Cars::find()->limit(4);

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

       
         
        return $dataProvider;
    }

 
    public function filter($params)
    { 
        $query = \app\models\Cars::find()->limit(4);
 
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
        
        return $dataProvider;
    }
}
