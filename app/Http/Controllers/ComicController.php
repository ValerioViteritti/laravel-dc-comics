<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;
use App\Functions\Helper;
use App\Http\Requests\ComicRequest;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (isset($_GET['tosearch'])){
            $comics = Comic::where('title', 'LIKE', '%'.$_GET['tosearch'].'%')->paginate(10);
        } else {
            $comics = Comic::orderBy('title')->paginate(5);
        }
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
    
    public function store(ComicRequest $request)
    {

        // prima di tutto bisogna validare i dati
        // se la validazione non viene superata si viene reindirizzati alla pagina di origine
        // il primo parametro del metodo validate() accetta
        // $request->validate([
        //     'title' =>'required|min:3|max:50',
        //     'thumb' =>'required|min:8|max:255',
        //     'type' =>'required|min:3|max:20',
        //     'price' =>'required|min:3|max:10',
        //     'series' =>'required|min:3|max:100',
        //     'sale_date' =>'required',
        //     'description' =>'required|min:3|max:1000'


        // ],[
        //     'title.required' => "Il titolo è un campo obbligatorio",
        //     'title.min' => "Il titolo deve contenere almeno :min caratteri",
        //     'title.max' => "Il titolo deve avere massimo :max caratteri",
        //     'thumb.required' => "Il titolo è un campo obbligatorio",
        //     'thumb.min' => "Il titolo deve contenere almeno :min caratteri",
        //     'thumb.max' => "Il titolo deve avere massimo :max caratteri",
        //     'type.required' => "Il titolo è un campo obbligatorio",
        //     'type.min' => "Il titolo deve contenere almeno :min caratteri",
        //     'type.max' => "Il titolo deve avere massimo :max caratteri",
        //     'price.required' => "Il titolo è un campo obbligatorio",
        //     'price.min' => "Il titolo deve contenere almeno :min caratteri",
        //     'price.max' => "Il titolo deve avere massimo :max caratteri",
        //     'series.required' => "Il titolo è un campo obbligatorio",
        //     'series.min' => "Il titolo deve contenere almeno :min caratteri",
        //     'series.max' => "Il titolo deve avere massimo :max caratteri",
        //     'sale_date.required' => "Il titolo è un campo obbligatorio",
        //     'description.required' => "Il titolo è un campo obbligatorio",
        //     'description.min' => "Il titolo deve contenere almeno :min caratteri",
        //     'description.max' => "Il titolo deve avere massimo :max caratteri",
        // ]);


        // 1. request contiene tutti i dati inviati nel form
        // 2. salvo i dati del form nel DB
        // 3. reindirizzo alla pagina show del prodotto appena inserito

        $data = $request->all();
        $data['slug'] = Helper::generateSlug($data['title'], Comic::class);
        
        // $new_comic->title = $data['title'];
        // $new_comic->thumb = $data['thumb'];
        // $new_comic->type = $data['type'];
        // $new_comic->price = $data['price'];
        // $new_comic->series = $data['series'];
        // $new_comic->sale_date = $data['sale_date'];
        // $new_comic->description = $data['description'];
        // $new_comic->slug = Helper::generateSlug($data['title'], Comic::class);
        
        // avendo creato la proprietà $fillable nel model con i campi corretti inseriti l'associazione chiave->valore viene eseguita implicitamente col metodo ->fill()
        
        // $new_comic = new Comic();
        // $new_comic->fill($data);
        // $new_comic->save();

        $new_comic = Comic::create($data);

        return redirect()->route('comics.show', $new_comic->id);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comic = Comic::find($id);

        if (!isset($comic)) {
            abort(404);
        }
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comic = Comic::find($id);
        // dump($comic);
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ComicRequest $request, string $id)
    {

        // $request->validate([
        //     'title' =>'required|min:3|max:50',
        //     'thumb' =>'required|min:8|max:255',
        //     'type' =>'required|min:3|max:20',
        //     'price' =>'required|min:3|max:10',
        //     'series' =>'required|min:3|max:100',
        //     'sale_date' =>'required',
        //     'description' =>'required|min:3|max:1000'


        // ],[
        //     'title.required' => "Il titolo è un campo obbligatorio",
        //     'title.min' => "Il titolo deve contenere almeno :min caratteri",
        //     'title.max' => "Il titolo deve avere massimo :max caratteri",
        //     'thumb.required' => "Il titolo è un campo obbligatorio",
        //     'thumb.min' => "Il titolo deve contenere almeno :min caratteri",
        //     'thumb.max' => "Il titolo deve avere massimo :max caratteri",
        //     'type.required' => "Il titolo è un campo obbligatorio",
        //     'type.min' => "Il titolo deve contenere almeno :min caratteri",
        //     'type.max' => "Il titolo deve avere massimo :max caratteri",
        //     'price.required' => "Il titolo è un campo obbligatorio",
        //     'price.min' => "Il titolo deve contenere almeno :min caratteri",
        //     'price.max' => "Il titolo deve avere massimo :max caratteri",
        //     'series.required' => "Il titolo è un campo obbligatorio",
        //     'series.min' => "Il titolo deve contenere almeno :min caratteri",
        //     'series.max' => "Il titolo deve avere massimo :max caratteri",
        //     'sale_date.required' => "Il titolo è un campo obbligatorio",
        //     'description.required' => "Il titolo è un campo obbligatorio",
        //     'description.min' => "Il titolo deve contenere almeno :min caratteri",
        //     'description.max' => "Il titolo deve avere massimo :max caratteri",
        // ]);




        $data = $request->all();
        $comic = Comic::find($id);

        // se il titolo è cambiato, genero un nuovo slug, altrimenti mantengo quello presente
        if($data['title'] !== $comic->title){
            $data['slug'] = Helper::generateSlug($data['title'], Comic::class);
        }
        // update esegue il fill dei dati aggiornandoli
        $comic->update($data);

        return redirect()->route('comics.show', $comic)->with('edit', 'Il fumetto'.' '. $comic->title .' '.'è stato modificato correttamente!');
        // dump($data);
        // dump($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comic = Comic::find($id);

        $comic->delete();
        // oltre a reindirizzare alla index passo in sessione la variabile 'deleted'
        // la variabile di sessione viene passata con with(nome_variabile, nome)
        return redirect()->route('comics.index')->with('deleted', 'Il fumetto'.' '. $comic->title .' '.'è stato eliminato correttamente!');
    }
}
