<?php

namespace common\enums;

/**
 * 系统开发模式
 *
 * Class DevPatternEnum
 * @package common\enums
 * @author YiiFrame <21931118@qq.com>
 */
class DevPatternEnum extends BaseEnum
{
    const B2C = 'b2c';
    const B2B2C = 'b2b2c';
    const SAAS = 'saas';

    /**
     * @return array
     */
    public static function getMap(): array
    {
        return [
            self::B2C => '单企业',
            self::B2B2C => '多企业',
            self::SAAS => '软件即服务',
        ];
    }
}