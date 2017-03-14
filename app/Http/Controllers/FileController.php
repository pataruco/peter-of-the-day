<?php

namespace App\Http\Controllers;

use \App\File;
use Illuminate\Http\Request;
use Storage;

class FileController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = File::findOrFail( $id );
        $file->deleteMediaOnS3();
        $file->delete();
        return back();
    }
}
