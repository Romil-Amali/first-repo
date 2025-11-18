<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AiTool extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'logo',
        'url',
        'api_endpoint',
        'category_id',
        'is_active',
        'pricing',
        'features',
        'popularity',
    ];

    protected $casts = [
        'features' => 'array',
        'is_active' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
