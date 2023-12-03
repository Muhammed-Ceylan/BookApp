<?php

namespace App\Http\Controllers\admin\author;

use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Models\Authors;
use Illuminate\Http\Request;
use App\Helper\imageUpload;

class AuthorIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Authors::paginate(10);
        return view('admin.author.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['self_link'] = mHelper::permalink($request['name']);
        $request['image'] = imageUpload::singleUpload(rand(1, 10000), 'author', $request->file('image'));
        $insert = Authors::create($request->all());
        return redirect()->back()->with($insert ? 'status' : 'error', $insert ? 'Yazar eklendi.' : 'Yazar eklenemedi.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Authors $authors)
    {
        $data = Authors::where('id', $authors->id)->get();
        return view('admin.author.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = $request->except('_token');
        $data['self_link'] = mHelper::permalink($data['name']);
        $data['image'] = imageUpload::singleUpload(rand(1, 10000), 'author', $request->file('image'));
        $update = Authors::where('id', $request->id)->update($data);
        return redirect()->back()->with($update ? 'status' : 'error', $update ? 'Yazar düzenlendi.' : 'Yazar düzenlenemedi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $data = Authors::where('id', $id)->count();
        if ($data != 0) {
            $delete = Authors::where('id', $id)->delete();
            return redirect()->back();
        } else {
            return redirect()->back()->with('status', 'Yazar silinemedi');
        }
    }
}
