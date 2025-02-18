<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\FeeHead;
use App\Models\AcademicYear;
use App\Models\FeeStructure;
use Illuminate\Http\Request;

class FeeStructureController extends Controller
{

    public function index()
    {
        $data['classes']=Classes::all();
        $data['academic_years']=AcademicYear::all();
        $data['fee_heads']=FeeHead::all();
        return view('admin.fee-structure.fee-structure',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'academic_year_id'=>"required",
            'class_id'=>"required",
            'fee_head_id'=>"required",
        ]);
       // dd($request->all());
        FeeStructure::create($request->all());
        return redirect()->route('fee-structure.create')->with('success','Fee Structure Added Successfully');
    }

}
