<?php

namespace App\Infrastrucutre\Repository;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Http\Module\Article\Domain\Model\Article;
use App\Http\Module\Article\Domain\Model\ArticleId;
use App\Http\Module\Article\Domain\Model\ArticleVisibility;
use App\Http\Module\Article\Domain\Services\Repository\ArticleRepositoryInterface;

class SqlArticleRepository implements ArticleRepositoryInterface
{
    public function persist(Article $articles): void
    {
        DB::table('articles')->upsert([
            'id' => $articles->getId()->toString(),
            'visibility' => $articles->getVisibility()->value,
            'title' => $articles->getTitle(),
            'description' => $articles->getDescription(),
            'content' => $articles->getContent(),
            'url' => $articles->getUrl(),
            'image_url' => $articles->getImageUrl()
        ], 'id');
    }

    /**
     * @throws Exception
     */
    public function find(ArticleId $id): ?Article
    {
        $row = DB::table('articles')->where('id', $id)->first();

        if (!$row) {
            return null;
        }

        return $this->constructFromRow($row);
    }

    /**
     * @throws Exception
     */
    private function constructFromRow($row): Article
    {
        return new Article(
            new ArticleId($row->id),
            ArticleVisibility::from($row->visibility),
            $row->title,
            $row->description,
            $row->content,
            $row->url,
            $row->image_url,
            $row->created_at,
            $row->updated_at,
            []
        );
    }

    public function getWithPagination(int $page, int $per_page): array
    {
        $rows = DB::table('articles')
            ->paginate($per_page, ['*'], 'role_page', $page);
        $articles = [];

        foreach ($rows as $row) {
            $articles[] = $this->constructFromRow($row);
        }
        return [
            "data" => $articles,
            "max_page" => ceil($rows->total() / $per_page)
        ];
    }

    /**
     * Summary of delete
     * @param int $id
     * @return void
     */
    public function delete(ArticleId $id): void
    {
        DB::table('articles')->where('id', $id)->delete();
    }
}
