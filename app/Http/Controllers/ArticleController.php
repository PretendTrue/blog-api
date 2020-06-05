<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;
use App\Http\Resources\ArticleResource;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }

    public function index(ArticleRequest $request, Article $article)
    {
        $query = $article->query();

        if (! empty($request->user()->id)) $query->whereUserId($request->user()->id);

        $articles = $query->where('title', 'like', "%{$request->keywords}%")
            ->paginate($request->get('limit', 20));

        return ArticleResource::collection($articles);
    }

    public function store(ArticleRequest $request)
    {
        $request->offsetSet('user_id', $request->user()->id);

        return new ArticleResource(Article::create($request->all()));
    }

    public function show(Article $article)
    {
        $article->loadMissing('content');

        return new ArticleResource($article);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($request->all());

        return new ArticleResource($article);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return response()->noContent();
    }
}
