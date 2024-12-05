<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Contacts::orderBy('created_at', 'desc')->get();
        return view('index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adicionar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:5|max:255|regex:/^[a-zA-ZÀ-ÿ\s]+$/',
            'email' => 'required|email|unique:contacts,email',
            'phone' => 'required|string|max:9|unique:contacts,phone',
        ]);

        if ($validator->fails()) {
            $errorMessage = $validator->errors()->count() > 1 ? 'Dados incorretos' : $validator->errors()->first();

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Contacts::create($request->all());

        return redirect()->route('index.contacto')->with('success', 'Contato criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $information = Contacts::findOrFail($id);
        return view('detalhes', compact('information'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $information = Contacts::findOrFail($id);
        return view('editar', compact('information'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validação dos dados recebidos
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|email|unique:contacts,email,' . $id,
            'phone' => 'required|string|max:9|unique:contacts,phone,' . $id,
        ]);


        if ($validator->fails()) {
            $errorMessage = $validator->errors()->count() > 1 ? 'Dados incorretos' : $validator->errors()->first();

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $contact = Contacts::findOrFail($id);
        $contact->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('detalhe.contacto', $id)->with('success', 'Contato atualizado com sucesso!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contact = Contacts::findOrFail($id);
        $contact->delete();

        return redirect()->route('index.contacto')->with('success', 'Contato Excluído com sucesso com sucesso!');
    }
}
