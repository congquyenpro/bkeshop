<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    protected $table = 'warehouse';
    protected $fillable = ['product_id','size_id', 'quantity', 'reserve', 'expiry_date','status', 'created_at', 'updated_at'];
}
