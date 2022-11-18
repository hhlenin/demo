<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $review = [];
        parse_str($request->review, $review);

        Review::insert([
            'name' => $review['name'],
            'email' => $review['email'],
            'subject' => $review['subject'],
            'rating' => $review['rating'],
            'message' => $review['message'],
            'product_id' => $review['product_id'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return response()->json(['status' => 1]);
    }
}
