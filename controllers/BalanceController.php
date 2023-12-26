<?php

namespace app\controllers;

use app\models\Balance;
use app\models\Compare;
use app\models\BalanceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BalanceController implements the CRUD actions for Balance model.
 */
class BalanceController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Balance models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BalanceSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Balance model.
     * @param int $customer_number Customer Number
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($customer_number)
    {

        $model1 = new Compare;

        list($x, $y) = $model1->api();
       

       $model1->load(\Yii::$app->request->post());
       
       if ($model1->validate()) {
        if('Viraj' === $model1->username && 'Singh' === $model1->password  && $x === $model1->redeemcode){
            return $this->render('view', ['model' => $this->findModel($customer_number),]);

       }  
         if('Viraj' !== $model1->username || 'Singh' !== $model1->password || $x != $model1->redeemcode){
           echo $y;

         }           
            }
else{
   return $this->render('loginredeem', ['model1' => $model1]);

}    


//        return $this->render('view', ['model' => $this->findModel($customer_number),]);
    }

    /**
     * Creates a new Balance model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Balance();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'customer_number' => $model->customer_number]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Balance model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $customer_number Customer Number
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($customer_number)
    {
        
       $model = $this->findModel($customer_number);
       $model1 = new Compare;

        //$x = $model1->api();

        list($x, $y) = $model1->api();

       if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
        return $this->render('loginredeem', ['model1' => $model1]);
                //   return $this->redirect(['view', 'customer_number' => $model->customer_number]);
        }

        $model1->load(\Yii::$app->request->post());
       
        if ($model1->validate()) {
         if('Viraj' === $model1->username && 'Singh' === $model1->password  && $x === $model1->redeemcode){
             return $this->render('view', ['model' => $this->findModel($customer_number),]);
 
        }  
          if('Viraj' !== $model1->username || 'Singh' !== $model1->password || $x != $model1->redeemcode){
            echo $y;
 
          }           
             }


else{
        return $this->render('update', ['model' => $model,]);
}
 
        

      // $model = $this->findModel($customer_number);

       //if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
         //   return $this->redirect(['view', 'customer_number' => $model->customer_number]);
        //}

        //return $this->render('update', [
          //  'model' => $model,
        //]);
    }

    /**
     * Deletes an existing Balance model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $customer_number Customer Number
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($customer_number)
    {

        $model1 = new Compare;

        list($x, $y) = $model1->api();
        
 
        $model1->load(\Yii::$app->request->post());
        
        if ($model1->validate()) {
         if('Viraj' === $model1->username && 'Singh' === $model1->password  && $x === $model1->redeemcode){
                     $this->findModel($customer_number)->delete();

        return $this->redirect(['index']);
 
        }  
          if('Viraj' !== $model1->username || 'Singh' !== $model1->password || $x != $model1->redeemcode){
            echo $y;
 
          }           
             }
 else{
    return $this->render('loginredeem', ['model1' => $model1]);
 
 }    


        //$this->findModel($customer_number)->delete();

        //return $this->redirect(['index']);
    }

    /**
     * Finds the Balance model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $customer_number Customer Number
     * @return Balance the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($customer_number)
    {
        if (($model = Balance::findOne(['customer_number' => $customer_number])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }



    
    public function actionLogin()
    {
      
       $model1 = new Compare;

       list($x, $y) = $model1->api();
       

       $model1->load(\Yii::$app->request->post());
       
       if ($model1->validate()) {
        if('Viraj' === $model1->username && 'Singh' === $model1->password  && $x === $model1->redeemcode){
           return $this->redirect(['balance/index']);

       }  
         if('Viraj' !== $model1->username || 'Singh' !== $model1->password || $x != $model1->redeemcode){
           echo $y;

         }           
            }
else{
   return $this->render('loginredeem', ['model1' => $model1]);

}    
   
    }
}
