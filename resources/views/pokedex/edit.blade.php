<h1>แก้ไขข้อมูล: {{ $pokedex->name }}</h1>

<form action="{{ route('pokedex.update', $pokedex->id) }}" method="POST">
    @csrf
    @method('PUT') <div>
        <label>ชื่อ:</label>
        <input type="text" name="name" value="{{ $pokedex->name }}" required>
    </div>
    <div>
        <label>ประเภท:</label>
        <input type="text" name="type" value="{{ $pokedex->type }}" required>
    </div>
    <div>
        <label>สายพันธุ์:</label>
        <input type="text" name="species" value="{{ $pokedex->species }}">
    </div>
    <div>
        <label>ส่วนสูง:</label>
        <input type="number" name="height" value="{{ $pokedex->height }}">
    </div>
    <div>
        <label>น้ำหนัก:</label>
        <input type="number" name="weight" value="{{ $pokedex->weight }}">
    </div>
    <div>
        <label>HP:</label>
        <input type="number" step="0.01" name="hp" value="{{ $pokedex->hp }}">
    </div>
    <div>
        <label>Attack:</label>
        <input type="number" step="0.01" name="attack" value="{{ $pokedex->attack }}">
    </div>
    <div>
        <label>Defense:</label>
        <input type="number" step="0.01" name="defense" value="{{ $pokedex->defense }}">
    </div>
    <div>
        <label>URL รูปภาพ:</label>
        <input type="text" name="image_url" value="{{ $pokedex->image_url }}">
    </div>

    <button type="submit">อัปเดตข้อมูล</button>
    <a href="{{ route('pokedex.index') }}">ยกเลิก</a>
</form>
