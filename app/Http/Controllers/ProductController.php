<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    public function productList()
    {
        $data['product_data'] = Product::with('details', 'category')->latest()->get();

        return view('admin.product.product_list', $data);
    }


    public function productAddEdit($slug)
    {
        $data['category_data'] = Category::get(); // adjust model/table name if different

        if ($slug == 'add') {

            $data['product_data'] = '';
            $data['product_details_data'] = [];

        } else {

            $data['product_data'] = Product::find($slug);
            $data['product_details_data'] = ProductDetail::where('product_id', $slug)->get();
        }

        return view('admin.product.product_store', $data);
    }


    // Store / Update Product + Product Details
    public function productStore(Request $request)
    {
        $id = $request->id;

        $request->validate(
            [
                'category_id'           => 'required',
                'title'                 => 'required|string|max:255',
                'banner_subtitle'       => 'required|string|max:255',
                'banner_description'    => 'required|string',
                // 'section_title'         => 'required|string|max:255',
                // 'section_description'   => 'required|string',
                'image'                 => $id == 'add'
                    ? 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
                    : 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'summary_note' =>  $id == 'add' ?  'required|string' : 'nullable|string',

                
            ],
            [
                'category_id.required'         => 'Please select a category.',

                'title.required'                => 'Title is required.',
                'title.max'                      => 'Title must not exceed 255 characters.',

                'banner_subtitle.required'      => 'Banner subtitle is required.',
                'banner_subtitle.max'            => 'Banner subtitle must not exceed 255 characters.',

                'banner_description.required'   => 'Banner description is required.',

                // 'section_title.required'        => 'Section title is required.',
                // 'section_title.max'              => 'Section title must not exceed 255 characters.',

                // 'section_description.required'  => 'Section description is required.',

                'image.required'                 => 'Please upload a product image.',
                'image.image'                     => 'The uploaded file must be an image.',
                'image.mimes'                     => 'Image must be a file of type: jpg, jpeg, png, webp.',
                'image.max'                       => 'Image size must not exceed 2MB.',

                
            ]
        );

        if ($id == 'add') {

            $product = new Product();

            $message = 'Product Added Successfully';

        } else {

            $product = Product::find($id);

            $message = 'Product Updated Successfully';
        }

        $product->category_id         = $request->category_id;
        $product->title                = $request->title;
        $product->banner_subtitle      = $request->banner_subtitle;
        $product->banner_description   = $request->banner_description;
        $product->section_title        = $request->section_title;
        $product->section_description  = $request->section_description;
        $product->table_description    = $request->summary_note;

        // ===== Image Upload =====
        if ($request->hasFile('image')) {

            // delete old file
            if (
                $id != 'add' &&
                $product->image &&
                File::exists(public_path($product->image))
            ) {

                File::delete(public_path($product->image));
            }

            $file = $request->file('image');

            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;

            $file->move(public_path('uploads/products'), $filename);

            $product->image = 'uploads/products/' . $filename;
        }

        $product->save();

        // ===== Product Details (Multiple Rows) =====
        // Expecting arrays: first[], last[], handle[]

        if ($request->has('first')) {

            // remove old details on edit, then re-insert fresh set
            if ($id != 'add') {
                ProductDetail::where('product_id', $product->id)->delete();
            }

            $firstArr  = $request->first;
            $lastArr   = $request->last;
            $handleArr = $request->handle;

            foreach ($firstArr as $key => $value) {

                if (trim($value) == '' && trim($lastArr[$key]) == '' && trim($handleArr[$key]) == '') {
                    continue; // skip empty rows
                }

                ProductDetail::create([
                    'product_id' => $product->id,
                    'first'      => $firstArr[$key] ?? null,
                    'last'       => $lastArr[$key] ?? null,
                    'handle'     => $handleArr[$key] ?? null,
                ]);
            }
        }

        return redirect()->route('product-list')
            ->with('success', $message);
    }


    // Delete Product + its Details + Image
    public function productDelete($id)
    {
        $product = Product::find($id);

        if ($product) {

            if (
                $product->image &&
                File::exists(public_path($product->image))
            ) {

                File::delete(public_path($product->image));
            }

            // delete related details first
            ProductDetail::where('product_id', $product->id)->delete();

            $product->delete();
        }

        return redirect()->route('product-list')
            ->with('success', 'Product Deleted Successfully');
    }


    // Delete a single ProductDetail row (optional, if you want inline delete via AJAX)
    public function productDetailDelete($id)
    {
        $detail = ProductDetail::find($id);

        if ($detail) {
            $detail->delete();
        }

        return redirect()->back()
            ->with('success', 'Product Detail Deleted Successfully');
    }
}