<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function getLoggedInUser(Request $request)
    {
        $user = $request->get('user');

        function convertToString($arr)
        {
            foreach ($arr as $key => $value) {
                if (is_array($value)) {
                    $arr[$key] = convertToString($value);
                } elseif (is_object($value)) {
                    $arr[$key] = convertToString((array) $value);
                } else {
                    $arr[$key] = (string) $value;
                }
            }
            return $arr;
        }

        if (is_array($user)) {
            $user = convertToString($user);
        } elseif (is_object($user)) {
            $user = convertToString((array) $user);
        } else {
            Log::info('User is not an array or object', ['user' => $user]);
        }

        return response()->json(['user' => $user], 200);
    }


    public function checkUser($mobile)
    {
        $exists = DB::table('tbl_users')->where('mobile', $mobile)->exists();
        return response()->json(['exists' => $exists], 200);
    }

    public function checkValidity()
    {
        $settings = DB::table('tbl_settings')->get();

        $validity = $settings->firstWhere('type', 'app_validity');

        return response()->json(['valid_till' => $validity ? $validity->message : null], 200);
    }

    public function getCategoriesWithSubcategories()
    {
        $categories = DB::table('tbl_student_category')
            ->leftJoin('tbl_student_subcategory', 'tbl_student_category.id', '=', 'tbl_student_subcategory.cat_id')
            ->select(
                'tbl_student_category.id as category_id',
                'tbl_student_category.name as category_name',
                'tbl_student_category.image as category_image',
                'tbl_student_category.description as category_description',
                'tbl_student_category.status as category_status',
                'tbl_student_category.validity as category_validity',
                'tbl_student_subcategory.id as subcategory_id',
                'tbl_student_subcategory.name as subcategory_name',
                'tbl_student_subcategory.image as subcategory_image',
                'tbl_student_subcategory.description as subcategory_description',
                'tbl_student_subcategory.status as subcategory_status',
                'tbl_student_subcategory.fees as subcategory_fees',
                'tbl_student_subcategory.prize as subcategory_prize'
            )
            ->get();

        // Group the results by category
        $result = [];
        foreach ($categories as $category) {
            $categoryId = $category->category_id;
            if (!isset($result[$categoryId])) {
                $result[$categoryId] = [
                    'id' => $category->category_id,
                    'name' => $category->category_name,
                    'image' => $category->category_image,
                    'description' => $category->category_description,
                    'status' => $category->category_status,
                    'validity' => $category->category_validity,
                    'subcategories' => []
                ];
            }

            if ($category->subcategory_id) {
                $result[$categoryId]['subcategories'][] = [
                    'id' => $category->subcategory_id,
                    'name' => $category->subcategory_name,
                    'image' => $category->subcategory_image,
                    'description' => $category->subcategory_description,
                    'status' => $category->subcategory_status,
                    'fees' => $category->subcategory_fees,
                    'prize' => $category->subcategory_prize
                ];
            }
        }

        // Reset keys and return as JSON
        return response()->json(array_values($result), 200);
    }

    public function renewMembership(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|integer',
            'subcategory_id' => 'required|integer',
        ]);
        // Update the user's category and subcategory
        $update = DB::table('tbl_users')
            ->where('id', $id)
            ->update([
                'category_id' => $validatedData['category_id'], // Use the correct keys
                'subcategory_id' => $validatedData['subcategory_id']
            ]);

        if ($update) {
            return response()->json(['message' => 'Membership renewed successfully.'], 200);
        } else {
            return response()->json(['error' => 'Failed to update membership.'], 500);
        }
    }

    public function getUserToken($mobile)
    {
        $user = DB::table('tbl_users')
            ->where('mobile', $mobile)
            ->select('api_token')
            ->first();

        if ($user) {
            return response()->json(['api_token' => $user->api_token], 200);
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }

    public function checkMembershipExpiry(Request $request)
    {
        $user = $request->get('user');

        $category = DB::table('tbl_student_category')->find($user->category_id);
        $subcategory = DB::table('tbl_student_subcategory')->find($user->subcategory_id);

        $validity = $category->validity;

        $dateRegistered = Carbon::parse($user->date_registered);

        $expiryDate = $dateRegistered->addDays($validity);

        return response()->json(['expiry_date' => $expiryDate->toDateString()]);
    }

    public function settings(): JsonResponse
    {
        try {
            $setting = DB::table('tbl_settings')->get();

            if ($setting) {
                return response()->json($setting, 200);
            } else {
                return response()->json(['message' => 'Settings not found'], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching the settings'], 500);
        }
    }
}
