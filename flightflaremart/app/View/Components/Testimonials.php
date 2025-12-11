<?php

namespace App\View\Components;

use App\Models\Testimonial;
use Illuminate\Database\QueryException;
use Illuminate\View\Component;

class Testimonials extends Component
{
    public $testimonials;

    public function __construct($testimonials = null)
    {
        if ($testimonials) {
            $this->testimonials = $testimonials;

            return;
        }

        try {
            $this->testimonials = Testimonial::latest()->get();
        } catch (QueryException $e) {
            // If the database connection fails, use fallback data.
            $this->testimonials = collect([
                (object) [
                    'name' => 'John Doe',
                    'title' => 'CEO, Example Inc.',
                    'message' => 'This is a fallback testimonial because the database connection failed. The service is amazing!',
                    'avatar' => null,
                ],
                (object) [
                    'name' => 'Jane Smith',
                    'title' => 'CTO, Tech Corp.',
                    'message' => 'I was unable to connect to the database, but I can still see this wonderful testimonial. Highly recommended!',
                    'avatar' => null,
                ],
            ]);
        }
    }

    public function render()
    {
        return view('components.testimonials');
    }
}