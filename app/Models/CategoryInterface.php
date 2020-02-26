<?php
      namespace App\Models;
      
      interface CategoryInterface
      {
            public function children();
            public function parent();
            public function products();
      }
