<?php

namespace common\enums;

use common\enums\BaseEnum;
/**
 * 枚举
 *
 * Class GenderEnum
 * @package common\enums
 * @author YiiFrame <21931118@qq.com>
 */
class RemindTypeEnum extends BaseEnum
{
    const sms = 0;
    const message = 1;
    const normal = 2;

    /**
     * @return array
     */
    public static function getMap(): array
    {
        return [
            self::sms => '短信提醒',
            self::message => '消息提醒',
            self::normal => '不提醒',

        ];
    }

    public static function getValue($key): string
    {
        return static::getMap()[$key] ?? '';
    }
}