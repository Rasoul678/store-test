<?php

      namespace App\Models;
      
      interface ProductInterface
      {
            public function getOrders();
            public function getCategories();
            public function getBrand();
            public function getImages();
      }
