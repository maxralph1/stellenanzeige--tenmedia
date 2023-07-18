<?php

namespace App\Http\Controllers;

use App\Models\JobCategory;
use App\Http\Requests\StoreJobCategoryRequest;
use App\Http\Requests\UpdateJobCategoryRequest;

class JobCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobCategories = JobCategory::latest()
            ->paginate();

        return view('protected-views.job-categories.index', [
            'jobCategories' => $jobCategories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('protected-views.job-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobCategoryRequest $request)
    {
        JobCategory::create($request->validated());

        return back()->with('success', 'Job Category erfolgreich erstellt!');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobCategory $jobCategory)
    {
        return view('protected-views.job-categories.show', [
            'jobCategory' => $jobCategory
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobCategory $jobCategory)
    {
        return view('protected-views.job-categories.edit', [
            'jobCategory' => $jobCategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobCategoryRequest $request, JobCategory $jobCategory)
    {
        $jobCategory->update($request->validated());

        return back()->with('success', 'Job Category erfolgreich aktualisiert!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobCategory $jobCategory)
    {
        $jobCategory->delete();

        return back()->with('success', 'Job Category erfolgreich gelöscht!');
    }
}
