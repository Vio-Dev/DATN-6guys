<?php

namespace App\Models\admin;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'users_id',
        'order_date',
        'tolal',
        'status',
        'created_at',
        'updated_at'
    ];
    // public $timestamps = false;
    function users()
    {
        return $this->belongsTo(User::class);
    }
    // In the Orders model (app/Models/Orders.php)
    public function order_details()
    {
        return $this->hasMany(Orders_item::class, 'order_id');
    }
}
