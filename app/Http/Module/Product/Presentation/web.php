<?php

Route::post('create_product', [\App\Http\Module\Product\Presentation\Controller\ProductController::class, 'createProduct']);
