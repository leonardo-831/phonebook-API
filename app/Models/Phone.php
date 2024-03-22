<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $table = 'phones';

    protected $fillable = [
        'contact_id',
        'phone',
        'created_at',
        'updated_at',
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
