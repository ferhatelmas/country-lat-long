<?php

namespace Countries;

class DB
{
    private static $countries;

    static function parseCountries() {
        $data_file = __DIR__."/../../data/countries.json";
        $json = json_decode(file_get_contents($data_file), true);

        self::$countries = array();
        $meta = $json["meta"]["view"]["columns"];
        foreach($json["data"] as $country) {
            $newCountry = array();
            foreach($country as $key => $value) {
                $newCountry[$meta[$key]["fieldName"]] = $value;
            }
            self::$countries[$newCountry["alpha_2_code"]] = $newCountry;
        }
    }

    public static function getCountries() {
        return self::$countries;
    }

    public static function getCountryByAlpha2($code) {
        return self::$countries[$code];
    }

    public static function getCountryAlpha2Codes() {
        return array_keys(self::$countries);
    }

    public static function getLatitudeByAlpha2($code) {
        return self::$countries[$code]["latitude_average"];
    }

    public static function getLongitudeByAlpha2($code) {
        return self::$countries[$code]["longitude_average"];
    }
}
DB::parseCountries();
