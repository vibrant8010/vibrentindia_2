<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyDetail extends Model
{
    protected $table = 'company_details';

    protected $fillable = [
        'name',
        'logo_url',
        'description',
        'gst_registration_date',
        'legal_status',
        'nature_of_business',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'company_id');
    }
}
