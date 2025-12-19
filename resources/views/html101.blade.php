@extends('template.default')

@section('content')
<h1>Workshop #HTML - FORM</h1>
<form id="studentForm" action="#" method="post" enctype="multipart/form-data" novalidate>
    @csrf
    <!-- ชื่อ -->
    <div class="field">
        <label for="firstName">ชื่อ</label>
        <input type="text" id="firstName" name="firstName" placeholder="กรอกชื่อ">
    </div>

    <!-- สกุล -->
    <div class="field">
        <label for="lastName">สกุล</label>
        <input type="text" id="lastName" name="lastName" placeholder="กรอกนามสกุล">
    </div>

    <!-- วัน/เดือน/ปีเกิด -->
    <div class="field">
        <label for="dob">วัน/เดือน/ปีเกิด</label>
        <input type="date" id="dob" name="dob">
    </div>

    <!-- อายุ -->
    <div class="field">
        <label for="age">อายุ</label>
        <input type="number" id="age" name="age" min="0" max="150" placeholder="เช่น 25">
    </div>

    <!-- เพศ -->
    <div class="field">
        <label>เพศ</label>
        <div class="inline-group">
            <label><input type="radio" name="gender" value="ชาย"> ชาย</label>
            <label><input type="radio" name="gender" value="หญิง"> หญิง</label>
        </div>
    </div>

    <!-- รูป -->
    <div class="field">
        <label for="picture">รูป</label>
        <input type="file" id="picture" name="picture" accept="image/*">
    </div>

    <!-- ที่อยู่ -->
    <div class="field">
        <label for="address">ที่อยู่</label>
        <textarea id="address" name="address" placeholder="กรอกที่อยู่"></textarea>
    </div>

    <!-- สีที่ชอบ -->
    <div class="field">
        <label for="favoriteColor">สีที่ชอบ</label>
        <select id="favoriteColor" name="favoriteColor">
            <option value="" disabled selected>เลือกสี</option>
            <option value="สีแดง">สีแดง</option>
            <option value="สีเขียว">สีเขียว</option>
            <option value="สีน้ำเงิน">สีน้ำเงิน</option>
            <option value="สีเหลือง">สีเหลือง</option>
            <option value="สีชมพู">สีชมพู</option>
            <option value="สีม่วง">สีม่วง</option>
            <option value="อื่นๆ">อื่นๆ</option>
        </select>
    </div>

    <!-- แนวเพลงที่ชอบ -->
    <div class="field">
        <label>แนวเพลงที่ชอบ</label>
        <div class="inline-group">
            <label><input type="radio" name="music" value="เพื่อชีวิต"> เพื่อชีวิต</label>
            <label><input type="radio" name="music" value="ลูกทุ่ง"> ลูกทุ่ง</label>
            <label><input type="radio" name="music" value="อื่นๆ"> อื่นๆ</label>
        </div>
    </div>

    <!-- ยินยอมให้เก็บข้อมูล -->
    <div class="field">
        <label>
            <input type="checkbox" id="consent" name="consent">
            ยินยอมให้เก็บข้อมูล
        </label>
    </div>

    <!-- ปุ่ม -->
    <div class="actions">
        <input type="reset" value="Reset">
        <input type="submit" value="Submit">
    </div>
</form>
@endsection

@push('scripts')
<script>
document.getElementById("studentForm").addEventListener("submit", function(event) {
    event.preventDefault(); // ป้องกันการส่งฟอร์มจริง

    let firstName = document.getElementById("firstName").value.trim();
    let lastName = document.getElementById("lastName").value.trim();
    let dob = document.getElementById("dob").value;
    let age = document.getElementById("age").value;
    let gender = document.querySelector('input[name="gender"]:checked');
    let picture = document.getElementById("picture").files.length;
    let address = document.getElementById("address").value.trim();
    let favoriteColor = document.getElementById("favoriteColor").value;
    let music = document.querySelector('input[name="music"]:checked');
    let consent = document.getElementById("consent").checked;

    if (!firstName || !lastName || !dob || !age || !gender || picture === 0 || !address || !favoriteColor || !music || !consent) {
        alert("❌ กรุณากรอกข้อมูลให้ครบทุกช่อง");
    } else {
        alert("✅ ข้อมูลถูกต้อง กรอกครบทุกช่องแล้ว");
    }
});
</script>
@endpush
