<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = [
        'category_name',
        'description',
    ];

    public function jobPostings(): BelongsToMany
    {
         return $this->belongsToMany(JobPosting::class, 'job_posting_category', 'category_id', 'job_posting_id');
    }
}   
