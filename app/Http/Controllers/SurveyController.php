<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Food;
use App\Drink;
use App\Survey;
use DB;
use Auth;
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
        // Validation
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'service_rate' => 'required|numeric',
            'fav_food' => 'required',
            'fav_drink' => 'required',
            'recommended' => 'required',
            'suggestion' => 'required',
        ]);

        $input_fav_food = $request->input('fav_food');
        $input_fav_drink = $request->input('fav_drink');
        $id = auth()->user()->id;
        $fav_food = join(', ', $request->input('fav_food'));
        $fav_drink = join(', ', $request->input('fav_drink'));
        
        DB::table('surveys')->insert([
            'user_id' => $id,
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'service_rate' => $request->service_rate,
            'fav_food' => $fav_food,
            'fav_drink' => $fav_drink,
            'recommended' => $request->recommended,
            'suggestion'=> $request->suggestion,
            'created_at' => Carbon::now()
            ]);
        return redirect('home')->with('success','Survey Berhasil Disimpan');
    }

    public function history()
    {
        $surveys = Survey::where('user_id', Auth::user()->id)->orderBy('id','desc')->paginate(5);
        return view('surveys.history', compact('surveys'));
    }
}
