<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userprofile".
 *
 * @property integer $ID
 * @property string $Profile_Picture
 * @property string $Full_Name
 * @property string $Gender
 * @property string $Email
 * @property string $Years_Of_Experience
 * @property string $Date_Of_Birth
 * @property string $Industry
 * @property string $Location
 * @property string $About_Me
 * @property string $Professional_Title
 * @property string $Carrer_Level
 * @property string $Communication_Level
 * @property string $Organizational_Level
 * @property string $Job_Related_Level
 * @property string $Address
 * @property string $Phone_Number
 * @property string $Website
 */
class Userprofile extends \yii\db\ActiveRecord
{
     public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'userprofile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Profile_Picture', 'Full_Name', 'Gender', 'Email', 'Years_Of_Experience', 'Date_Of_Birth', 'Industry', 'Location', 'About_Me', 'Professional_Title', 'Carrer_Level', 'Communication_Level', 'Organizational_Level', 'Job_Related_Level', 'Address', 'Phone_Number', 'Website'], 'required'],
            [['Date_Of_Birth'], 'safe'],
            [['Profile_Picture', 'Email', 'About_Me'], 'string', 'max' => 150],
            [['Full_Name', 'Gender', 'Years_Of_Experience', 'Industry', 'Location', 'Professional_Title', 'Carrer_Level', 'Communication_Level', 'Organizational_Level', 'Job_Related_Level', 'Address', 'Phone_Number', 'Website'], 'string', 'max' => 50],
            [['file'], 'safe'],
            [['file'], 'file', 'extensions'=>'jpg, gif, png'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
           'file' => 'Profile  Picture',
//          'Profile_Picture' => 'Profile  Picture',
            'Full_Name' => 'Full  Name',
            'Gender' => 'Gender',
            'Email' => 'Email',
            'Years_Of_Experience' => 'Years  Of  Experience',
            'Date_Of_Birth' => 'Date  Of  Birth',
            'Industry' => 'Industry',
            'Location' => 'Location',
            'About_Me' => 'About  Me',
            'Professional_Title' => 'Professional  Title',
            'Carrer_Level' => 'Carrer  Level',
            'Communication_Level' => 'Communication  Level',
            'Organizational_Level' => 'Organizational  Level',
            'Job_Related_Level' => 'Job  Related  Level',
            'Address' => 'Address',
            'Phone_Number' => 'Phone  Number',
            'Website' => 'Website',
        ];
    }
}
