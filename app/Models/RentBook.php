<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket',
        'book_id',
        'client_id'
    ];

}
