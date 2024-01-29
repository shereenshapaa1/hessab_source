<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contactus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContentRequest;
use App\Interfaces\ContentRepositoryInterface;

class MessagesController extends Controller
{
    private ContentRepositoryInterface $contentRepository;
    private $path = 'Messages';
    private $scope = 'Messages';

    public function __construct(ContentRepositoryInterface $contentRepository)
    {
        $this->contentRepository = $contentRepository;
        $this->middleware('auth');
        $this->middleware('checkPermission:Messages.index')->only(['index']);
        $this->middleware('checkPermission:Messages.show')->only(['show']);
        $this->middleware('checkPermission:Messages.edit')->only(['edit']);
        $this->middleware('checkPermission:Messages.delete')->only(['destroy']);
        $this->middleware('checkPermission:Messages.create')->only(['create']);

    }

    public function index(Request $request)
    {
        $Contactus=Contactus::paginate(25);
        return view(
            'admin.'.$this->path.'.index',
            compact('Contactus')
        );
    }
    public function show($id)
    {
        $Contactus=Contactus::find($id);
        return view(
            'admin.'.$this->path.'.show',
            compact('Contactus')
        );

    }

    public function destroy($id)
    {

        $contact=Contactus::find($id);
        $contact->delete();

        return redirect()->route('admin.messages.index')
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