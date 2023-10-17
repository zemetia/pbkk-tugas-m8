<?php

Route::post('create_article', [\App\Http\Module\Article\Presentation\Controller\ArticleController::class, 'createArticle']);
