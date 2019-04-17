<?php

namespace app\controllers;

use Yii;
use app\models\Persona;
use app\models\PersonaSearch;
use app\models\Provincia;
use app\models\Canton;
use app\models\Parroquia;
use app\models\Comunidad;
use app\models\Socio;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * PersonaController implements the CRUD actions for Persona model.
 */
class PersonaController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Persona models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Persona model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
		$model = $this->findModel($id);
		if (isset($model->socio))
		{
			$model_socio = $model->socio;
		}
		else
		{
			$model_socio = new Socio();
			$model_socio->id_persona = $model->id;
			$model_socio->fecha = date("Y-m-d");
			$model_socio->estado = 1;
		}
		if ($model_socio->load(Yii::$app->request->post()))
		{
			$model_socio->save();
		}
		return $this->render('view', [
		    'model' => $model,
			'model_socio' => $model_socio,
		]);
    }

    /**
     * Creates a new Persona model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Persona();
		$provincia = ArrayHelper::map(Provincia::find()
				->orderBy(['detalle' => SORT_ASC])
				->all(), 'id', 'detalle');
		$canton = ArrayHelper::map(Canton::find()
				->orderBy(['detalle' => SORT_ASC])
				->all(), 'id', 'detalle');
		$parroquia = ArrayHelper::map(Parroquia::find()
				->orderBy(['detalle' => SORT_ASC])
				->all(), 'id', 'detalle');

		$comunidad = ArrayHelper::map(Comunidad::find()
				->orderBy(['detalle' => SORT_ASC])
				->all(), 'id', 'detalle');
	
		$this->view->params['provincia'] = $provincia;
		$this->view->params['canton'] = $canton;
		$this->view->params['parroquia'] = $parroquia;	
		$this->view->params['comunidad'] = $comunidad;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Persona model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$provincia = ArrayHelper::map(Provincia::find()
				->orderBy(['detalle' => SORT_ASC])
				->all(), 'id', 'detalle');
		$canton = ArrayHelper::map(Canton::find()
				->orderBy(['detalle' => SORT_ASC])
				->all(), 'id', 'detalle');
		$parroquia = ArrayHelper::map(Parroquia::find()
				->orderBy(['detalle' => SORT_ASC])
				->all(), 'id', 'detalle');

		$comunidad = ArrayHelper::map(Comunidad::find()
				->orderBy(['detalle' => SORT_ASC])
				->all(), 'id', 'detalle');
	
		$this->view->params['provincia'] = $provincia;
		$this->view->params['canton'] = $canton;
		$this->view->params['parroquia'] = $parroquia;	
		$this->view->params['comunidad'] = $comunidad;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Persona model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Persona model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Persona the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Persona::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
