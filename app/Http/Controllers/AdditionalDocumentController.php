<?php

namespace App\Http\Controllers;

use App\Models\AdditionalDocument;
use App\Http\Requests\StoreAdditionalDocumentRequest;
use App\Http\Requests\UpdateAdditionalDocumentRequest;

class AdditionalDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $additionalDocuments = AdditionalDocument::latest()
            ->paginate();

        return view('protected-views.additional-documents.index', [
            'additionalDocuments' => $additionalDocuments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('protected-views.additional-documents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdditionalDocumentRequest $request)
    {
        AdditionalDocument::create($request->validated());

        return back()->with('success', 'Additional Document erfolgreich erstellt!');
    }

    /**
     * Display the specified resource.
     */
    public function show(AdditionalDocument $additionalDocument)
    {
        return view('protected-views.additional-documents.show', [
            'additionalDocument' => $additionalDocument
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdditionalDocument $additionalDocument)
    {
        return view('protected-views.additional-documents.edit', [
            'additionalDocument' => $additionalDocument
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdditionalDocumentRequest $request, AdditionalDocument $additionalDocument)
    {
        $additionalDocument->update($request->validated());

        return back()->with('success', 'Additional Document erfolgreich aktualisiert!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdditionalDocument $additionalDocument)
    {
        $additionalDocument->delete();

        return back()->with('success', 'Additional Document erfolgreich gelöscht!');
    }
}
