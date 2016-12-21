<?php

namespace Sp\Repositories;

use BrowserDetect;
use Sp\Models\Ads;


class AdsRepo
{
    
    public function save(Ads $Ads)
    {
        $Ads->save();

        return $Ads;
    }

    public function getForPage($page)
    {
        $result = BrowserDetect::detect();

        $is_mobile = ($result['isMobile']) ? 1 : 0;
        
        return Ads::wherePage($page)->where('is_mobile', $is_mobile)->get()->keyBy('name');

    }

    public function getAll()
    {
        return Ads::orderBy('id', 'ASC')->get();
    } 

    public function getById($id)
    {
        return Ads::where('id', $id)->first();
    } 

}
