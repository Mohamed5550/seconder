<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TryController extends Controller
{
    public function echo() {
      return Offer::get();
    }

    public function store(Request $request) {
      // validate first

      $validate = Validator::make(
        $request->all(),
        [
          "name" => "required|max:10|unique:offers,name",
          "price" => "required|numeric"
        ],
        [
          "name.required" => __("messages.name is required"),
          "price.required" => __("messages.price is required"),
          "name.unique" => __("messages.name is unique")
        ]
      );

      if($validate->fails()) {
        return redirect()->back()->withErrors($validate)->withInputs($request->all());
      } else {
        Offer::create([
          "name" => $request->name,
          "price" => $request->price
        ]);
        return redirect()->back()->with(["success" => "تم إضافة العرض بنجاح"]);
      }

    }

    public function create() {
      return view("offers/create");
    }
}
