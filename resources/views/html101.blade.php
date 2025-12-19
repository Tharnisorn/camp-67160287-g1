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
<style>
  .error {
    color: #d32f2f;
    font-size: 13px;
    margin-top: 4px;
  }
  .field input.error-border,
  .field textarea.error-border,
  .field select.error-border {
    border-color: #d32f2f;
    background: #fdecea;
  }
</style>

<script>
document.getElementById("studentForm").addEventListener("submit", function(event) {
    event.preventDefault();

    // ลบ error เดิมก่อน
    document.querySelectorAll(".error").forEach(el => el.remove());
    document.querySelectorAll(".error-border").forEach(el => el.classList.remove("error-border"));

    let valid = true;

    function showError(id, message) {
        let field = document.getElementById(id);
        field.classList.add("error-border");
        let span = document.createElement("span");
        span.className = "error";
        span.innerText = message;
        field.parentNode.appendChild(span);
        valid = false;
    }

    let firstName = document.getElementById("firstName").value.trim();
    if (!firstName) showError("firstName", "กรุณากรอกชื่อ");

    let lastName = document.getElementById("lastName").value.trim();
    if (!lastName) showError("lastName", "กรุณากรอกนามสกุล");

    let dob = document.getElementById("dob").value;
    if (!dob) showError("dob", "กรุณาเลือกวันเกิด");

    let age = document.getElementById("age").value;
    if (!age) showError("age", "กรุณากรอกอายุ");

    let gender = document.querySelector('input[name="gender"]:checked');
    if (!gender) {
        let group = document.querySelector('input[name="gender"]').parentNode.parentNode;
        let span = document.createElement("span");
        span.className = "error";
        span.innerText = "กรุณาเลือกเพศ";
        group.appendChild(span);
        valid = false;
    }

    let picture = document.getElementById("picture").files.length;
    if (picture === 0) showError("picture", "กรุณาอัปโหลดรูปภาพ");

    let address = document.getElementById("address").value.trim();
    if (!address) showError("address", "กรุณากรอกที่อยู่");

    let favoriteColor = document.getElementById("favoriteColor").value;
    if (!favoriteColor) showError("favoriteColor", "กรุณาเลือกสีที่ชอบ");

    let music = document.querySelector('input[name="music"]:checked');
    if (!music) {
        let group = document.querySelector('input[name="music"]').parentNode.parentNode;
        let span = document.createElement("span");
        span.className = "error";
        span.innerText = "กรุณาเลือกแนวเพลงที่ชอบ";
        group.appendChild(span);
        valid = false;
    }

    let consent = document.getElementById("consent").checked;
    if (!consent) {
        let field = document.getElementById("consent").parentNode;
        let span = document.createElement("span");
        span.className = "error";
        span.innerText = "กรุณาติ๊กยินยอมให้เก็บข้อมูล";
        field.appendChild(span);
        valid = false;
    }

    if (valid) {
        alert("✅ ข้อมูลถูกต้อง กรอกครบทุกช่องแล้ว");
    }
});
</script>
@endpush
