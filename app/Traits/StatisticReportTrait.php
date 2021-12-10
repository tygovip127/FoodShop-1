<?php

namespace App\Traits;

trait StatisticReportTrait
{
    public function statisticChangePercent($present, $past)
    {
        if (empty($present) && empty($past)) {
            $percent = 0;
        } else if (empty($present)) {
            $percent = -100;
        } else if (empty($past)) {
            $percent = 100;
        } else if ($present - $past >= 0) {
            $percent = number_format($present / $past * 100 - 100);
        } else {
            $percent =  number_format((100 - $present / $past * 100) * -1);
        }

        return $percent;
    }
   
}


    