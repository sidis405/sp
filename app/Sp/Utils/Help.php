<?php

namespace Sp\Utils;

class Help {

    public static function get_domain($url = SITE_URL)
    {
        preg_match("/[a-z0-9\-]{1,63}\.[a-z\.]{2,6}$/", parse_url($url, PHP_URL_HOST), $_domain_tld);
        if(count($_domain_tld) > 0)
        {
            return $_domain_tld[0];
        }
        return null;
    }

    public static function createDateRangeArray($strDateFrom,$strDateTo)
    {
        // takes two dates formatted as YYYY-MM-DD and creates an
        // inclusive array of the dates between the from and to dates.

        // could test validity of dates here but I'm already doing
        // that in the main script

        $aryRange=array();

        $iDateFrom=mktime(1,0,0,substr($strDateFrom,5,2),     substr($strDateFrom,8,2),substr($strDateFrom,0,4));
        $iDateTo=mktime(1,0,0,substr($strDateTo,5,2),     substr($strDateTo,8,2),substr($strDateTo,0,4));

        if ($iDateTo>=$iDateFrom)
        {
            array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
            while ($iDateFrom<$iDateTo)
            {
                $iDateFrom+=86400; // add 24 hours
                // if(!$this->isWeekend(date('Y-m-d',$iDateFrom)))
                // {

                array_push($aryRange,date('Y-m-d',$iDateFrom));
                // }
            }
        }
        return $aryRange;
    }

}