<?php
    
    namespace App\Http\Controllers\Site;
    
    use Illuminate\View\View;
    
    interface CategoryControllerInterface
    {
        /**
         *  Show
         *
         * @param $slug
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function show($slug);
    }