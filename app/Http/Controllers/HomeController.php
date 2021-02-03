<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Stationary;
use App\Type;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stationaries = DB::table('stationaries')->paginate(6);
        return view('home', ['stationaries' => $stationaries]);
    }
    
    public function getstationary()
    {
        $types = DB::table('types')->get();
        return view('addstationary', ['types' => $types]);
    }
    public function getstationaryid($id)
    {   
        $stationaries = DB::table('stationaries')->where('id', 'like', "$id")->get()->first();
        $types = DB::table('types')->where('id', 'like', "$id")->get()->first();
        if($stationaries == null){
            abort(400);
        }
        return view('viewstationary', ['stationaries' => $stationaries, 'types' => $types]);
    }

    public function addstationary(Request $request)
    {
        $last = DB::table('stationaries')->latest('id')->first();

        $request->validate([
            'name' => 'required|unique:stationaries',
            'type' => 'required',
            'stock' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:5001',
            'description' => 'required|min:10',
            'image' => 'required'
        ]);

        $stationaries = new Stationary();

        $stationaries->name = $request->input('name');
        $stationaries->type = $request->input('type');
        $stationaries->stock = $request->input('stock');
        $stationaries->price = $request->input('price');
        $stationaries->description = $request->input('description');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            if ($last == NULL) {
                $filename = 0 . '.' . $extension;
            } else {
                $filename = $last->id + 1 . '.' . $extension;
            }
            $file->storeAs('public/uploads/stationary/', $filename);
            $stationaries->image = $filename;
        } else {
            $stationaries->image = '';
        }

        $stationaries->save();

        $types = DB::table('types')->get();

        return view('addstationary', ['types' => $types]);
    }

    public function updatestationary(Request $request)
    {
        $request->input('id');
        if (array_key_exists("delete", $_POST)) {
            $stationaries = DB::table('stationaries')->where('id', 'like', $_POST['delete'])->delete();
        }
        $stationaries = DB::table('stationaries')->paginate(6);
        return view('home', ['stationaries' => $stationaries]);
    }

    public function editstationaryid($id)
    {
        $stationaries = DB::table('stationaries')->paginate(6);
        return view('updatestationary', ['stationaries' => $stationaries, 'id' => $id]);
    }

    public function updatestationaryid(Request $request)
    {   
        if (array_key_exists('update', $_POST)) {
            $request->validate([
                'name' => 'required|unique:stationaries',
                'stock' => 'required|numeric|min:1',
                'price' => 'required|numeric|min:5001',
                'description' => 'required|min:10',
            ]);
            $stationaries = Stationary::find($_POST['update']);
            $stationaries->name = $request->input('name');
            $stationaries->stock = $request->input('stock');
            $stationaries->price = $request->input('price');
            $stationaries->description = $request->input('description');
            $stationaries->save();
        }
        $stationaries = DB::table('stationaries')->paginate(6);
        return view('home', ['stationaries' => $stationaries, 'id' => $_POST['update']]);
    }

    public function gettype()
    {
        $types = DB::table('types')->paginate(10);
        return view('edittype', ['types' => $types]);
    }

    public function addtype(Request $request)
    {
        $last = DB::table('types')->latest('id')->first();

        if ($last == NULL) {
            $last = 0;
        }

        $request->validate([
            'name' => 'required|unique:types'
        ]);

        $types = new Type();

        $types->name = $request->input('name');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            if ($last == NULL) {
                $filename = 0 . '.' . $extension;
            } else {
                $filename = $last->id + 1 . '.' . $extension;
            }
            $file->storeAs('public/uploads/types/', $filename);
            $types->image = $filename;
        } else {
            $types->image = '';
        }

        $types->save();

        $types = DB::table('types')->paginate(10);

        return view('addtype', ['types' => $types]);
    }

    public function updatetype(Request $request)
    {
        if (array_key_exists('update', $_POST)) {
            $request->validate([
                'name' => 'required|unique:types'
            ]);
            $types = Type::find($_POST['update']);
            $types->name = $request->input("name");
            $types->save();
        } elseif (array_key_exists("delete", $_POST)) {
            $types = DB::table('types')->where('id', 'like', $_POST['delete'])->delete();
        }

        $types = DB::table('types')->paginate(10);
    }
}
