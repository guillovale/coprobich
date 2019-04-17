<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_comunidad".
 *
 * @property int $id
 * @property int $id_parroquia
 * @property string $detalle
 *
 * @property TblParroquia $parroquia
 * @property TblPersona[] $tblPersonas
 */
class Comunidad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_comunidad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_parroquia', 'detalle'], 'required'],
            [['id_parroquia'], 'integer'],
            [['detalle'], 'string', 'max' => 100],
            [['detalle'], 'unique'],
            [['id_parroquia'], 'exist', 'skipOnError' => true, 'targetClass' => Parroquia::className(), 'targetAttribute' => ['id_parroquia' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_parroquia' => 'Id Parroquia',
            'detalle' => 'Detalle',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParroquia()
    {
        return $this->hasOne(Parroquia::className(), ['id' => 'id_parroquia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['id_comunidad' => 'id']);
    }
}
