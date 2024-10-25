<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Weby-EMS</title>
    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        a {
            text-decoration: none;
            color: white;
        }

        .sign-up {
            width: 70%;
            text-align: center;
            margin: 1%;
        }

        .login {
            width: 70%;
            text-align: center;
            margin: 1%;
        }

        .full-area {
            display: flex;
            justify-content: space-evenly;
        }

        .close {

            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {

            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .one-area,
        .two-area {
            padding: 3% 5%;
            border: 3px solid rgb(24, 94, 187);
        }

        .cs-area {
            padding: 0 4%;
        }

        .head-one-area h2 {
            color: rgb(17, 72, 124);
        }

        .head-one-area h3 {
            color: rgba(0, 0, 0, 0.849);
        }

        .cs-area button {
            border: none;
            outline: none;
            padding: 5% 15%;
            font-size: 1.2rem;
            border-radius: 20px;
            background-color: #0f4fad;
        }

        @media screen and (max-width: 687px) {
            .full-area {
                flex-direction: column;
            }

            .one-area {
                margin-bottom: 3%;
            }
        }
        @media only screen and (max-width: 600px) {
            .wel{
                font-size: 1.5rem;
            }
            .wby{
                font-size: 3rem;
            }
            .title{
                font-size: 2rem;
                padding: 10px 0px;
            }
            .btn {
                padding: 8px 20px;
                font-size: 1rem;
            }
            .btn2 {
                margin-left: 7rem;
            }
        }

    </style>
</head>

<body>

    <!--modal-->



    <div class="container">
        <p class="wel">WELCOME <span class="to">TO</span></p>
        <h3 class="wby">WEBY </h3>
        <h3 class="title">EDUCATIONAL </h3>
        <h3 class="title">MANAGEMENT SYSTEM</h3>
        <a href="{{ route('login') }}" class="btn btn1" type="submit">LOGIN</a>
        <a href="{{ route('ins.index') }}" class="btn btn2" type="submit" >SIGNUP</a>
        {{-- <a href="{{ route('notice') }}" class="btn btn2">Notice</a> --}}


    </div>

    <div id="modal" class="sign-up">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="full-area">
                <div class="one-area">
                    <div class="one-area-wrapper cs-area">
                        <div class="head-one-area">
                            <h2>Sign-Up</h2>
                            <h3>as an Institute</h3>
                        </div>
                        <button class="sign-up-btn" type="submit"><a
                                href="{{ route('ins.index') }}">Sign-Up</a></button>
                    </div>
                </div>
                <div class="two-area">
                    <div class="two-area-wrapper cs-area">
                        <div class="head-one-area">
                            <h2>Sign-Up</h2>
                            <h3>as a Student</h3>
                        </div>
                        <button class="sign-up-btn" type="submit"><a href="{{ url('register') }}">Sign-Up</a></button>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div id="modal1" class="login">
        <div class="modal-content1">
            <span class="close">&times;</span>
            <div class="full-area">
                <div class="one-area">
                    <div class="one-area-wrapper cs-area">
                        <div class="head-one-area">
                            <h2>Log-in</h2>
                            <h3>as an Institute</h3>
                        </div>
                        <button class="sign-up-btn" type="submit"><a href="instituteLogin.php">Log-in</a></button>
                    </div>
                </div>
                <div class="two-area">
                    <div class="two-area-wrapper cs-area">
                        <div class="head-one-area">
                            <h2>Log-in</h2>
                            <h3>as a Student</h3>
                        </div>
                        <button class="sign-up-btn" type="submit"><a href="studentLogin.php">Log-in</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            $("#modal").css("display", "none");

            $("#signup").click(function() {
                $("#modal1").css("display", "none");
                $("#modal").css("display", "block");

            });

            $(".close, .sign-up").click(function() {

                $("#modal").css("display", "none");

            });

            $(".modal-content").click(function(e) {

                e.stopPropagation();

            });

        });
    </script>

    <script>
        $(document).ready(function() {
            $("#modal1").css("display", "none");
            $("#login").click(function() {
                $("#modal").css("display", "none");
                $("#modal1").css("display", "block");

            });

            $(".close, .login").click(function() {

                $("#modal1").css("display", "none");

            });

            $(".modal-content1").click(function(e) {

                e.stopPropagation();

            });

        });
    </script>
</body>

</html>
