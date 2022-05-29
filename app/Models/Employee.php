<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
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

    public function scopeAllEmployees( $query )
    {
        $allEmployees = Employee::join('genders', 'genders.id', '=', 'employees.gender_id')
                                ->join('countries', 'countries.id', '=', 'employees.country_id')
                                ->join('provinces', 'provinces.id', '=', 'employees.province_id')
                                ->join('cities', 'cities.id', '=', 'employees.city_id')
                                ->join('entity_relations', 'employees.id', '=', 'entity_relations.relation_id')
                                ->join('users', 'users.id', '=', 'entity_relations.user_id')
                                ->leftJoin('entity_resources', function ( $join ) {
                                    $join->on('employees.id', '=', 'entity_resources.imageable_id')
                                         ->where('entity_resources.imageable_type', '=', 'Hotel/Employee');
                                })
                                ->where('entity_relations.relation_type', '=', 'Hotel/Employee')
                                ->where('users.id', '=', Auth::user()->id)
                                ->get([ 'employees.id', 'employees.first_name', 'employees.last_name', 'employees.cnic', 'employees.contact', 'employees.permanent_address', 'employees.email',
                                        'employees.isActive', 'employees.description', 'genders.gender_name', 'countries.country_name', 'provinces.province_name',
                                        'cities.city_name', 'entity_resources.file_name' ]);

        return $allEmployees;
    }

    public function scopeActiveEmployees( $query )
    {
        $allEmployees = Employee::join('genders', 'genders.id', '=', 'employees.gender_id')
                                ->join('countries', 'countries.id', '=', 'employees.country_id')
                                ->join('provinces', 'provinces.id', '=', 'employees.province_id')
                                ->join('cities', 'cities.id', '=', 'employees.city_id')
                                ->join('entity_relations', 'employees.id', '=', 'entity_relations.relation_id')
                                ->join('users', 'users.id', '=', 'entity_relations.user_id')
                                ->leftJoin('entity_resources', function ( $join ) {
                                    $join->on('employees.id', '=', 'entity_resources.imageable_id')
                                         ->where('entity_resources.imageable_type', '=', 'Hotel/Employee');
                                })
                                ->where('entity_relations.relation_type', '=', 'Hotel/Employee')
                                ->where('users.id', '=', Auth::user()->id)
                                ->where('employees.isActive', '=', '1')
                                ->get([ 'employees.id', 'employees.first_name', 'employees.last_name', 'employees.cnic', 'employees.contact', 'employees.permanent_address', 'employees.email',
                                        'employees.isActive', 'employees.description', 'genders.gender_name', 'countries.country_name', 'provinces.province_name',
                                        'cities.city_name', 'entity_resources.file_name' ]);

        return $allEmployees;
    }

    public function scopeSearchEmployees( $query, $search )
    {
        $allEmployees = Employee::join('genders', 'genders.id', '=', 'employees.gender_id')
                                ->join('countries', 'countries.id', '=', 'employees.country_id')
                                ->join('provinces', 'provinces.id', '=', 'employees.province_id')
                                ->join('cities', 'cities.id', '=', 'employees.city_id')
                                ->join('entity_relations', 'employees.id', '=', 'entity_relations.relation_id')
                                ->join('users', 'users.id', '=', 'entity_relations.user_id')
                                ->leftJoin('entity_resources', function ( $join ) {
                                    $join->on('employees.id', '=', 'entity_resources.imageable_id')
                                         ->where('entity_resources.imageable_type', '=', 'Hotel/Employee');
                                })
                                ->where('entity_relations.relation_type', '=', 'Hotel/Employee')
                                ->where('users.id', '=', Auth::user()->id)
                                ->where(function ( $models ) use ( $search ) {
                                    $models->where('employees.first_name', 'like', '%' . $search . '%')
                                           ->orwhere('employees.id', 'like', '%' . $search . '%')
                                           ->orwhere('employees.last_name', 'like', '%' . $search . '%')
                                           ->orwhere('employees.cnic', 'like', '%' . $search . '%')
                                           ->orwhere('employees.contact', 'like', '%' . $search . '%')
                                           ->orwhere('employees.email', 'like', '%' . $search . '%')
                                           ->orwhere('employees.isActive', 'like', '%' . $search . '%');
                                })
                                ->select('employees.id', 'employees.first_name', 'employees.last_name', 'employees.cnic', 'employees.contact', 'employees.permanent_address', 'employees.email',
                                    'employees.isActive', 'employees.description', 'genders.gender_name', 'countries.country_name', 'provinces.province_name',
                                    'cities.city_name', 'entity_resources.file_name')->get();

        return $allEmployees;
    }
}
