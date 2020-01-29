<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Model\Article;

class ArticleController extends AbstractAdminController
{
    protected $viewPath = 'admin.article';
    protected $routeName = 'manager';
    protected $limit = 5;

    /**
     * @inheritDoc
     */
    protected function model(): string
    {
       return  Article::class;
    }

    /**
     * @inheritDoc
     */
    protected function createRequest(): string
    {
        return  ArticleRequest::class;
    }

    /**
     * @param $result
     * @param  Request  $request
     */
    protected function selectionIndexResult($result, Request $request)
    {
        $result->with('category')->orderByDesc('created_at')->latest('id');
    }

    /**
     * @param $obj
     * @param  array  $viewData
     * @return array
     */
    protected function viewDataForCreate($obj, array $viewData)
    {
        return [
            'categories' => Category::get()->pluck('title', 'id')->toArray(),
        ];
    }

    /**
     * @param $obj
     * @param  array  $viewData
     * @return array
     */
    protected function viewDataForEdit($obj, array $viewData)
    {
       return $this->viewDataForCreate($obj, $viewData);
    }

    /**
    * @param Article $obj
    * @param  Request  $request
    */
    protected function afterSuccessfulStore($obj, Request $request)
    {
        $obj->category()->associate($request->get('category_id'));
    }

    /**
     * @param  Article  $obj
     * @param  Request  $request
     */
    protected function afterSuccessfulUpdate($obj, Request $request)
    {
        if ($categoryId = $request->get('category_id')) {
            $obj->category()->associate($categoryId);
        } else {
            $obj->category()->dissociate();
        }
    }
}
