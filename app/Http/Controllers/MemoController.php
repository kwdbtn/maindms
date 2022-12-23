<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Http\Request;

class MemoController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $memos = Memo::orderBy('created_at', 'desc')->get();
        return view('memos.index', compact('memos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Memo $memo) {
        return view('memos.form', compact('memo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $memo = Memo::create([
            'sender'    => $request->sender,
            'recipient' => $request->recipient,
            'date'      => date('Y-m-d', strtotime($request->date)),
            'file_no'   => $request->file_no,
            'subject'   => $request->subject,
            'body'      => $request->body,
            'status'    => 'Draft',
        ]);

        $memo->carbon_copies()->sync($request->carbon_copies);

        return redirect()->route('memos.edit', compact('memo'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function show(Memo $memo) {
        return view('memos.show', compact('memo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function edit(Memo $memo) {
        return view('memos.form', compact('memo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Memo $memo) {
        if (request()->has('send')) {
            dd('in here x');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Memo $memo) {
        //
    }
}
