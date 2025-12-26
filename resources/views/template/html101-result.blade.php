@extends('template.default')

@section('title', 'ผลลัพธ์ข้อมูล') {{-- เพิ่ม title เพื่อให้แสดงบนแท็บเบราว์เซอร์ --}}

@section('content')
<div class="ws-result">
  <div class="ws-card">
    <h1 class="ws-title">ผลลัพธ์จากฟอร์ม</h1>

    <table class="ws-table">
      <tbody>
        <tr><th>ชื่อ</th><td>{{ $data['firstName'] ?? '-' }}</td></tr>
        <tr><th>สกุล</th><td>{{ $data['lastName'] ?? '-' }}</td></tr>
        <tr><th>วัน/เดือน/ปีเกิด</th><td>{{ $data['dob'] ?? '-' }}</td></tr>
        <tr><th>อายุ</th><td>{{ $data['age'] ?? '-' }}</td></tr>
        <tr><th>เพศ</th><td>{{ $data['gender'] ?? '-' }}</td></tr>
        <tr><th>ที่อยู่</th><td>{{ $data['address'] ?? '-' }}</td></tr>
        <tr><th>สีที่ชอบ</th><td>{{ $data['favoriteColor'] ?? '-' }}</td></tr>
        <tr><th>แนวเพลงที่ชอบ</th><td>{{ $data['music'] ?? '-' }}</td></tr>
        <tr><th>รูป (ยังไม่อัปโหลด)</th><td>{{ $data['picture'] ?? '—' }}</td></tr>
        <tr><th>ความยินยอม</th><td>{{ $data['consent'] ?? '-' }}</td></tr>
      </tbody>
    </table>

    <div class="ws-actions">
      {{-- แก้ไข: เพิ่มแท็ก <a> ให้ถูกต้องและเรียกชื่อ route --}}
      <a href="{{ route('workshop.form') }}" class="ws-btn ws-btn-secondary">
        ⬅️ กลับไปกรอกฟอร์ม
      </a>
    </div>
  </div>
</div>
@endsection

{{-- ย้าย CSS มาไว้ที่ push('styles') ตามมาตรฐานที่ไฟล์ default กำหนดไว้ --}}
@push('styles')
<style>
  .ws-result, .ws-result * { box-sizing: border-box; }

  .ws-result { padding: 24px; max-width: 860px; margin: 0 auto; }
  .ws-card { background:#fff; border-radius:16px; box-shadow:0 8px 30px rgba(0,0,0,.08); padding:20px 24px; }
  .ws-title { margin: 0 0 16px; font-size: 22px; font-weight: 700; }

  .ws-table { width: 100%; border-collapse: collapse; overflow: hidden; border-radius: 12px; }
  .ws-table th, .ws-table td { border: 1px solid #e5e7eb; padding: 10px 12px; vertical-align: top; }
  .ws-table th { width: 28%; background: #f9fafb; text-align: left; font-weight: 700; }

  .ws-actions { margin-top: 24px; display: flex; justify-content: flex-start; }
  .ws-btn { display:inline-block; padding:8px 16px; border-radius:10px; border:1px solid transparent; font-weight:600; text-decoration:none; transition: background 0.2s; }
  .ws-btn-secondary { background:#eef2f7; color:#111827; border: 1px solid #d1d5db; }
  .ws-btn-secondary:hover { background:#e3e8ef; }
</style>
@endpush
