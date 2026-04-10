<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Season;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class SeasonController extends Controller
{
    public function index(): View
    {
        $seasons = Season::orderByDesc('year')
            ->orderByDesc('start_date')
            ->get();

        return view('admin.seasons.index', compact('seasons'));
    }

    public function create(): View
    {
        $season = new Season([
            'active' => true,
            'year' => now()->year,
            'start_date' => now()->startOfYear()->format('Y-m-d'),
            'end_date' => now()->endOfYear()->format('Y-m-d'),
        ]);

        return view('admin.seasons.create', compact('season'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'year' => ['required', 'integer', 'min:2000', 'max:2100', 'unique:seasons,year'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            'active' => ['nullable', 'boolean'],
        ]);

        $validated['active'] = $request->boolean('active');

        Season::create($validated);

        return redirect()
            ->route('admin.seasons.index')
            ->with('success', 'Temporada creada correctamente.');
    }

    public function edit(Season $season): View
    {
        return view('admin.seasons.edit', compact('season'));
    }

    public function update(Request $request, Season $season): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'year' => [
                'required',
                'integer',
                'min:2000',
                'max:2100',
                Rule::unique('seasons', 'year')->ignore($season->id),
            ],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            'active' => ['nullable', 'boolean'],
        ]);

        $validated['active'] = $request->boolean('active');

        $season->update($validated);

        return redirect()
            ->route('admin.seasons.index')
            ->with('success', 'Temporada actualizada correctamente.');
    }

    public function destroy(Season $season): RedirectResponse
    {
        if ($season->tournaments()->exists()) {
            return redirect()
                ->route('admin.seasons.index')
                ->with('error', 'No se puede eliminar la temporada porque tiene torneos asociados.');
        }

        $season->delete();

        return redirect()
            ->route('admin.seasons.index')
            ->with('success', 'Temporada eliminada correctamente.');
    }
}