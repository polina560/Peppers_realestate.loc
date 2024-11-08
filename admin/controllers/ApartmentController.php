<?php

namespace admin\controllers;

use common\models\Apartment;
use common\models\ApartmentSearch;
use common\models\Room;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use Yii2\Extensions\DynamicForm\Models\Model;

/**
 * ApartmentController implements the CRUD actions for Apartment model.
 */
class ApartmentController extends Controller
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
     * Lists all Apartment models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ApartmentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Apartment model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionRooms($id)
    {

        $apartment = $this->findModel($id);
        $dataProvider = new ActiveDataProvider([
            'query' => Room::find()->where(['id_apartment' => $id]),

        ]);


        return $this->render('rooms', [
            'apartment' => $apartment,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Creates a new Apartment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Apartment();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

//        $modelCustomer = new Apartment();
//        $modelsAddress = [new Room()];
//        if ($modelCustomer->load(Yii::$app->request->post())) {
//
//            $modelsAddress = Model::createMultiple(Address::classname());
//            Model::loadMultiple($modelsAddress, Yii::$app->request->post());
//
//
//            // validate all models
//            $valid = $modelCustomer->validate();
//            $valid = Model::validateMultiple($modelsAddress) && $valid;
//
//            if ($valid) {
//                $transaction = \Yii::$app->db->beginTransaction();
//                try {
//                    if ($flag = $modelCustomer->save(false)) {
//                        foreach ($modelsAddress as $modelAddress) {
//                            $modelAddress->customer_id = $modelCustomer->id;
//                            if (! ($flag = $modelAddress->save(false))) {
//                                $transaction->rollBack();
//                                break;
//                            }
//                        }
//                    }
//                    if ($flag) {
//                        $transaction->commit();
//                        return $this->redirect(['view', 'id' => $modelCustomer->id]);
//                    }
//                } catch (Exception $e) {
//                    $transaction->rollBack();
//                }
//            }
//        }
//
//        return $this->render('create', [
//            'modelApartment' => $modelCustomer,
//            'modelsRoom' => (empty($modelsAddress)) ? [new Address] : $modelsAddress
//        ]);
//
//
//return $this->render('create', [
//            'model' => $model,
//        ]);
    }

    /**
     * Updates an existing Apartment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);

//    $modelsAddress = $modelCustomer->addresses;
//
//    // primary key of $modelsAddress
//    $pkey = 'id';
//
//    if ($modelCustomer->load(Yii::$app->request->post())) {
//
//        $oldIDs = ArrayHelper::map($modelsAddress, $pkey, $pkey);
//        $modelsAddress = Model::createMultiple(Address::classname(), $modelsAddress, $pkey);
//        Model::loadMultiple($modelsAddress, Yii::$app->request->post());
//        $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsAddress, $pkey, $pkey)));
//
//
//        // validate all models
//        $valid = $modelCustomer->validate();
//        $valid = Model::validateMultiple($modelsAddress) && $valid;
//
//        if ($valid) {
//            $transaction = \Yii::$app->db->beginTransaction();
//            try {
//                if ($flag = $modelCustomer->save(false)) {
//                    if (! empty($deletedIDs)) {
//                        Address::deleteAll([$pkey => $deletedIDs]);
//                    }
//                    foreach ($modelsAddress as $modelAddress) {
//                        $modelAddress->customer_id = $modelCustomer->id;
//                        if (! ($flag = $modelAddress->save(false))) {
//                            $transaction->rollBack();
//                            break;
//                        }
//                    }
//                }
//                if ($flag) {
//                    $transaction->commit();
//                    return $this->redirect(['view', 'id' => $modelCustomer->id]);
//                }
//            } catch (Exception $e) {
//                $transaction->rollBack();
//            }
//        }
//    }
//
//    return $this->render('update', [
//        'modelCustomer' => $modelCustomer,
//        'modelsAddress' => (empty($modelsAddress)) ? [new Address] : $modelsAddress
//    ]);
}


    /**
     * Deletes an existing Apartment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Apartment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Apartment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Apartment::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
