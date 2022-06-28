<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resources;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use PDF;

class AccountantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('accountant.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showResources()
    {
        //
        $prices = Resources::get()->sum('price');
        $musicResource = Resources::where('category','Musics')->get()->sum('price');
        $furnitureResource = Resources::where('category','Furnitures')->get()->sum('price');
        
        // return $musicResource;
        $resources = Resources::get();
        // return $prices;

        return view('accountant.show-resources', compact('resources', 'prices','musicResource','furnitureResource'));
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function submitResources(Request $request)
    {
        //
        // return request()->all();
        if ($request->hasFile('image')) {

            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
            ]);
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('resources'), $imageName);
            /* Store $imageName name in DATABASE from HERE */
        //     $resources = new Resources();
        //     $resources->name = $request->name;
        //     $resources->image = $imageName;
        //     $resources->save();
        // }
        
            $user = Auth::user();
            $resources = Resources::create([
                'name' => $request->name,
                'user_id' => $user->id,
                'description' => $request->description,
                'category' => $request->category,
                'picture' => $imageName,
                'bought_by' => $request->bought_by,
                'date' => $request->date,
                'buyer_number' => $request->buyer_number,
                'price' => $request->price,
                'receipt_number' => $request->receipt_number,
                'receipt_picture' => $request->receipt_picture,
            ]);
            $resources->save();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        //
        $resources = Resources::orderBy('name', 'asc')->get();
        $totalPromises = Resources::sum('price');
        $pdf = PDF::loadView('accountant.resourcesPDF', compact('resources', 'totalPromises'));
        $pdf->setPaper('legal', 'landscape');
        return $pdf->download('resources.pdf'); // download as pdf
    }
        //
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteResources ($id)
    {
        // $image = \DB::table('files')->where('id', $id)->first();
        // $file= $image->your_file_path;
        // $filename = public_path().'/uploads_folder/'.$file;
        // \File::delete($filename);

        $username = Resources::find($id)->where('id',$id)->first();
        $file= $username->picture;
        $filename = public_path().'/resources/'.$file;
        File::delete($filename);
        $username->delete();
        return back()->with('deleted', `User  has been deleted`);
    }
    
}
