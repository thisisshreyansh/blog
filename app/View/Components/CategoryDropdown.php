<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Album;
use Illuminate\Support\Facades\Auth;

class CategoryDropdown extends Component
{
    public function render()
    {
        return view('components.category-dropdown',[
            'categories' => Album::where('public_status','1')->orWhere('user_id',Auth::id()),
            'currentCategory' => Album::firstWhere('name',request('category'))
        ]);
    }
}
