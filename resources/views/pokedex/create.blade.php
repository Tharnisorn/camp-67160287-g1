<h1>เพิ่มโปเกมอนใหม่</h1>

<form action="{{ route('pokedex.store') }}" method="POST">
    @csrf <div>
        <label>ชื่อ:</label>
        <input type="text" name="name" required>
    </div>
    <div>
        <label>ประเภท:</label>
        <input type="text" name="type" required>
    </div>
    <div>
        <label>สายพันธุ์:</label>
        <input type="text" name="species">
    </div>
    <div>
        <label>ส่วนสูง:</label>
        <input type="number" name="height">
    </div>
    <div>
        <label>น้ำหนัก:</label>
        <input type="number" name="weight">
    </div>
    <div>
        <label>HP:</label>
        <input type="number" step="0.01" name="hp">
    </div>
    <div>
        <label>Attack:</label>
        <input type="number" step="0.01" name="attack">
    </div>
    <div>
        <label>Defense:</label>
        <input type="number" step="0.01" name="defense">
    </div>
    <div>
        <label>URL รูปภาพ:</label>
        <input type="text" name="image_url">
    </div>

    <button type="submit">บันทึกข้อมูล</button>
    <a href="{{ route('pokedex.index') }}">ยกเลิก</a>
</form>
