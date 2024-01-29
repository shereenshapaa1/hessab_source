<?php

namespace App\Http\Controllers\Admin;

use App\Models\Content;
use App\Helpers\Constants;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContentRequest;
use App\Interfaces\ContentRepositoryInterface;

class StandardsController extends Controller
{
    private ContentRepositoryInterface $contentRepository;
    private $path = 'standards';
    private $scope = 'standards';

    public function __construct(ContentRepositoryInterface $contentRepository)
    {
        $this->contentRepository = $contentRepository;
        $this->middleware('auth');
        $this->middleware('checkPermission:standards.index')->only(['index']);
        $this->middleware('checkPermission:standards.edit')->only(['update']);
    }

   public function index(Content $item)
    {

        $item=Content::find('44');
        
        return view(
            'admin.'.$this->path.'.create_and_edit',
            compact('item')
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

    public function update(ContentRequest $request, $id)
    {
        $data = $request->except(['_token', '_method' ]);
        if ($request->hasFile('image')) {
            $data['image'] = \App\Helpers\Image::upload($request->file('image'), $this->path);
        }
        $this->contentRepository->updateContent($id, $data);

        return redirect()->route('admin.'.$this->path.'.index')
            ->with('message', __('admin.UpdatedMessage'));
    }

    public function destroy($id)
    {
        $this->contentRepository->deleteContent($id);

        return redirect()->route('admin.'.$this->path.'.index')
            ->with('message', __('admin.DeletedMessage'));
    }
}
