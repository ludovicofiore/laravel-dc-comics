<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;
use App\Functions\Helper;

class ComicsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics= Comic::all();

        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data= $request->all();


        // condizioni di validazione
        $request->validate([
            'title'=>'required|min:3|max:100',
            'description'=>'required',
            'thumb'=>'required|min:3|max:255',
            'price'=>'required|min:1|max:10',
            'series'=>'required|min:3|max:100',
            'sale_date'=>'required|date',
            'type'=>'required|min:3|max:50'
        ],
        [
            'title.required'=>"Il titolo è un campo obbligatorio",
            'title.min'=>"Il titolo non può essere più corto di :min caratteri",
            'title.max'=>"Il titolo non può essere più lungo di :max caratteri",
            'description.required'=>"La descrizione è un campo obbligatorio",
            'thumb.required'=>"L'url è un campo obbligatorio",
            'thumb.min'=>"L'url non può essere più corto di :min caratteri",
            'thumb.max'=>"L'url non può essere più lungo di :max caratteri",
            'price.required'=>"Il prezzo è un campo obbligatorio",
            'price.min'=>"Il prezzo non può essere più corto di :min caratteri",
            'price.max'=>"Il prezzo non può essere più lungo di :max caratteri",
            'series.required'=>"La serie è un campo obbligatorio",
            'series.min'=>"La serie non può essere più corto di :min caratteri",
            'series.max'=>"La serie non può essere più lungo di :max caratteri",
            'sale_date.required'=>"La data di uscita è un campo obbligatorio",
            'sale_date.date'=>"Il campo deve essere compilato nel formato sopra descritto",
            'type.required'=>"La tipologia è un campo obbligatorio",
            'type.min'=>"La tipologia non può essere più corto di :min caratteri",
            'type.max'=>"La tipologia non può essere più lungo di :max caratteri",
        ]);

        $new_comic= new Comic();
        // $new_comic->title = $data['title'];
        // $new_comic->thumb = $data['thumb'];
        // $new_comic->description = $data['description'];
        // $new_comic->price = $data['price'];
        // $new_comic->series = $data['series'];
        // $new_comic->sale_date = $data['sale_date'];
        // $new_comic->type = $data['type'];

        $data['slug'] = Helper::generateSlug($data['title'], Comic::class);
        $new_comic->fill($data);
        $new_comic->save();

        return redirect()->route('comics.show', $new_comic->id);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comics= Comic::find($id);

        return view('comics.show', compact('comics'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comics = Comic::find($id);

        return view('comics.edit', compact('comics'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

         // condizioni di validazione
         $request->validate([
            'title'=>'required|min:3|max:100',
            'description'=>'required',
            'thumb'=>'required|min:3|max:255',
            'price'=>'required|min:1|max:10',
            'series'=>'required|min:3|max:100',
            'sale_date'=>'required|date',
            'type'=>'required|min:3|max:50'
        ],
        [
            'title.required'=>"Il titolo è un campo obbligatorio",
            'title.min'=>"Il titolo non può essere più corto di :min caratteri",
            'title.max'=>"Il titolo non può essere più lungo di :max caratteri",
            'description.required'=>"La descrizione è un campo obbligatorio",
            'thumb.required'=>"L'url è un campo obbligatorio",
            'thumb.min'=>"L'url non può essere più corto di :min caratteri",
            'thumb.max'=>"L'url non può essere più lungo di :max caratteri",
            'price.required'=>"Il prezzo è un campo obbligatorio",
            'price.min'=>"Il prezzo non può essere più corto di :min caratteri",
            'price.max'=>"Il prezzo non può essere più lungo di :max caratteri",
            'series.required'=>"La serie è un campo obbligatorio",
            'series.min'=>"La serie non può essere più corto di :min caratteri",
            'series.max'=>"La serie non può essere più lungo di :max caratteri",
            'sale_date.required'=>"La data di uscita è un campo obbligatorio",
            'sale_date.date'=>"Il campo deve essere compilato nel formato sopra descritto",
            'type.required'=>"La tipologia è un campo obbligatorio",
            'type.min'=>"La tipologia non può essere più corto di :min caratteri",
            'type.max'=>"La tipologia non può essere più lungo di :max caratteri",
        ]);

        $comics = Comic::find($id);

        // condizione per slug
        if($data['title'] === $comics->title){
            $data['slug'] = $comics->slug;
        }else {
            $data['slug'] = Helper::generateSlug($data['title'], Comic::class);
        };

        $comics->update($data);

        return redirect()-> route('comics.show', $comics);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comics = Comic::find($id);

        $comics->delete();

        return redirect()->route('comics.index')->with('deleted', 'Il fumetto ' . $comics->title . ' è stato eliminato');
    }
}
