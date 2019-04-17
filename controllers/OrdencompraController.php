<?php

namespace app\controllers;

use Yii;
use app\models\Ordencompra;
use app\models\OrdencompraSearch;
use app\models\Detalleordenc;
use app\models\DetalleordencSearch;
use app\models\Parametro;
use app\models\Producto;
use app\models\Socio;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * OrdencompraController implements the CRUD actions for Ordencompra model.
 */
class OrdencompraController extends Controller
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
     * Lists all Ordencompra models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrdencompraSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ordencompra model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
		$model = $this->findModel($id);
		$searchModel = new DetalleordencSearch();
		$searchModel->id_orden = isset($model->id)?$model->id:null;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
        return $this->render('view', [
            'model' => $model,
			'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Ordencompra model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ordencompra();
		$model->fecha = date("Y-m-d");
		$model->cantidad = 0;
		$detalles = [];
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
		$parametros = Parametro::find()->all();
		for($i = 0; $i < count($parametros); $i++) {
		    $detalles[$i] = new Detalleordenc();
			$detalles[$i]->id_parametro = $parametros[$i]->id;
			$detalles[$i]->puntuacion = $parametros[$i]->ponderacion;
		}

        if ($model->load(Yii::$app->request->post()) ) 
		{
			
			#echo var_dump($detalles); exit;
			
			 if( Detalleordenc::loadMultiple(
					$detalles, Yii::$app->request->post()) && $model->save()  )
			{
				$id_orden = $model->id;
				foreach ($detalles as $detalle) 
				{
					$detalle['id_orden'] = $id_orden;
					$detalle->save();		
				}
				
				return $this->redirect(['view', 'id' => $model->id]);
			}
			#$model->save();		
            
        }

        return $this->render('create', [
            'model' => $model,
			'modeldetalles' => $detalles,
        ]);
    }

    /**
     * Updates an existing Ordencompra model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$detalles = $model->detalleordenc;

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

		if ($model->load(Yii::$app->request->post()) ) 
		{
			$model->save();
		}
			#echo var_dump($detalles); exit;
			
		if( Detalleordenc::loadMultiple($detalles, Yii::$app->request->post()) )
		{
			foreach ($detalles as $detalle) 
			{
				$detalle->save(false);
			}            
        }

		if ($model->load(Yii::$app->request->post()) || 
			Detalleordenc::loadMultiple($detalles, Yii::$app->request->post()) )
		{
			return $this->redirect(['view', 'id' => $model->id]);
		}

        return $this->render('update', [
            'model' => $model,
			'modeldetalles' => $detalles,
        ]);
    }

    /**
     * Deletes an existing Ordencompra model.
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
     * Finds the Ordencompra model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ordencompra the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ordencompra::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
