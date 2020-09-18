<?php


namespace App\Packages\Points\Repositories;


use App\Packages\Points\Models\Point;
use App\Packages\Points\Repositories\Interfaces\PointRepositoryInterface;
use Illuminate\Support\Facades\Redis;

class PointRepository implements PointRepositoryInterface
{

    /**
     * @var Point array
     */
    public $inDisk = [];

    public $distance = [];

    private function existInCache($id)
    {
        if (Redis::exists($id) === 1) {
            return true;
        }
        else {
            return false;
        }
    }

    private function getFromCache($id)
    {
        return Redis::get($id);
    }

    private function setInCache($id)
    {
        $point = Point::query()->find($id);
        Redis::set($id,$point->toJson());
    }

    public function getPoint($id)
    {
        if (!$this->existInCache($id)) {
            $this->setInCache($id);
        }

        return $this->getFromCache($id);
    }




}
