<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Profiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User Profile', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ID',
            //'Profile_Picture',
            'Full_Name',
            'Gender',
            'Email:email',
            // 'Years_Of_Experience',
            // 'Date_Of_Birth',
            // 'Industry',
            // 'Location',
            // 'About_Me',
            // 'Professional_Title',
            // 'Carrer_Level',
            // 'Communication_Level',
            // 'Organizational_Level',
            // 'Job_Related_Level',
            // 'Address',
            // 'Phone_Number',
            // 'Website',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
