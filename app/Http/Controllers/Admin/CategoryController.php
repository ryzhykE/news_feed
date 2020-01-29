<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Model\Category;

class CategoryController extends AbstractAdminController
{
    protected $viewPath = 'admin.category';
    protected $routeName = 'categories';
    protected $limit = 5;

    /**
     * Model name.
     *
     * @return string
     */
    protected function model(): string
    {
        return Category::class;
    }

    /**
     * Request Class name
     *
     * @return string
     */
    protected function createRequest(): string
    {
        return CategoryRequest::class;
    }
}
