<?php

namespace App\DTO;

class UserSearchDTO
{
    public function __construct(
        public ?int    $user_id,
        public ?string $search_query,
        public ?string $category,
        public ?string $source
    )
    {
    }

    public static function fromRequest($request): self
    {
        return new self(
            auth()->id(),
            $request->input('search_query'),
            $request->input('category'),
            $request->input('source')
        );
    }

    public function toArray(): array
    {
        return [
            'user_id' => $this->user_id,
            'search_query' => $this->search_query,
            'category' => $this->category,
            'source' => $this->source,
        ];
    }
}

