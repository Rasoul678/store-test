<?php
    
    namespace App\Http\Controllers\Site;
    
    use Illuminate\View\View;

    interface HomeControllerInterface
    {
        /**
         * Populate Products on homepage.
         *
         * @return View
         */
        public function index();
    }