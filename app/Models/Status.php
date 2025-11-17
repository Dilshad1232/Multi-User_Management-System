<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'color'];

    /**
     * 🔁 Each status can be linked with many submissions
     */
    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
}
