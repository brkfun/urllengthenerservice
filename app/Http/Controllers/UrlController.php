<?php

namespace App\Http\Controllers;

use App\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function decode(Request $request,$urlCode)
    {
        $urlEncoded = decryptUrl($urlCode);
        $url = Url::query()->where('md5',$urlEncoded)->first();
        if($url){
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
        return view('urlSaved',['url' => $url]);
    }
}
