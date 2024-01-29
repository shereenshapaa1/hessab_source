<?php

namespace App\Http\Controllers\Admin;

use App\Models\Content;
use App\Helpers\Constants;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContentRequest;
use App\Interfaces\ContentRepositoryInterface;

class ReliabilityController extends Controller
{
    private ContentRepositoryInterface $contentRepository;
    private $path = 'reliability';
    private $scope = 'reliability';

    public function __construct(ContentRepositoryInterface $contentRepository)
    {
        $this->contentRepository = $contentRepository;
        $this->middleware('auth');
        $this->middleware('checkPermission:reliability.index')->only(['index']);
        $this->middleware('checkPermission:reliability.edit')->only(['update']);
    }

   public function index(Content $item)
    {

        $item=Content::find('45');
        
        return view(
            'admin.'.$this->path.'.create_and_edit',
            compact('item')
        );
    }

    public function update(ContentRequest $request, $id)
    {
                $allimage = array();

        $data = $request->except(['_token', '_method' ]);
       if ($request->hasFile('image')) {
            foreach($request->file('image') as $image)
            {
                 $allimage[]= \App\Helpers\Image::upload($image, $this->path);

            }
            $data['image']=implode('|', $allimage);
        }
        $this->contentRepository->updateContent($id, $data);

        return redirect()->route('admin.'.$this->path.'.index')
            ->with('message', __('admin.UpdatedMessage'));
    }

   
}
