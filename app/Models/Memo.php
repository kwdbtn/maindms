<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memo extends Model {
    use HasFactory;

    protected $fillable = [
        'sender', 'recipient', 'date', 'file_no', 'subject', 'body', 'status', 'status_info',
    ];

    public function from() {
        return User::find($this->sender);
    }

    public function to() {
        return User::find($this->recipient);
    }

    public function carbon_copies() {
        return $this->belongsToMany(User::class);
    }
}
