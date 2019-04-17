<?php

namespace app\controllers;

use Yii;
use app\models\Comercio;
use app\models\ComercioSearch;
use app\models\Socio;
use app\models\Producto;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * ComercioController implements the CRUD actions for Comercio model.
 */
class ComercioController extends Controller
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
     * Lists all Comercio models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ComercioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Comercio model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Comercio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Comercio();
		$producto = ArrayHelper::map(Producto::find()
				->orderBy(['detalle' => SORT_ASC])
				->all(), 'id', 'detalle');
	
		$this->view->params['producto'] = $producto;
		
		$socio = ArrayHelper::map(Socio::find()
				->select(['tbl_socio.id','concat(tbl_persona.apellido, " ", tbl_persona.nombre) as nombre'])
				->joinWith('persona')
				#->orderBy(['detalle' => SORT_ASC])
				->all(), 'id', 'nombre');
	
		$this->view->params['socio'] = $socio;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Comercio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$producto = ArrayHelper::map(Producto::find()
				->orderBy(['detalle' => SORT_ASC])
				->all(), 'id', 'detalle');
	
		$this->view->params['producto'] = $producto;
		
		$socio = ArrayHelper::map(Socio::find()
				->select(['tbl_socio.id','concat(tbl_persona.apellido, " ", tbl_persona.nombre) as nombre'])
				->joinWith('persona')
				#->orderBy(['detalle' => SORT_ASC])
				->all(), 'id', 'nombre');
	
		$this->view->params['socio'] = $socio;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Comercio model.
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
     * Finds the Comercio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Comercio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Comercio::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
