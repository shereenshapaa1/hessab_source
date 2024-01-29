<?php

namespace App\Http\Controllers\Admin;

use App\Models\Content;
use App\Helpers\Constants;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContentRequest;
use App\Interfaces\ContentRepositoryInterface;

class OurseenController extends Controller
{
    private ContentRepositoryInterface $contentRepository;
    private $path = 'ourseen';
    private $scope = 'ourseen';

    public function __construct(ContentRepositoryInterface $contentRepository)
    {
        $this->contentRepository = $contentRepository;
        $this->middleware('auth');
        $this->middleware('checkPermission:objectives.index')->only(['index']);
        $this->middleware('checkPermission:objectives.show')->only(['show']);
        $this->middleware('checkPermission:objectives.edit')->only(['edit']);
        $this->middleware('checkPermission:objectives.delete')->only(['destroy']);
        $this->middleware('checkPermission:objectives.create')->only(['create']);
    }

   public function index(Content $item)
    {
     


        $ourseen = $this->contentRepository->getPublishContents('Ourseen', 1)->first();


        $OurMassage= $this->contentRepository->getPublishContents('OurMassage', 1)->first();
        
        

        return view(
            'admin.'.$this->path.'.create_and_edit',
            compact('ourseen','OurMassage')
        );
    }

    public function show($id)
    {
        $item = $this->contentRepository->getContentById($id);
        return view('admin.'.$this->path.'.show', compact('item'));
    }

    public function create(Content $item)
    {
        return view('admin.'.$this->path.'.create_and_edit', compact('item'));
    }

    public function store(ContentRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = \App\Helpers\Image::upload($request->file('image'), $this->path);
        }
        $data['type'] = Constants::standardsType;

        $this->contentRepository->createContent($data);

        if (isset($request->action) && $request->action == 'preview') {
            return redirect()->route('admin.'.$this->path.'.store')
                    ->with('message', __('admin.AddedMessage'));
        }

        return redirect()->route('admin.'.$this->path.'.index')
            ->with('message', __('admin.AddedMessage'));
    }

    public function edit($id)
    {
        $item = $this->contentRepository->getContentById($id);
        return view('admin.'.$this->path.'.create_and_edit', compact('item'));
    }

    public function update(request $request, $id)
    {
        $ourseen = $this->contentRepository->getPublishContents('Ourseen', 1)->first();
        $ourseen->title=$request->title;
        $ourseen->description=$request->description;
        if ($request->hasFile('image')) {
            $image= \App\Helpers\Image::upload($request->file('image'), $this->path);
            $ourseen->image=$image;
        }
        $ourseen->save();





        $OurMassage= $this->contentRepository->getPublishContents('OurMassage', 1)->first();
        $OurMassage->title=$request->OurMassage_title;
        $OurMassage->description=$request->OurMassage_description;
        if ($request->hasFile('OurMassage_image')) {
            $image2= \App\Helpers\Image::upload($request->file('OurMassage_image'), $this->path);
            $OurMassage->image=$image2;
        }
        $OurMassage->save();

        return redirect()->route('admin.'.$this->path.'.index')
            ->with('message', __('admin.UpdatedMessage'));
    }

    public function destroy($id)
    {
        $this->contentRepository->deleteContent($id);

        return redirect()->route('admin.'.$this->path.'.index')
            ->with('message', __('admin.DeletedMessage'));
    }
    public function ourseen()
    {
       
    }
}
