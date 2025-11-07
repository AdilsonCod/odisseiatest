<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\User;

#[Layout('components.layouts.dashboard')]
#[Title('Dashboard - Odisseia')]
class Index extends Component
{
    public function render()
    {
        $totalUsers = User::count();
        $totalAdmins = User::where('is_admin', true)->count();
        $recentUsers = User::latest()->take(5)->get();

        return view('livewire.dashboard.index', [
            'totalUsers' => $totalUsers,
            'totalAdmins' => $totalAdmins,
            'recentUsers' => $recentUsers,
        ]);
    }
}
