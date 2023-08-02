<?php

use App\Models\User;

if (!function_exists('genDate')) {
    function genDate($date, $lang = true)
    {
        $time = strtotime($date);
        $y = $lang ? ' พ.ศ. ' : ' ค.ศ. ' ;
        $text = 'วันที่ %s เดือน%s ' . $y . '%s เวลา %s';
        $month_text = [
            1 => ['th' => 'มกราคม', 'en' => 'January'],
            2 => ['th' => 'กุมภาพันธ์', 'en' => 'Febuary'],
            3 => ['th' => 'มีนาคม', 'en' => 'March'],
            4 => ['th' => 'เมษายน', 'en' => 'April'],
            5 => ['th' => 'พฤษภาคม', 'en' => 'May'],
            6 => ['th' => 'มิถุนายน', 'en' => 'June'],
            7 => ['th' => 'กรกฎาคม', 'en' => 'July'],
            8 => ['th' => 'สิงหาคม', 'en' => 'August'],
            9 => ['th' => 'กันยายน', 'en' => 'September'],
            10 => ['th' => 'ตุลาคม', 'en' => 'October'],
            11 => ['th' => 'พฤศจิกายน', 'en' => 'November'],
            12 => ['th' => 'ธันวาคม', 'en' => 'December'],
        ];

        $year = date('Y', $time) + ($lang ? 543 : 0);
        $month = (Int) date('m',$time);
        $day = date('d',$time);
        $t = date('H:i',$time);

        return sprintf($text,$day,$month_text[$month][$lang ? 'th' : 'en'],$year,$t);
    }
}

function getUser() {
    return User::all();
}
