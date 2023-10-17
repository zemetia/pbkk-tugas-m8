<?php

namespace App\Http\Module\Article\Domain\Model;

use Illuminate\Support\Carbon;
use App\Core\Domain\Models\User\UserId;
use App\Http\Module\Article\Domain\Model\ArticleId;
use App\Http\Module\Article\Domain\Model\ArticleVisibility;

class Article
{
    private ArticleId $id;
    private ArticleVisibility $visibility;
    private string $title;
    private string $description;
    private string $content;
    private string $url;
    private string $image_url;
    private string $created_at;
    private string $updated_at;
    private array $tags;
    public function __construct(ArticleId $id, ArticleVisibility $visibility, string $title, string $description, string $content, string $url, string $image_url, string $created_at, string $updated_at, array $tags)
    {
        $this->id = $id;
        $this->visibility = $visibility;
        $this->title = $title;
        $this->description = $description;
        $this->content = $content;
        $this->url = $url;
        $this->image_url = $image_url;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->tags = $tags;
    }

    public static function create(ArticleVisibility $visibility, string $title, string $description, string $content, string $url, string $image_url, array $tags): self
    {
        return new self(
            ArticleId::generate(),
            $visibility,
            $title,
            $description,
            $content,
            $url,
            $image_url,
            Carbon::now(),
            Carbon::now(),
            $tags
        );
    }

    public function getId(): ArticleId
    {
        return $this->id;
    }

    public function getVisibility(): ArticleVisibility
    {
        return $this->visibility;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getImageUrl(): string
    {
        return $this->image_url;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    public function getTags(): array
    {
        return $this->tags;
    }
}
