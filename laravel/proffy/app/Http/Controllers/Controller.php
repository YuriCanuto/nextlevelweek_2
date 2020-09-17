<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function scheduleMap($request) : Collection
    {
        $schedules = (collect($request->schedule))->map(function($schedule) {
            return [
                "week_day" => $schedule['week_day'],
                "from"     => convertHourToMinutes($schedule['from']),
                "to"       => convertHourToMinutes($schedule['to'])
            ];
        });

        return $schedules;
    }
}
