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

    public function contact($email='futureinventor@umail.uz', $secondEmail = 'futureinventor@umail.uz')
    {


        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom(['info@rentalcarsnow.cz' => $this->name])
                ->setSubject($this->subject)
                ->setTextBody('email')
                ->send();

            Yii::$app->mailer->compose()
                ->setTo($secondEmail)
                    ->setFrom(['info@rentalcarsnow.cz' => $this->name])
                ->setSubject($this->subject)
                  ->setTextBody('email')
                ->send();

            return true;
        }
        return false;
    }


    public function sendTestMail () {
        $to = "user.email@example.com" ;
        $subject = "=? UTF-8? B?" . base64_encode ( "Test Letter" ) . "? =" ;
        // use view as the message body
        $message = Yii::$app->controller->renderPartial( "car/test" ,
            array (
                "userName" => "User" ,
                "addVal" => "Additional important information" ),
            true );
        $headers = "MIME-Version: 1.0 \ r \ n" ;
        $headers = "Content-type: text / html; charset = utf-8 \ r \ n" ;
        $headers = "From: robot <robot@example.com> \ r \ n" ;
        return mail ($to , $subject , $message , $headers );
    }

    // ...

}
