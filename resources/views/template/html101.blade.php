@extends('template.default')

@section('title', 'Workshop #HTML - FORM')

@section('content')
<div class="ws-container">
    <div class="ws-card">
        <div class="ws-header">
            <h1 class="ws-title">Workshop #HTML - FORM</h1>
            <p class="ws-subtitle">กรุณากรอกข้อมูลส่วนตัวของท่านให้ครบถ้วน</p>
        </div>

        <form id="studentForm" action="{{ route('workshop.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="ws-grid">
                <div class="ws-field">
                    <label for="firstName">ชื่อ <span class="ws-req">*</span></label>
                    <input type="text" id="firstName" name="firstName" value="{{ old('firstName') }}" placeholder="เช่น สมชาย" required>
                </div>

                <div class="ws-field">
                    <label for="lastName">นามสกุล <span class="ws-req">*</span></label>
                    <input type="text" id="lastName" name="lastName" value="{{ old('lastName') }}" placeholder="เช่น ใจดี" required>
                </div>

                <div class="ws-field">
                    <label for="dob">วันเกิด <span class="ws-req">*</span></label>
                    <input type="date" id="dob" name="dob" value="{{ old('dob') }}" required>
                </div>

                <div class="ws-field">
                    <label for="age">อายุ <span class="ws-req">*</span></label>
                    <input type="number" id="age" name="age" value="{{ old('age') }}" min="0" max="150" placeholder="0-150" required>
                </div>
            </div>

            <div class="ws-divider"></div>

            <div class="ws-field">
                <label>เพศ <span class="ws-req">*</span></label>
                <div class="ws-radio-group">
                    <label class="ws-radio-item">
                        <input type="radio" name="gender" value="ชาย" {{ old('gender') == 'ชาย' ? 'checked' : '' }}>
                        <span>ชาย</span>
                    </label>
                    <label class="ws-radio-item">
                        <input type="radio" name="gender" value="หญิง" {{ old('gender') == 'หญิง' ? 'checked' : '' }}>
                        <span>หญิง</span>
                    </label>
                </div>
            </div>

            <div class="ws-field">
                <label for="picture">รูปโปรไฟล์ (ตัวเลือก)</label>
                <div class="ws-file-input">
                    <input type="file" id="picture" name="picture" accept="image/*">
                </div>
            </div>

            <div class="ws-field">
                <label for="address">ที่อยู่ปัจจุบัน <span class="ws-req">*</span></label>
                <textarea id="address" name="address" placeholder="บ้านเลขที่, ถนน, ตำบล..." maxlength="200" required>{{ old('address') }}</textarea>
                <div class="ws-hint-wrapper">
                    <span id="addressCount">0</span>/200 ตัวอักษร
                </div>
            </div>

            <div class="ws-grid">
                <div class="ws-field">
                    <label for="favoriteColor">สีที่ชอบ <span class="ws-req">*</span></label>
                    <select id="favoriteColor" name="favoriteColor" required>
                        <option value="" disabled {{ old('favoriteColor') ? '' : 'selected' }}>เลือกสีที่ชอบ</option>
                        @foreach(['สีแดง', 'สีเขียว', 'สีน้ำเงิน', 'สีเหลือง', 'สีชมพู', 'สีม่วง', 'อื่นๆ'] as $color)
                            <option value="{{ $color }}" {{ old('favoriteColor') == $color ? 'selected' : '' }}>{{ $color }}</option>
                        @endforeach
                    </select>
                    <input type="text" id="favoriteColorOther" name="favoriteColorOther" value="{{ old('favoriteColorOther') }}"
                           placeholder="ระบุสีอื่นๆ" style="display: {{ old('favoriteColor') == 'อื่นๆ' ? 'block' : 'none' }}; margin-top: 10px;">
                </div>

                <div class="ws-field">
                    <label>แนวเพลงที่ชอบ <span class="ws-req">*</span></label>
                    <div class="ws-radio-group">
                        @foreach(['เพื่อชีวิต', 'ลูกทุ่ง', 'อื่นๆ'] as $m)
                            <label class="ws-radio-item">
                                <input type="radio" name="music" value="{{$m}}" {{ old('music') == $m ? 'checked' : '' }}>
                                <span>{{$m}}</span>
                            </label>
                        @endforeach
                    </div>
                    <input type="text" id="musicOther" name="musicOther" value="{{ old('musicOther') }}"
                           placeholder="ระบุแนวเพลงอื่นๆ" style="display: {{ old('music') == 'อื่นๆ' ? 'block' : 'none' }}; margin-top: 10px;">
                </div>
            </div>

            <div class="ws-field consent-box">
                <label class="ws-checkbox">
                    <input type="checkbox" id="consent" name="consent" {{ old('consent') ? 'checked' : '' }}>
                    <span class="checkmark"></span>
                    ฉันยืนยันว่าข้อมูลข้างต้นเป็นความจริงทุกประการ <span class="ws-req">*</span>
                </label>
            </div>

            <div class="ws-footer-actions">
                <button type="reset" class="btn-secondary">ล้างข้อมูล</button>
                <button type="submit" class="btn-primary">บันทึกข้อมูล</button>
            </div>
        </form>
    </div>
