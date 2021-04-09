<?php

namespace common\models\backend;

use common\traits\Tree;

class Department extends \common\models\base\BaseModel
{
    use Tree;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%backend_department}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['merchant_id','sort', 'level', 'pid', 'index_block_status', 'status', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 50],
            [['cover'], 'string', 'max' => 255],
            [['tree'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'merchant_id' => '部门',
            'title' => '部门名称',
            'cover' => '封面',
            'sort' => '排序',
            'level' => '级别',
            'tree' => '树',
            'pid' => '父级',
            'index_block_status' => '首页显示',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
