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
        $input_fav_food = $request->input('fav_food');
        $input_fav_drink = $request->input('fav_drink');
        
        if(empty($input_fav_food) && !empty($input_fav_drink)){
            $fav_drink = join(',', $request->input('fav_drink'));
            DB::table('surveys')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'gender' => $request->gender,
                'service_rate' => $request->service_rate,
                'fav_food' => 'Tidak Ada',
                'fav_drink' => $fav_drink,
                'recommended' => $request->recommended,
                'suggestion'=> $request->suggestion,
            ]);
        }if(empty($input_fav_drink) && !empty($input_fav_food)){
            $fav_food = join(',', $request->input('fav_food'));
            DB::table('surveys')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'gender' => $request->gender,
                'service_rate' => $request->service_rate,
                'fav_food' => $fav_food,
                'fav_drink' => 'Tidak Ada',
                'recommended' => $request->recommended,
                'suggestion'=> $request->suggestion,
            ]);
        }if(empty($input_fav_food) && empty($input_fav_drink)){
            DB::table('surveys')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'gender' => $request->gender,
                'service_rate' => $request->service_rate,
                'fav_food' => 'Tidak Ada',
                'fav_drink' => 'Tidak Ada',
                'recommended' => $request->recommended,
                'suggestion'=> $request->suggestion,
            ]);
        }else{

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
        }
        return redirect('home')->with('success','Survey Berhasil Disimpan');
        
    }
}
