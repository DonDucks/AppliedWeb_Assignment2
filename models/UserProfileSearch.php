<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserProfile;

/**
 * UserProfileSearch represents the model behind the search form about `app\models\UserProfile`.
 */
class UserProfileSearch extends UserProfile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID'], 'integer'],
            [['Profile_Picture', 'Full_Name', 'Gender', 'Email', 'Years_Of_Experience', 'Date_Of_Birth', 'Industry', 'Location', 'About_Me', 'Professional_Title', 'Carrer_Level', 'Communication_Level', 'Organizational_Level', 'Job_Related_Level', 'Address', 'Phone_Number', 'Website'], 'safe'],
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
        $query = UserProfile::find();

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
            'ID' => $this->ID,
            'Date_Of_Birth' => $this->Date_Of_Birth,
        ]);

        $query->andFilterWhere(['like', 'Profile_Picture', $this->Profile_Picture])
            ->andFilterWhere(['like', 'Full_Name', $this->Full_Name])
            ->andFilterWhere(['like', 'Gender', $this->Gender])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'Years_Of_Experience', $this->Years_Of_Experience])
            ->andFilterWhere(['like', 'Industry', $this->Industry])
            ->andFilterWhere(['like', 'Location', $this->Location])
            ->andFilterWhere(['like', 'About_Me', $this->About_Me])
            ->andFilterWhere(['like', 'Professional_Title', $this->Professional_Title])
            ->andFilterWhere(['like', 'Carrer_Level', $this->Carrer_Level])
            ->andFilterWhere(['like', 'Communication_Level', $this->Communication_Level])
            ->andFilterWhere(['like', 'Organizational_Level', $this->Organizational_Level])
            ->andFilterWhere(['like', 'Job_Related_Level', $this->Job_Related_Level])
            ->andFilterWhere(['like', 'Address', $this->Address])
            ->andFilterWhere(['like', 'Phone_Number', $this->Phone_Number])
            ->andFilterWhere(['like', 'Website', $this->Website]);

        return $dataProvider;
    }
}
