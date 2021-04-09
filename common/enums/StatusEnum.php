<?php

namespace common\enums;

/**
 * 状态枚举
 *
 * Class StatusEnum
 * @package common\enums
 * @author YiiFrame <21931118@qq.com>
 */
class StatusEnum extends BaseEnum
{
    const ENABLED = 1;
    const DISABLED = 0;
    const DELETE = -1;

    /**
     * @return array
     */
    public static function getMap(): array
    {
        return [
            self::ENABLED => '启用',
            self::DISABLED => '禁用',
            // self::DELETE => '已删除',
        ];
    }
}