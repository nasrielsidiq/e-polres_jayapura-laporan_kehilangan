<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

class AddressController extends Controller
{
    public function provinces()
    {
        return response()->json(Province::orderBy('name')->get());
    }

    public function cities($provinceCode)
    {
        return response()->json(City::where('province_code', $provinceCode)->orderBy('name')->get());
    }

    public function districts($cityCode)
    {
        return response()->json(District::where('city_code', $cityCode)->orderBy('name')->get());
    }

    public function villages($districtCode)
    {
        return response()->json(Village::where('district_code', $districtCode)->orderBy('name')->get());
    }
}