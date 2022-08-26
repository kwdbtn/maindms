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
        $memos = Memo::all();
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
        $attachment         = $request->file('attachment');
        $filenameAttachment = 'attachment' . time() . '.' . $attachment->getClientOriginalExtension();
        $pathAttachment     = $attachment->storeAs('MemoAttachments', $filenameAttachment);

        Memo::create([
            'sender'     => $request->sender,
            'recipient'  => $request->recipient,
            'date'       => date('Y-m-d', strtotime($request->date)),
            'file_no'    => $request->file_no,
            'subject'    => $request->subject,
            'body'       => $request->body,
            'attachment' => $pathAttachment,
            'status'     => 'pending',
        ]);

        return redirect()->route('memos.index');
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
        //
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
