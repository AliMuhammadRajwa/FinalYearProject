<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransportFeatureTitle;
use Illuminate\Support\Facades\Session;

class TransportationFeatureTitleController extends Controller
{
    public function ShowTransportationFeturesTitle()
    {
        return view('Transportation.TransportationFeatureTitle.add_transportation_features_title');
    }

    public function Store( Request $request )
    {
        $transportationfeaturetitle                               = new TransportFeatureTitle();
        $transportationfeaturetitle->transportation_feature_title = $request->transportation_feature_title;
        $transportationfeaturetitle->save();
        Session::flash('success', 'Your Title is Saved Succesfully ');
        return redirect(route('transportationfeature.view'));
    }

    public function show()
    {
        $transportationtitles = TransportFeatureTitle::all();
        return view('Transportation.TransportationFeatureTitle.all_transportation_features_title', compact('transportationtitles'));
    }

    public function editview( $id )
    {
        $tranportationTitle = TransportFeatureTitle::findOrFail($id);
        return view('Transportation.TransportationFeatureTitle.edit_transportation_features_title', compact('tranportationTitle'));
    }

    public function updateTitle( Request $request, $id )
    {
        $transportationfeaturetitle                               = TransportFeatureTitle::findOrFail($id);
        $transportationfeaturetitle->transportation_feature_title = $request->transportation_feature_title;
        $transportationfeaturetitle->save();
        Session::flash('success', 'Your Title is updated Succesfully ');
        return redirect(route('show.title'));
    }

    public function destroy( $id )
    {
        TransportFeatureTitle::destroy($id);
        Session::flash('warning', 'You have succesfully deleted Title');
        return back();
    }
}
