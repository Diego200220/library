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
    public function ClientId()
    {
        return $this->hasOne(Client::class,'id', 'client_id');
    }
    public function BookId()
    {
        return $this->hasOne(Book::class,'id', 'book_id');
    }
}
