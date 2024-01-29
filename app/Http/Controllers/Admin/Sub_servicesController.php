<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sub_services;
use App\Helpers\Constants;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Sub_servicesRequest;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\ContentRepositoryInterface;


class Sub_servicesController extends Controller
{
    private ContentRepositoryInterface $contentRepository;

    private $path = 'sub_services';
    private $scope = 'sub_services';


    public function __construct(        ContentRepositoryInterface $contentRepository
    )
    {
        $this->contentRepository = $contentRepository;

        
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
        $data = Sub_services::paginate(15);
        $search = $data['search'] ?? '';
        $counts = count($data);
        $items = Sub_services::paginate(15);
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
        $item =Sub_services::find($id);

        return view('admin.'.$this->path.'.show', compact('item'));
    }

    public function create(Sub_services $item)
    {
        $services = $this->contentRepository->getPublishContents('Service', 15);

        return view('admin.'.$this->path.'.create_and_edit', compact('item','services'));
    }

    public function store(Sub_servicesRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = \App\Helpers\Image::upload($request->file('image'), $this->path);
        }

        $Article=new Sub_services();
        $Article->title=$data['title'];
        $Article->image=$data['image'];
        $Article->description=$data['description'];
        $Article->service_id=$data['service_id'];
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
        $item =Sub_services::find($id);
        $services = $this->contentRepository->getPublishContents('Service', 15);

        return view('admin.'.$this->path.'.create_and_edit', compact('item','services'));
    }

    public function update(Sub_servicesRequest $request, $id)
    {
        $data = $request->except(['_token', '_method' ]);
        if ($request->hasFile('image')) {
            $data['image'] = \App\Helpers\Image::upload($request->file('image'), $this->path);
        }

        $Article=Sub_services::find($id);
        $Article->title=$data['title'];
        $Article->image=$data['image'];
        $Article->description=$data['description'];
        $Article->service_id=$data['service_id'];
        $Article->is_publish=$data['is_publish'];
        $Article->save();

        return redirect()->route('admin.'.$this->path.'.index')
            ->with('message', __('admin.UpdatedMessage'));
    }

    public function destroy($id)
    {
        $item = Sub_services::find($id);
        $item->delete();

        return redirect()->route('admin.'.$this->path.'.index')
            ->with('message', __('admin.DeletedMessage'));
    }
}