<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class count extends Component
{
    public $usersCount;
    public $newsCount;
    public $teachersCount;

    public function __construct($usersCount, $newsCount, $teachersCount)
    {
        $this->usersCount = $usersCount;
        $this->newsCount = $newsCount;
        $this->teachersCount = $teachersCount;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.count');
    }
}
