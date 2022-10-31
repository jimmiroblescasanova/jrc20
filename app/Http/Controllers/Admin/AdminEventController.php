<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveEventRequest;

class AdminEventController extends Controller
{
    public function index()
    {
        $events = Event::query()
            ->orderBy('date', 'desc')
            ->paginate();

        return view('admin.events.index', [
            'events' => $events,
        ]);
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(SaveEventRequest $request)
    {
        $path = $request->file('image')->store('events');
        $slug = Str::slug($request->title);

        $event = Event::create([
            'title' => $request->title,
            'slug' => $slug,
            'subtitle' => $request->subtitle,
            'summary' => $request->summary,
            'image' => $path,
            'date' => $request->date,
        ]);

        return redirect()->route('admin.events.index');
    }
}
