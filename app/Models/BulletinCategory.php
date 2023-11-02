<?php

namespace App\Models;

use App\Models\Bulletin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BulletinCategory extends Model
{
    use HasFactory;

    /**
     * Get all of the bulletins for the BulletinCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bulletins(): HasMany
    {
        return $this->hasMany(Bulletin::class, 'bulletin_category_id');
    }
}
