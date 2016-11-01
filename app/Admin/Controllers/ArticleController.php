<?php

namespace App\Admin\Controllers;

use App\Article;
use App\Http\Controllers\Controller;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Grid;
use Encore\Admin\Form;
use Encore\Admin\Auth\Database\Role;
use Encore\Admin\Layout\Content;
use Encore\Admin\Auth\Database\Administrator;
use Encore\Admin\Controllers\AdminController;

class ArticleController extends Controller
{
    use AdminController;

    public function index()
    {
        return Admin::content(function (Content $content){
            $content->header('文章');
            $content->description('列表');
            $content->body($this->grid()->render());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     *
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header(trans('admin::lang.administrator'));
            $content->description(trans('admin::lang.edit'));
            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {
            $content->header(trans('文章'));
            $content->description(trans('创建'));
            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Article::class, function (Grid $grid) {
            $grid->id('ID')->sortable();
            $grid->title(trans('标题'));
            $grid->user_id(trans('作者'));

            $grid->created_time('创建时间');
            $grid->update_time('最后更新时间');
        });
    }


    /**
     * Make a form builder.
     *
     * @return Form
     */
    public function form()
    {
        return Admin::form(Article::class, function (Form $form) {
            $form->display('id', 'ID');

            $form->text('title', '标题');
            //$form->multipleSelect('category', '分类')->options(Role::all()->pluck('name', 'id'));
            $form->editor('content', '内容');
            $form->text('tag', '标签');

            $form->text('created_time', trans('admin::lang.created_at'));
            $form->text('update_time', trans('admin::lang.updated_at'));

            $form->saving(function (Form $form) {
                $form->created_time = time();
                $form->update_time = date('Y-m-d H:i:s');
            });
        });
    }
}
