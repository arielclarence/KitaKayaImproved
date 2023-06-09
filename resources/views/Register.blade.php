<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background: -moz-linear-gradient(-45deg, #EA5C54 0%, #bb6dec 100%);
            /* FF3.6+ */
            background: -webkit-gradient(linear, left top, right bottom, color-stop(0%, #EA5C54), color-stop(100%, #bb6dec));
            /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(-45deg, #EA5C54 0%, #bb6dec 100%);
            /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(-45deg, #EA5C54 0%, #bb6dec 100%);
            /* Opera 11.10+ */
            background: -ms-linear-gradient(-45deg, #EA5C54 0%, #bb6dec 100%);
            /* IE10+ */
            background: linear-gradient(135deg, #EA5C54 0%, #bb6dec 100%);
        }

    </style>
</head>

<body>
    @include('message')
    @include('sweetalert::alert')
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row">
                <div class="col-7 position-relative">
                    <img src="{{asset('assets/img/authentication.svg')}}" class=" position-absolute top-50 start-50 translate-middle img-fluid w-100" alt="Phone image">
                </div>
                <div class="col-5 bg-white p-4 rounded-2 shadow">
                    <h1 class="text-center">Register Your Account</h1>
                    <form method="POST">
                        @csrf
                        <div class="form-outline mb-4">
                            <label class="form-label">Email</label>
                            <input type="email" id="form1Example13" class="form-control form-control-lg" name="email" />
                            @error("email")
                            <small style="color:blue">{{$message}}</small>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label">Password</label>
                            <input type="password" id="form1Example23" class="form-control form-control-lg"
                                name="pass" />
                            @error("pass")
                            <small style="color:blue">{{$message}}</small>
                            @enderror
                        </div>

                        <!-- Confirm Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" id="form1Example23" class="form-control form-control-lg"
                                name="connpass" />
                            @error("connpass")
                            <small style="color:blue">{{$message}}</small>
                            @enderror
                        </div>

                        <!-- Nama input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example23">Nama</label>
                            <input type="text" class="form-control form-control-lg" name="nama" />
                            @error("nama")
                            <small style="color:blue">{{$message}}</small>
                            @enderror
                        </div>

                        <!-- Umur input -->
                        <div class="form-outline mb-4">
                            <label class="form-label">Umur</label>
                            <input type="text" class="form-control form-control-lg" name="umur" />
                            @error("umur")
                            <small style="color:blue">{{$message}}</small>
                            @enderror
                        </div>

                        {{-- terms and condition --}}
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="cb" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                I agree to the KITAKAYA Terms and condition
                            </label>
                            <br>
                            @error("cb")
                            <small style="color:blue">{{$message}}</small>
                            @enderror
                        </div>
                        <br>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                        <br><br>
                        <div>Sudah punya akun? <a href="{{url('/')}}">Login Sekarang</a></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
