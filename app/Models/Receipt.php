<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function saleInvoice()
    {
        return $this->belongsTo(SaleInvoice::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
