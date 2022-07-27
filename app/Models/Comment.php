<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $author_name
 * @property string $text
 * @property Article $article
 */
class Comment extends Model
{
    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
