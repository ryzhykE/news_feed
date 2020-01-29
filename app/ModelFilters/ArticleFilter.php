<?php namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class ArticleFilter extends ModelFilter
{
    // This will filter 'company_id' OR 'company'
    public function category($categoryId)
    {
        return $this->related('category', 'categories.id', '=', $categoryId);
    }
}
