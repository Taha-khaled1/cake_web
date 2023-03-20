<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Special_order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'fname' => 'مستخدم غير مسجل دخول'
        ]);
    }
    public function address()
    {
        return $this->hasOne(OrderAddress::class, 'order_id' , 'id');
    } 
}
