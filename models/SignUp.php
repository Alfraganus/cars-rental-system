<?php
/**
 * Created by PhpStorm.
 * User: Farhodjon
 * Date: 30.05.2018
 * Time: 0:07
 */

namespace app\models;


class SignUp extends \mdm\admin\models\form\Signup
{
    public $confirm_password;
    public $i_agree = true;

    public function rules()
    {
        $rules = parent::rules();
        $rules[] = ['confirm_password', 'compare', 'compareAttribute' => 'password'];
        $rules[] = ['confirm_password', 'required'];
        $rules[] = ['i_agree', 'boolean'];
        $rules[] = ['i_agree', 'required'];
        return $rules;
    }

    public function attributeLabels()
    {
        return [
            'i_agree' => 'By creating an account, you agree the terms and conditions',
        ];
    }
}