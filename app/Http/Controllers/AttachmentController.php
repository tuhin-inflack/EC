<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 1/17/19
 * Time: 1:43 PM
 */

namespace App\Http\Controllers;


use App\Traits\FileTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
{
    use FileTrait;
    //For test purpose
    public function index()
    {
        return view('attachment.index');
    }

    //For test purpose
    public function uploadFile(Request $request)
    {
        $path = $this->upload($request->file('test_attachment'), config('filesystems.paths.test'));
        return view('attachment.index', compact('path'));
    }

    /*
     * Download the attachments
     */
    public function downloadFile($fileName)
    {
        return $this->download('test/' . $fileName, 'test-file');
    }

    public function get($fileName)
    {
        return $this->view('test/' . $fileName);
    }

    public function fileUrl($fileName = 'abc')
    {
        $url = Storage::disk('internal')->url('test/' . $fileName);
        return view('attachment.index', compact('url'));
    }
}
