<?php

require_once __DIR__."/../vendor/autoload.php";

use Countries\DB;

assert(DB::getLatitudeByAlpha2("TR") === "39");
assert(DB::getLongitudeByAlpha2("TR") === "35");
