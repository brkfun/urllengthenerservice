<?php

namespace App\Http\Controllers;

use App\Url;
use Exception;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function decode($urlCode)
    {
        $urlEncoded = decryptUrl($urlCode);
        $url = Url::query()->where('md5',$urlEncoded)->first();
        if($url){
            if ($url->will_expires === true){
                try {
                    $url->delete();
                } catch (Exception $e) {
                }
            }
            if(!in_array($url->id,session()->get('visited') ?? [])){
                $url->clicks++;
                $url->save();
                session()->push('visited',$url->id);
                session()->save();
            }

            return view('urlRedirect',['url' => $url]);
        }
        return abort(404);
    }

    public function send(Request $request)
    {
        if(in_array($request->get('link'),session()->get('links') ?? [])){
            $lastGeneratedId = session()->get('generated');
            $url = Url::query()->find($lastGeneratedId);
            return view('urlSaved',['url' => $url]);
        }
        session()->push('links',$request->get('link'));
        $hash = generateMd5();
        $url = new Url();
        $url->url = $request->get('link');
        $url->md5 = $hash;
        $url->clicks = 0;
        $url->will_expires = false;
        if($request->has('expires')){
            $url->will_expires = true;
        }
        $url->save();
        session()->put('generated',$url->id);
        return view('urlSaved',['url' => $url]);
    }
}
