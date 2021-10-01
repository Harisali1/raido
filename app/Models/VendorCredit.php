<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorCredit extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'credit',
        'reason',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
