<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    /**
     * 🧠 Table name (optional, Laravel auto-detects)
     */
    protected $table = 'submissions';
    public $timestamps = true;

    /**
     * ✅ Mass assignable fields
     */
    protected $fillable = [
        'user_id',
        'status_id',
        'title',
        'description',
        'document_path',
        'admin_remarks',
    ];

    /**
     * 🧑‍💼 Each submission belongs to one user
     * Example: $submission->user->name
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 📋 Each submission has one status (Pending, Approved, Rejected)
     * Example: $submission->status->name
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
