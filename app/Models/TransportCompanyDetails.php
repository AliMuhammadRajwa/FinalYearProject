<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportCompanyDetails extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function entity_resource()
    {
        return $this->morphMany('App\EntityResource', 'imageable');
    }

    public function scopeCompanyDetail( $query )
    {
        $companyDetails = TransportCompanyDetails::join('users', 'users.id', '=', 'transport_company_details.user_id')
                             ->where('transport_company_details.status', '=', '1')
                             ->where('users.id', '=', Auth::user()->id)
                             ->get([ 'transport_company_details.id', 'transport_company_details.company_title',
                                     'transport_company_details.company_code', 'transport_company_details.address',
                                     'transport_company_details.contact_no',
                                     'transport_company_details.email',
                                     'transport_company_details.website_url', 'transport_company_details.facebook_url',
                                     'transport_company_details.description', 'transport_company_details.status' ]);
        return $companyDetails;
    }
}
