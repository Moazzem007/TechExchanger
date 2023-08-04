<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function update(Request $request, $id)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['mobile_no'] = $request->mobile_no;
        $data['address'] = $request->address;
        $data['updated_at'] = now();

        DB::table('users')->where('id', $id)->update($data);
        return redirect()->back();
    }
}
