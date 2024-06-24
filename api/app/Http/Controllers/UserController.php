<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getLoggedInUser(Request $request)
    {
        // Retrieve the authenticated user from the request
        $user = $request->get('user');

        return response()->json(['user' => $user], 200);
    }

    public function checkUser(Request $request)
    {
        $exists = DB::table('tbl_users')->where('mobile', $request->mobile)->exists();
        return response()->json(['exists' => $exists], 200);
    }

    public function checkValidity()
    {
        $settings = DB::table('tbl_settings')->get();

        $validity = $settings->firstWhere('type', 'app_validity');

        return response()->json(['valid_till' => $validity ? $validity->message : null], 200);
    }

    public function getCategory()
    {
        $category = DB::table('tbl_student_category')->get();

        return response()->json(['category' => $category], 200);
    }
    public function getSubCategory($id)
    {
        $subCategory = DB::table('tbl_student_subcategory')->where('cat_id', $id)->get();

        return response()->json(['sub-category' => $subCategory], 200);
    }
}
