<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <h1 class="text-center">php chat application using websoket</h1>

    <div class="row justify-content-md-center">
        <div class="col col-md-5 mt-5">
            <div class="card-header">Register</div>
            <div class="card-body">
                <form action="#" method="post" id="register_form">
                    <div class="form-group">
                        <label>Enter Your Name</label>
                        <input type="text" name="user-name" id="user-name" class="from-control"
                        data-parsley-pattern="/^[a-zA-Z\s]+$/" required />
                    </div>
                    <div class="form-group">
                        <label>Enter Your email</label>
                        <input type="email" name="user-email" id="user-email" class="from-control"
                        data-parsley-type="email" required />
                    </div>
                    <div class="form-group">
                        <label>Enter Your Name</label>
                        <input type="password" name="user-pass" id="user-pass" class="from-control"
                        data-parsley-minlength="6" data-parsley-maxlength="12"
                        data-parsley-pattern="^[a-zA-Z]+$" required />
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    </div>
</body>
</html>