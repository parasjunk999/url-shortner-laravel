<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortLink;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{
    public function index()
    {
        $shortLinks = ShortLink::latest()->get();
       return view('shortenLink',compact('shortLinks'));
    }

    public function store(Request $request)
    {
       $request->validate([
        'link' => 'required|url'
       ]);

       $input['link'] = $request->link;
       $input['code'] = Str::random(6);

       ShortLink::create($input);
    
       return redirect('genrate-shorten-link')->withSuccess('Shorten Link Genrated Successfully.');
    }


    public function shortenLink($code)
    {
        $find = ShortLink::where('code',$code)->first();

        return redirect($find->link);
    }
}
