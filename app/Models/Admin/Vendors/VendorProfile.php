<?php

namespace App\Models\Admin\Vendors;

use Illuminate\Database\Eloquent\Model;

class VendorProfile extends Model
{
    protected $table = 'vendor_profiles';

    protected $fillable = [
        'vendor_id',
        'shop_name',
        'shop_slug',
        'shop_logo',
        'shop_banner',
        'shop_description',
        'shop_address',
        'shop_phone',
        'shop_email',
        'city',
        'state',
        'country',
        'postal_code',
        'latitude',
        'longitude',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
}
