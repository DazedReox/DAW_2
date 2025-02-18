<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speaker;
use Illuminate\Support\Facades\Validator;

class SpeakerController extends Controller
{
    public function index()
    {
        $speakers = Speaker::paginate(10);
        return view('speakers.index', compact('speakers'));
    }

    public function create()
    {
        return view('speakers.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'photo' => 'required|image',
            'expertise' => 'required|string',
            'social_links' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $photoPath = $request->file('photo')->store('speakers');

        Speaker::create([
            'name' => $request->name,
            'photo' => $photoPath,
            'expertise' => $request->expertise,
            'social_links' => $request->social_links,
        ]);

        return redirect()->route('speakers.index')->with('success', 'Ponente creado exitosamente.');
    }

    public function edit(Speaker $speaker)
    {
        return view('speakers.edit', compact('speaker'));
    }

    public function update(Request $request, Speaker $speaker)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image',
            'expertise' => 'required|string',
            'social_links' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('speakers');
            $speaker->photo = $photoPath;
        }

        $speaker->update($request->except('photo'));

        return redirect()->route('speakers.index')->with('success', 'Ponente actualizado exitosamente.');
    }

    public function destroy(Speaker $speaker)
    {
        $speaker->delete();
        return redirect()->route('speakers.index')->with('success', 'Ponente eliminado exitosamente.');
    }
}
