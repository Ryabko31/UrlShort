<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <form method="POST" action="{{ route('store') }}">
                    @csrf
                    <form>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">URL</label>
                            <div class="col-sm-10">
                                <input type="text" name="link" class="form-control" placeholder="Enter URL"
                                    aria-label="Recipient's username" aria-describedby="basic-addon2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Ліміт переходів</label>
                            <div class="col-sm-10">
                                <input name="limit_request" type="number"  min="0"  value="limit_request" class="number"
                                    id="limit_request"> якщо поставити 0 то буде без ліміту
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Час дії посилання в хвилинах</span>
                                </div>
                                <input type="numeric" class="form-control" name="life_time_in_minute" id="input_text1"
                                min="1"  max="1440" value="1" onchange="rangeinput1.value = input_text1.value" />
                                <input type="range" oninput="input_text1.value = rangeinput1.value"
                                    class="form-control-range slider" type="range" min="1" max="1440"
                                    value="1" id="rangeinput1" step="1"
                                    onchange="input_text1.value = rangeinput1.value">
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-success" type="submit">Генерувати коротке посилання</button>
                            </div>
                        </div>
                    </form>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Коротке посилання</th>
                            <th>Звичайне</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shortLinks as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td><a href="{{ route('shortLink', $row->code) }}"
                                        target="_blank">{{ route('shortLink', $row->code) }}</a></td>
                                <td>{{ $row->link }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>

</html>
