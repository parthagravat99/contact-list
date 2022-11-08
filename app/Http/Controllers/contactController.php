<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;
use App\Exports\contactExport;
use Excel as excel;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactCreated;

class contactController extends Controller
{
    //
    public function index(){
        
        if(request()->ajax()) {
            $data=contact::select('*');
            return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('action', function($data){
       
                $btn = '<button type="button" class="edit_button" value='.$data->id.'>edit</button>';
                $btn = $btn.'&nbsp&nbsp<button type="button" class="delete_button" value='.$data->id.'>delete</button>';

                 return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('contacts');
    }

    public function input(Request $request)
    {   
        $validatedData = $request->validate([
            'name' => 'required',
            'number' => 'required|min:10',
          ]);
  
        $contact = new contact();
        $contact->name = $request->name;
        $contact->number = $request->number;
        
        $contact->save();

        Mail::to('hello123@example.com')->send(new contactCreated($request));
 
        return redirect(url('/'));
    }

    public function destroy(Request $request)
    {
        $com = contact::where('id',$request->id);
        $com->delete();
    }

    public function update($id)
    {
        $updateData=contact::where('id',$id)->first();
        return view('form',['updateData'=>$updateData]);
    
    }

    public function updateData(Request $request,$id)
    {   
        $validatedData = $request->validate([
            'name' => 'required',
            'number' => 'required|min:10',

        ]);

        $contact=contact::find($id);
        $contact->name = $request->name;
        $contact->number = $request->number;

        $contact->save();
        return redirect(url('/'));
        
    }

    public function exportCSV(){
        $file_name = 'contacts_'.date('Y_m_d_H_i_s').'.csv';
        return excel::download(new contactExport, $file_name);
     }
}
