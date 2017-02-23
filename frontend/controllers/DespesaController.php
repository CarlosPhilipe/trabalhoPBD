<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Despesa;
use frontend\models\Situacao;
use frontend\models\Categoria;
use frontend\models\DespesaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * DespesaController implements the CRUD actions for Despesa model.
 */
class DespesaController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Despesa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DespesaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Despesa model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Despesa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Despesa();
        $model->user_id = Yii::$app->user->id;
        $model->data_cadastro = date('Y-m-d H:i');
        $model->tipo = 0; // recebe zero porque é despesa

        $categoria = Categoria::find()->orderBy('nome')->all();
        $categoria = ArrayHelper::map($categoria, 'id', 'nome');


        $situacao = Situacao::find()->orderBy('nome')->all();
        $situacao = ArrayHelper::map($situacao, 'id', 'nome');


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'categoria' =>$categoria,
                'situacao' =>$situacao,

            ]);
        }
    }

    /**
     * Updates an existing Despesa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $categoria = Categoria::find()->orderBy('nome')->all();
        $categoria = ArrayHelper::map($categoria, 'id', 'nome');


        $situacao = Situacao::find()->orderBy('nome')->all();
        $situacao = ArrayHelper::map($situacao, 'id', 'nome');


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'categoria' =>$categoria,
                'situacao' =>$situacao,
            ]);
        }
    }

    /**
     * Deletes an existing Despesa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Despesa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Despesa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Despesa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
