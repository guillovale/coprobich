<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_socio".
 *
 * @property int $id
 * @property int $id_persona
 * @property string $codigo
 * @property string $fecha
 * @property string $observacion
 *
 * @property TblComercio[] $tblComercios
 * @property TblOrdencompra[] $tblOrdencompras
 * @property TblPersona $persona
 */
class Socio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

	public $nombre;

    public static function tableName()
    {
        return 'tbl_socio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_persona', 'codigo'], 'required'],
            [['id_persona', 'estado'], 'integer'],
            [['fecha'], 'safe'],
            [['codigo'], 'string', 'max' => 20],
            [['observacion'], 'string', 'max' => 100],
            [['codigo'], 'unique'],
            [['id_persona'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['id_persona' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_persona' => 'Id Persona',
            'codigo' => 'Código',
            'fecha' => 'Fecha',
            'observacion' => 'Observación',
			'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComercios()
    {
        return $this->hasMany(Comercio::className(), ['id_socio' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdencompras()
    {
        return $this->hasMany(Ordencompra::className(), ['id_socio' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersona()
    {
        return $this->hasOne(Persona::className(), ['id' => 'id_persona']);
    }
	
	public function getNombrePersona()
    {
		$nombre_completo = '';
		$model = $this->getPersona();
		if ($model)
		{
			$nombre_completo = $model->one()->apellido . ' ' . $model->one()->nombre;

		}
        return $nombre_completo;
    }
}
