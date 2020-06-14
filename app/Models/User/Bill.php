<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model {
	protected $table = 'user_bill';
	public function user() {
		return $this->belongsTo(User::class, 'user_id');
	}
	//定义普通字段
	const FIELD = [
		'id' => ['sort' => true, 'name' => '序号', 'quickSearch' => 'equal'],
		'user.name' => ['name' => '用户', 'type' => 'select', 'quickSearch' => 'like', 'option' => 'App\Models\User'],
		'money' => ['name' => '金额', 'type' => 'decimal', 'quickSearch' => 'like'],
		'type' => ['name' => '类型', 'type' => 'text', 'quickSearch' => 'like'],
		'bank_id' => [
			'name' => '信用卡', 'type' => 'select', 'quickSearch' => 'like', 'option' => 'App\Models\User\Bank',
		],
		'cate_id' => [
			'name' => '用户分类', 'type' => 'select', 'quickSearch' => 'like', 'option' => 'App\Models\User\Cate',
		],
		'created_at' => ['sort' => true, 'name' => '创建时间'],
		'updated_at' => ['sort' => true, 'name' => '创建时间'],
	];
	const PAGE = 20;
	const SEARCH = ['id', 'user_id', 'bank_id', 'type'];
}
