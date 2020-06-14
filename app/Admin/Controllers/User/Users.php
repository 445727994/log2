<?php

namespace App\Admin\Controllers\User;

use App\Models\User\User;
use App\Models\User\WechatLog;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class Users extends AdminController {
	/**
	 * Title for current resource.
	 *
	 * @var string
	 */
	protected $title = '用户';

	/**
	 * Make a grid builder.
	 *
	 * @return Grid
	 */
	protected function grid() {
		$grid = new Grid(new User());
		$quickSearch = $arraySearch = [];
		foreach (User::FIELD as $key => $value) {
			if (isset($value['sort'])) {
				$grid->column($key, __($value['name']))->sortable();
			} else {
				$grid->column($key, __($value['name']));
			}
			if (isset($value['quickSearch'])) {
				$quickSearch[] = $key;
				$arraySearch[] = [$value['quickSearch'], $key, $value['name']];
			}
		}
		$grid->filter(function ($filter) use ($arraySearch) {
			// 去掉默认的id过滤器
			$filter->disableIdFilter();
			// 在这里添加字段过滤器
			if (count($arraySearch) > 0) {
				foreach ($arraySearch as $key => $value) {
					$fun = $value[0];
					$filter->$fun($value[1], $value[2]);
				}
			}
		});
		$grid->quickSearch($quickSearch);
		return $grid;
	}

	/**
	 * Make a show builder.
	 *
	 * @param mixed $id
	 * @return Show
	 */
	protected function detail($id) {
		$show = new Show(User::findOrFail($id));
		foreach (User::FIELD as $key => $value) {
			$show->field($key, __($value['name']));
		}

		return $show;
	}

	/**
	 * Make a form builder.
	 *
	 * @return Form
	 */
	protected function form() {
		$form = new Form(new User());
		foreach (User::FIELD as $key => $value) {
			if (isset($value['type'])) {
				$fun = $value['type'];
				$form->$fun($key, __($value['name']));
			}
		}
		$form->password('password', '密码');
		$form->saving(function (Form $form) {
			if ($form->password && $form->model()->password != $form->password) {
				$form->password = bcrypt($form->password);
			}else{

            }
		});
		return $form;
	}
}
