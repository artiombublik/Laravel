<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <script
          src="https://code.jquery.com/jquery-3.4.1.min.js"
          integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
          crossorigin="anonymous"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <style>
      .user-wrapper {
        border: 1px solid gainsboro;
        border-radius: .5rem;
        margin-bottom: 2rem;
        padding: 2rem;
        box-sizing: border-box;
      }
      .user-wrapper p{
        box-sizing: border-box;
      }
    </style>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
     <body style="padding: 2rem;">
        <div class="container-fluid">
            <div class="row">
                    <div class="col-md-6" style="border-right: 1px solid gainsboro;">
                      <p>Live</p>
                        @foreach($users as $user)
                          @if($user->type == 1)
                            <?php echo $user->print_details();?>
                          @endif
                        @endforeach
                    </div>

                    <div class="col-md-6">
                      <p>Demo</p>
                        @foreach($users as $user)
                          @if($user->type == 0)
                            <?php echo $user->print_details();?>
                          @endif
                        @endforeach
                    </div>

            </div>
        </div>
    </body>
</html>