</div>
@push('styles')
<style>
    :root {
        --primary-color: #4f46e5;
        --primary-hover: #4338ca;
        --bg-color: #f8fafc;
        --card-bg: #ffffff;
        --text-main: #1e293b;
        --text-sub: #64748b;
        --border-color: #e2e8f0;
        --error-color: #ef4444;
    }

    .ws-container { padding: 40px 20px; max-width: 800px; margin: 0 auto; }

    .ws-card {
        background: var(--card-bg);
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
    }

    .ws-header { margin-bottom: 30px; border-left: 5px solid var(--primary-color); padding-left: 20px; }
    .ws-title { font-size: 26px; color: var(--text-main); margin-bottom: 5px; }
    .ws-subtitle { color: var(--text-sub); font-size: 14px; }

    .ws-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; }
    .ws-field { margin-bottom: 20px; }
    .ws-field label { display: block; font-weight: 600; color: var(--text-main); margin-bottom: 8px; font-size: 14px; }

    input[type="text"], input[type="number"], input[type="date"], select, textarea {
        width: 100%; padding: 12px 16px; border: 1px solid var(--border-color); border-radius: 10px;
        transition: all 0.3s ease; font-size: 15px; background: #fdfdfd;
    }

    input:focus, select:focus, textarea:focus {
        outline: none; border-color: var(--primary-color); box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1); background: #fff;
    }

    .ws-radio-group { display: flex; gap: 15px; background: #f1f5f9; padding: 5px; border-radius: 12px; width: fit-content; }
    .ws-radio-item { cursor: pointer; display: flex; align-items: center; padding: 8px 16px; border-radius: 8px; transition: 0.2s; }
    .ws-radio-item input { margin-right: 8px; }
    .ws-radio-item:hover { background: #e2e8f0; }

    .ws-divider { height: 1px; background: var(--border-color); margin: 20px 0 30px 0; }

    .btn-primary {
        background: var(--primary-color); color: white; padding: 12px 30px; border-radius: 10px;
        border: none; font-weight: 600; cursor: pointer; transition: 0.3s;
    }
    .btn-primary:hover { background: var(--primary-hover); transform: translateY(-1px); }

    .btn-secondary {
        background: transparent; color: var(--text-sub); padding: 12px 30px; border-radius: 10px;
        border: 1px solid var(--border-color); cursor: pointer; transition: 0.3s;
    }
    .btn-secondary:hover { background: #f1f5f9; }

    .ws-footer-actions { display: flex; justify-content: flex-end; gap: 15px; margin-top: 30px; padding-top: 20px; border-top: 1px solid var(--border-color); }

    .ws-hint-wrapper { text-align: right; font-size: 12px; color: var(--text-sub); margin-top: 5px; }

    @media (max-width: 600px) { .ws-grid { grid-template-columns: 1fr; } }
</style>
@endsection
