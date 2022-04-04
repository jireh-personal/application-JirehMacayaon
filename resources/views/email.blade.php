<!DOCTYPE html>
<html>
    <head>
        <title>Application - Jireh Macayaon</title>
    </head>
    <body>
        <div class="row">
            <div class="col-lg-5">
                <p>Hi {{ $data->info->firstname.' '.Auth::user()->lastname }}</p>
                <br>
                <p>You have successfully created an account at <a href="{{ url('/profile') }}" class="btn btn-primary btn-sm">Login</a></p>
                <br>
                <p>Thank you</p>            
            </div>
        </div>
    </body>
</html>