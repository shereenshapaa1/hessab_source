<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bank;
use App\Helpers\Constants;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BankRequest;
use Illuminate\Support\Facades\Auth;

class BankController extends Controller
{
    private $path = 'banks';
    private $scope = 'bank';


    public function __construct( )
    {
        $this->middleware('auth');
        $this->middleware('checkPermission:banks.index')->only(['index']);
        $this->middleware('checkPermission:banks.show')->only(['show']);
        $this->middleware('checkPermission:banks.edit')->only(['edit']);
        $this->middleware('checkPermission:banks.delete')->only(['destroy']);
        $this->middleware('checkPermission:banks.create')->only(['create']);
    }

    public function index(Request $request)
    {
        $result = [];
        $data = Bank::paginate(15);
        $search = $data['search'] ?? '';
        $counts = count($data);
        $items = Bank::paginate(15);
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
        $item =Bank::find($id);

        return view('admin.'.$this->path.'.show', compact('item'));
    }

    public function create(Bank $item)
    {
        return view('admin.'.$this->path.'.create_and_edit', compact('item'));
    }

    public function store(BankRequest $request)
    {
        $data = $request->all();
       

        $Article=new Bank();
        $Article->title=$data['title'];
        $Article->iban=$data['iban'];
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
        $item =Bank::find($id);
        return view('admin.'.$this->path.'.create_and_edit', compact('item'));
    }

    public function update(BankRequest $request, $id)
    {
        $data = $request->all();

        $ArtArticle=Bank::find($id);
        $ArtArticle->title=$data['title'];
        $ArtArticle->iban=$data['iban'];
        $ArtArticle->save();

        return redirect()->route('admin.'.$this->path.'.index')
            ->with('message', __('admin.UpdatedMessage'));
    }

    public function destroy($id)
    {
        $item = Bank::find($id);
        $item->delete();

        return redirect()->route('admin.'.$this->path.'.index')
            ->with('message', __('admin.DeletedMessage'));
    }
}