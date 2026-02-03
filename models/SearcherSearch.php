<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Searcher;

/**
 * SearcherSearch represents the model behind the search form of `app\models\Searcher`.
 */
class SearcherSearch extends Searcher
{
    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['id', 'created_at', 'spg', 'sg', 'target_urban', 'target_forest', 'medicine_base', 'medicine_spec'], 'integer'],
            [['name', 'tg', 'call', 'phone', 'auto_number', 'address', 'coordinate', 'equipment'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios(): array
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search(array $params, string $formName = null): ActiveDataProvider
    {
        $query = Searcher::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'spg' => $this->spg,
            'sg' => $this->sg,
            'target_urban' => $this->target_urban,
            'target_forest' => $this->target_forest,
            'medicine_base' => $this->medicine_base,
            'medicine_spec' => $this->medicine_spec,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'tg', $this->tg])
            ->andFilterWhere(['like', 'call', $this->call])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'auto_number', $this->auto_number])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'coordinate', $this->coordinate])
            ->andFilterWhere(['like', 'equipment', $this->equipment]);

        return $dataProvider;
    }
}
