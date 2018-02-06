<link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
<div class="container-fluid my_linkes" style="text-align: center; background-color: #fff2fb; padding-top: 50px; height: 300px">
	<div class="row">
		<div class="col-md-4 col-md-offset-4" style="height: 100px; background-color: #9ecaf0; color:#fff; font-size: 30px; padding: 30px; border-radius: 10px; border: solid; border-color: #0d3625" >
			<a href="{{route('admin')}}">
				<strong>Панель администратора</strong>
			</a>
		</div>
	</div>
	<div class="row" style="height: 30px"></div>
	<div class="row">
		<div class="col-md-2 col-md-offset-1" style="height: 60px; {{$_SESSION['btn']==1? "background-color: red":"background-color: #1b6d85"}}; font-size: 20px; padding: 10px;  border-radius: 10px; border: solid; border-color: #0d3625;">
			<a  href="{{ route('adminHoroscope')}}">
				<strong>Гороскоп</strong>
			</a>
		</div>
		
		<div class="col-md-2 col-md-offset-2" style="height: 60px; {{$_SESSION['btn']==2? "background-color: red":"background-color: #1b6d85"}}; font-size: 20px; border-radius: 10px; border: solid; border-color: #0d3625">
			<a href="{{ route('adminCompatibilityHoroscope') }}">
				<strong>Гороскоп совместимости</strong>
			</a>
		</div>
		<div class="col-md-2 col-md-offset-2" style="height: 60px; {{$_SESSION['btn']==3? "background-color: red":"background-color: #1b6d85"}}; font-size: 20px; padding: 10px;  border-radius: 10px; border: solid; border-color: #0d3625">
			<a href="{{ route('adminZadiak') }}">
				<strong>Задиак</strong>
			</a>
		</div>
	</div>
</div>
<div style="height: 1px; background-color: #0d3625; margin-bottom: 10px"></div>
