<?php

namespace app\controllers;

use Yii;
use app\models\Pelicula;
use app\models\PeliculaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PeliculaController implements the CRUD actions for Pelicula model.
 */
class PeliculaController extends Controller
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
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index','create', 'update','delete'],
                'rules' => [
                    // deny all POST requests
                    [
                        'allow' => true,
                        'verbs' => ['POST']
                    ],
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // everything else is denied
                ],
            ],
        ];
    }

    /**
     * Lists all Pelicula models.
     * @return mixed
     */
    public function actionIndex($Director_idDirector=null)
    {   $temp = Yii::$app->getRequest()->getQueryParam('idp');
        $searchModel = new PeliculaSearch();
        if($Director_idDirector==null){
			$searchModel->Director_idDirector = $temp;
		}
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single Pelicula model.
     * @param integer $idPelicula
     * @param integer $Director_idDirector
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idPelicula, $Director_idDirector)
    {
        return $this->render('view', [
            'model' => $this->findModel($idPelicula, $Director_idDirector),
        ]);
    }

    /**
     * Creates a new Pelicula model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($temp=null)
    {   
        $model = new Pelicula();
        $model-> Director_idDirector = $temp;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idPelicula' => $model->idPelicula, 'Director_idDirector' => $model->Director_idDirector]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pelicula model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idPelicula
     * @param integer $Director_idDirector
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idPelicula, $Director_idDirector)
    {
        $model = $this->findModel($idPelicula, $Director_idDirector);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idPelicula' => $model->idPelicula, 'Director_idDirector' => $model->Director_idDirector]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pelicula model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idPelicula
     * @param integer $Director_idDirector
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idPelicula, $Director_idDirector)
    {
        $this->findModel($idPelicula, $Director_idDirector)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pelicula model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idPelicula
     * @param integer $Director_idDirector
     * @return Pelicula the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idPelicula, $Director_idDirector)
    {
        if (($model = Pelicula::findOne(['idPelicula' => $idPelicula, 'Director_idDirector' => $Director_idDirector])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
