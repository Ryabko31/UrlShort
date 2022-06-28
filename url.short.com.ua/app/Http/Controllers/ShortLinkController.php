<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLinkRequest;
use App\Models\ShortLink;
use App\Services\Helpers\StoreLinkHelpers;
use Illuminate\Http\Request;

class ShortLinkController extends Controller
{

    public function index()
    {
        $shortLinks=ShortLink::all();
        return view('index', compact('shortLinks'));
    }

    public function store(StoreLinkRequest $request)
    {
        StoreLinkHelpers::storeLink($request);

        return redirect()->back()
            ->with('success', 'Коротке посилання згенеровано успішно');
    }

    public function shortLink($code)
    {
        if (  $url = ShortLink::where(['code' => $code, 'is_active' => true])->first()) {
            if ($url->is_infinite) {
                return redirect($url->link);
            } else {
                if ($url->limit_request == 1) {
                    $url->decrement('limit_request');
                    $url->update(['is_active' =>false]);
                    return redirect($url->link);
                } else {
                    $url->decrement('limit_request');
                    return redirect($url->link);
                }
            }
        } else {
            return redirect('404');
        }
    }
}
