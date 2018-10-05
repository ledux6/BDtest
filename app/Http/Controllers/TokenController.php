<?php

namespace App\Http\Controllers;

use App\token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TokenController extends Controller
{
    public function index(){
        $tokens = token::all();
        return view('tokens', ['tokens' => $tokens]);
    }

    public function addForm(){
        return view('addToken');
    }

    public function store(){
        $this->validate(request(),[
           'symbol' =>'required|alpha_num',
            'name' =>'required',
            'homepage' =>'required|active_url',
            'totalsupply'=>'required|integer',
            'currentprice'=>'required'
        ]);

        token::create([
            'symbol'=> request('symbol'),
            'name'=>request('name'),
            'homepage'=>request('homepage'),
            'total_supply'=>request('totalsupply'),
            'current_price'=>request('currentprice')

        ]);
        return redirect('/');
    }

    public function destroy($id){
        token::destroy($id);
        return redirect('/');
    }

    public function editForm($id){
        $token = token::where('id', $id)->get();
        //dd($token);
        return view('editToken', ['token' => $token]);
    }

    public function change($id){
        $this->validate(request(),[
            'symbol' =>'required|alpha_num',
            'name' =>'required',
            'homepage' =>'required|active_url',
            'totalsupply'=>'required|integer',
            'currentprice'=>'required'
        ]);

        DB::table('tokens')
            ->where('id', $id)
            ->update([
                'symbol'=> request('symbol'),
                'name'=>request('name'),
                'homepage'=>request('homepage'),
                'total_supply'=>request('totalsupply'),
                'current_price'=>request('currentprice')
            ]);
        return redirect('/');
    }

}