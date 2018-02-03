<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    <!-- Optional theme -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/media.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



</head>
<body>
    @yield('content')
    
    <section id="chooseData">
        <div class="container-fluid" style=" padding: 50px">
            <div class="row">
                <div class="col-md-8 col-md-offset-2" style="text-align: center;">
                    <h1>
                        Все знаки Зодиака
                    </h1>
                    <p>
                        Введите дату рождения другого человека, чтобы узнать, кто он по гороскопу, и получить другую полезную информацию.
                    </p>

                    <form action="{{ route('indexPost') }}"  method="POST" class="form-inline">
                        {!! csrf_field() !!}
                        <div class="form-group">
                          <select class="form-control" id="sel1" name="birthDay">
                            <option value=1 selected="selected">01</option>
                              @for($i = 2; $i<=31; ++$i)
                                  @if($i<10)
                                      <option value={{ $i }}>0{{ $i }}</option>
                                  @else
                                      <option value={{ $i }}>{{ $i }}</option>
                                  @endif
                           @endfor
                          </select>
                        </div>
                        <div class="form-group">
                          <select class="form-control" id="sel2" name="birthMonth">
                            <option value= 1 selected="selected">Январь</option>
                            <option value= 2>Февраль</option>
                            <option value= 3>Март</option>
                            <option value= 4>Апрель</option>
                            <option value= 5>Май</option>
                            <option value= 6>Июнь</option>
                            <option value= 7>Июль</option>
                            <option value= 8>Август</option>
                            <option value= 9>Сентябрь</option>
                            <option value= 10>Октябрь</option>
                            <option value= 11>Ноябрь</option>
                            <option value= 12>Декабрь</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <select class="form-control" id="sel3" name="birthYear">
                              <option value= {{ date('Y') }} selected="selected">{{ date('Y') }}</option>
                              @for($i = (int)date('Y')-1 ; $i>=1900; --$i)
                                  <option value="{{$i}}">{{$i}}</option>
                            @endfor
                          </select>
                        </div>
                    <input class="btn btn-danger" style="color: #fff" type="submit" value="Показать все гороскопы">

                    </form>
                </div>
            </div>
        </div>
        <div style="height: 3px; background: red;"></div>
    </section>

    <section id="zadiakList">
        <div class="container-fluid">
            <div class="row">
                @for($i = 0; $i<12; ++$i)
                <div class="col-md-2" style="text-align: center;padding: 20px">
                    <a href="{{ route('horoscope',array('zadiakName'=>$zadiaks[$i]->name,'day'=>session('day'),'checkFromIcon'=>0)) }}">
                        {!! Html::image('assets/img/ZodiakIcons/'.$zadiaks[$i]->image) !!}
                        <p>{{$zadiaks[$i]->name}}</p>
                        <p>{{$zodiakListData[$i]}}</p>
                    </a>
                </div>
                @endfor
            </div>
        </div>
        <div style="height: 3px; background: red;"></div>
    </section>
        
    <section>
        <div class="container" style="padding: 40px">
            <div class="row">
                <div class="col-md-8 col-md-offset-2" style="text-align: center;">
                    <a href="{{route('compatibilityHoroscope') }}">
                        {!! Html::image('assets/img/совместимость2.png') !!}
                        <h2>Совместимость по знакам Зодиака</h2>
                    </a>
                    <p>
                        Совместимость по знакам Зодиака не гарантирует любви в паре, но именно благодаря ей влюбленные достигают гармонии.
                    </p>
                </div>
            </div>
        </div>
    </section>
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