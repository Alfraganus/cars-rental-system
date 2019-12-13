<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cars;

/**
 * CarSearch represents the model behind the search form about `app\models\Cars`.
 * @property mixed oralTimes
 * @property false|int from_time
 */
class CarSearch extends Cars
{
    public $oralTimes;
    public $from_time;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from_time', 'oralTimes', 'car_id', 'manual', 'fuel', 'condin', 'radio', 'manufactureyear', 'price', 'isreserved', 'beginlocation', 'endlocation', 'created_by', 'price_from', 'price_to', 'category'], 'integer'],
            [['airbag', 'rasxod', 'km', 'datefrom', 'timefrom', 'dateto', 'location', 'name_en'], 'safe'],
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
        $query = Cars::find();

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
            'car_id' => $this->car_id,
            'manual' => $this->manual,
            'name_en' => $this->name_en,
            'fuel' => $this->fuel,
            'condin' => $this->condin,
            'location' => $this->location,
            'radio' => $this->radio,
            'manufactureyear' => $this->manufactureyear,
            'price' => $this->price,
            'datefrom' => $this->datefrom,
            'dateto' => $this->dateto,
            'isreserved' => $this->isreserved,
            'beginlocation' => $this->beginlocation,
            'endlocation' => $this->endlocation,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'airbag', $this->airbag])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'fuel', $this->fuel])
            ->andFilterWhere(['like', 'name_en', $this->name_en]);


        return $dataProvider;
    }

    /**
     * Creates data provider instance with filter query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function filter($params)
    {
        $query = Cars::find();

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

        $between = strtotime($this->dateto) - strtotime($this->datefrom);

        if ($between < 11 * 24 * 3600 && $between > 0) {
            $between = 11 * 24 * 3600;
        } elseif ($between < 22 * 24 * 3600) {
            $between = 22 * 24 * 3600;
        } else {
            $between = 33 * 24 * 3600;
        }

        $this->oralTimes = $between;

        if ($this->datefrom == 0) {
            $this->from_time = time();
        } else {
            $this->from_time = strtotime($this->datefrom);
        }

        $start = $this->datefrom == 0 ? strtotime('-1 month') : strtotime($this->datefrom);
        $end = $this->dateto == 0 ? strtotime('+1 month') : strtotime($this->dateto);
        $query->leftJoin('orders', 'orders.car_id = cars.car_id');
        $query->orFilterWhere(['or',
            ['between', 'orders.created_at', $start, $end],
            ['cars.isreserved' => Cars::CAR_IS_EMPTY]
        ]);

        $query->andFilterWhere(['category' => $this->category])
            ->andFilterWhere(['fuel' => $this->fuel])
            ->andFilterWhere(['in', 'cars.status', [Cars::STATUS_ADV, Cars::STATUS_ACTIVE]])
            ->andFilterWhere(['between', 'price', $this->price_from, $this->price_to]);


        return $dataProvider;
    }
}
