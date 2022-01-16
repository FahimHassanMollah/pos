<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['_token', '_method'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function sales()
    {
        return $this->hasMany(SaleInvoice::class);
    }

    public function purchases()
    {
        return $this->hasMany(PurchaseInvoice::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }

}
