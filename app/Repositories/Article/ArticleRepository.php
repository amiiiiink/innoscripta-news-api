<?php

namespace App\Repositories\Article;


use App\Models\Article;
use App\Models\UserSearch;
use App\Repositories\BaseRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ArticleRepository extends BaseRepository implements ArticleRepositoryInterface
{
    public function __construct(Article $model)
    {
        parent::__construct($model);
    }

    public function paginateByFilter(?string $category, ?string $source, ?string $fromDate, ?string $toDate): LengthAwarePaginator
    {
        $query = $this->model->query()
            ->when($category, fn($query) => $query->where('category', $category))
            ->when($source, fn($query) => $query->where('source', $source))
            ->when($fromDate, fn($query) => $query->where('published_at', '>=', $fromDate))
            ->when($toDate, fn($query) => $query->where('published_at', '<', $toDate));
        $query = $this->applyUserPreferences($query);
        return $query->paginate();
    }

    private function applyUserPreferences($query)
    {

        // Example user preferences (replace with actual logic)
        $preferredCategories = UserSearch::query()->where('user_id', auth()->user()->id)
            ->whereNotNull('category')
            ->selectRaw('category, COUNT(*) as count')
            ->groupBy('category')
            ->orderByDesc('count')
            ->pluck('category')
            ->toArray();

        if (!empty($preferredCategories))
            $query->orWhereIn('category', $preferredCategories);


        return $query;
    }
}
