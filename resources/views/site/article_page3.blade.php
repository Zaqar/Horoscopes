<section>
	<div class="container-fluid fluid_class">
		<div class="row">
			<div class="col-md-2">
				<div class="head_class">
					<div class="inner_class">
						{{$content->percent}}%
					</div>
				</div>
			</div>

			<div class="col-md-6 col-md-offset-1text_class" >
				<h5><a href="{{route('index')}}">Все гороскопы </a>,<a href="{{route('compatibilityHoroscope')}}">Гороскоп совместимости по знакам Зодиака</a></h5>
				<h2><strong>Женщина {{$zadiaksName[0]}} — мужчина {{$zadiaksName[1]}}</strong></h2>
			</div>
		</div>
	</div>
</section>