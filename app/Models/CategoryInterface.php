<?php
      namespace App\Models;
      
      interface CategoryInterface
      {
            public function getChildren();
            public function getParent();
            public function getProducts();
      }
