<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class debittransaction extends Model
{
    use HasFactory;
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table'=>'debittransactions','field' => 'id', 'length' => 12, 'prefix' =>date('ymd')]);
        });
    }
    protected $fillable = [
        'srccard',
        'destcard',
        'nominal',
    ];
}
