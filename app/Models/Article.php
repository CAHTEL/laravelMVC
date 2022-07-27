<?php

namespace App\Models;

use App\Services\DTO\ArticleDTO;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $head
 * @property string $body
 * @property Category $category
 */
class Article extends Model
{
    protected $fillable = ['head', 'body', 'category_id'];
    
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    
    public function importToDTO()
    {
        //code
        return new ArticleDTO();
    }
    
}
