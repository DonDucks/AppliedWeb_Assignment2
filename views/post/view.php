<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserProfile */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'User Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget(['model' => $model,'options'=>['class' => 'table table-striped table-bordered detail-view'],'attributes'=>
        [
            
[
    'attribute'=>'Profile_Picture',
    'value'=>$model->Profile_Picture,
    'format' => ['image',['width'=>'100','height'=>'100']],
],
            'ID',
            'Full_Name',
            'Gender',
            'Email:email',
            'Years_Of_Experience',
            'Date_Of_Birth',
            'Industry',
            'Location',
            'About_Me',
            'Professional_Title',
            'Carrer_Level',
            'Communication_Level',
            'Organizational_Level',
            'Job_Related_Level',
            'Address',
            'Phone_Number',
            'Website',
        ],
    ]) ?>

</div>
