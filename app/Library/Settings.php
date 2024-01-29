<?php

namespace App\Library;

use App\Models\Category;
use App\Models\Setting;
use App\Models\Slider;

use Illuminate\View\View;
use Illuminate\Support\Facades\Config;

class Settings
{
    public function compose(
        View $view
    ) 
    {
        $this->setting($view);
        $this->slider($view);
    }

    private function setting(View $view)
    {
        $setting = Setting::first();
        $view->with('setting', $setting);

        $view->with('locales', ['ar' => 'Arabic']);
    }

    private function slider(View $view)
    {
        $sliders = Slider::all();
        $view->with('sliders', $sliders);

        $view->with('locales', ['ar' => 'Arabic']);
    }
}