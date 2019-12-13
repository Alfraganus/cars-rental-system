<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @param string $secondEmail
     * @return bool whether the model passes validation
     */
    public function contact($email='info@rentalcarsnow.cz', $secondEmail = 'msganiyev@gmail.com')
    {

        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom(['info@rentalcarsnow.cz' => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body.' '.' from '. $this->email)
                ->send();

            Yii::$app->mailer->compose()
                ->setTo($secondEmail)
                    ->setFrom(['info@rentalcarsnow.cz' => $this->name])
                ->setSubject($this->subject)
                  ->setTextBody($this->body.' '.' from '. $this->email)
                ->send();

            return true;
        }
        return false;
    }
}
