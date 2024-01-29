<?php

namespace App\Http\Controllers\Admin;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContentRequest;
use App\Interfaces\ContentRepositoryInterface;

class newsletterController extends Controller
{
    private ContentRepositoryInterface $contentRepository;
    private $path = 'newsletter';
    private $scope = 'newsletter';

    public function __construct(ContentRepositoryInterface $contentRepository)
    {
        $this->contentRepository = $contentRepository;
        $this->middleware('auth');
        $this->middleware('checkPermission:newsletter.index')->only(['index']);
        $this->middleware('checkPermission:newsletter.delete')->only(['destroy']);

    }

    public function index(Request $request)
    {
        $Newsletter=Newsletter::paginate(25);
        return view(
            'admin.'.$this->path.'.index',
            compact('Newsletter')
        );
    }
 

    public function destroy($id)
    {

        $Newsletter=Newsletter::find($id);
        $Newsletter->delete();

        return redirect()->route('admin.newsletter.index')
            ->with('message', __('admin.DeletedMessage'));
    }


    // public function update(request $request, $id)
    // {
    //     $Privacy=Privacy::find($id);
    //     $Privacy->privacy_en=$request->privacy_en;
    //     $Privacy->privacy_ar=$request->privacy_ar;
    //     $Privacy->save();


        
    //     $data = $request->except(['_token', '_method' ]);
        
    //     return redirect()->route('admin.'.$this->path.'.index')
    //         ->with('message', __('admin.UpdatedMessage'));
    // }

   
}