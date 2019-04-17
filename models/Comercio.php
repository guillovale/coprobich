<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_comercio".
 *
 * @property int $id
 * @property int $id_socio
 * @property int $id_producto
 * @property int $extension
 * @property int $estimado
 * @property string $observacion
 *
 * @property TblProducto $producto
 * @property TblSocio $socio
 */
class Comercio extends \yii\db\ActiveRecord
{

	public $codigo_socio;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_comercio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_socio', 'id_producto'], 'required'],
            [['id_socio', 'id_producto', 'extension', 'estimado'], 'integer'],
            [['observacion'], 'string', 'max' => 100],
            [['id_producto'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['id_producto' => 'id']],
            [['id_socio'], 'exist', 'skipOnError' => true, 'targetClass' => Socio::className(), 'targetAttribute' => ['id_socio' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_socio' => 'Id Socio',
            'id_producto' => 'Id Producto',
            'extension' => 'Extensión',
            'estimado' => 'Estimado',
            'observacion' => 'Observación',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Producto::className(), ['id' => 'id_producto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocio()
    {
        return $this->hasOne(Socio::className(), ['id' => 'id_socio']);
    }
}
