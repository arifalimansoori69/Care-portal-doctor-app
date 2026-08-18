<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News; // Make sure you have a News model

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $query = News::query();
        
        if ($search) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
        }
        
        $news = $query->latest()->paginate(10);
        
        return view('users.news', compact('news', 'search'));
    }
    
    public function search(Request $request)
    {
        return $this->index($request);
    }
    public function show($id)
{
    $articles = [
        1 => [
            'id' => 1,
            'title' => 'New Guidelines for Heart Health in 2025',
            'content' => '<p>The American Heart Association releases updated guidelines focusing on preventive care and early detection of cardiovascular diseases.</p>',
            'image' => 'assets/images/update.png',
            'created_at' => now()->subDays(2),
            'author' => 'Health News Team'
        ],
        2 => [
            'id' => 2,
            'title' => 'The Impact of Technology on Mental Health',
            'content' => '<p>Exploring how digital tools and apps are revolutionizing mental health care and therapy accessibility worldwide.</p>',
            'image' => 'assets/images/mentalhealth.png',
            'created_at' => now()->subDays(4),
            'author' => 'Tech Health Journal'
        ],
        3 => [
            'id' => 3,
            'title' => 'Plant-Based Diets: Benefits and Considerations',
            'content' => '<p>A comprehensive look at the health benefits of plant-based eating and how to ensure proper nutrition.</p>',
            'image' => 'assets/images/diet.png',
            'created_at' => now()->subDays(7),
            'author' => 'Nutrition Today'
        ],
        4 => [
            'id' => 4,
            'title' => 'The Future of Telemedicine: Trends to Watch',
            'content' => '<p>How virtual healthcare is evolving and what patients can expect from telemedicine services in the coming years.</p>',
            'image' => 'assets/images/telecom.jpg',
            'created_at' => now()->subDays(10),
            'author' => 'HealthTech Insights'
        ]
    ];

    if (!isset($articles[$id])) {
        abort(404);
    }

    return view('users.article-detail', ['article' => (object)$articles[$id]]);
}
}
