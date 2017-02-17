<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Receita;
use frontend\models\Categoria;
use frontend\models\Situacao;
use frontend\models\ReceitaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * ReceitaController implements the CRUD actions for Receita model.
 */
class ReceitaController extends Controller
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
     * Lists all Receita models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReceitaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Receita model.
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
     * Creates a new Receita model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Receita();

        $model->user_id = Yii::$app->user->id;
        $model->data_cadastro = date('Y-m-d H:i');

        $categoria = Categoria::find()->orderBy('nome')->all();
        $categoria = ArrayHelper::map($categoria, 'id', 'nome');


        $situacao = Situacao::find()->orderBy('nome')->all();
        $situacao = ArrayHelper::map($situacao, 'id', 'nome');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'categoria' => $categoria,
                'situacao' => $situacao,
            ]);
        }
    }

    /**
     * Updates an existing Receita model.
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
                'categoria' => $categoria,
                'situacao' => $situacao,
            ]);
        }
    }

    /**
     * Deletes an existing Receita model.
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
     * Finds the Receita model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Receita the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Receita::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
