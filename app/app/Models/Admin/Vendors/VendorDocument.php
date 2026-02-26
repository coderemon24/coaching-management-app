<?php

namespace App\Models\Admin\Vendors;

use Illuminate\Database\Eloquent\Model;

class VendorDocument extends Model
{
    protected $table = 'vendor_documents';

    protected $fillable = [
        'vendor_id',
        'business_name',
        'trade_license_no',
        'trade_license_file',
        'nid_or_passport_no',
        'nid_or_passport_file',
        'tax_id',
        'tax_id_file',
        'document_status',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
}
