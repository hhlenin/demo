<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Session;

class ChatController extends Controller
{
    public function store(Request $request)
    {
        $chat = [];
        parse_str($request->data, $chat);
        if ($chat['user_id'] == Session::get('customer_id')) {
            return response()->json(['status' => 0]);

        }
        Chat::insert([
            'user_id' =>  Session::get('customer_id'),
            'customer_id' => $chat['user_id'],
            'sent_by_customer' => Session::get('customer_id'),
            'receive_by_customer' => $chat['user_id'],
            'message' => $request['chat'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json([
            'status' => 1,
        ]);
    }

    public function index()
    {
        $chats = Chat::with('profile')
        ->where(['user_id' => Session::get('customer_id')])
        ->latest()
        ->get();

        $collection = collect($chats);

        $last_chats = $collection->where('user_id', $collection->first()->user_id)
        ->where('customer_id', $collection->first()->customer_id);


        $unique_chats = $collection
        ->unique('customer_id');

        return view('customer.chat.index', compact('last_chats', 'unique_chats'));
    }

    public function get(Request $request) {
        $last_chats = Chat::with('profile')
        ->where(['user_id' => Session::get('customer_id'), 'customer_id'=> $request->customer_id])
        ->get();

        // $collection = collect($chats);

        // return $last_chats;

        return view('customer.chat.partials.get-mesaage', compact('last_chats'));
    }
}
