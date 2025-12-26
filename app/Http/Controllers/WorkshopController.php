<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    // ฟังก์ชันสำหรับเรียกหน้าฟอร์มเดิม
    public function index()
    {
        // อ้างอิงตามโครงสร้างในโฟลเดอร์ resources/views/template
        return view('template.html101');
    }

    // ฟังก์ชันสำหรับรับค่าและส่งไปหน้าใหม่
    public function store(Request $request)
    {
        // 1. Validation ตรวจสอบข้อมูลเบื้องต้น
        $validated = $request->validate([
            'firstName' => 'required',
            'lastName'  => 'required',
            'dob'       => 'required',
            'age'       => 'required|integer',
            'gender'    => 'required',
            'address'   => 'required',
            'consent'   => 'accepted', // บังคับติ๊กถูก
        ]);

        // 2. จัดการข้อมูลกรณีเลือก "อื่นๆ" (Logic จากโค้ดเดิมของคุณ)
        $color = ($request->favoriteColor === 'อื่นๆ') ? $request->favoriteColorOther : $request->favoriteColor;
        $music = ($request->music === 'อื่นๆ') ? $request->musicOther : $request->music;

        // 3. เตรียม Data ส่งไปหน้าผลลัพธ์
        $data = $request->all();
        $data['favoriteColor'] = $color ?: '—';
        $data['music'] = $music ?: '—';
        $data['picture'] = $request->hasFile('picture') ? $request->file('picture')->getClientOriginalName() : '—';
        $data['consent'] = $request->has('consent') ? 'ยินยอม' : 'ไม่ยินยอม';

        // 4. ส่งค่าไปยังหน้า html101-result
        return view('template.html101-result', compact('data'));
    }
}
