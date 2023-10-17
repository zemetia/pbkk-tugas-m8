<?php

namespace App\Http\Module\Article\Presentation\Controller;

use Throwable;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Module\Article\Application\Services\CreateArticle\CreateArticleRequest;
use App\Http\Module\Article\Application\Services\CreateArticle\CreateArticleService;

class ArticleController extends Controller
{
    public function createArticle(Request $request, CreateArticleService $service): JsonResponse
    {
        $request->validate([
            'visibility' => 'required|in:published,private,unlisted,draf',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'image_url' => 'required|url',
            'tags' => 'required|array',
        ]);

        $input = new CreateArticleRequest(
            $request->input('visibility'),
            $request->input('title'),
            $request->input('description'),
            $request->input('content'),
            $request->input('image_url'),
            $request->input('tags'),
        );

        DB::beginTransaction();
        try {
            $service->execute($input, $request->get('account')->getUserId());
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
        return $this->success("Berhasil Registrasi");
    }
}
