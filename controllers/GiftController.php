<?php

namespace app\controllers;

use app\models\Users;
use app\models\UsersSearch;
use app\models\Compare;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;



/**
 * UsersController implements the CRUD actions for Users model.
 */
class GiftController extends Controller
{
  
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
   
         return [
   
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                   'delete' => ['POST'],
               ],
            ],
        ];
    }

    /**
     * Lists all Users models.
     *
     * @return string
     */
   
     public function actionLogin()
     {
      
        $model1 = new Compare;

        $model1->load(\Yii::$app->request->post());
        
        if ($model1->validate()) {
         if('Viraj' === $model1->username && 'Singh' === $model1->password){
         return $this->redem();
          }  
          if('Viraj' !== $model1->username || 'Singh' !== $model1->password){
            echo'nope';

          }           
             }
else{
    return $this->render('login', ['model1' => $model1]);

}    
    
     }

     public function redem(){
echo "fuck";
     }
   
}