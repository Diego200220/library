<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'author',
        'slug',
        'library_id',
        'classification_id'
    ];

        public function ClassificationId()
    {
        return $this->hasOne(Classification::class,'id', 'classification_id');
    }
}
