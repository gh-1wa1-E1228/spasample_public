<?php

// app/Http/Controllers/ArticleController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function list(Request $request, $page = 1, $limit = 9, $categoryId = null)
    {
        // クエリの構築
        $query = Article::select(
                'articles.id', 
                'articles.category_id', 
                'categories.name as category_name', 
                'articles.title', 
                'articles.description', 
                'articles.thumbnail_image', 
                'articles.sort_number'
            )
            ->leftJoin('categories', function($join) {
                $join->on('categories.id', '=', 'articles.category_id')
                        ->where('categories.is_display', '=', 1);
            })
            ->where('articles.is_display', 1)
            ->orderBy('articles.sort_number', 'DESC');

        if (!is_null($categoryId)) {
            $query->where('articles.category_id', $categoryId);
        }

        // ペジネーションの適用
        $articles = $query->paginate($limit, ['*'], 'page', $page);

        $num = 9;
        $num2 = (int)floor($num / 2);
        $start = max(1, $articles->currentPage() - $num2);
        $end = min($start + $num, $articles->lastPage());
        $start = max(1, $end - $num);
        $pages = [];
        for($page = $start; $page <= $end; $page++) {
            $pages[] = $page;
        }

        // ページ情報の構築
        $pager = [
            'current' => $articles->currentPage(), 
            'first' => 1,
            'prev' => $articles->currentPage() > 1 ? $articles->currentPage() - 1 : null,
            'pages' => $pages,
            'next' => $articles->currentPage() < $articles->lastPage() ? $articles->currentPage() + 1 : null,
            'last' => $articles->lastPage(),
            'limit' => (int)$limit,
            'count' => $articles->total(),
        ];

        return response()->json([
            'items' => $articles->items(),
            'pager' => $pager,
        ]);
    }

    public function detail(Request $request, $id)
    {
        // クエリの構築
        $item = Article::select(
                'articles.*',
                'categories.name as category_name'
            )
            ->leftJoin('categories', function($join) {
                $join->on('categories.id', '=', 'articles.category_id')
                        ->where('categories.is_display', '=', 1);
            })
            ->where('articles.is_display', 1)
            ->where('articles.id', $id)
            ->get()->first();

        return response()->json([
            'item' => $item,
        ]);
    }
}
