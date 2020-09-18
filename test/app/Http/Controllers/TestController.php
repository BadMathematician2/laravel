<?php


namespace App\Http\Controllers;


use GoogleMapRender\Models\Polygon;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        return view('test');
    }


    public function post(Request $request)
    {

        Polygon::query()->create(['polygon' => json_encode($request->get('polygon'))]);

        return null;
    }



}
