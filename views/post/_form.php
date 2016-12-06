<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserProfile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-profile-form">

    
<!--
<?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'Profile_Picture')->textInput(['maxlength' => true]) ?>
-->
    
    
    
    
 <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

<?= $form->field($model, 'file')->fileInput() ?>
    
<?php 
if ($model->Profile_Picture){
    echo '<div class="im" style="padding-left:12em;">';
    echo '<img src="'.\Yii::$app->request->BaseUrl.'/'.$model->Profile_Picture.'" width="90px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    echo Html::a('Delete Profile Picture', ['erase', 'id'=>$model->ID], ['class'=>'btn btn-danger']).'</br>';
    echo '</div>';
}
?>


<?= $form->field($model, 'Full_Name')->textInput(['maxlength' => true]) ?>
    
<?php $a= ['Male' => 'Male','Female' => 'Female',]; echo $form->field($model, 'Gender',['horizontalCssClasses' => ['wrapper' => 'col-sm-2', ]])->dropDownList($a,['prompt'=>'Select Option']);
?>

<!--    <?= $form->field($model, 'Gender')->textInput(['maxlength' => true]) ?>-->
    
    <?= $form->field($model, 'Email', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
     ])->textInput()->input('Email', ['placeholder' => "Enter Your Email"])->label(false); ?>

<!--    <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>-->
    
    
    
  <?php $a= ['2 - 5 Years' => '2 - 5 Years','5 - 10 Years' => '5 - 10 Years',]; echo $form->field($model, 'Years_Of_Experience',['horizontalCssClasses' => ['wrapper' => 'col-sm-2', ]])->dropDownList($a,['prompt'=>'Select Option']);
?> 

<!--    <?= $form->field($model, 'Years_Of_Experience')->textInput(['maxlength' => true]) ?>-->
    
    
<?= $form->field($model, 'Date_Of_Birth')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd', 'options' => ['class' => 'form-control']]) ?>

<!--    <?= $form->field($model, 'Date_Of_Birth')->textInput() ?>-->
    
    
<?php $a= ['Famring' => 'Farming','Nursing' => 'Nursing','Engineer' => 'Engineer',]; echo $form->field($model, 'Industry',['horizontalCssClasses' => ['wrapper' => 'col-sm-2', ]])->dropDownList($a,['prompt'=>'Select Option']);
?>     
        

<!--    <?= $form->field($model, 'Industry')->textInput(['maxlength' => true]) ?>-->

    <?= $form->field($model, 'Location')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'About_Me')->textarea(['rows' => 6]) ?>

<!--    <?= $form->field($model, 'About_Me')->textInput(['maxlength' => true]) ?>-->
    

<?= $form->field($model, 'Professional_Title')->radioList(['BSC'=>'BSC', 'MBA'=>'MBA','DOC'=>'DOC']) ?>
    

<!--    <?= $form->field($model, 'Professional_Title')->textInput(['maxlength' => true]) ?>-->
    
<?php $a= ['5%' => '5%','15%' => '15%','25%' => '25%','35%' => '35%','45%' => '45%','55%' => '55%','65%' => '65%','75%' => '75%','85%' => '85%','95%' => '95%','100%' => '100%',]; echo $form->field($model, 'Carrer_Level',['horizontalCssClasses' => ['wrapper' => 'col-sm-2', ]])->dropDownList($a,['prompt'=>'Select Option']);
?> 

<?php $a= ['5%' => '5%','15%' => '15%','25%' => '25%','35%' => '35%','45%' => '45%','55%' => '55%','65%' => '65%','75%' => '75%','85%' => '85%','95%' => '95%','100%' => '100%',]; echo $form->field($model, 'Communication_Level',['horizontalCssClasses' => ['wrapper' => 'col-sm-2', ]])->dropDownList($a,['prompt'=>'Select Option']);
?> 

<?php $a= ['5%' => '5%','15%' => '15%','25%' => '25%','35%' => '35%','45%' => '45%','55%' => '55%','65%' => '65%','75%' => '75%','85%' => '85%','95%' => '95%','100%' => '100%',]; echo $form->field($model, 'Organizational_Level',['horizontalCssClasses' => ['wrapper' => 'col-sm-2', ]])->dropDownList($a,['prompt'=>'Select Option']);
?> 

<?php $a= ['5%' => '5%','15%' => '15%','25%' => '25%','35%' => '35%','45%' => '45%','55%' => '55%','65%' => '65%','75%' => '75%','85%' => '85%','95%' => '95%','100%' => '100%',]; echo $form->field($model, 'Job_Related_Level',['horizontalCssClasses' => ['wrapper' => 'col-sm-2', ]])->dropDownList($a,['prompt'=>'Select Option']);
?>   

<!--
    <?= $form->field($model, 'Carrer_Level')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Communication_Level')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Organizational_Level')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Job_Related_Level')->textInput(['maxlength' => true]) ?>
-->
    
    <?= $form->field($model, 'Address')->textarea(['rows' => 2]) ?>

<!--    <?= $form->field($model, 'Address')->textInput(['maxlength' => true]) ?>-->
    
<?= $form->field($model, 'Phone_Number', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']])->textInput()->input('Phone_Number', ['placeholder' => "876-000-0000"])->label(false); ?>


<!--    <?= $form->field($model, 'Phone_Number')->textInput(['maxlength' => true]) ?>-->
    
<?= $form->field($model, 'Website', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']])->textInput()->input('Website', ['placeholder' => "www.mysite.com"])->label(false); ?>


<!--    <?= $form->field($model, 'Website')->textInput(['maxlength' => true]) ?>-->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
