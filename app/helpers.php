<?php

if (! function_exists('converStatus')) {
    function converStatus($stat_id) {
        $status[1] = 'wi';
        $status[2] = 'peserta';
        $status[3] = 'panitia';
        $status[4] = 'right';
        $status[5] = 'notif';

        return !empty($status[$stat_id]) ? $status[$stat_id] : "";
    }
}

if (! function_exists('converStatusFull')) {
    function converStatusFull($stat_id) {
        $status[1] = 'Instructure';
        $status[2] = 'Student';
        $status[3] = 'LO';

        return !empty($status[$stat_id]) ? $status[$stat_id] : "";
    }
}

