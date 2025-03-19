<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'status_id',
    ];

    public function tasks(): BelongsToMany
    {
        return $this->belongsToMany(Task::class, 'employee_task');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(EmployeeStatus::class);
    }
}
