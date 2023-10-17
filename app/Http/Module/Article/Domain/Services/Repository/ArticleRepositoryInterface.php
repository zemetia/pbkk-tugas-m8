<?php

namespace App\Http\Module\Article\Domain\Services\Repository;

use App\Http\Module\Article\Domain\Model\Article;
use App\Http\Module\Article\Domain\Model\ArticleId;

interface ArticleRepositoryInterface
{
    public function persist(Article $article): void;

    public function delete(ArticleId $id): void;

    public function find(ArticleId $id): ?Article;

    public function getWithPagination(int $page, int $per_page): array;
}
