<?php

namespace app\controllers;

use yii\rest\ActiveController;

class EmployeeController extends ActiveController
{
    public $modelClass = 'app\models\Employee';

   

public function actionList()
{
$employee = Employee::find()->all();
if(count($employee) > 0 )
{
$response = Yii::$app->response;
$response->format = \yii\web\Response::FORMAT_JSON;
Yii::$app->response->statusCode = 200;
$response->data = $employee;
return $response;
}
else
{
$response = Yii::$app->response;
$response->format = \yii\web\Response::FORMAT_JSON;
Yii::$app->response->statusCode = 404;
$response->data =  = ['message' => 'Nothing was found'];
return $response;
}
}

public function actionView()
{

 \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;

$employee = Employee::model()->findByPk($_GET['id']);

if(count($employee) > 0 )
{
$response = Yii::$app->response;
$response->format = \yii\web\Response::FORMAT_JSON;
Yii::$app->response->statusCode = 200;
$response->data = $employee;
return $response;
}
else
{
$response = Yii::$app->response;
$response->format = \yii\web\Response::FORMAT_JSON;
Yii::$app->response->statusCode = 404;
$response->data =  = ['message' => 'Nothing was found'];
return $response;
}
}

public function actionCreate()
{
      
      \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
      $employee = new Employee();
      $employee->scenario = Employee:: SCENARIO_CREATE;
      $employee->attributes = \yii::$app->request->post();
      if($employee->validate())
      {
       $employee->save();
       $response = Yii::$app->response;
       $response->format = \yii\web\Response::FORMAT_JSON;
       Yii::$app->response->statusCode = 200;
       $response->data =  = ['message' => 'New record is successfully added'];
       return $response;
      }
      else
      {
       $response = Yii::$app->response;
       $response->format = \yii\web\Response::FORMAT_JSON;
       Yii::$app->response->statusCode = 500;
       $response->data =  = ['message' => 'Error happened during creation record'];
       return $response;   
      }

}


public function actionUpdate()
{
         \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;     
         $attributes = \yii::$app->request->post();
       
         $employee = Employee::find()->where(['ID' => $attributes['id'] ])->one();
          if(count($employee) > 0 )
          {
           $employee->attributes = \yii::$app->request->post();
           $employee->save();
           $response = Yii::$app->response;
           $response->format = \yii\web\Response::FORMAT_JSON;
          Yii::$app->response->statusCode = 200;
          $response->data =  = ['message' => 'Data record is updated successfully '];
          return $response;
          }
         else
        {
        $response = Yii::$app->response;
       $response->format = \yii\web\Response::FORMAT_JSON;
       Yii::$app->response->statusCode = 500;
       $response->data =  = ['message' => 'Error happened during creation record'];
       return $response;   
        }
   
     
    public function actionDelete($id)
    {
          $this->Employee::find()->where(['ID' => $attributes['id'] ])->delete();
           $response = Yii::$app->response;
           $response->format = \yii\web\Response::FORMAT_JSON;
          Yii::$app->response->statusCode = 200;
          $response->data =  = ['message' => 'Data record was deleted successfully'];
          return $response;
    }



   }