<?php

use Illuminate\Support\Str;

function getLocalDirection()
{
    return LaravelLocalization::getCurrentLocaleDirection() == "rtl" ? ".rtl" : "";
}

function LOCALS()
{
    return LaravelLocalization::getSupportedLocales();
}

function pull_direction()
{
    return LaravelLocalization::getCurrentLocaleDirection() == "ltr" ? "pull-right" : "pull-left";
}

function float_direction()
{
    return LaravelLocalization::getCurrentLocaleDirection() == "ltr" ? "float-right" : "float-left";
}

function text_direction()
{
    return LaravelLocalization::getCurrentLocaleDirection() == "ltr" ? "text-left" : "text-right";
}

function getOtherLang()
{
    return app()->getLocale() == 'ar' ? 'en' : 'ar';
}

//function ascii($value, $language = 'en')
//{
//    return ASCII::to_ascii((string) $value, $language);
//}

function slug($title, $separator = '-', $language = 'en')
{
    //$title = $language ? Str::ascii($title, $language) : $title;

    // Convert all dashes/underscores into separator
    $flip = $separator === '-' ? '_' : '-';

    $title = preg_replace('![' . preg_quote($flip) . ']+!u', $separator, $title);

    // Replace @ with the word 'at'
    $title = str_replace('@', $separator . 'at' . $separator, $title);

    // Remove all characters that are not the separator, letters, numbers, or whitespace.
    $title = preg_replace('![^' . preg_quote($separator) . '\pL\pN\s]+!u', '', Str::lower($title));

    // Replace all separator characters and whitespace by a single separator
    $title = preg_replace('![' . preg_quote($separator) . '\s]+!u', $separator, $title);

    return trim($title, $separator);
}
