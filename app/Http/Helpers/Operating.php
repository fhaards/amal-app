<?php

namespace App\Http\Helpers;

use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Operating
{

    // INSERT 
    public static function insertDB($table, $data)
    {
        try {
            DB::table($table)->insert($data);
            return true;
        } catch (\Exception $e) {
            $logData = [
                'function' => 'INSERT-DB',
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'message' => $e->getMessage(),
            ];
            Log::error(json_encode($logData));
            return false;
        }
    }

    public static function updateDB($table, $data, $key)
    {
        try {
            DB::table($table)->where($key)->update($data);
            return true;
        } catch (\Exception $e) {
            $logData = [
                'function' => 'UPDATE-DB',
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'message' => $e->getMessage(),
            ];
            Log::error(json_encode($logData));
            return false;
        }
    }

    public static function deleteDB($table, $key)
    {
        try {
            DB::table($table)->where($key)->delete();
            return true;
        } catch (\Exception $e) {
            $logData = [
                'function' => 'DELETE-DB',
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'message' => $e->getMessage(),
            ];
            Log::error(json_encode($logData));
            return false;
        }
    }

    public static function dateInterval($dateToCompare)
    {
        $dateInterval = '';
        $dateToCompare = new DateTime($dateToCompare);
        $dateNow  = new DateTime(date('Y-m-d H:i:s', time()));
        $interval = $dateToCompare->diff($dateNow);

        $years    = (int)$interval->format('%Y');
        $months   = (int)$interval->format('%m');
        $days     = (int)$interval->format('%d');
        $hours    = (int)$interval->format('%H');
        $minutes  = (int)$interval->format('%i');

        if ($years >= 1) {
            $dateInterval .= $years . ' Years';
        }
        if ($months >= 1) {
            $dateInterval .= ' ' . $months . ' Months';
        }
        if ($days >= 1) {
            $dateInterval .= ' ' . $days . ' Days';
        }
        if (empty($dateInterval)) {
            if ($hours == 0 && $minutes <= 5) {
                $dateInterval .= 'now';
            } else {
                if ($hours >= 1) {
                    $dateInterval .= ' ' . $hours . ' Hours';
                }

                if ($minutes >= 1) {
                    $dateInterval .= ' ' . $minutes . ' Minutes';
                }
            }
        }

        return trim($dateInterval . ' ago');
    }
}
