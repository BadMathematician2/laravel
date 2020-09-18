<?php


namespace App\Packages\Points\Controllers;


use App\Http\Controllers\Controller;
use App\Packages\Points\Repositories\PointRepository;

class PointController extends Controller
{


    public final function test(PointRepository $pointRepository)
    {
        dd('point');
       $start = microtime(true);
       $pointRepository->getInDisc(2, 2, 0.2);
       //dd(memory_get_usage());
       //dd($pointRepository->distance);
       dd(round(microtime(true) - $start,4));
       dd($pointRepository->inDisk);
       return view('point::point');
    }


}
