<?php

namespace app\models\handler;

/**
 *
 */
class Equipment
{

    public string $id;
    public string $name;


    const COMPASS = 'COMPASS';
    const FLASHLIGHT = 'FLASHLIGHT';
    const NAVIGATOR = 'NAVIGATOR';
    const RADIO = 'RADIO';

    const DRONE = 'DRONE';


    /**
     * @var array|array[]
     */
    private static array $_data = [
        self::COMPASS => [
            'id' => self::COMPASS,
            'name' => 'Компас',
        ],
        self::FLASHLIGHT => [
            'id' => self::FLASHLIGHT,
            'name' => 'Фонарь',
        ],
        self::NAVIGATOR => [
            'id' => self::NAVIGATOR,
            'name' => 'Навигатор',
        ],

        self::RADIO => [
            'id' => self::RADIO,
            'name' => 'Радиостанция',
        ],
        self::DRONE => [
            'id' => self::DRONE,
            'name' => 'Квадрокоптер',
        ],
    ];


    /**
     * @return static[]
     */
    public static function findAll(): array
    {
        $models = [];

        foreach (static::$_data as $datum)
        {
            $model = (new static());
            $model->id = $datum['id'];
            $model->name = $datum['name'];
            $models[$datum['name']] = $model;

        }
        return $models;
    }


    /**
     * @param $id
     * @return self|null
     */
    public static function findOne($id): ?self
    {
        return static::findAll()[$id] ?? null;
    }
}