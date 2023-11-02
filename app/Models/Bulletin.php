<?php

namespace App\Models;

use App\Models\BulletinCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bulletin extends Model
{
    use HasFactory;

    protected  $guarded = [];

    /**
     * Get the category that owns the Bulletin
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(BulletinCategory::class, 'bulletin_category_id');
    }
}
