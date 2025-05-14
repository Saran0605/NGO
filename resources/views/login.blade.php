<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRADAN - Login</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs/build/css/alertify.min.css" />

    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Segoe UI', sans-serif;
            background: #f0f0f0;
        }

        /* Background grass animation */
        .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://media3.giphy.com/media/v1.Y2lkPTc5MGI3NjExcGxiOGRvbHE3cHI0ZjdzYmZndGZiZjdlbjlrb2Foc3ljcHNhazMyaiZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/p0G1E394o8sNO/giphy.gif') center center / cover no-repeat;
            z-index: 0;
            filter: blur(1.5px) brightness(0.9);
        }

        /* Glassmorphism login box */
        .login-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            backdrop-filter: blur(15px);
            background: rgba(255, 255, 255, 0.3);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            width: 350px;
            z-index: 2;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .login-container h3 {
            font-weight: 700;
            color: #2e7d32;
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: 500;
        }

        .btn-success {
            background-color: #388e3c;
            border-color: #388e3c;
        }
    </style>
</head>
<body>

    <!-- Grass animation background -->
    <div class="background"></div>

    <!-- Login form container -->
    <div class="login-container">
        <h3>Welcome to PRADAN</h3>
        <form id="log">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="pass" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Login</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // CSRF + Login logic
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on("submit","#log",function(e){
            e.preventDefault();
            var form = new FormData(this);
            $.ajax({
                type:"POST",
                url:"/log",
                data:form,
                processData:false,
                contentType:false,
                success:function(response){
                    if(response.status==200){
                        Swal.fire({
                            title: "Success!",
                            text:"login Succesful",
                            icon: "success",
                            confirmButtonText: "OK"
                        });
                        if(response.role == "vol") window.location.href = "{{ route('vol') }}";
                        if(response.role == "coor") window.location.href = "{{ route('cdash') }}";
                        if(response.role == "tl") window.location.href = "{{ route('ldash') }}";
                        if(response.role == "fm") window.location.href = "{{ route('fdash') }}";
                    }
                }
            });
        });
    </script>

</body>
</html>
