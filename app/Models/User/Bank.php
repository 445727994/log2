<?php
namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model {
	protected $table = 'user_bank';
	public function user() {
		return $this->belongsTo(User::class, 'user_id');
	}

	//定义普通字段
	const FIELD = [
		'id' => ['sort' => true, 'name' => '序号', 'quickSearch' => 'equal'],
		'user_id' => ['name' => '用户', 'type' => 'select', 'quickSearch' => 'like', 'option' => 'User'],
		'name' => ['name' => '名称', 'type' => 'decimal', 'quickSearch' => 'like'],
		'code' => ['name' => '尾号', 'type' => 'text', 'quickSearch' => 'like'],
		'type' => [
			'name' => '类型', 'type' => 'text', 'quickSearch' => 'like',
		],
		'day_time' => ['sort' => true, 'name' => '还款日'],
		'bill_time' => ['sort' => true, 'name' => '账单日'],
		'created_at' => ['sort' => true, 'name' => '创建时间'],
		'updated_at' => ['sort' => true, 'name' => '创建时间'],
	];
	const PAGE = 20;
	const SEARCH = ['id', 'user_id', 'bank_id', 'type'];
	public static function selectOption($where = []) {
		return self::where($where)->pluck('name', 'id')->toArray();
	}
}
