<?php

namespace App\Model;

use App\ModelFilters\ArticleFilter;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;

/**
 * \App\Model\Article
 *
 * @property int $id
 * @property int $category_id
 * @property int $status
 * @property string $slug
 * @property string|null $title
 * @property string|null $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Model\Category $category
 * @property-read string $formatted_date
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article filter($input = [], $filter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article paginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article simplePaginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article whereBeginsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article whereEndsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article whereLike($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Article extends Model
{
    use Filterable;

    protected $dates = ['created_at'];
    protected $fillable = ['slug', 'title', 'text'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return string
     */
    public function getFormattedDateAttribute(): string
    {
        return $this->created_at->format('d.m.Y');
    }

    /**
     * @return string
     */
    public function modelFilter()
    {
        return $this->provideFilter(ArticleFilter::class);
    }
}
