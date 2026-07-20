<?php

namespace App\Http\Controllers;

use App\Models\Quality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class QualityController extends Controller
{

    public function qualityList()
    {
        $data['quality_data'] = Quality::latest()->get();

        return view('admin.quality.quality_list', $data);
    }


    public function qualityAddEdit($slug)
    {
        if ($slug == 'add') {

            $data['quality_data'] = '';

        } else {

            $data['quality_data'] = Quality::find($slug);
        }

        return view('admin.quality.quality_store', $data);
    }


    // Store / Update Quality
    public function qualityStore(Request $request)
    {
        $id = $request->id;

        $request->validate(
            [
                // 'title' => 'required|string|max:255',
                'image' => $id == 'add'
                    ? 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
                    : 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'pdf' => $id == 'add'
                    ? 'required|mimes:pdf|max:5120'
                    : 'nullable|mimes:pdf|max:5120',
            ],
            [
                // 'title.required' => 'Title is required.',
                // 'title.max' => 'Title must not exceed 255 characters.',

                'image.required' => 'Please upload an image.',
                'image.image' => 'The uploaded file must be an image.',
                'image.mimes' => 'Image must be a file of type: jpg, jpeg, png, webp.',
                'image.max' => 'Image size must not exceed 2MB.',

                'pdf.required' => 'Please upload a PDF file.',
                'pdf.mimes' => 'File must be a PDF.',
                'pdf.max' => 'PDF size must not exceed 5MB.',
            ]
        );

        if ($id == 'add') {

            $quality = new Quality();

            $message = 'Quality Added Successfully';

        } else {

            $quality = Quality::find($id);

            $message = 'Quality Updated Successfully';
        }

        // $quality->title = $request->title;

        // ===== Image Upload =====
        if ($request->hasFile('image')) {

            if (
                $id != 'add' &&
                $quality->image &&
                File::exists(public_path($quality->image))
            ) {
                File::delete(public_path($quality->image));
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = 'img_' . time() . '.' . $extension;
            $file->move(public_path('uploads/quality'), $filename);

            $quality->image = 'uploads/quality/' . $filename;
        }

        // ===== PDF Upload =====
        if ($request->hasFile('pdf')) {

            if (
                $id != 'add' &&
                $quality->pdf &&
                File::exists(public_path($quality->pdf))
            ) {
                File::delete(public_path($quality->pdf));
            }

            $file = $request->file('pdf');
            $extension = $file->getClientOriginalExtension();
            $filename = 'pdf_' . time() . '.' . $extension;
            $file->move(public_path('uploads/quality'), $filename);

            $quality->pdf = 'uploads/quality/' . $filename;
        }

        $quality->save();

        return redirect()->route('quality-list')
            ->with('success', $message);
    }


    // Delete Quality
    public function qualityDelete($id)
    {
        $quality = Quality::find($id);

        if ($quality) {

            if ($quality->image && File::exists(public_path($quality->image))) {
                File::delete(public_path($quality->image));
            }

            if ($quality->pdf && File::exists(public_path($quality->pdf))) {
                File::delete(public_path($quality->pdf));
            }

            $quality->delete();
        }

        return redirect()->route('quality-list')
            ->with('success', 'Quality Deleted Successfully');
    }
}
