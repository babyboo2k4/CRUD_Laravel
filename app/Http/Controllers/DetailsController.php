<?php

namespace App\Http\Controllers;

use App\Models\Details;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function index()
    {
        // Lấy danh sách các bản ghi với phân trang, 10 bản ghi mỗi trang
        $details = Details::paginate(10);

        // Trả về view và truyền dữ liệu phân trang
        return view('details.index', compact('details'));
    }

    // Hiển thị form tạo mới
    public function create()
    {
        return view('details.create');
    }

    // Lưu chi tiết mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'cover_image_url' => 'nullable|url',
            'release_date' => 'required|date',
            'status' => 'required|string|in:completed,in_progress,hiatus',
        ]);

        Details::create($request->all());
        return redirect()->route('details.index')->with('success', 'Detail created successfully.');
    }

    // Hiển thị chi tiết cụ thể
    public function show(Details $detail)
    {
        return view('details.show', compact('detail'));
    }

    // Hiển thị form chỉnh sửa
    public function edit($id)
    {
        $detail = Details::findOrFail($id);
        return view('details.edit', compact('detail'));
    }

    // Cập nhật chi tiết trong cơ sở dữ liệu
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required',
            'cover_image_url' => 'nullable|url',
            'release_date' => 'required|date',
            'status' => 'required|string',
        ]);

        $detail=Details::findOrFail($id);
        $detail->update($request->all());
        return redirect()->route('details.index')->with('success', 'Detail updated successfully.');
    }

    // Xóa chi tiết khỏi cơ sở dữ liệu
    public function destroy(Details $detail)
    {
        $detail->delete();
        return redirect()->route('details.index')->with('success', 'Detail deleted successfully.');
    }
}
