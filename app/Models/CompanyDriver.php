<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDriver extends Model
{
    use HasFactory;

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function entity_resource()
    {
        return $this->morphMany('App\EntityResource', 'imageable');
    }

    public function scopeAllCompanyDrivers( $query )
    {
        $allCompanyDrivers = CompanyDriver::join('genders', 'genders.id', '=', 'company_drivers.gender_id')
                                     ->join('countries', 'countries.id', '=', 'company_drivers.country_id')
                                     ->join('provinces', 'provinces.id', '=', 'company_drivers.province_id')
                                     ->join('cities', 'cities.id', '=', 'company_drivers.city_id')
                                     ->join('entity_relations', 'company_drivers.id', '=', 'entity_relations.relation_id')
                                     ->join('users', 'users.id', '=', 'entity_relations.user_id')
                                     ->leftJoin('entity_resources', function ( $join ) {
                                         $join->on('company_drivers.id', '=', 'entity_resources.imageable_id')
                                              ->where('entity_resources.imageable_type', '=', 'Company/DriverImages');
                                     })
                                     ->where('entity_relations.relation_type', '=', 'Company/Drivers')
                                     ->where('users.id', '=', Auth::user()->id)
                                     ->get([ 'company_drivers.id', 'company_drivers.first_name', 'company_drivers.last_name', 'company_drivers.cnic', 'company_drivers.contact_no',
                                             'company_drivers.address', 'company_drivers.email', 'company_drivers.status', 'genders.gender_name',
                                             'countries.country_name', 'provinces.province_name', 'cities.city_name', 'entity_resources.file_name' ]);

        return $allCompanyDrivers;
    }
}
