<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Message;
use App\User;
use Auth;
use Illuminate\Http\Request;

class contactsController extends Controller
{
    public function get()
    {
        // get all with shops except the authenticated one
        // $contacts = User::where('id', '!=', auth()->id())->get();
        $contacts = User::where('role', '=', 1)->get();
       

// get a collection of items where sender_id is the user who sent us a message
        // and messages_count is the number of unread messages we have from him
        $unreadIds = Message::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
            ->where('to', auth()->id())
            ->where('read', false)
            ->groupBy('from')
            ->get();

// add an unread key to each contact with the count of unread messages
        $contacts = $contacts->map(function ($contact) use ($unreadIds) {
            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();

            $contact->unread = $contactUnread ? $contactUnread->messages_count : 0;

            return $contact;
        });

        return response()->json($contacts);

    }

    public function getMessagesFor($id)
    {
        // mark all messages with the selected contact as read
        Message::where('from', $id)->where('to', auth()->id())->update(['read' => true]);

        // get all messages between the authenticated user and the selected user
        $messages = Message::where(function ($q) use ($id) {
            $q->where('from', auth()->id());
            $q->where('to', $id);
        })->orWhere(function ($q) use ($id) {
            $q->where('from', $id);
            $q->where('to', auth()->id());
        })
            ->get();

        return response()->json($messages);
    }

    public function send(Request $request)
    {
        $id = auth::user()->id;

        $message = Message::create([
            'from' => $id,
            'to' => $request->contact_id,
            'text' => $request->text,
        ]);

        broadcast(new NewMessage($message));

        return response()->json($message);
    }

    public function Apiget()
    {
        // get all with shops except the authenticated one
        // $contacts = User::where('id', '!=', auth()->id())->get();
       $contacts = User::where('role', '=', 1)->get();


   

// get a collection of items where sender_id is the user who sent us a message
        // and messages_count is the number of unread messages we have from him
        $unreadIds = Message::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
            ->where('to', auth()->id())
            ->where('read', false)
            ->groupBy('from')
            ->get();

// add an unread key to each contact with the count of unread messages
        $contacts = $contacts->map(function ($contact) use ($unreadIds) {
            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();

            $contact->unread = $contactUnread ? $contactUnread->messages_count : 0;

            return $contact;
        });

        return response()->json([
            'success' => true,
            'contacts' => $contacts,
        ]);

    }

    public function getMessagesForApi(Request $request)
    {
        $id = $request->id;
        // mark all messages with the selected contact as read
        Message::where('from', $id)->where('to', auth()->id())->update(['read' => true]);

        // get all messages between the authenticated user and the selected user
        $messages = Message::where(function ($q) use ($id) {
            $q->where('from', auth()->id());
            $q->where('to', $id);
        })->orWhere(function ($q) use ($id) {
            $q->where('from', $id);
            $q->where('to', auth()->id());
        })
            ->get();

        return response()->json([
            'success' => true,
            'messages' => $messages,
        ]);

    }

    public function sendApi(Request $request)
    {
        $id = auth::user()->id;

        $message = Message::create([
            'from' => $id,
            'to' => $request->user_id,
            'text' => $request->text,
        ]);

        broadcast(new NewMessage($message));

        return response()->json([
            'success' => true,
            'mess' => $message,
        ]);

    }
}
