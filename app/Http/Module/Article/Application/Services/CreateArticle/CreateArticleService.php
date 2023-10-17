<?php

namespace App\Http\Module\Article\Application\Services\CreateArticle;


use Exception;
use Illuminate\Support\Str;
use App\Http\Module\Article\Domain\Model\Article;
use App\Http\Module\Article\Domain\Model\ArticleVisibility;
use App\Http\Module\Article\Domain\Services\Repository\ArticleRepositoryInterface;

class CreateArticleService
{
    private ArticleRepositoryInterface $article_repository;

    /**
     * @param ArticleRepositoryInterface $article_repository
     */

    public function __construct(ArticleRepositoryInterface $article_repository)
    {
        $this->article_repository = $article_repository;
    }

    /**
     * @throws Exception
     */
    public function execute(CreateArticleRequest $request)
    {
        $url_slug = Str::of($request->getTitle())->slug('-');

        $article = Article::create(
            ArticleVisibility::from($request->getVisibility()),
            $request->getTitle(),
            $request->getDescription(),
            $request->getContent(),
            $url_slug,
            $request->getImageUrl(),
            $request->getTags()
        );

        $this->article_repository->persist($article);
    }
}
