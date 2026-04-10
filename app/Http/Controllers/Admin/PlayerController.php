<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PlayerController extends Controller
{
    public function index(): View
    {
        $players = Player::with('user')
            ->orderBy('last_name')
            ->orderBy('first_name')
            ->paginate(15);

        return view('admin.players.index', compact('players'));
    }

    public function create(): View
    {
        $player = new Player([
            'status' => 'active',
        ]);

        $availableUsers = User::where('role', 'player')
            ->where(function ($query) {
                $query->whereDoesntHave('player');
            })
            ->orderBy('name')
            ->get();

        return view('admin.players.create', compact('player', 'availableUsers'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'user_id' => [
                'nullable',
                'integer',
                'exists:users,id',
                Rule::unique('players', 'user_id'),
            ],
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'phone' => ['nullable', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255'],
            'club_member_number' => ['nullable', 'string', 'max:50'],
            'status' => ['required', 'in:active,inactive'],
            'notes' => ['nullable', 'string'],
        ]);

        Player::create($validated);

        return redirect()
            ->route('admin.players.index')
            ->with('success', 'Jugador creado correctamente.');
    }

    public function edit(Player $player): View
    {
        $availableUsers = User::where('role', 'player')
            ->where(function ($query) use ($player) {
                $query->whereDoesntHave('player')
                    ->orWhere('id', $player->user_id);
            })
            ->orderBy('name')
            ->get();

        return view('admin.players.edit', compact('player', 'availableUsers'));
    }

    public function update(Request $request, Player $player): RedirectResponse
    {
        $validated = $request->validate([
            'user_id' => [
                'nullable',
                'integer',
                'exists:users,id',
                Rule::unique('players', 'user_id')->ignore($player->id),
            ],
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'phone' => ['nullable', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255'],
            'club_member_number' => ['nullable', 'string', 'max:50'],
            'status' => ['required', 'in:active,inactive'],
            'notes' => ['nullable', 'string'],
        ]);

        $player->update($validated);

        return redirect()
            ->route('admin.players.index')
            ->with('success', 'Jugador actualizado correctamente.');
    }

    public function destroy(Player $player): RedirectResponse
    {
        if (
            $player->registrations()->exists() ||
            $player->matchesAsPlayer1()->exists() ||
            $player->matchesAsPlayer2()->exists() ||
            $player->standings()->exists() ||
            $player->rankingPoints()->exists()
        ) {
            return redirect()
                ->route('admin.players.index')
                ->with('error', 'No se puede eliminar el jugador porque tiene información asociada.');
        }

        $player->delete();

        return redirect()
            ->route('admin.players.index')
            ->with('success', 'Jugador eliminado correctamente.');
    }
}