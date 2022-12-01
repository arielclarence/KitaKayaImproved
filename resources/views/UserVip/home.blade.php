@extends('templatehomevip')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Cari Video</h1>
        <select id="kategori" class="form-control">
            <option value="" selected disabled>Pilih kategori video..</option>
            @forelse ($kategori as $item)
                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
            @empty

            @endforelse
        </select>
        <br>
        <br>
        <div class="d-flex" id="list">

        </div>
    </div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#kategori').on('change', function(){
            let kategoriId = this.value

            $.ajax({
                type: 'GET',
                url: " {{ url('/get/video') }} ",
                data: {
                    kategori: kategoriId
                },
                success: function(data) {
                    console.log(data)
                    let listHtml = $('#list')

                    let res = ``;
                    data.forEach(element => {
                        res += `
                        <div class="card m-2" style="width: 18rem;">
                            <iframe class="w-100"
                            src="${element.video}}" >
                            </iframe>
                            <div class="px-4 py-2">
                                <h3>${element.judul}</h3>
                            </div>
                        </div>
                        `
                    });

                    listHtml.html(res);
                }
            })
        });
    })
</script>
@endsection
