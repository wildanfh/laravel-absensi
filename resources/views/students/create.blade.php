<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tambah Student</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: lightgray">

  <div class="container mt-5 mb-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card border-0 shadow rounded">
          <div class="card-body">
            <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">

              @csrf
              <div class="form-group">
                <label class="font-weight-bold">Nomor Induk</label>
                <input type="number" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" placeholder="Masukkan Nomor Induk">

                <!-- error message untuk number -->
                @error('number')
                <div class="alert alert-danger mt-2">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="form-group">
                <label class="font-weight-bold">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama">

                <!-- error message untuk name -->
                @error('name')
                <div class="alert alert-danger mt-2">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label class="font-weight-bold">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukkan Email">

                <!-- error message untuk email -->
                @error('email')
                <div class="alert alert-danger mt-2">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label class="font-weight-bold">No Hp</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Masukkan No Handphone">

                <!-- error message untuk phone -->
                @error('phone')
                <div class="alert alert-danger mt-2">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label class="font-weight-bold">Foto</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">

                <!-- error message untuk title -->
                @error('image')
                <div class="alert alert-danger mt-2">
                  {{ $message }}
                </div>
                @enderror
              </div>




              <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
              <button type="reset" class="btn btn-md btn-warning">RESET</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('content');
  </script>
</body>

</html>