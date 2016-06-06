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

}