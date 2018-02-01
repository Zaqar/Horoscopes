<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/page3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('assets/css/page3.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/media3.css')}}">
    <!-- Optional theme -->
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
	
    @yield('article')

    <div style="height: 3px; background: red;"></div>

    @yield('content')

	<div style="height: 3px; background: red;"></div>
      <footer>
        <div class="container" style="padding: 30px">
            <div class="row">
                <div class="col-md-6">
                   <span style="font-size: 18px; padding-right: 5px">Подпишитесь на нас</span>
                    <button style="color: #0026FF;">
                        <i class="fa fa-facebook-official" aria-hidden="true"></i>
                    </button>

                    <button style="color: #1A55E4;"> 
                       <i class="fa fa-vk" aria-hidden="true"></i>
                    </button>

                    <button style="color: #0842C8;">
                        <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                    </button>

                    <button style="color: #FF6A00;">
                        <i class="fa fa-odnoklassniki-square" aria-hidden="true"></i>
                    </button>
                </div>

                 <div class="col-md-6">
                    <form class="form-inline">
                      <div class="form-group">
                        <label for="email">Рассылка гороскопов</label>
                        <input type="email" class="form-control" id="email" placeholder="jane.doe@example.com">
                      </div>
                      <input type="submit" class="btn btn-danger" style="color: #fff" value="Подпишитесь">
                    </form>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>