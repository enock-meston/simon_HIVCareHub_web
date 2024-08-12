<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    //
    public function index()
    {
        $titles = 'chat';
        $messages = Message::where(function ($query) {
            $query->Where('receiver_id', Auth::user()->id);
        })->orderBy('created_at', 'asc')->get();

        return view('admin.message', compact('titles','messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        $message = Message::create([
            'sender_id' => $request->receiver_id,
            'receiver_id' => Auth::user()->id,
            'message' => $request->message,
        ]);


        if ($message) {
            # code...
            return back()->with('message','message successfully sent');
        } else {
            # code...
            return back()->with('error','message not sent');
        }
    }


    // by APIs
    public function viewMessage($id)
{
    try {
        // Retrieve messages between the specified sender and the currently authenticated user
        $messages = Message::where('sender_id', $id)->orderBy('created_at', 'asc')->get();

        // Check if there are any messages
        if ($messages->isEmpty()) {
            return response()->json([
                'status' => 'info',
                'message' => 'No messages found'
            ], 404);
        }

        // Return the messages
        return response()->json([
            'status' => 'success',
            'message' => 'Messages retrieved successfully',
            'data' => $messages
        ], 200);
    } catch (\Exception $e) {
        // Return a more detailed error message if an exception is caught
        return response()->json([
            'status' => 'error',
            'message' => 'An error occurred while retrieving messages: ' . $e->getMessage()
        ], 500);
    }
}




public function storeMessageApi(Request $request)
{
    $request->validate([
        'sender_id' => 'required',
        'message' => 'required|string',
    ]);

    $message = Message::create([
        'sender_id' => $request->sender_id,
        'receiver_id' => 1,
        'message' => $request->message,
    ]);

    if ($message) {
        return response()->json([
            'status' => 'success',
            'message' => 'successfully',
        ], 200); // HTTP status code 200 for OK
    } else {
        return response()->json([
            'status' => 'error',
            'message' => 'Message not sent',
        ], 400); // HTTP status code 400 for Bad Request
    }
}




}
