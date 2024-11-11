<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentBook extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ticket',
        'book_id',
        'client_id'
    ];
    public function Client()
    {
        return $this->belongsTo(Client::class);
    }
    public function Book()
    {
        return $this->belongsTo(Book::class);
    }
}
