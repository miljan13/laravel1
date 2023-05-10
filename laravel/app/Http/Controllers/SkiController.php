<?php

namespace App\Http\Controllers;
use App\Http\Resources\SkiResource;
use App\Models\Ski;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class SkiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static $wrap = 'skis';
    public function index()
    {
        $skis = Ski::all();
        $my_skis=array();
        foreach($skis as $ski){
            array_push($my_skis,new SkiResource($ski));
        }
        return $my_skis;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function getByBrand($brand_id){
        $skis=Ski::get()->where('brand_id',$brand_id);
        if(count($skis)==0){
            return response()->json('Ne postoji brend sa ovim ID-jem!');
        }
        $my_skis=array();
        foreach($skis as $ski){
            array_push($my_skis,new SkiResource($ski));
        }
        return $my_skis;
    }
    public function mySkis(Request $request){
        $skis=Ski::get()->where('user_id',Auth::user()->id);
        if(count($skis)==0){
            return 'Nemate sacuvanih skija!';
        }
        $my_skis=array();
        foreach($skis as $ski){
            array_push($my_skis,new SkiResource($ski));
        }
        return $my_skis;
    }
    public function getByType($type_id){
        $skis=Ski::get()->where('type_id',$type_id);
        if(count($skis)==0){
            return response()->json('ID ovog tipa ne postoji!');
        }
        $my_skis=array();
        foreach($skis as $ski){
            array_push($my_skis,new SkiResource($ski));
        }
        return $my_skis;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'model'=>'required|String|max:255',
            'color'=>'required|String|max:255',
            'length'=>'required|Integer|max:190',
            'brand_id'=>'required',
            'type_id'=>'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $ski=new Ski;
        $ski->model=$request->model;
        $ski->color=$request->color;
        $ski->length=$request->length;
        $ski->user_id=Auth::user()->id;
        $ski->type_id=$request->type_id;
        $ski->brand_id=$request->brand_id;
        $ski->save();
        return response()->json(['Skije su uspesno sacuvane!',new SkiResource($ski)]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ski  $ski
     * @return \Illuminate\Http\Response
     */
    public function show(Ski $ski)
    {
        return new SkiResource($ski);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ski  $ski
     * @return \Illuminate\Http\Response
     */
    public function edit(Ski $ski)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ski  $ski
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ski $ski)
    {
        $validator=Validator::make($request->all(),[
            'model'=>'required|String|max:255',
            'color'=>'required|String|max:255',
            'length'=>'required|Integer|max:190',
            'brand_id'=>'required',
            'type_id'=>'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $ski->model=$request->model;
        $ski->color=$request->color;
        $ski->length=$request->length;
        $ski->user_id=Auth::user()->id;
        $ski->type_id=$request->type_id;
        $ski->brand_id=$request->brand_id;
        $result=$ski->update();
        if($result==false){
            return response()->json('Poteskoce pri azuriranju!');
        }
        return response()->json(['Skije su uspesno azirirane!',new SkiResource($ski)]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ski  $ski
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ski $ski)
    {
        $ski->delete();

        
        return response()->json('Skije  su uspesno obrisane!');
    }
}