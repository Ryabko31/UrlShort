<?php

namespace App\Services\Helpers;

use App\Jobs\DeactivateLink;
use App\Models\Block;
use App\Models\Location;
use App\Models\ShortLink;
use Carbon\Carbon;
use Illuminate\Support\Str;

class StoreLinkHelpers
{

    public static function storeLink(object $link)
    {
        $data = self::inputBody($link);
        $shortLink = ShortLink::create($data);
        DeactivateLink::dispatch($shortLink->id)->delay(now()->addMinutes($shortLink->life_time_in_minute)); //Можливий варіан через Carbon, проте мнені здалося що так краще

        return true;
    }

    public static function inputBody(object $link)
    {
        $data['link'] = $link->link;
        $data['code'] = Str::random(8);
        $data['limit_request'] = $link->limit_request;
        $data['life_time_in_minute']=$link->life_time_in_minute==0?1440:$link->life_time_in_minute;
        $data['is_infinite'] = $link->limit_request==0?true:false;
        return  $data;
    }
}
