<?php

namespace App\Admin\Controllers\Ads;

use App\Models\Ads\Ads;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AdsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '广告管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Ads);

        $grid->column('id', __('序号'));
        $grid->column('title', __('标题'));
        $grid->column('cate_id', __('广告位'));
        $grid->column('img', __('图片'))->image('', 100, 100);
        $grid->column('url', __('链接'));
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('更新时间'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Ads::findOrFail($id));
        $show->field('id', __('序号'));
        $show->field('title', __('标题'));
        $show->field('cate_id', __('广告位'));
        $show->field('img', __('图片'));
        $show->field('url', __('链接'));
        $show->field('created_at', __('创建时间'));
        $show->field('updated_at', __('更新时间'));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Ads);

        $form->text('title', __('标题'));
        $form->select('cate_id', __('位置'))->options(Ads::selectOption([], false))->help('选择广告位')->rules('required', ['required' => '请选择广告位']);
        $form->image('img', __('图片'))->uniqueName()->removable();
        $form->url('url', __('链接'));

        return $form;
    }
}
