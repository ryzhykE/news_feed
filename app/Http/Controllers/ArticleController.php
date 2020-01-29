<?php

namespace App\Http\Controllers;

use App\Model\Article;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ArticleController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {

        $articles = Article::filter($request->all())
            ->with(['category' => function($query) {
                $query->select(['id','title']);
            }])
            ->whereHas('category')
            ->orderByDesc('created_at')
            ->latest('id')
            ->paginateFilter(5);

        /** @var Collection $result */
        $categories = Category::whereHas('articles')
            ->orderBy('title')
            ->get();

        return view('articles.index',compact('articles', 'categories'));
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function inner($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        return view('articles.inner',compact('article'));
    }
}
