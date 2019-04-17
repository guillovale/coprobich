<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_categoria".
 *
 * @property int $id
 * @property string $detalle
 *
 * @property TblProducto[] $tblProductos
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_categoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['detalle'], 'required'],
            [['detalle'], 'string', 'max' => 100],
            [['detalle'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'detalle' => 'Detalle',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblProductos()
    {
        return $this->hasMany(Producto::className(), ['id_categoria' => 'id']);
    }
}
