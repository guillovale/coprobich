<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_parroquia".
 *
 * @property int $id
 * @property int $id_canton
 * @property string $detalle
 *
 * @property TblComunidad[] $tblComunidads
 * @property TblCanton $canton
 */
class Parroquia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_parroquia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_canton', 'detalle'], 'required'],
            [['id_canton'], 'integer'],
            [['detalle'], 'string', 'max' => 100],
            [['detalle'], 'unique'],
            [['id_canton'], 'exist', 'skipOnError' => true, 'targetClass' => Canton::className(), 'targetAttribute' => ['id_canton' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_canton' => 'Id Canton',
            'detalle' => 'Detalle',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComunidades()
    {
        return $this->hasMany(Comunidad::className(), ['id_parroquia' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCanton()
    {
        return $this->hasOne(Canton::className(), ['id' => 'id_canton']);
    }
}
