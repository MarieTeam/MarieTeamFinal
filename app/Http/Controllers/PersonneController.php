<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Support\Facades\DB;

class PersonneController
{
    public function getPeopleTypes()
    {
        $peopleTypes = DB::table('type')
            ->where('lettre', '=', 'A')
            ->get();
        return response()->json($peopleTypes);
    }

}
