<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body{
            background: -moz-linear-gradient(-45deg,  #EA5C54  0%, #bb6dec 100%); /* FF3.6+ */
            background: -webkit-gradient(linear, left top, right bottom, color-stop(0%,#EA5C54 ), color-stop(100%,#bb6dec)); /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(-45deg,  #EA5C54  0%,#bb6dec 100%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(-45deg,  #EA5C54  0%,#bb6dec 100%); /* Opera 11.10+ */
            background: -ms-linear-gradient(-45deg,  #EA5C54  0%,#bb6dec 100%); /* IE10+ */
            background: linear-gradient(135deg,  #EA5C54  0%,#bb6dec 100%);
        }
    </style>
</head>
<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
                <img src="../assets/css/tampilanregis.jpg" class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-5 col-lg-5 col-xl-5 offset-xl-1">
                <form action="#" method="POST">
                    <!-- Username input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" >Email</label>
                        <input type="email" id="form1Example13" class="form-control form-control-lg" name="email"/>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" >Password</label>
                        <input type="password" id="form1Example23" class="form-control form-control-lg" name="pass"/>
                    </div>

                    <!-- Confirm Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" >Confirm Password</label>
                        <input type="password" id="form1Example23" class="form-control form-control-lg" name="connpass"/>
                    </div>

                    <!-- Nama input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form1Example23">Nama</label>
                        <input type="text" class="form-control form-control-lg" name="nama"/>
                    </div>

                    <!-- Umur input -->
                    <div class="form-outline mb-4">
                        <label class="form-label">Umur</label>
                        <input type="text" class="form-control form-control-lg" name="umur"/>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="ayoregis">Register</button>
                    <div>Sudah punya akun? <a href="{{url('/')}}">Login Sekarang</a></div>
                </form>
            </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
