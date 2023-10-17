<?php

namespace App\Http\Module\Article\Application\Services\CreateArticle;


class CreateArticleRequest
{
   private string $visibility;
   private string $title;
   private string $description;
   private string $content;
   private string $image_url;
   private array $tags;

   /**
    * @param string $name
    */

   public function __construct(string $visibility, string $title, string $description, string $content, string $image_url, array $tags)
   {
      $this->visibility = $visibility;
      $this->title = $title;
      $this->description = $description;
      $this->content = $content;
      $this->image_url = $image_url;
      $this->tags = $tags;
   }

   public function getVisibility(): string
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

   public function getImageUrl(): string
   {
      return $this->image_url;
   }

   public function getTags(): array
   {
      return $this->tags;
   }
}
