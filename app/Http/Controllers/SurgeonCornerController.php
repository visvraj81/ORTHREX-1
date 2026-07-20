<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SurgeonCornerReview;
use Illuminate\Http\Request;

class SurgeonCornerController extends Controller
{

    public function reviewList()
    {
        $data['review_data'] = SurgeonCornerReview::with('product')->latest()->get();

        return view('admin.surgeon_corner.review_list', $data);
    }


    public function reviewAddEdit($slug)
    {
        $data['product_data'] = Product::get(); // dropdown source

        if ($slug == 'add') {

            $data['review_data'] = '';

        } else {

            $data['review_data'] = SurgeonCornerReview::find($slug);
        }

        return view('admin.surgeon_corner.review_store', $data);
    }


    // Store / Update Review
    public function reviewStore(Request $request)
    {
        $id = $request->id;

        $request->validate(
            [
                'product_id' => 'required',
                'name' => 'required|string|max:255',
                'location' => 'required|string|max:255',
                'rating' => 'required|integer|min:1|max:5',
                'review_date' => 'required|date',
            ],
            [
                'product_id.required' => 'Please select a product.',

                'name.required' => 'Name is required.',
                'name.max' => 'Name must not exceed 255 characters.',

                'location.required' => 'Location is required.',
                'location.max' => 'Location must not exceed 255 characters.',

                'rating.required' => 'Please select a rating.',
                'rating.integer' => 'Rating must be a number.',
                'rating.min' => 'Rating must be at least 1.',
                'rating.max' => 'Rating must not exceed 5.',

                'review_date.required' => 'Review date is required.',
                'review_date.date' => 'Please enter a valid date.',
            ]
        );

        if ($id == 'add') {

            $review = new SurgeonCornerReview();

            $message = 'Review Added Successfully';

        } else {

            $review = SurgeonCornerReview::find($id);

            $message = 'Review Updated Successfully';
        }

        $review->product_id = $request->product_id;
        $review->name = $request->name;
        $review->location = $request->location;
        $review->rating = $request->rating;
        $review->review_date = $request->review_date;

        // Static 3 checkboxes -> checked if present in request, else 0
        $review->response = $request->has('response') ? 1 : 0;
        $review->quality = $request->has('quality') ? 1 : 0;
        $review->delivery = $request->has('delivery') ? 1 : 0;

        $review->save();

        return redirect()->route('surgeon-corner-list')
            ->with('success', $message);
    }


    // Delete Review
    public function reviewDelete($id)
    {
        $review = SurgeonCornerReview::find($id);

        if ($review) {
            $review->delete();
        }

        return redirect()->route('surgeon-corner-list')
            ->with('success', 'Review Deleted Successfully');
    }
}
