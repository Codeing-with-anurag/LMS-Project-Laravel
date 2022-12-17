<?php

namespace App\Services;

use App\Models\Exam;
use App\Models\Plan;
use App\Models\Subject;
use App\Models\Test;
use App\Models\Country;
use App\Models\State;

class CommonService {
    /* Get Total Count of Exam */

    public static function totalExam() {
        return Exam::all()->count();
    }

    /* Get Total Count of Plan */

    public static function totalPlan() {
        return Plan::all()->count();
    }

    /* Get Total Count of Plan */

    public static function totalSubject() {
        return Subject::all()->count();
    }

    /* Get Total Count of Plan */

    public static function totalTest() {
        return Test::all()->count();
    }

    /* Get Total Country */

    public static function totalCountry() {
        return Country::all()->count();
    }
    /* Get Total State */

    public static function totalState() {
        return State::all()->count();
    }

}
