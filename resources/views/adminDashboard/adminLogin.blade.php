<link rel="stylesheet" href="{{asset('userDashboard/css/admin.css')}}">


<div class="wrapper">
    <div class="container">
        <div class="col-left">
            <div class="login-text">
                <h2>Welcome Back <b>Admin</b></h2>
                <p>Please Log In <br>to access the website.</p>
            </div>
        </div>
        <div class="col-right">
            <div class="login-form">
                <h2>Admin Login</h2>
                <form action="{{route('admin.dashboard')}}" method="post">
                    @csrf
                    <p>
                        <label>Email address<span>*</span></label>
                        <input type="text" name="email" placeholder="Username or Email" required>
                    </p>
                    <p>
                        <label>Password<span>*</span></label>
                        <input type="text" name="password" placeholder="Password" required>
                    </p>
                    <p>
                        <input type="submit" value="Sing In" />
                    </p>

                </form>
            </div>
        </div>
    </div>
</div>
