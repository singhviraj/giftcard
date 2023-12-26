<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class Compare extends Model
{
    public $username;
    public $password;
    public $redeemcode;
    


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password','redeemcode'], 'required'],
            
            
            
        ];
    }

    public function api(){
        $img= "https://etesting.space/wp-json/wc-pimwick/v1/pw-gift-cards";

        $curl = curl_init($img);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // 2. Set the CURLOPT_POST option to true for POST request
        
        
        $response = curl_exec($curl);
        $data = json_decode($response);
        $x = $data->code;
        $y = $data->message;
        
        
        return [$x, $y];
    }

   
}
