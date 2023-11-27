<?php

namespace App\Http\Controllers\admin\publisher;

use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Models\Publishers;
use Illuminate\Http\Request;

class publisherIndexController extends Controller
{
    public function index()
    {
        $data = Publishers::paginate(10);
        return view('admin.publisher.index', ['data' => $data]);
    }

    public function create()
    {
        return view('admin.publisher.create');
    }

    public function store(Request $request)
    {
        $request['self_link'] = mHelper::permalink($request['name']);

        $insert = Publishers::create($request->all());

        return redirect()->back()->with($insert ? 'status' : 'error', $insert ? 'Yayın evi eklendi.' : 'Yayın evi eklenemedi.');
    }
}
