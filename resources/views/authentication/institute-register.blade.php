<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSTITUTE REGISTRATION</title>
    <style>
        body {
            background-image: linear-gradient(to right, #0049aa, #2bb4d4);
            margin-top: 150px !important;
        }

        .container {
            margin-left: 19%;
            display: flex;
        }

        .text {
            color: wheat;
            margin-top: 8%;
        }

        .register {
            width: 50%;
            height: 50%;
            background: #2bb4d4;
            padding-top: 30px;
            padding-bottom: 30px;
            margin-left: 5%;
            border: 1px solid white;

            border-radius: 40px;
            box-shadow: 7px -2px 11px 1px rgba(0, 0, 0, 0.75);
        }

        .register h1 {

            margin-left: 10%;
        }

        .register form {
            margin-left: 10%;


        }

        .register form label {
            font-size: 20px;
            color: black;
            font-weight: 500;
        }

        .register form input {
            padding: 5px;
            border: 1px solid #0049aa;
            border-radius: 10px;
        }

        #cpassword {
            margin-left: 6%;
        }

        #name {
            margin-left: 12%;
        }

        #mail {
            margin-left: 14%;
        }

        #phone {
            margin-left: 9%;
        }

        #password {
            margin-left: 20%;
        }

        .text-danger {
            color: red;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="text">
            <h1 class="ltext">Make life easy with WEBY</h1>
            <h3 class="ltext">Onboard your new journey!</h3>
        </div>
        <div class="register">
            <h1>INSTITUTE REGISTRATION</h1>
            <form action="{{ route('institute.store') }}" method="POST">
                @csrf
                @method('post')
                <label for="name">Institute Name</label>
                <input type="text" name="name" class="form-control" id="name"
                    placeholder="Enter Institute Name?" required value="{{ old('name') }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <br>
                <br>
                <label for="mail">Institute Mail</label>
                <input type="mail" name="email" class="form-control" id="mail"
                    placeholder="Enter email of your institute?" required value="{{ old('email') }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <br>
                <br>
                <label for="phone">Institute Hotline</label>
                <input type="text" name="phone" class="form-control" id="phone"
                    placeholder="Institute contact number?" required value="{{ old('phone') }}">
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <br>
                <br>
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password"
                    placeholder="Enter a new password" required>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <br>

                <br>
                <label for="cpassword">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="cpassword"
                    placeholder="Confirm the password!" required>

                <button type="submit" id="register"> Apply for Registration </button>

            </form>
        </div>

    </div>

</body>

</html>
