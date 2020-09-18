<?php


namespace App\Http\Controllers;

use App\Manager;
use App\Models\Test;
use App\Packages\Helpers\MimeValidator;
use GoogleMapRender\Models\Polygon;
use Illuminate\Http\Request;
use SearchInText\LinksInText;
use SearchInText\SearchEmails;
use SearchInText\SearchLinks;


class TestController extends Controller
{

    public function testIndex()
    {


        $text = 'AT&T: phonenumber@txt.att.net
T-Mobile: phonenumber@tmomail.net
Sprint: phonenumber@messaging.sprintpcs.com
Verizon: phonenumber@vtext.com or phonenumber@vzwpix.com
Virgin Mobile: phonenumb.er@vmobl.com
test@mail.com';


        $a = new SearchEmails();
        dd($a->searchEmails($text));
        dd(explode('@', $text));




        define('START', microtime(true));

        $text = file_get_contents('http://github.com');
        $a = new LinksInText(new SearchLinks());
        $a->recordLinksCodes($text);


//        foreach (range(1, 125) as $item) {
//            Manager::query()->create(['name' => rand(1, 100), 'avatar' => rand(1, 500)]);
//        }


        dd(round(microtime(true) - START, 4));


        dd(Manager::query()->create(['name' => 'a', 'avatar' => 'b'])->getAttribute('id'));

        return view('file');
    }

    public function post(Request $request)
    {
        $points = [];
        foreach ($request->get('polygon', []) as $item) {
            $points[] = [
              'lat' => (float)$item['lat'],
              'lng' => (float)$item['lng'],
            ];
        }

        $a = Polygon::query()->create(['polygon' => $points]);

        return $a->getAttributes();
    }


    public function getForm()
    {
        return view('file');
    }

    public function upload(Request $request)
    {

        Test::query()->create(['value' => 'lox']);


        return 'xaxa';


        dd(123);
        $a = new MimeValidator();
        foreach ($request->file() as $file) {
            foreach ($file as $f) {

                $a->addMimeType('text');
                $a->addMimeInType('doc', 'text');
                dd($a->getMimes());
                dd($a->isValidImage($f), $f->getMimeType());
            }
        }

        dd($request->file());
        return "Успех";
    }


}
