<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminTagController extends Controller
{
    public function index()
    {
        return view('admin.tags.index', [
            'tags' => Tag::paginate(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
            'name' => ['required', 'string'],
        ]);

        $tag = Tag::create($validatedData);
        flash()->addSuccess('Etiqueta creada con éxito');
        return back();
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        flash()->addSuccess('Etiqueta eliminada con éxito');
        return back();
    }
}
