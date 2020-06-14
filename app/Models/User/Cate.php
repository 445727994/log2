<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model {
	protected $table = 'user_cate';
	public function user() {
		return $this->belongsTo(User::class, 'user_id');
	}
	//定义普通字段
	const FIELD = [
		'id' => ['sort' => true, 'name' => '序号', 'quickSearch' => 'equal'],
		'user_id' => ['name' => '用户', 'type' => 'text', 'quickSearch' => 'like'],
		'name' => ['name' => '分类名称', 'type' => 'text', 'quickSearch' => 'like'],
		'type' => ['name' => '类型', 'type' => 'text', 'quickSearch' => 'like'],
		'created_at' => ['sort' => true, 'name' => '创建时间'],
		'updated_at' => ['sort' => true, 'name' => '创建时间'],
	];
	const PAGE = 20;
	const SEARCH = ['id', 'user_id', 'name', 'type'];
	public static function selectOption($where = []) {
		return self::where($where)->pluck('name', 'id')->toArray();
	}
}
