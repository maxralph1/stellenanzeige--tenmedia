<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = Application::latest()
            ->paginate();

        return view('protected-views.applications.index', [
            'applications' => $applications
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('protected-views.applications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApplicationRequest $request)
    {
        Application::create($request->validated());

        return back()->with('success', 'Application erfolgreich erstellt!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        return view('protected-views.applications.show', [
            'application' => $application
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        return view('protected-views.applications.edit', [
            'application' => $application
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApplicationRequest $request, Application $application)
    {
        $application->update($request->validated());

        return back()->with('success', 'Application erfolgreich aktualisiert!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        $application->delete();

        return back()->with('success', 'Application erfolgreich gelöscht!');
    }
}
