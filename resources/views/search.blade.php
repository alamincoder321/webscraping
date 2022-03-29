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

</head>

<body class="antialiased">
    {{-- @dump($all) --}}
    <div class="container">
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

                                <div class="col-md-5">
                                    @if ($all['poster_path'] !== null)
                                        <img width="450" height="530"
                                            src="https://image.tmdb.org/t/p/original/{{ $all['poster_path'] }}"
                                            alt="{{ $all['title'] }}">
                                        <div class="form-group mt-3">
                                            <label for="poster_path">Poster_Path</label>
                                            <input type="text" class="form-control" name="poster_path"
                                                value="https://image.tmdb.org/t/p/original{{ $all['poster_path'] }}">
                                        </div>

                                        <div class="form-group mt-3">
                                            <label for="backdrop_path">Backdrop_Path</label>
                                            <input type="text" class="form-control" name="backdrop_path"
                                                value="https://image.tmdb.org/t/p/original{{ $all['backdrop_path'] }}">
                                        </div>
                                    @endif
                                </div>


                                <div class="col-md-7" style="padding-left: 50px; box-sizing:border-box">
                                    <div class="form-group mb-2">
                                        <label for="title">Title</label>
                                        <input type="text" id="title" class="form-control"
                                            value="{{ $all['title'] }}">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="title">Orginal Title</label>
                                        <input type="text" id="title" class="form-control"
                                            value="{{ $all['original_title'] }}">
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="overview">OverView</label>
                                        <textarea id="overview" class="form-control" rows="6">{{ $all['overview'] }}</textarea>
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="genres">Genres</label><br>
                                        @foreach ($all['genres'] as $genres)
                                            <input type="checkbox" name="genres[]" checked
                                                value="{{ $genres['id'] }}">{{ $genres['name'] }}
                                        @endforeach
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label for="release_date">Release Date</label>
                                                <input id="release_date" class="form-control" type="text"
                                                    name="release_date"
                                                    value="{{ date('d-m-Y', strtotime($all['release_date'])) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label for="vote_count">Vote Count</label>
                                                <input id="vote_count" class="form-control" type="text"
                                                    name="vote_count" value="{{ $all['vote_count'] }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="runtime">Runtime</label>
                                                <input type="text" id="runtime" class="form-control" name="runtime"
                                                    value="{{ $all['runtime'] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="vote_average">Vote Average</label>
                                                <input type="text" id="vote_average" class="form-control"
                                                    name="vote_average" value="{{ $all['vote_average'] }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="id">IMDB Id</label>
                                                <input type="text" id="id" class="form-control" name="id"
                                                    value="{{ $all['id'] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="imdb_id">IMDB External Id</label>
                                                <input type="text" id="imdb_id" class="form-control" name="imdb_id"
                                                    value="{{ $all['imdb_id'] }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-2 text-center">
                                        <label for="popularity">Popularity</label>
                                        <input type="text" name="popularity" id="popularity"
                                            value="{{ intval($all['popularity']) }}" class="form-control">
                                    </div>


                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
