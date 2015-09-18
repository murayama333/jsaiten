<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\FeedbackRequest;
use App\Http\Controllers\Controller;

use App\Presen;
use App\Like;
use App\Feedback;

class PresensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $presen = Presen::findOrFail($id);
        return view('presens/show', compact(['presen']));
    }


    public function like($presenId)
    {
        $like = Presen::findOrFail($presenId)->likes()->where('user_id', '=', \Auth::user()->id)->first();

        if($like == null){
            $like = new Like();
            $like->presen_id = $presenId;
            $like->user_id = \Auth::user()->id;
            $like->count = 0;
        }
        $like->datetime = \Carbon\Carbon::now();
        $like->count++;
        $like->save();

        $likeCount = $like->count;
        return \Response::json(compact(['likeCount']));
    }

    public function createFeedback($presenId)
    {
        $feedback = Presen::findOrFail($presenId)->feedbacks()->where('user_id', '=', \Auth::user()->id)->first();
        if($feedback == null){
            $feedback = new Feedback();
            $feedback->presen_id = $presenId;
        }
        return view('presens/feedback', compact(['feedback']));
    }


    public function storeFeedback(FeedbackRequest $request, $presenId)
    {
        $feedback = Presen::findOrFail($presenId)->feedbacks()->where('user_id', '=', \Auth::user()->id)->first();

        if($feedback == null){
            $feedback = new Feedback();
            $feedback->presen_id = $presenId;
            $feedback->user_id = \Auth::user()->id;
        }
        $feedback->datetime = \Carbon\Carbon::now();
        $feedback->comment = $request->comment;
        $feedback->save();

        return redirect("/feedback/{$feedback->presen->id}")
        ->with(['flash_message' => "登録が完了しました。"])
        ->withInput();
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
