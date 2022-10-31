<?php include("./include/header.php") ?>
<?php include("./include/navbar.php") ?>
<style>
    .form {
        width: 90%;
        margin: 0 auto;
        padding: 20px;
        background-color: #ffffff42;
        border-radius: 30px;
    }

    .heading h2{
        font-size: 45px;
        font-weight: bolder;
        color: #fff;
        text-align: center;
        margin-top: 20px;
    }
    .label{
        font-size: 17px;
        font-weight: 600;
        color: #fff;
        padding-left: 20px;
    }
    .input{
        height: 40px;
        border-radius: 20px;
        background-color: #ffffff60;
        border: none;
        padding: 10px;
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .input::placeholder{
        color: #fff;
        padding-left: 10px;
    }
    .input:focus{
        outline: #0f7dff;
    }
    .signin-btn{
        text-align: center;
    }
    .signin-btn button{
        border: none;
        color: #3848f1;
        padding: 10px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        border-radius: 30px;
        font-size: 20px;
        font-weight: bold;
        cursor: pointer;
    }
    .text-white{
        color: #fff;
        padding-left: 15px;
        text-decoration: none;
    }

</style>
<div class="row pt-5">
    <div class="col-6">
        <img src="./main/img/4.png" alt="">
    </div>
    <!-- sign in form -->
    <div class="col-6">
        <div class="form">
            <div class="heading">
                <h2>Sign in</h2>
            </div>
            <form action="./main/projects.php" method="post" class="pt-3 px-4">
                <div class="form-group py-2">
                    <label for="username" class="label">Email</label>
                    <input type="text" class="form-control input" name="username" id="username" placeholder="hello@xyz.com">
                </div>
                <div class="form-group py-2">
                    <label for="password" class="label">Password</label>
                    <input type="password" class="form-control input" name="password" id="password" placeholder="Password">
                </div>
                <div>
                    <a href="#" class="text-white">Forgot Password ?</a>
                </div>
                <div class="signin-btn pt-4">
                <button type="submit" class="btn btn-light">Sign in</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include("./include/footer.php") ?>