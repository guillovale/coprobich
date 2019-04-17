<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_producto".
 *
 * @property int $id
 * @property int $id_categoria
 * @property string $detalle
 * @property string $observacion
 *
 * @property TblComercio[] $tblComercios
 * @property TblInventario $tblInventario
 * @property TblOrdencompra[] $tblOrdencompras
 * @property TblCategoria $categoria
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_producto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_categoria'], 'integer'],
            [['detalle'], 'required'],
            [['detalle', 'observacion'], 'string', 'max' => 100],
            [['detalle'], 'unique'],
            [['id_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['id_categoria' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_categoria' => 'Id Categoría',
            'detalle' => 'Detalle',
            'observacion' => 'Observación',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComercios()
    {
        return $this->hasMany(Comercio::className(), ['id_producto' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventario()
    {
        return $this->hasOne(Inventario::className(), ['id_producto' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdencompras()
    {
        return $this->hasMany(Ordencompra::className(), ['id_producto' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'id_categoria']);
    }
}
