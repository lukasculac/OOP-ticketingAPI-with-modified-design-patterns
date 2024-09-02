<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\FilesFIlter;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreFileRequest;
use App\Http\Requests\V1\UpdateFileRequest;
use App\Http\Resources\V1\FileCollection;
use App\Http\Resources\V1\FileResource;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new FilesFilter();
        $queryItems = $filter->transform($request); //[['column', 'operator', 'value']]
        if (count($queryItems) == 0) {
            return new FileCollection (File::paginate());
        } else {
            $files = File::where($queryItems)->paginate();
            return new FileCollection ($files->appends($request->query()));        }
    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        return new FileResource($file);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        Storage::delete($file->path);
        $file->delete();
        return response()->json(null, 204);
    }
}
