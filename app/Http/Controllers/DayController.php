<?php

namespace App\Http\Controllers;

use App\Day;
use Illuminate\Http\Request;

class DayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $days = Day::all();
        return view( 'days.index', compact('days') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('days.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules() );
        $day = Day::create( $request->all() );
        if ( $request->hasfile('files') ) {
            $day->saveFiles( $request->allFiles() );
        }
        return redirect()
                ->action('DayController@show', ['id' => $day->id ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Day  $day
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        $day = Day::findOrFail( $id );
        $files = $day->files;
        $images = $day->images();
        $videos = $day->videos();
        return view('days.show', compact('day', 'files', 'images', 'videos') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Day  $day
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        $day = Day::with('files')->findOrFail($id);
        $files = $day->files;
        $images = $day->images();
        $videos = $day->videos();
        return view('days.edit', compact('day', 'files', 'images', 'videos') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Day  $day
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->rules() );
        $day = Day::findOrFail( $id );
        $day->update( $request->all() );
        if ( $request->hasfile('files') ) {
            $day->saveFiles( $request->allFiles() );
        }
        return redirect()
                ->action('DayController@show', ['id' => $day->id ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Day  $day
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        $day = Day::findOrFail( $id );
        $files = $day->files;
        foreach ($files as $file ) {
            $file->delete();
        }
        Day::destroy( $id );
        return redirect('days');
    }

    private function rules()
    {
        $rules = [
            'date' => 'required',
            'files.*' => 'mimetypes:video/avi,video/mpeg,video/quicktime,image/jpeg,image/png,image/gif,image/svg+xml,image/bmp|max:20000|'
        ];
        return $rules;
    }
}
