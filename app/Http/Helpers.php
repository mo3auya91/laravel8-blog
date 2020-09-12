<?php

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
