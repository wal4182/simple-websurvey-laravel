<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use App\Drink;
use App\Survey;
use DB;
class SurveyController extends Controller
{
    //
    public function index()
    {
        $foods = Food::all();
        $drinks = Drink::all();
        return view('surveys.index', compact('foods','drinks'));
    }

    //
    public function store(Request $request)
    {
        $fav_food = join(',', $request->input('fav_food'));
        $fav_drink = join(',', $request->input('fav_drink'));

        DB::table('surveys')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'service_rate' => $request->service_rate,
            'fav_food' => $fav_food,
            'fav_drink' => $fav_drink,
            'recommended' => $request->recommended,
            'suggestion'=> $request->suggestion,
        ]);
        return redirect('survey/new')->with('success','Survey Berhasil Disimpan');
        
    }
}
