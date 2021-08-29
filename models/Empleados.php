<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empleados".
 *
 * @property int $id
 * @property string $nombre
 * @property string $email
 * @property string $sexo
 * @property int $area_id
 * @property int $boletin
 * @property string $descripcion
 *
 * @property Areas $area
 * @property EmpleadoRol[] $empleadoRols
 */
class Empleados extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empleados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'email', 'sexo', 'area_id', 'boletin', 'descripcion'], 'required'],
            [['area_id', 'boletin'], 'integer'],
            [['descripcion'], 'string'],
            [['nombre', 'email'], 'string', 'max' => 255],
            [['sexo'], 'string', 'max' => 1],
            [['area_id'], 'exist', 'skipOnError' => true, 'targetClass' => Areas::className(), 'targetAttribute' => ['area_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'email' => 'Email',
            'sexo' => 'Sexo',
            'area_id' => 'Area ID',
            'boletin' => 'Boletin',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * Gets query for [[Area]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArea()
    {
        return $this->hasOne(Areas::className(), ['id' => 'area_id']);
    }

    /**
     * Gets query for [[EmpleadoRols]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleadoRols()
    {
        return $this->hasMany(EmpleadoRol::className(), ['empleado_id' => 'id']);
    }
}
