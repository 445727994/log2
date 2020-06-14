<?php

namespace App\Admin\Controllers\Setting;

use App\Models\Setting\AppSetting;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function foo\func;

class AppSettingController extends Controller
{
    /**
     * Title for current resource.抱歉，未找到数据
     *
     * @var string
     */
    protected $title = 'App设置';
    protected $set_name='app_set';
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    public function set(Content $content)
    {
        return $content
            ->header('App设置')
            ->description('修改')
            ->body($this->form()->edit($this->set_name));
    }
    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form() {
        $url='/admin/app-settings/save';
        $form = new Form(new AppSetting());
        $form->setAction($url);
        $form->text('app_name','名称');
        $form->image('app_logo','logo');
        $form->image('defalut_img','默认图');
        $form->image('error_img','默认错误图');
        $form->saved(function(Form $form){
            admin_toastr(trans('admin.save_succeeded'));
            return redirect('/admin/app-settings/');
        });
        return $form;
    }
    public function setUpdate(Content $content)
    {
        return $this->form()->update($this->set_name);
    }

}
