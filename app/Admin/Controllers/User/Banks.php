<?php

namespace App\Admin\Controllers\User;

use App\Models\User\Bank;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class Banks extends AdminController {
	/**
	 * Title for current resource.
	 *
	 * @var string
	 */
	protected $title = '信用卡';
	/**
	 * Make a grid builder.
	 *
	 * @return Grid
	 */
	protected function grid() {
		$grid = new Grid(new Bank);
        $grid->disableCreateButton();
        $grid->disableFilter();
        $grid->disableRowSelector();
        $grid->disableActions();
        $grid->disableColumnSelector();
		$grid->column('id', __('Id'));
		$grid->column('user.name', __('User id'));
		$grid->column('name', __('Name'));
		$grid->column('type', __('Type'));
		$grid->column('day_time', __('Day time'));
		$grid->column('bill_time', __('Bill time'));
		$grid->column('created_at', __('Created at'));
		$grid->column('updated_at', __('Updated at'));

		return $grid;
	}

	/**
	 * Make a show builder.
	 *
	 * @param mixed $id
	 * @return Show
	 */
	protected function detail($id) {
		$show = new Show(Bank::findOrFail($id));

		$show->field('id', __('Id'));
		$show->field('user_id', __('User id'));
		$show->field('name', __('Name'));
		$show->field('type', __('Type'));
		$show->field('day_time', __('Day time'));
		$show->field('bill_time', __('Bill time'));
		$show->field('created_at', __('Created at'));
		$show->field('updated_at', __('Updated at'));

		return $show;
	}

	/**
	 * Make a form builder.
	 *
	 * @return Form
	 */
	protected function form() {
		$form = new Form(new Bank);

		$form->number('user_id', __('User id'));
		$form->text('name', __('Name'));
		$form->number('type', __('Type'));
		$form->number('day_time', __('Day time'));
		$form->number('bill_time', __('Bill time'));

		return $form;
	}
}
