<?php

/**
 * ConvertHourToMinutes
 */
if (! function_exists('convertHourToMinutes')):
    function convertHourToMinutes($time)
    {
        list($hours, $minutes) = explode(":", $time);
        $timeInMinutes = ($hours * 60) + $minutes;
        return $timeInMinutes;
    }
endif;
