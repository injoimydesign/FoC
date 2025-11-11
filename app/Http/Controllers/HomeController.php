<?php

namespace App\Http\Controllers;

use App\Models\Flag;
use App\Models\FlagEvent;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the homepage.
     */
    public function index()
    {
        $nextEvent = FlagEvent::getNextEvent();
        $upcomingEvents = FlagEvent::getUpcomingEvents(3);
        $featuredFlags = Flag::active()->limit(6)->get();

        return view('home', compact('nextEvent', 'upcomingEvents', 'featuredFlags'));
    }

    /**
     * Display the about page.
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Display the services page.
     */
    public function services()
    {
        $flagEvents = FlagEvent::upcoming()->get();
        return view('services', compact('flagEvents'));
    }

    /**
     * Display the contact page.
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Display the FAQ page.
     */
    public function faq()
    {
        return view('faq');
    }

    /**
     * Display the pricing page.
     */
    public function pricing()
    {
        $flags = Flag::active()->get();
        return view('pricing', compact('flags'));
    }
}
