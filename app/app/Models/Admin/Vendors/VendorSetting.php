<?php

namespace App\Models\Admin\Vendors;

use Illuminate\Database\Eloquent\Model;

class VendorSetting extends Model
{
    protected $table = 'vendor_settings';

    protected $fillable = [
        'vendor_id',
        'auto_approve_orders',
        'max_product_limit',
        'is_open',
        'is_featured',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
}
