<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use Illuminate\Support\Facades\Storage;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all notifications and pass it to the view
        $user = auth()->user()->id;
        $notifications = Notification::where('receiver_id', $user)
                                        ->orderBy('id', 'desc')
                                        ->get();

        return view('notifications.index')->with('notifications', $notifications);
    }

    public function lastNotifAjax(){
        $user = auth()->user()->id;
        $notifications = Notification::where('receiver_id', $user)
                                        ->orderBy('id', 'desc')
                                        ->limit(5)
                                        ->get();
        foreach($notifications as $notification){
            $notification->profile_picture = Storage::disk('public')->url('/app/public/public/cover_images/'.$notification->sender->profile_picture);
            $notification->unread = Notification::where('status', 0)
                                    ->where('receiver_id', $user)
                                    ->count();
        }

            return $notifications;
    }

    public function updateStatusAjax(Request $request){
        $notification = Notification::find($request->get('id'));
        $notification->status = 1;
        $notification->save();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
