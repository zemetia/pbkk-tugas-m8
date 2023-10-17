<?php

namespace App\Http\Module\Article\Domain\Model;


enum ArticleVisibility: string
{
    case PUBLISHED = "published";
    case PRIVATE = "private";
    case UNLISTED = "unlisted";
    case DRAF = "draf";
}
