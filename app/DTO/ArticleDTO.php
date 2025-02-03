<?php

namespace App\DTO;

use Carbon\Carbon;

class ArticleDTO
{
    public string $title;
    public ?string $content;
    public ?string $description;
    public string $url;
    public ?string $url_to_image;
    public string $published_at;
    public string $source;
    public ?string $author;
    public ?string $category;

    public function __construct(
        string  $title,
        ?string $content,
        ?string $description,
        string  $url,
        ?string $url_to_image,
        string  $published_at,
        string  $source,
        ?string $author,
        ?string $category = null
    )
    {
        $this->title = $title;
        $this->content = $content;
        $this->description = $description;
        $this->url = $url;
        $this->url_to_image = $url_to_image;
        $this->published_at = $published_at;
        $this->source = $source;
        $this->author = $author;
        $this->category = $category;
    }

    public static function fromNewsApi(array $article): self
    {
        return new self(
            title: $article['title'],
            content: $article['content'] ?? null,
            description: $article['description'] ?? null,
            url: $article['url'],
            url_to_image: $article['urlToImage'] ?? null,
            published_at: Carbon::parse($article['publishedAt'])->format('Y-m-d H:i:s'),
            source: $article['source']['name'],
            author: $article['author'] ?? null,
            category: null
        );
    }

    public static function fromGuardianApi(array $article): self
    {
        return new self(
            title: $article['webTitle'],
            content: null,
            description: null,
            url: $article['webUrl'],
            url_to_image: null,
            published_at: Carbon::parse($article['webPublicationDate'])->format('Y-m-d H:i:s'),
            source: $article['sectionName'],
            author: $article['pillarName'] ?? null,
            category: $article['type'] ?? null
        );
    }

    public static function fromNewYorkTimesApi(array $article): self
    {
        return new self(
            title: $article['headline']['print_headline'],
            content: $article['lead_paragraph'],
            description: $article['abstract'],
            url: $article['webUrl'],
            url_to_image: null,
            published_at: Carbon::parse($article['pub_date'])->format('Y-m-d H:i:s'),
            source: $article['source'],
            author: $article['byline']['original'] ?? null,
            category: $article['section_name'] ?? null
        );
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'description' => $this->description,
            'url' => $this->url,
            'url_to_image' => $this->url_to_image,
            'published_at' => $this->published_at,
            'source' => $this->source,
            'author' => $this->author,
            'category' => $this->category,
        ];
    }
}
