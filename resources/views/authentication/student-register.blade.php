<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT REGISTRATION</title>
    <style>
        body {
            background-image: linear-gradient(to right, #0049aa, #2bb4d4);
            margin-top: 150px !important;
        }

        .container {
            margin-left: 19%;
            display: flex;
        }

        .text1 {
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
            margin-left: 4%;
        }

        #name {
            margin-left: 25%;
        }

        #mail {
            margin-left: 25%;
        }

        #phone {
            margin-left: 25%;
        }

        #gender {
            margin-left: 23%;
        }

        #password {
            margin-left: 19%;
        }

        #ins_name {
            margin-left: 10%;
        }

        #ins_id {
            margin-left: 16%;
        }

        .text-danger {
            color: red;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="text1">
            <h1 class="ltext">Select your institute!</h1>
            <h3 class="ltext">Onboard your new journey!</h3>
        </div>
        <div class="register">
            <h1>STUDENT REGISTRATION</h1>
            <form action="{{ route('student.register') }}" method="POST">
                @csrf
                @method('post')
                <label for="sname">Name</label>
                <input type="text" name="name" id="name" placeholder="Your Name?" required
                    value="{{ old('name') }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <br>
                <br>
                <label for="mail">Email</label>
                <input type="email" name="email" id="mail" placeholder="Your email?"
                    value="{{ old('email') }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <br>
                <br>
                <label for="phn">Phone</label>
                <input type="number" name="phone" id="phone" placeholder="Your phone number?" required
                    value="{{ old('phone') }}">
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <br>
                <br>
                <label for="">Gender</label>
                <input type="radio" name="gender" id="gender" value="1" value="{{ old('gender') }}">
                <label for="">Male</label>
                <input type="radio" name="gender" id="gender" value="2" value="{{ old('gender') }}">
                <label for="">Female</label>
                @error('gender')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <br>
                <br>
                <label for="">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter a new password" required>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <br>
                <br>
                <label for="cpass">Confirm Password</label>
                <input type="password" name="password_confirmation" id="cpassword" placeholder="Confirm the password!"
                    required>
                <br>
                <br>
                <label for="">Institute Name</label>
                <input type="text" name="ins_name" id="ins_name" placeholder="Enter Institute Name" required
                    value="{{ old('ins_name') }}">
                @error('ins_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <br>
                <br>

                <label for="">Institute Id</label>
                <input type="text" name="ins_id" id="ins_id" placeholder="Enter Institute Id" required
                    value="{{ old('ins_id') }}">
                @error('ins_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <br>
                <button type="submit" id="register">Apply for Registration </button>
            </form>
        </div>

    </div>

</body>

</html>
