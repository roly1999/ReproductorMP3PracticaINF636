<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
         return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Crear Nuevo';
        $route = route('contacts.store');
        $button = 'Guardar';
        return view('contacts.create', compact('title', 'route', 'button'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:2|max:100',
            'path' => 'mimes:mp3',
            'image' => 'image|mimes:jpeg,jpg,png,gif,svg,webp'
        ]);
        $imag = "public/images/no_image.png";
        $path = "public/musics/no_music.mp3";
        if ($request->hasFile('image'))
            $imag = $request->image->store('public/images');
        if ($request->hasFile('path'))
            $path = $request->path->store('public/musics');
        $contact = Contact::create([
            'title' => $request->title,
            'path' => $path,
            'image' => $imag,
        ]);
        $contact->save();
        return redirect()->route('contacts.index')->with('success', 'Stored with success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        $title = 'Editar Music';
        $route = route('contacts.update', ['contact' => $contact]);
        $button = 'Actualizar...';
        return view('contacts.edit', compact('title', 'route', 'button', 'contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'title' => 'required|min:2|max:100',
            'path' => 'mimes:mp3',
            'image' => 'image|mimes:jpeg,jpg,png,gif,svg,webp'
        ]);
        $path = $contact->path;
        $imag=$contact->image;
        if ($request->hasFile('image')) {
            $contact->deleteImage();
            $imag = $request->image->store('public/images');
        }
        if ($request->hasFile('path')) {
            $contact->deletePath();
            $path = $request->path->store('public/musics');
        }
        $contact->fill([
            'title' => $request->name,
            'path' => $path,
            'image' => $imag,
        ]);
        $contact->save();
        return redirect()->route('contacts.index')->with('success', 'Edited with success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        $contact->deleteImage();
        $contact->deletePath();
        return redirect()->route('contacts.index')->with('success', 'Deleted with success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function playlist(Request $request, Contact $contact)
    {
        $path = $contact->path;
        $imag=$contact->image;
        if ($request->hasFile('image')) {
            $contact->deleteImage();
            $imag = $request->image->store('public/images');
        }
        if ($request->hasFile('path')) {
            $contact->deletePath();
            $path = $request->path->store('public/musics');
        }
        $contact->fill([
            'title' => $request->name,
            'path' => $path,
            'image' => $imag,
        ]);
        $contact->save();
        return redirect()->route('contacts.index')->with('success', 'Edited with success');
    }
}
