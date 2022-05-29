<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\Count;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function gender()
    {
        return $this->belongsTo(Gender::class);
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

    public function entity_relation()
    {
        return $this->morphMany('App\EntityRelation', 'relational');
    }

    public function scopeAllCustomers( $query )
    {
        $allCustomers = Client::join('entity_relations', 'clients.id', '=', 'entity_relations.relation_id')
                              ->join('users', 'users.id', '=', 'entity_relations.user_id')
                              ->where('entity_relations.relation_type', '=', 'Hotel/Customer')
                              ->where('users.id', '=', Auth::user()->id)
                              ->where('isActive', '=', '0')
                              ->get([ 'clients.id', 'clients.first_name', 'clients.last_name', 'clients.cnic', ]);
        return $allCustomers;
    }

    public function scopeAllClients( $query )
    {
        $allClients = Client::join('genders', 'genders.id', '=', 'clients.gender_id')
                            ->join('countries', 'countries.id', '=', 'clients.country_id')
                            ->join('provinces', 'provinces.id', '=', 'clients.province_id')
                            ->join('cities', 'cities.id', '=', 'clients.city_id')
                            ->join('entity_relations', 'clients.id', '=', 'entity_relations.relation_id')
                            ->join('users', 'users.id', '=', 'entity_relations.user_id')
                            ->leftJoin('entity_resources', function ( $join ) {
                                $join->on('clients.id', '=', 'entity_resources.imageable_id')
                                     ->where('entity_resources.imageable_type', '=', 'Hotel/Customer');
                            })
                            ->where('entity_relations.relation_type', '=', 'Hotel/Customer')
                            ->where('users.id', '=', Auth::user()->id)
                            ->get([ 'clients.id', 'clients.first_name', 'clients.last_name', 'clients.cnic', 'clients.contact', 'clients.permanent_address', 'clients.email',
                                    'clients.isActive', 'clients.description', 'genders.gender_name', 'countries.country_name', 'provinces.province_name',
                                    'cities.city_name', 'entity_resources.file_name' ]);

        return $allClients;
    }

    public function scopeActiveClients( $query )
    {
        $allClients = Client::join('genders', 'genders.id', '=', 'clients.gender_id')
                            ->join('countries', 'countries.id', '=', 'clients.country_id')
                            ->join('provinces', 'provinces.id', '=', 'clients.province_id')
                            ->join('cities', 'cities.id', '=', 'clients.city_id')
                            ->join('entity_relations', 'clients.id', '=', 'entity_relations.relation_id')
                            ->join('users', 'users.id', '=', 'entity_relations.user_id')
                            ->leftJoin('entity_resources', function ( $join ) {
                                $join->on('clients.id', '=', 'entity_resources.imageable_id')
                                     ->where('entity_resources.imageable_type', '=', 'Hotel/Customer');
                            })
                            ->where('entity_relations.relation_type', '=', 'Hotel/Customer')
                            ->where('users.id', '=', Auth::user()->id)
                            ->where('clients.isActive', '=', '1')
                            ->get([ 'clients.id', 'clients.first_name', 'clients.last_name', 'clients.cnic', 'clients.contact', 'clients.permanent_address', 'clients.email',
                                    'clients.isActive', 'clients.description', 'genders.gender_name', 'countries.country_name', 'provinces.province_name',
                                    'cities.city_name', 'entity_resources.file_name' ]);

        return $allClients;

        //        ->join('entity_resources', 'clients.id', '=', 'entity_resources.imageable_id')
        //        ->where('entity_resources.imageable_type', '=', 'Hotel/Customer')
    }

    public function scopeSearchClients( $query, $search )
    {
        $allClients = Client::join('genders', 'genders.id', '=', 'clients.gender_id')
                            ->join('countries', 'countries.id', '=', 'clients.country_id')
                            ->join('provinces', 'provinces.id', '=', 'clients.province_id')
                            ->join('cities', 'cities.id', '=', 'clients.city_id')
                            ->join('entity_relations', 'clients.id', '=', 'entity_relations.relation_id')
                            ->join('users', 'users.id', '=', 'entity_relations.user_id')
                            ->leftJoin('entity_resources', function ( $join ) {
                                $join->on('clients.id', '=', 'entity_resources.imageable_id')
                                     ->where('entity_resources.imageable_type', '=', 'Hotel/Customer');
                            })
                            ->where('entity_relations.relation_type', '=', 'Hotel/Customer')
                            ->where('users.id', '=', Auth::user()->id)
                            ->where(function ( $models ) use ( $search ) {
                                $models->where('clients.first_name', 'like', '%' . $search . '%')
                                       ->orwhere('clients.id', 'like', '%' . $search . '%')
                                       ->orwhere('clients.last_name', 'like', '%' . $search . '%')
                                       ->orwhere('clients.cnic', 'like', '%' . $search . '%')
                                       ->orwhere('clients.contact', 'like', '%' . $search . '%')
                                       ->orwhere('clients.email', 'like', '%' . $search . '%')
                                       ->orwhere('clients.isActive', 'like', '%' . $search . '%');
                            })
                            ->select('clients.id', 'clients.first_name', 'clients.last_name', 'clients.cnic', 'clients.contact', 'clients.permanent_address', 'clients.email',
                                'clients.isActive', 'clients.description', 'genders.gender_name', 'countries.country_name', 'provinces.province_name',
                                'cities.city_name', 'entity_resources.file_name')->get();

        return $allClients;
    }
}
