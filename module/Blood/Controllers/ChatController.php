<?php

namespace Module\Blood\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Module\Blood\Models\Chat;
use Module\Blood\Models\ChatList;

class ChatController extends Controller
{
    


    public function index(){

        
        $data['user'] = User::find(auth()->user()->id);

        $data['chat_lists'] = ChatList::where('receiver_id',auth()->user()->id)
                        ->orWhere('sender_id', auth()->user()->id)
                        ->likeSearchFromRelation('sender','name')
                        ->get();

        $unread_all_chats = Chat::where('receiver_id', auth()->user()->id)->where('is_all_read',0)->get();
        foreach ($unread_all_chats as $key => $chat) {
            
            $chat->update([
                'is_all_read'       => 1,
                ]);
                
            }
        return view('chat.index',$data);
    }


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
        $unread_chats = Chat::where('receiver_id', auth()->user()->id)->where('is_read',0)->where('sender_id',$user->id)->get();
        foreach ($unread_chats as $key => $chat) {
                
                $chat->update([
                    'is_read'       => 1,
                ]);

            }

        return view('chat.show',$data);                

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
        $chat = Chat::create([

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
            'chat_id'               => $chat->id,
            'chat'                  => $request->chat,
        ]);

        return redirect()->back();

    }




    public function destroy($id)
    {
        try {

            $chat = Chat::query()->find($id);
            $chat_list = ChatList::query()->where('chat_id',$id)->first();
            $chat->delete();
            optional($chat_list)->delete();
        }catch (\Throwable $th){
            dd($th->getMessage());
        }
        return redirect()->back();
    }




}
