<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobPosting extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'job_title',
        'job_description',
        'job_location',
        'job_type',
        'job_salary',
        'job_experience',
        'job_qualification',
        'job_responsibilities',
        'job_requirements',
        'job_benefits',
        'job_status',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
    
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'job_posting_category', 'job_posting_id', 'category_id');
    }

    public function applications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }

    public function savedJobs(): HasMany
    {
        return $this->hasMany(SavedJob::class);
    }
}
