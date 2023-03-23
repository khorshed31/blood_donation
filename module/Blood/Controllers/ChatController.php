<?php

namespace Module\Blood\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Module\Blood\Models\Chat;
use Module\Blood\Models\ChatList;

class ChatController extends Controller
{
    



    public function show($id)
    {
        $user = User::find($id);
        $data['user'] = User::find($id);
        $a = $user->id;
        $b = auth()->user()->id;

        if ($a < $b) {
            $temp = $a;
            $a = $b;
            $b = $temp;
        }

        

        $data['chats'] = Chat::where('room_id',$a.$b)
                        // ->orWhere('sender_id', $user->id)
                        // ->where('receiver_id',auth()->user()->id)
                        // ->orWhere('receiver_id',$user->id)
                        ->get(); 
                        

        $data['chat_lists'] = ChatList::where('receiver_id',auth()->user()->id)
                        ->orWhere('sender_id', auth()->user()->id)
                        ->likeSearchFromRelation('sender','name')
                        ->get();

        return view('chat.index',$data);                

    }





    public function store(Request $request)
    {
        $a = $request->receiver_id;
        $b = auth()->user()->id;

        if ($a < $b) {
            $temp = $a;
            $a = $b;
            $b = $temp;
        }
        Chat::create([

            // 'post_id'               => $request->post_id,
            'room_id'               => $a.$b,
            'receiver_id'           => $request->receiver_id,
            'sender_id'             => auth()->user()->id,
            'chat'                  => $request->chat,
        ]);

        ChatList::updateOrCreate([
            'receiver_id'           => $request->receiver_id,
            'sender_id'             => auth()->user()->id,
        ],[
            'chat'                  => $request->chat,
        ]);

        return redirect()->back();

    }




}
