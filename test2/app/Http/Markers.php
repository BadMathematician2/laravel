<?php


namespace App\Http;


class Markers
{
    private $points;

    /**
     * @return mixed
     */
    public function getPoints()
    {
        return $this->points;
    }

    public function __construct()
    {
        foreach (range(0, 1000) as $item) {
            $this->points[] = ['lat' => rand(-85000000, 85000000)/1000000, 'lng' => rand(-120000000, 120000000)/1000000];
        }
    }


}
