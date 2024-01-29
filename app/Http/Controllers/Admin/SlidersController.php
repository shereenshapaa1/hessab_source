<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use App\Helpers\Constants;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SlidersRequest;

class SlidersController extends Controller
{
    private $path = 'sliders';
    private $scope = 'sliders';


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
        $data = Slider::paginate(15);
        $search = $data['search'] ?? '';
        $counts = count($data);
        $items = Slider::paginate(15);
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
        $item = Slider::find($id);

        return view('admin.'.$this->path.'.show', compact('item'));
    }

    public function create(Slider $item)
    {
        return view('admin.'.$this->path.'.create_and_edit', compact('item'));
    }

    public function store(SlidersRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = \App\Helpers\Image::upload($request->file('image'), $this->path);
        }

        $slider=new Slider();
        $slider->title=$data['title'];
        $slider->image=$data['image'];
        $slider->save();



        if (isset($request->action) && $request->action == 'preview') {
            return redirect()->route('admin.'.$this->path.'.store')
                    ->with('message', __('admin.AddedMessage'));
        }

        return redirect()->route('admin.'.$this->path.'.index')
            ->with('message', __('admin.AddedMessage'));
    }

    public function edit($id)
    {
        $item = Slider::find($id);
        return view('admin.'.$this->path.'.create_and_edit', compact('item'));
    }

    public function update(SlidersRequest $request, $id)
    {
        $data = $request->except(['_token', '_method' ]);
        if ($request->hasFile('image')) {
            $data['image'] = \App\Helpers\Image::upload($request->file('image'), $this->path);
        }

        $slider= Slider::find($id);
        $slider->title=$data['title'];
        $slider->image=$data['image'];
        $slider->save();

        return redirect()->route('admin.'.$this->path.'.index')
            ->with('message', __('admin.UpdatedMessage'));
    }

    public function destroy($id)
    {
        $item = Slider::find($id);
        $item->delete();

        return redirect()->route('admin.'.$this->path.'.index')
            ->with('message', __('admin.DeletedMessage'));
    }
}