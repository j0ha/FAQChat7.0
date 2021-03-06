<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Live FAQ') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content mt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">{{config('faq.header')}}</div>

                        <div class="card-body">
                            <p>{{config('faq.description1')}}</p>
                            <p class="text-muted">{{config('faq.description2')}}</p>
                            <hr>
                            <form class="form-floating" method="post" action="{{route('frage.stellen')}}">
                                @csrf
                                <div class="mb-3">
                                <label for="autor" class="form-label">Name</label>
                                <input type="text" class="form-control" id="autor" name="autor" @if (config('faq.anonymous') == false)
                                    required
                                @endif placeholder="{{config('faq.paceholder_name')}}">
                                @if (config('faq.anonymous') == true)
                                    <label for="autor" class="text-muted text-small">Optional</label>
                                @else
                                    <label for="autor" class="text-muted text-small">Pflicht</label>
                                @endif     
                            </div>
                            <div class="mb-3">
                                <label for="frage" class="form-label">Frage</label>
                                <textarea class="form-control" id="frage" name="frage" rows="3" required maxlength="450" placeholder="{{config('faq.paceholder_question')}}"></textarea>
                                <label for="frage" class="text-muted text-small">Pflicht</label>
                            </div>
                                <div class="mb-3 form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{config('faq.consent')}}
                                    </label>
                                </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" id="submit"></input>
                            </div>
                            </form>

                        </div>
                    </div>
                        <a class="text-muted" href="{{config('faq.imprint')}}">Impressum</a>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>
