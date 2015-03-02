<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "applicant".
 *
 * @property string $id
 * @property string $firstname
 * @property string $lastname
 * @property string $school_name
 * @property string $position
 * @property string $phone
 * @property string $email
 * @property string $created_at
 * @property string $updated_at
 */
class Applicant extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'applicant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname', 'school_name', 'created_at', 'updated_at'], 'required', 'on' => ['create', 'update']],
            [['created_at', 'updated_at'], 'safe'],
            [['firstname', 'lastname'], 'string', 'max' => 60],
            [['position', 'email'], 'string', 'max' => 100],
            [['school_name', 'firstname', 'lastname', 'position', 'email', 'phone'], 'trim'],
            ['firstname','filter','filter' => function($value){return trim($value);}],
            ['firstname','match','pattern' => '/[0-9\'\/~`\!@#\$%\^&\*_\-\+=\s\{\}\[\]\|;:"\<\>,\.\?\\\]/','not' => true,'message'=>'ชื่อต้องประกอบด้วยตัวอักษรเท่านั้น และต้องไม่มีช่องว่างภายในชื่อ'],
            ['lastname','match','pattern' => '/[0-9\'\/~`\!@#\$%\^&\*_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/','not' => true, 'message' => 'นามสกุลต้องประกอบด้วยตัวอักษรเท่านั้น'],
            ['school_name','match','pattern' => '/[\'\/~`\!@#\$%\^&\*_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/','not' => true,'message' => 'ชื่อโรงเรียนต้องประกอบด้วยตัวอักษรเท่านั้น โดยอาจมีช่องว่างหรือตัวเลขร่วมด้วยก็ได้' ],
            
//            ['firstname', 'filter', 'filter' => function($value) {
////                    $num = preg_match('/[0-9]\s/', $value);
//                    $value = trim($value);
////                    $num = ctype_alpha($value);
//                     $num = preg_match('/[0-9\'\/~`\!@#\$%\^&\*_\-\+=\s\{\}\[\]\|;:"\<\>,\.\?\\\]/', $value);
//                    if ($num===1)
//                    {
//                        $this->addError('firstname', 'ชื่อต้องประกอบด้วยตัวอักษรเท่านั้น และต้องไม่มีช่องว่างภายในชื่อ');
//                    }
//                    return $value;
//                }, 'skipOnEmpty' => false, 'skipOnError' => false],
//            ['lastname', 'filter', 'filter' => function($value) {
////                    $value = trim($value);
////                    $num = ctype_alpha($value);
//                    $value = trim($value);
//                    $num = preg_match('/[0-9\'\/~`\!@#\$%\^&\*_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $value);
//                    if ($num===1)
//                    {
//                        $this->addError('lastname', 'นามสกุลต้องประกอบด้วยตัวอักษรเท่านั้น');
//                    }   
//
//                        return $value;
//                    
//                }, 'skipOnEmpty' => true, 'skipOnError' => false],
//            ['school_name', 'filter', 'filter' => function($value) {
//                    $value = trim($value);
//                    $num = preg_match('/[\'\/~`\!@#\$%\^&\*_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $value);
//                    if (($num===1))
//                    {
//                        $this->addError('school_name', 'ชื่อโรงเรียนต้องประกอบด้วยตัวอักษรเท่านั้น โดยอาจมีช่องว่างหรือตัวเลขร่วมด้วยก็ได้');
//                    }   
//
//                        return $value;
//                    
//                }, 'skipOnEmpty' => true, 'skipOnError' => false],
//            [['phone'], 'string', 'max' => 10],
//            [['phone'], 'string', 'min' => 9],
            [['firstname', 'lastname'], 'unique', 'targetAttribute' => ['firstname', 'lastname'], 'message' => 'ท่านไม่สามารถลงทะเบียนซ้ำได้อีก หากต้องการแก้ไขข้อมูลโปรดติดต่อที่อาจารย์ธีรศิลป์ กันธา โทร. 081-111-8176'],
            [['phone'], 'string', 'length' => [9, 10], 'on' => ['create', 'update']],
            //[['phone'],'validatePhone'],
//            ['phone','string','whenClient' => "function (attribute,value) { $('#applicant-phone').val(value.replace(/_/g,''));alert($('#applicant-phone').val());}"
//            ],
            [['email'], 'email'],
            [['lastname', 'position', 'phone', 'email'], 'default'],
            [['phone'], 'trim'],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'school_name' => 'School Name',
            'position' => 'Position',
            'phone' => 'Phone',
            'email' => 'Email',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

}
