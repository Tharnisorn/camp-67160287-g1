<h1>Pokedex List</h1>
<a href="{{ route('pokedex.create') }}">เพิ่มตัวใหม่</a>
<table border="1">
    <tr>
        <th>รูป</th>
        <th>ชื่อ</th>
        <th>ประเภท</th>
        <th>จัดการ</th>
    </tr>
    @foreach($pokemons as $p)
    <tr>
        <td><img src="{{ $p->image_url }}" width="50"></td>
        <td>{{ $p->name }}</td>
        <td>{{ $p->type }}</td>
        <td>
            <a href="{{ route('pokedex.edit', $p->id) }}">แก้ไข</a>
            <form action="{{ route('pokedex.destroy', $p->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('ยืนยัน?')">ลบ</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
