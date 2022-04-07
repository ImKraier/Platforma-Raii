<?php

namespace App\Http\Controllers;

use App\Mail\VerificationMail;
use Mail;
use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use App\Models\Shop;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function view() {
        $items = Shop::get();
        return view('pages.shop.index', compact('items'));
    }

    public function addProduct(AddProductRequest $request) {
        if($request->validated()) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('items'), $imageName);
            $create = Shop::create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imageName,
                'product_key' => $request->product_key,
                'price' => $request->price
            ]);
            if($create) {
                toastr()->success('Ai creat cu succes un nou produs');
                return redirect()->back();
            }
        }
        return redirect()->back();
    }

    public function removeProduct(Request $request) {
        $item = Shop::where('id', $request->id)->first();
        if($item) {
            $delete = Shop::where('id', $request->id)->delete();
            $image_path = "/items/{$item->image}";
            if ($delete) {
                toastr()->success("Ai sters cu succes produsul cu id {$request->id}");
                Storage::delete($image_path);
                return redirect()->back();
            }
        }
    }

    public function buyProduct($id) {
        $item = Shop::where('id', $id)->first();
        if($item) {
            if(Auth::user()->cs_points >= $item->price) {
                $delete = Shop::where('id', $id)->delete();
                $image_path = "/items/{$item->image}";
                if ($delete) {
                    Auth::user()->cs_points -= $item->price;
                    Auth::user()->save();
                    toastr()->success("Ai cumparat cu succes {$item->title}");
                    Storage::delete($image_path);
                    $details = [
                        'user_name' => Auth::user()->uname,
                        'subject' => "Raii.Ro - {$item->title}",
                        'product' => $item->title,
                        'price' => $item->price,
                        'key' => $item->product_key
                    ];
                    Mail::to(Auth::user()->email)->send(new VerificationMail($details, "Ai cumparat un nou produs de pe magazinul nostru", "emails.product_key"));
                    toastr()->success("Ai primit pe e-mail-ul tau cheaia de activare");
                    return redirect()->back();
                }
            } else {
                toastr()->warning("Nu ai suficiente puncte pentru a cumpara {$item->title}");
                return redirect()->back();
            }
        }
    }
}
