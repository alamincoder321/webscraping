<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
        #search::placeholder {
            text-align: center;
        }

    </style>

</head>

<body class="antialiased" onoffline="myOffline()">
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 100px;">
            <div class="text-center text-danger error success">
                @if (Session::has('msg'))
                    {{ Session::get('msg') }}
                @endif
            </div>
            <div class="col-md-6">
                <form action="{{ route('search') }}" method="POST" id="myForm">
                    @csrf
                    <div class="form-group text-center">
                        <img src="" width="300px" id="output" alt="" style="border: 2px solid rgb(238, 189, 189)">
                        <input type="text" autofocus autocomplete="off" class="form-control text-center mt-2"
                            name="search" placeholder="Enter Key" id="search">
                        <input type="file" autofocus autocomplete="off" class="form-control text-center mt-2" id="img">
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary my-3 px-4">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="main"></div>


    <script src="https://unpkg.com/dayjs@1.8.21/dayjs.min.js"></script>
    <script>
        const form = document.getElementById('myForm');
        form.addEventListener('submit', e => {
            e.preventDefault();

            var url = e.target[1];

            const type = "{{ route('search') }}";

            $.ajax({
                url: type,
                method: 'POST',
                data: {
                    search: url.value,
                    _token: "{{ csrf_token() }}"
                },

                success: function(data) {
                    if (data.data.success !== undefined) {
                        document.querySelector('.error').innerText = data.data.status_message;
                        url.value = "";
                        document.querySelector('.main').innerHTML = "";
                    } else {
                        document.querySelector('.error').innerText = '';
                        // console.log(data.data.genres);
                        url.value = "";

                        document.querySelector('.main').innerHTML = `<div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Header
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-5" id="imgs">

                                </div>


                                <div class="col-md-7" style="padding-left: 50px; box-sizing:border-box">
                                    <div class="form-group mb-2">
                                        <label for="title">Title</label>
                                        <input type="text" id="title" class="form-control"
                                            value="${data.data.title}">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="original_title">Orginal Title</label>
                                        <input type="text" id="original_title" class="form-control"
                                            value="${data.data.original_title}">
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="overview">OverView</label>
                                        <textarea id="overview" class="form-control" rows="6">${data.data.overview}</textarea>
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="genres">Genres</label><br>
                                        <div id="genres"></div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label for="release_date">Release Date</label>
                                                <input id="release_date" class="form-control" type="text"
                                                    name="release_date"
                                                    value="${dayjs(data.data.release_date).format('DD-MM-YYYY')}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label for="vote_count">Vote Count</label>
                                                <input id="vote_count" class="form-control" type="text"
                                                    name="vote_count" value="${data.data.vote_count}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="runtime">Runtime</label>
                                                <input type="text" id="runtime" class="form-control" name="runtime"
                                                    value="${data.data.runtime}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="vote_average">Vote Average</label>
                                                <input type="text" id="vote_average" class="form-control"
                                                    name="vote_average" value="${data.data.vote_average}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="id">IMDB Id</label>
                                                <input type="text" id="id" class="form-control" name="id"
                                                    value="${data.data.id}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="imdb_id">IMDB External Id</label>
                                                <input type="text" id="imdb_id" class="form-control" name="imdb_id"
                                                    value="${data.data.imdb_id}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-2 text-center">
                                        <label for="popularity">Popularity</label>
                                        <input type="text" name="popularity" id="popularity"
                                            value="${data.data.popularity}" class="form-control">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>`;

            let imgs = ` <img width="450" height="530"
                                        src="https://image.tmdb.org/t/p/original/${data.data.poster_path}"
                                        alt="">
                                    <div class="form-group mt-3">
                                        <label for="poster_path">Poster_Path</label>
                                        <input type="text" class="form-control" name="poster_path"
                                            value="https://image.tmdb.org/t/p/original${data.data.poster_path}">
                                    </div>
                                    
                                    <div class="form-group mt-3">
                                        <label for="backdrop_path">Backdrop_Path</label>
                                        <input type="text" class="form-control" name="backdrop_path"
                                            value="https://image.tmdb.org/t/p/original${data.data.backdrop_path}">
                                    </div>`;

                        if(data.data.poster_path){
                            document.getElementById('imgs').innerHTML = imgs;
                        }else{
                            document.getElementById('imgs').innerHTML = "<p class='text-center'>No Image Path</p>";
                        }

                        data.data.genres.forEach(element => {
                            document.getElementById('genres').insertAdjacentHTML('afterbegin',
                                "<input style='margin-left: 5px;' type='checkbox' checked value='" + element.id +
                                "'>" + element.name)
                        });
                    }
                }
            });

        })


        const input = document.getElementById('img');
        input.addEventListener('change', function(e) {
            const img = e.target.files[0]
            // console.log(img)

            const ext = img.name.split('.').pop();
            if (ext !== 'png'  && ext !== 'jpg') {
                alert('only jpg and png upload here')
                e.target.value = "";
            } else {
                const output = document.getElementById('output');
                output.src = URL.createObjectURL(img);
                output.onload = function() {
                    URL.revokeObjectURL(output.src) // free memory
                }
            }
        })

        // function myfunction(){
        //     const name = document.getElementById('search');
        //     name.value = name.value.charAt(0).toUpperCase() + name.value.slice(1);              
        // }


        function myOffline() {
            alert('Your Browser went to offline !')
        }

        function myOnline() {
            alert('Your Browser is online !')
        }
        window.addEventListener('online', myOnline)
    </script>
</body>

</html>
