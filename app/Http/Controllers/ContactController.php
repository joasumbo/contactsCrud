<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Contacts::orderBy('created_at', 'desc')->where('status', 'ativo')->paginate(10);
        return view('index', compact('datas'));
    }

    public function trash()
    {
        $datas = Contacts::orderBy('created_at', 'desc')->where('status', 'excluido')->paginate(10);
        return view('lixeira', compact('datas'));
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
            'name' => 'required|string|min:5|max:255|regex:/^[a-zA-ZÀ-ÿ\s]+$/',
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

        return redirect()->route('index.contacto')->with('success', 'Contato Excluído permanentemente!');
    }

    public function exportPDF()
    {
        $contacts = Contacts::all();
        $pdf = Pdf::loadView('pdf.contacts', compact('contacts'));
        return $pdf->download('contacts.pdf');
    }

    public function exportCSV()
    {
        $contacts = Contacts::all();

        $filename = "contacts.csv";

        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $handle = fopen('php://output', 'w');

        fputcsv($handle, ['ID', 'Name', 'Phone', 'Email']); 

        foreach ($contacts as $contact) {
            fputcsv($handle, [$contact->id, $contact->name, $contact->phone, $contact->email]);
        }

        fclose($handle);

        return Response::make('', 200, $headers);
    }




    public function ativar($id)
    {
        $contact = Contacts::findOrFail($id);

        $contact->status = 'ativo';
        $contact->save();

        return redirect()->route('index.contacto')->with('success', 'Contato restaurado com sucesso!');
    }


    public function desativar($id)
    {
        $contact = Contacts::findOrFail($id);

        $contact->status = 'excluido';
        $contact->save();

        return redirect()->route('index.contacto')->with('success', 'Contato movido para lixeira!');
    }
}
