<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;
use App\Functions\Helper;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        dump('stampo form');
        return view ('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. request contiene tutti i dati inviati nel form
        // 2. salvo i dati del form nel DB
        // 3. reindirizzo alla pagina show del prodotto appena inserito

        $data = $request->all();
        
        $new_comic = new Comic();
        // $new_comic->title = $data['title'];
        // $new_comic->thumb = $data['thumb'];
        // $new_comic->type = $data['type'];
        // $new_comic->price = $data['price'];
        // $new_comic->series = $data['series'];
        // $new_comic->sale_date = $data['sale_date'];
        // $new_comic->description = $data['description'];
        // $new_comic->slug = Helper::generateSlug($data['title'], Comic::class);

        // avendo creato la proprietà $fillable nel model con i campi corretti inseriti l'associazione chiave->valore viene eseguita implicitamente col metodo ->fill()
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
        $comic = Comic::find($id);
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comic =Comic::find($id);
        // dump($comic);
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $comic = Comic::find($id);

        // se il titolo è cambiato, genero un nuovo slug, altrimenti mantengo quello presente
        if($data['title'] === $comic->title){
            $data['slug'] = $comic->slug;
        } else {
            $data['slug'] = Helper::generateSlug($data['title'], Comic::class);
        }
        // update esegue il fill dei dati aggiornandoli
        $comic->update($data);

        return redirect()->route('comics.show', $comic);
        // dump($data);
        // dump($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
