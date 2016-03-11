<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Verify Your Email Address</h2>

        <div>
            Hello {{$name}}...<p/>
            Thanks for creating an account with the verification .
            Please follow the link below to verify your email address
            {{ URL::to('verify/'.$id.'/confirm/'.$key) }}<br/>

        </div>

    </body>
</html>
