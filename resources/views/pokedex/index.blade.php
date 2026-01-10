<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .pokemon-img {
            width: 60px;
            height: 60px;
            object-fit: contain;
            background: #f8f9fa;
            border-radius: 8px;
        }
        .table-v-align td {
            vertical-align: middle;
        }
    </style>
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary"> Pokedex Management</h2>
        <a href="{{ route('pokedex.create') }}" class="btn btn-success shadow-sm">
            + เพิ่มโปเกมอนใหม่
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-v-align mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th class="ps-4">รูปภาพ</th>
                            <th>ชื่อ</th>
                            <th>ประเภท</th>
                            <th>HP</th>
                            <th>ATK</th>
                            <th>DEF</th>
                            <th class="text-center">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pokemons as $p)
                        <tr>
                            <td class="ps-4">
                                <img src="{{ $p->image_url }}" alt="{{ $p->name }}" class="pokemon-img border">
                            </td>
                            <td>
                                <div class="fw-bold">{{ $p->name }}</div>
                                <small class="text-muted">{{ $p->species }}</small>
                            </td>
                            <td>
                                <span class="badge bg-info text-dark">{{ $p->type }}</span>
                            </td>
                            <td>{{ $p->hp }}</td>
                            <td>{{ $p->attack }}</td>
                            <td>{{ $p->defense }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('pokedex.edit', $p->id) }}" class="btn btn-sm btn-outline-warning">
                                        แก้ไข
                                    </a>
                                    <form action="{{ route('pokedex.destroy', $p->id) }}" method="POST" onsubmit="return confirm('คุณแน่ใจหรือไม่ที่จะลบข้อมูลนี้?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger ms-1">
                                            ลบ
                                        </td>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                ไม่มีข้อมูลโปเกมอนในระบบ
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>
