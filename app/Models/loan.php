<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class loan extends Model
{
    use HasFactory;
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table'=>'loans','field' => 'id', 'length' => 10, 'prefix' =>date('ymd')]);
        });
    }
    protected $fillable = [
        'cardnumber',
        'nominal',
        'totalpayment',
        'monthlypayment',
        'installment',
        'status',
    ];
}
