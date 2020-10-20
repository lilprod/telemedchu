<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Storage;
use App\User;

class ChatsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'lastactivity']);
    }
    
    /**
     * Show chats
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = auth()->user()->role_user;
        $users=  User::orderBy('name')->where('id', '!=', auth()->user()->id)
                                    ->where('role_user', '!=', $role)
                                    ->get();
        
        return view('chats.chat',compact('users'));
        
    }

    /* public function getCurrentUser(){
        return $user = auth()->user();
    } */


    /* public function listUsers()
    {
        $role = auth()->user()->role_user;
        return User::orderBy('name')->where('id', '!=', auth()->user()->id)
                                    ->where('role_user', '!=', $role)
                                    ->get();
    } */

    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages(Request $request)
    {
        $authId = Auth()->user()->id;
        $userId = $request->get('user_id');
        $isTyping = $request->get('is_typing');

        $messages= Message::whereIn('sender_id', array($authId, $userId))
                      ->whereIn('receiver_id', array($authId, $userId))
                      ->orderBy('id')
                      ->get();

        $role = auth()->user()->role_user;
        $users=  User::orderBy('name')->where('id', '!=', auth()->user()->id)
                                    ->where('role_user', '!=', $role)
                                    ->get();              

        foreach($messages as $message){

            foreach($users as $user){
                $user->badge = $user->badge();
                $user->online = $user->isOnline();
                $user->lastactivity = $user->formatLastActivity();
            }
            
            if($isTyping == 1){
                $message->typing_sender = auth()->user()->id;
            }else{
                if($message->typing_sender == auth()->user()->id){
                    $message->typing_sender = 0;
                }
            }
            $message->save();
           
            $message->profile_picture = Storage::disk('public')->url('/app/public/public/cover_images/'.$message->receiver->profile_picture);
            $message->users_badge = $users;
            $message->time = $message->created_at->format('H:i');
            $message->message_date = $message->messageDate();
        }

        return $messages;

    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {

        $user = Auth::user();
        $data = $request->all();
        $fileNameToStore = null;
        
        if ($request->file('file')) {
            // Get filename with the extension
            $fileNameWithExt = $request->file('file')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file('file')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('file')->storeAs('public/message_images', $fileNameToStore);
        }else{
            $fileNameToStore = null;
            $data['filesize'] = 0;
        }
    

        $message = Message::create([
            'sender_id'   => $data['sender_id'],
            'receiver_id' => $data['receiver_id'],
            'message' => $data['message'],
            'type' => $data['type'],
            'status' => 0,
            'file' => $fileNameToStore,
            'filesize' => $data['filesize'],
            'path' => url('/storage/message_images/'.$fileNameToStore)
        ]);

        if($message){
            $message->status = 1;
            $message->save();
        }

       // broadcast(new MessageSent($user, $message))->toOthers();

       //dd($message);

        return $message;
    }

    public function seenMessage(Request $request){
        $senderId = $request->get('sender_id');
        $receiverId = $request->get('receiver_id');


        $lastMessage = Message::whereIn('sender_id', array($senderId, $receiverId))
        ->whereIn('receiver_id', array($senderId, $receiverId))
        ->orderBy('id', 'desc')
        ->first();

        if($lastMessage != null){
            if($lastMessage->receiver_id == auth()->user()->id){
                $messages = Message::whereIn('sender_id', array($senderId, $receiverId))
                            ->whereIn('receiver_id', array($senderId, $receiverId))
                            ->get();
                foreach($messages as $message){
                    $message->status = 2;
                    $message->save();
                }
            }
        }
        
        $user = User::findOrfail($receiverId);
        $user->profile_picture = url('/storage/cover_images/'.$user->profile_picture);
        $user->online = $user->isOnline();

        return $user;
    }

    public function getTyping(Request $request){
        
    }
}
