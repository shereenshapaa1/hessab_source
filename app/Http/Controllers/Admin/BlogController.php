<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Helpers\Constants;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    private $path = 'blog';
    private $scope = 'blog';


    public function __construct( )
    {
        $this->middleware('auth');
        $this->middleware('checkPermission:clients.index')->only(['index']);
        $this->middleware('checkPermission:clients.show')->only(['show']);
        $this->middleware('checkPermission:clients.edit')->only(['edit']);
        $this->middleware('checkPermission:clients.delete')->only(['destroy']);
        $this->middleware('checkPermission:clients.create')->only(['create']);
    }

    public function index(Request $request)
    {
        $result = [];
        $data = Article::paginate(15);
        $search = $data['search'] ?? '';
        $counts = count($data);
        $items = Article::paginate(15);
        $result = [
            'items'=>$items,
           'counts' =>$counts,
        
            'search' => $search,
        ];
        return view(
            'admin.'.$this->path.'.index',
            compact('result')
        );
    }

    public function show($id)
    {
        $item =Article::find($id);

        return view('admin.'.$this->path.'.show', compact('item'));
    }

    public function create(Article $item)
    {
        return view('admin.'.$this->path.'.create_and_edit', compact('item'));
    }

    public function store(ArticleRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = \App\Helpers\Image::upload($request->file('image'), $this->path);
        }

        $Article=new Article();
        $Article->title=$data['title'];
        $Article->image=$data['image'];
        $Article->sub_title=$data['sub_title'];
        $Article->description=$data['description'];
        $Article->is_publish=$data['is_publish'];
        $Article->user_id=Auth()->user()->id;
        $Article->save();

        if (isset($request->action) && $request->action == 'preview') {
            return redirect()->route('admin.'.$this->path.'.store')
                    ->with('message', __('admin.AddedMessage'));
        }

        return redirect()->route('admin.'.$this->path.'.index')
            ->with('message', __('admin.AddedMessage'));
    }

    public function edit($id)
    {
        $item =Article::find($id);
        return view('admin.'.$this->path.'.create_and_edit', compact('item'));
    }

    public function update(ArticleRequest $request, $id)
    {
        $data = $request->except(['_token', '_method' ]);
        if ($request->hasFile('image')) {
            $data['image'] = \App\Helpers\Image::upload($request->file('image'), $this->path);
        }

        $ArtArticle=Article::find($id);
        $ArtArticle->title=$data['title'];
        $ArtArticle->image=$data['image'];
        $ArtArticle->sub_title=$data['sub_title'];
        $ArtArticle->description=$data['description'];
        $ArtArticle->is_publish=$data['is_publish'];
        $ArtArticle->user_id=Auth()->user()->id;
        $ArtArticle->save();

        return redirect()->route('admin.'.$this->path.'.index')
            ->with('message', __('admin.UpdatedMessage'));
    }

    public function destroy($id)
    {
        $item = Article::find($id);
        $item->delete();

        return redirect()->route('admin.'.$this->path.'.index')
            ->with('message', __('admin.DeletedMessage'));
    }
}