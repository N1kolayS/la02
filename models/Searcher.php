<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%searcher}}".
 *
 * @property int $id
 * @property int|null $created_at
 * @property string|null $name
 * @property string|null $tg
 * @property string|null $call
 * @property string|null $phone
 * @property string|null $auto_number
 * @property string|null $address
 * @property string|null $coordinate
 * @property int|null $spg
 * @property int|null $sg
 * @property string|null $equipment
 * @property int|null $target_urban
 * @property int|null $target_forest
 * @property int|null $medicine_base
 * @property int|null $medicine_spec
 */
class Searcher extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'updatedAtAttribute' => null,
         ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%searcher}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['created_at', 'name', 'tg', 'call', 'phone', 'auto_number', 'address', 'coordinate', 'equipment'], 'default', 'value' => null],
            [['medicine_spec', 'target_urban', 'target_forest', 'medicine_base'], 'default', 'value' => 0],
            [['created_at', 'spg', 'sg', 'target_urban', 'target_forest', 'medicine_base', 'medicine_spec'], 'integer'],
            [['equipment'], 'string'],
            [['phone'], 'filter', 'filter' => function($value) {
                return preg_replace('/\D/', '', $value);
            }],
            [['tg'], 'filter', 'filter' => function($value) {
                return str_replace('@', '', $value);
            }],
            ['equipment_list', 'safe'],
            [['name', 'tg', 'call', 'phone', 'auto_number', 'address', 'coordinate'], 'string', 'max' => 255],
            [['name', 'tg', 'phone', 'address'], 'required']
        ];
    }

    public function getEquipment_list()
    {
        return $this->equipment;
    }

    public function setEquipment_list($value)
    {
        if (is_array($value))
        {
            $this->equipment = implode(", ", $value);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'name' => 'Фамилия Имя',
            'tg' => 'Ник в телеграм',
            'call' => 'Позывной',
            'phone' => 'Телефон',
            'auto_number' => 'Номер авто',
            'address' => 'Адрес',
            'coordinate' => 'Координаты',
            'spg' => 'СПГ',
            'sg' => 'СГ',
            'equipment' => 'Оборудование',
            'target_urban' => 'Лес',
            'target_forest' => 'Город',
            'medicine_base' => 'Базовый',
            'medicine_spec' => 'Специальный',
        ];
    }


}
