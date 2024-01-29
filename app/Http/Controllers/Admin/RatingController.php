<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rating;
use App\Helpers\Constants;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RatingRequest;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    private $path = 'rating';
    private $scope = 'rating';


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
        $data = Rating::paginate(15);
        $search = $data['search'] ?? '';
        $counts = count($data);
        $items = Rating::paginate(15);
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
        $item =Rating::find($id);

        return view('admin.'.$this->path.'.show', compact('item'));
    }

    public function create(Rating $item)
    {
        return view('admin.'.$this->path.'.create_and_edit', compact('item'));
    }

    public function store(RatingRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = \App\Helpers\Image::upload($request->file('image'), $this->path);
        }

        $Article=new Rating();
        $Article->name=$data['name'];
        $Article->image=$data['image'];
        $Article->Position=$data['Position'];
        $Article->commit=$data['commit'];
        $Article->is_publish=$data['is_publish'];
        // $Article->user_id=Auth()->user()->id;
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
        $item =Rating::find($id);
        return view('admin.'.$this->path.'.create_and_edit', compact('item'));
    }

    public function update(RatingRequest $request, $id)
    {
        $data = $request->except(['_token', '_method' ]);
        if ($request->hasFile('image')) {
            $data['image'] = \App\Helpers\Image::upload($request->file('image'), $this->path);
        }

        $ArtArticle=Rating::find($id);
        $ArtArticle->name=$data['name'];
        $ArtArticle->image=$data['image'];
        $ArtArticle->Position=$data['Position'];
        $ArtArticle->commit=$data['commit'];
        $ArtArticle->is_publish=$data['is_publish'];
        $ArtArticle->save();

        return redirect()->route('admin.'.$this->path.'.index')
            ->with('message', __('admin.UpdatedMessage'));
    }

    public function destroy($id)
    {
        $item = Rating::find($id);
        $item->delete();

        return redirect()->route('admin.'.$this->path.'.index')
            ->with('message', __('admin.DeletedMessage'));
    }
}