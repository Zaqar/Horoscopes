<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    <!-- Optional theme -->
    <link rel="stylesheet" href="{{asset('assets/css/page2.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>

   <article>
        <div class="container-fluid" style="padding-bottom: 20px">
            <div class="row">
                <div class="col-md-2 head">
	                <h5 style="padding-top: 20px"><a href="{{route('index')}}">Все гороскопы</a> </h5>
	                {!! Html::image('assets/img/совместимость.png','',array('class'=>"img-responsive img_padd")) !!}
                 </div>
                 <div class="col-md-8 text_padd"> 
                    <h1 style="padding-bottom: 10px"><strong>Гороскоп совместимости по знакам Зодиака</strong></h1>
                    <p>
                    День не самый простой, но с любыми возникающими проблемами можно справиться. Вы знаете это, поэтому не теряетесь, не злитесь и не огорчаетесь, а ищете выход из положения. Друзья охотно помогут, если вы не станете скрывать, что нуждаетесь в этом, и объясните, что нужно делать. Возможны новые знакомства, которые пригодятся позже.

                    Обратите внимание на свое здоровье: сегодня не исключены обострения хронических заболеваний. Нелегко будет метеочувствительным представителям знака – им особенно важно избегать перегрузок и больше отдыхать.
                    </p>
                </div>
            </div>
    </article>
    <div style="height: 3px; background: red;"></div>

    <section>
    	<div class="container" style="text-align: center; padding: 20px">
    		<div class="row">
    			<div class="col-md-8 col-md-offset-2">
                         <form action="{{ route('compatibilityHoroscopePost') }}" method="POST">
	                         {!! csrf_field() !!}
                         	<div class="form-group">
    					<label for="id1">Вы <span type="hidden" id="a1" onclick="change()">Мужчина</span></label>
                          <select class="form-control" id="id1" name="first_id">
                            <option value="1" selected="selected">Овен</option>
                            <option value="2">Телец</option>
                            <option value="3">Близнецы</option>
                            <option value="4">Рак</option>
                            <option value="5">Лев</option>
                            <option value="6">Дева</option>
                            <option value="7">Весы</option>
                            <option value="8">Скорпион</option>
                            <option value="9">Стрелец</option>
                            <option value="10">Козерог</option>
                            <option value="11">Водолей</option>
                            <option value="12">Рыбы</option>
                          </select>
                        </div>
							
                        <div class="form-group">
    					<label for="id2">Ваш партнер <span type="hidden" id="a2" onclick="change()">Женчина</span></label>
                          <select class="form-control" id="id2" name="second_id">
                            <option value="1" selected="selected">Овен</option>
                            <option value="2">Телец</option>
                            <option value="3">Близнецы</option>
                            <option value="4">Рак</option>
                            <option value="5">Лев</option>
                            <option value="6">Дева</option>
                            <option value="7">Весы</option>
                            <option value="8">Скорпион</option>
                            <option value="9">Стрелец</option>
                            <option value="10">Козерог</option>
                            <option value="11">Водолей</option>
                            <option value="12">Рыбы</option>
                          </select>
                        </div>
                    <input class="btn btn-danger" style="color: #fff" type="submit" value="Узнать совместимость">
                    </form>
    			</div>
    		</div>
    	</div>
    </section>
   <script>
       function change() {
           var first;
           var second;

	       first = document.getElementById("a1").textContent;
	       second = document.getElementById("a2").textContent;

           document.getElementById("a2").innerHTML = first;
           document.getElementById("a1").innerHTML = second;

           sessionStorage.setItem('first', second);
           sessionStorage.setItem('second', first);
       }
   </script>
        <div style="height: 3px; background: red;"></div>

        <section>
			<div class="container-fluid">

           		<div class="row">
	                <div class="col-md-2 head">
		                {!! Html::image('assets/img/ZodiakIcons/овен.png','',array('class'=>"img-responsive img_padd")) !!}
	                 </div>
	                 <div class="col-md-8 text_padd"> 
	                    <h3 style="padding-bottom: 10px"><strong>Гороскоп совместимости Овна</strong></h3>
	                    <p>
	    					Овны гармонично чувствуют себя в отношениях со Львами и Стрельцами, учатся философски смотреть на жизнь у Водолеев и наполняются оптимизмом и энтузиазмом, если рядом Близнецы или Весы.
	                    </p>
	                </div>
           		 </div>
			<hr>
			<div class="row">
                <div class="col-md-2 head">
	                {!! Html::image('assets/img/ZodiakIcons/телец.png','',array('class'=>"img-responsive img_padd")) !!}
                 </div>
	                 <div class="col-md-8 text_padd"> 
	                    <h3 style="padding-bottom: 10px"><strong>Гороскоп совместимости Тельца</strong></h3>
	                    <p>
	    					Тельцы отлично ладят с представителями своего знака, легко находят общий язык с мудрыми Девами и Козерогами, испытывают на удивление сильные и глубокие чувства к Ракам, Скорпиону или Рыбам.
	                    </p>
	                </div>
           	 </div>
			<hr>
            <div class="row">
                <div class="col-md-2 head">
	                {!! Html::image('assets/img/ZodiakIcons/близнецы.png','',array('class'=>"img-responsive img_padd")) !!}
                 </div>
                 <div class="col-md-8 text_padd"> 
                    <h3 style="padding-bottom: 10px"><strong>Гороскоп совместимости Близнецов</strong></h3>
                    <p>
    					Противоречивые Близнецы находят понимание у Водолеев и Весов, которые снисходительны к их слабостям. Отношения с представителями огненных знаков — Овнами, Львами и Весами — помогают им открыть новые радости жизни.
                    </p>
                </div>
            </div>
			<hr>
            <div class="row">
                <div class="col-md-2 head">
	                {!! Html::image('assets/img/ZodiakIcons/рак.png','',array('class'=>"img-responsive img_padd")) !!}
                 </div>
                 <div class="col-md-8 text_padd"> 
                    <h3 style="padding-bottom: 10px"><strong>Гороскоп совместимости Рака</strong></h3>
                    <p>
    					Романтичные и чувствительные Раки получают поддержку от представителей стихии Воды — Скорпионов и Рыб, а в отношениях с земными знаками — Тельцами, Девами и Козерогами — находят спокойствие, уверенность и стабильность, которой им так не хватает.
                    </p>
                </div>
            </div>
			<hr>
            <div class="row">
                <div class="col-md-2 head">
	                {!! Html::image('assets/img/ZodiakIcons/лев.png','',array('class'=>"img-responsive img_padd")) !!}
                 </div>
                 <div class="col-md-8 text_padd"> 
                    <h3 style="padding-bottom: 10px"><strong>Гороскоп совместимости Льва</strong></h3>
                    <p>
    						
						Гороскоп совместимости Льва
						23 июля — 22 августа
						Всегда заметные и очень гордые Львы могут создать гармоничные союзы с представителями огненных знаков — Овнами, Львами и Стрельцами. А общение с Близнецами, Весами и Водолеями внесет в их жизнь простые радости и подарит много сильных позитивных эмоций.
                    </p>
                </div>
            </div>
			<hr>
            <div class="row">
                <div class="col-md-2 head">
	                {!! Html::image('assets/img/ZodiakIcons/дева.png','',array('class'=>"img-responsive img_padd")) !!}
                 </div>
                 <div class="col-md-8 text_padd"> 
                    <h3 style="padding-bottom: 10px"><strong>Гороскоп совместимости Девы</strong></h3>
                    <p>
    					Внимательные и хладнокровные Девы комфортно чувствуют себя рядом с другими Девами, а также со спокойными Тельцами и склонными к рефлексии Козерогами. Отношения с Раками, Скорпионами и Рыбами могут быть более напряженными, но тоже складываются хорошо.
                    </p>
                </div>
            </div>
			<hr>
            <div class="row">
                <div class="col-md-2 head">
	                {!! Html::image('assets/img/ZodiakIcons/весы.png','',array('class'=>"img-responsive img_padd")) !!}
                 </div>
                 <div class="col-md-8 text_padd"> 
                    <h3 style="padding-bottom: 10px"><strong>Гороскоп совместимости Весов</strong></h3>
                    <p>
    					Дружелюбные Весы создают отношения, полные понимания и радости, с другими представителями воздушной стихии — Близнецами, Водолеями и Весами, и могут пробудить сильные чувства у Овнов, Львов и Стрельцов.
                    </p>
                </div>
            </div>
			<hr>
            <div class="row">
                <div class="col-md-2 head">
	                {!! Html::image('assets/img/ZodiakIcons/скорпион.png','',array('class'=>"img-responsive img_padd")) !!}
                 </div>
                 <div class="col-md-8 text_padd"> 
                    <h3 style="padding-bottom: 10px"><strong>Гороскоп совместимости Скорпиона</strong></h3>
                    <p>
    					Таинственные и многогранные Скорпионы могут образовать гармоничные союзы с Раками и Рыбами, которые будут бесконечно восхищаться ими, и обрести твердую почву под ногами благодаря терпеливой и понимающей любви Тельцов, Дев и Козерогов.
                    </p>
                </div>
            </div>
			<hr>
            <div class="row">
                <div class="col-md-2 head">
	                {!! Html::image('assets/img/ZodiakIcons/стрелец.png','',array('class'=>"img-responsive img_padd")) !!}
                 </div>
                 <div class="col-md-8 text_padd"> 
                    <h3 style="padding-bottom: 10px"><strong>Гороскоп совместимости Стрельца</strong></h3>
                    <p>
    					Для жадных до всего нового Стрельцов удачны союзы с другими Стрельцами и энергичными Овнами и Львами. Хорошо складываются отношения с воздушными знаками – Близнецами, Весами и Водолеями, способными проявить гибкость, настроиться на нужную волну.
                    </p>
                </div>
            </div>
			<hr>
            <div class="row">
                <div class="col-md-2 head">
	                {!! Html::image('assets/img/ZodiakIcons/козерог.png','',array('class'=>"img-responsive img_padd")) !!}
                 </div>
                 <div class="col-md-8 text_padd"> 
                    <h3 style="padding-bottom: 10px"><strong>Гороскоп совместимости Козерога</strong></h3>
                    <p>
    					Здравомыслящие Козероги хорошо чувствуют себя в отношениях с земными знаками — Тельцами, Девами и Козерогами, с которыми имеют много общего, а также получают удовольствие от близости Раков, Скорпионов и Рыб, душевная глубина которых завораживает.
                    </p>
                </div>
            </div>
			<hr>
            <div class="row">
                <div class="col-md-2 head">
	                {!! Html::image('assets/img/ZodiakIcons/водолей.png','',array('class'=>"img-responsive img_padd")) !!}
                 </div>
                 <div class="col-md-8 text_padd"> 
                    <h3 style="padding-bottom: 10px"><strong>Гороскоп совместимости Водолея</strong></h3>
                    <p>
    					Ироничные, независимые Водолеи становятся мягче и расслабляются в отношениях с воздушными знаками — Близнецами, Весами, Водолеями. А вот в общении с Овнами, Львами и Стрельцами неизменно присутствует напряжение — впрочем, приятное.
                    </p>
                </div>
            </div>
			<hr>
            <div class="row">
                <div class="col-md-2 head">
	                {!! Html::image('assets/img/ZodiakIcons/рыбы.png','',array('class'=>"img-responsive img_padd")) !!}
                 </div>
                 <div class="col-md-8 text_padd"> 
                    <h3 style="padding-bottom: 10px"><strong>Гороскоп совместимости Рыбы</strong></h3>
                    <p>
    					Рыбы, в характере которых сочетаются мечтательность и практичность, получают понимание и поддержку в отношениях с водными знаками — Раками, Скорпионами и Рыбами. А близость Тельцов, Дев и Козерогов учит их радоваться простым вещам и дарит спокойствие.
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
