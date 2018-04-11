<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    public $table = 'watch_category'; //表名称
	// 限定时间字段
    public $timestamps = true;
    // 模型的日期字段保存格式。
	protected $dateFormat = 'U';
}
