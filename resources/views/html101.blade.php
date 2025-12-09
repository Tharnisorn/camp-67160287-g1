<!--file: resources/views/html101.blade.php -->
<!doctype html>
<html lang="th">
<head>
  <meta charset="utf-8">
  <title>Workshop #HTML - FORM</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body { font-family: system-ui, -apple-system, "Segoe UI", Tahoma, sans-serif; background:#f7f7f7; margin:0; }
    .container { max-width: 720px; margin: 40px auto; background:#fff; padding: 24px; border-radius:12px; box-shadow: 0 6px 24px rgba(0,0,0,0.08); }
    h1 { font-size: 22px; margin: 0 0 20px; }
    form { display: grid; gap: 16px; }
    .field { display: grid; gap: 8px; }
    label { font-weight: 600; }
    input[type="text"],
    input[type="number"],
    input[type="date"],
    select,
    textarea {
      padding: 10px 12px;
      border: 1px solid #d0d7de;
      border-radius: 8px;
      font-size: 14px;
    }
    textarea { min-height: 100px; resize: vertical; }
    .inline-group { display: flex; gap: 16px; align-items: center; flex-wrap: wrap; }
    .actions { display: flex; gap: 12px; }
    button, input[type="submit"], input[type="reset"] {
      padding: 10px 16px; border: 1px solid #1f6feb; background:#1f6feb; color:#fff;
      border-radius: 8px; font-weight: 600; cursor: pointer;
    }
    input[type="reset"] { background: #f6f8fa; color: #24292f; border-color: #d0d7de; }
  </style>
</head>
<body>
  <div class="container">
    <h1>Workshop #HTML - FORM</h1>

    <form action="#" method="post" enctype="multipart/form-data" novalidate>
      <!-- ชื่อ -->
      <div class="field">
        <label for="firstName">ชื่อ</label>
        <input type="text" id="firstName" name="firstName" placeholder="กรอกชื่อ" required>
      </div>

      <!-- สกุล -->
      <div class="field">
        <label for="lastName">สกุล</label>
        <input type="text" id="lastName" name="lastName" placeholder="กรอกนามสกุล" required>
      </div>

      <!-- วัน/เดือน/ปีเกิด -->
      <div class="field">
        <label for="dob">วัน/เดือน/ปีเกิด</label>
        <input type="date" id="dob" name="dob" required>
      </div>

      <!-- อายุ -->
      <div class="field">
        <label for="age">อายุ</label>
        <input type="number" id="age" name="age" min="0" max="150" placeholder="เช่น 25" required>
      </div>

      <!-- เพศ -->
      <div class="field">
        <label>เพศ</label>
        <div class="inline-group" role="radiogroup" aria-label="เพศ">
          <label>
            <input type="radio" name="gender" value="ชาย" required> ชาย
          </label>
          <label>
            <input type="radio" name="gender" value="หญิง"> หญิง
          </label>
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
        <select id="favoriteColor" name="favoriteColor" required>
          <option value="" disabled selected>เลือกสี</option>
          <option value="สีแดง">สีแดง</option>
          <option value="สีเขียว">สีเขียว</option>
          <option value="สีน้ำเงิน">สีน้ำเงิน</option>
          <option value="สีเหลือง">สีเหลือง</option>
          <option value="สีชมพู">สีชมพู</option>
          <option value="สีม่วง">สีม่วง</option>
          <option value="สีม่วง">สีอื่นๆ</option>
        </select>
      </div>

      <!-- แนวเพลงที่ชอบ -->
      <div class="field">
        <label>แนวเพลงที่ชอบ</label>
        <div class="inline-group" role="radiogroup" aria-label="แนวเพลงที่ชอบ">
          <label>
            <input type="radio" name="music" value="เพื่อชีวิต" required> เพื่อชีวิต
          </label>
          <label>
            <input type="radio" name="music" value="ลูกทุ่ง"> ลูกทุ่ง
          </label>
          <label>
            <input type="radio" name="music" value="อื่นๆ"> อื่นๆ
          </label>
        </div>
      </div>

      <!-- ยินยอมให้เก็บข้อมูล -->
      <div class="field">
        <label>
          <input type="checkbox" id="consent" name="consent" required>
          ยินยอมให้เก็บข้อมูล
        </label>
      </div>

      <!-- ปุ่ม -->
      <div class="actions">
        <input type="reset" value="Reset">
        <input type="submit" value="Submit">
      </div>
    </form>
  </div>
</body>
</html>