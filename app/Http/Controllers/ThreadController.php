<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Filters\ThreadFilter;
use App\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except('show','index');
    }

    public function index(Channel $channel,ThreadFilter $filters,Request $request )
    {
//        $tasks = Tasks::where('task',true)->get();
//        $tasks = Tasks::done()->get();
        $threads = $this->getThread($channel, $filters);
        if($request->wantsJson())
        {
            return $threads;
        }



//         App\Book::with('author')->get();
        return view('threads.index',compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('threads.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            ['title'=> 'required',
            'body'=> 'required',
            'channel_id'=> 'required|exists:channels,id',

            ]
            );
       $thread =Thread::create([
            'user_id' => auth()->id(),
            'channel_id'=>request('channel_id'),
            'title' => request('title'),
            'body' => request('body')
        ]);
        return redirect($thread->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show($channelId,Thread $thread)
    {
        return view('threads.show', [
         'thread' => $thread,
         'replies' => $thread->replies()->paginate(20)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        //
    }

    /**
     * @param Channel $channel
     * @param ThreadFilter $filters
     * @return $this|\Illuminate\Support\Collection
     */
    public function getThread(Channel $channel, ThreadFilter $filters)
    {
        $threads = Thread::latest()->filter($filters);
//        $threads = Thread::latest()->latestget();

        if ($channel->exists) {
            $threads = $threads->where('channel_id', $channel->id);

//            $channel_id = Channel::where('slug',$channel)->get()->first();
//            $threads = Thread::where("channel_id",$channel_id->id)->latest()->get();

        }

        $threads = $threads->paginate(25);
        return $threads;
    }
}
