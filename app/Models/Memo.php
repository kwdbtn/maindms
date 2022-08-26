<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memo extends Model {
    use HasFactory;

    protected $fillable = [
        'sender', 'recipient', 'date', 'file_no', 'subject', 'body', 'attachment', 'status',
    ];

    public function from() {
        return User::find($this->sender);
    }

    public function to() {
        return User::find($this->recipient);
    }
}
