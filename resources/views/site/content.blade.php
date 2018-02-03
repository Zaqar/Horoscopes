<article>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2 head">

				{!! Html::image('assets/img/ZodiakIcons/'.$thisZadiak->image,'',array('class'=>'img-responsive img_padd')) !!}
				<h5 style="padding-top: 5px"><a href="#zadiakList">Посмотреть другой знак</a></h5>
				@if(isset($birthInfo))
					<h5 style="padding-top: 20px;"> <strong>Ваша дата рождения</strong></h5>
					<p>
						<i>{{$birthInfo['birthDay']}}  {{$birthInfo['birthMonth']}} {{$birthInfo['birthYear']}}</i>
					</p>
					<h5 style="padding-top: 20px;"> <strong>Ваш знак по году</strong></h5>
					<i>{{$birthInfo['zadiakYearName']}}</i>
				@endif
				<h5 style="padding-top: 5px"><a href="#chooseData">Уточнить дату рождения</a></h5>
			</div>
			<div class="col-md-6 text_padd">
				<h1><strong>Гороскоп на сегодня:{{$thisZadiak->name}}</strong></h1>
				<h4>Прогноз на
					@if($day == config('constants.WEEK'))
						<i>{{$date['start_week']}} - {{  $date['end_week'] }}  {{ $date['month'] }}</i>
					@elseif($day == config('constants.MONTH'))
						<i>{{$date['month']}} {{ $date['year'] }}</i>
					@elseif($day == config('constants.YEAR'))
						<i>{{ $date['year'] }}</i>
					@else
						<i>{{ $date['day'] }} {{ $date['month'] }}</i>
					@endif
				</h4>
				<ul class="days" style="padding: 20px">
					<li><a href="{{ route('horoscope',array('zadiakName'=>$thisZadiak->name,'day'=>config('constants.YESTERDAY'))) }}">вчера</a></li>
					<li><a href="{{ route('horoscope',array('zadiakName'=>$thisZadiak->name,'day'=>config('constants.TODAY'))) }}">сегодня</a></li>
					<li><a href="{{ route('horoscope',array('zadiakName'=>$thisZadiak->name,'day'=>config('constants.TOMORROW'))) }}">завтра</a></li>
					<li><a href="{{ route('horoscope',array('zadiakName'=>$thisZadiak->name,'day'=>config('constants.WEEK'))) }}">недела</a></li>
					<li><a href="{{ route('horoscope',array('zadiakName'=>$thisZadiak->name,'day'=>config('constants.MONTH'))) }}">месяць</a></li>
					<li><a href="{{ route('horoscope',array('zadiakName'=>$thisZadiak->name,'day'=>config('constants.YEAR'))) }}">2018</a></li>
				</ul>
				<p>
				{{$content->content}}
				</p>
			</div>
		</div>

		<div class="row text_padd" style="padding-bottom: 10px">
			<div class="col-xs-12 col-sm-4  col-md-2 col-md-offset-2">
				<div class = "param_block">
					<i class="fa fa-heart-o" aria-hidden="true"><span>{{$content->love}}</span></i>
					<br>
					Любовь
				</div>
			</div>

			<div class="col-xs-12 col-sm-4 col-md-2 ">
				<div class = "param_block">
					<i class="fa fa-bar-chart" aria-hidden="true"><span>{{$content->business}}</span></i>
					<br>
					Бизнес
				</div>
			</div>

			<div class="col-xs-12 col-sm-4 col-md-2 ">
				<div class = "param_block">
					<i class="fa fa-heartbeat" aria-hidden="true"><span>{{$content->health}}</span></i>
					<br>
					Здоровье
				</div>
			</div>
		</div>
	</div>
	<div style="height: 3px; background: red;"></div>
</article>