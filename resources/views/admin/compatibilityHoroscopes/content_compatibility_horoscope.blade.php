<div class="container-fluid">
	<div class="row" style="padding-left: 80px; padding-bottom: 10px">
		<div class="col-sm-2 col-sm-offset-5">
			<a href="{{route('compatibilityHoroscopeCreate')}}">
				<button class="btn btn-danger" type="submit"> Новая запись </button>
			</a>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="table-responsive" style="margin:0px 50px 0px 50px;">
		@if($horoscopes)
			<table class="table table-bordered">
				<thead>
				<tr>
					<th>№</th>
					<th>Первый знак</th>
					<th>Второй знак</th>
					<th>Процент</th>
					<th>Текст_1</th>
					<th>Текст_2</th>
					<th>Текст_3</th>
					<th>Текст_4</th>
					<th>Текст_5</th>
					<th>Оценка_1</th>
					<th>Оценка_2</th>
					<th>Оценка_3</th>
					<th>Оценка_4</th>
					<th>Оценка_5</th>
					<th>Удалить Изменить</th>
				</tr>
				</thead>
				<tbody>

				@foreach($horoscopes as $k => $horoscope)
					<tr>
						<td >{{ $horoscope->id }}</td>
						<td>{{ $horoscope->first_id }}</td>
						<td>{{ $horoscope->second_id }}</td>
						<td>{{ $horoscope->percent }}</td>
						<td>{{ str_limit($horoscope->content_1,50) }}</td>
						<td>{{ str_limit($horoscope->content_2,50) }}</td>
						<td>{{ str_limit($horoscope->content_3,50) }}</td>
						<td>{{ str_limit($horoscope->content_4,50) }}</td>
						<td>{{ str_limit($horoscope->content_5,50) }}</td>
						<td>{{ $horoscope->point_1 }}</td>
						<td>{{ $horoscope->point_2 }}</td>
						<td>{{ $horoscope->point_3 }}</td>
						<td>{{ $horoscope->point_4 }}</td>
						<td>{{ $horoscope->point_5 }}</td>

						<td>
							<form action="{{route('compatibilityHoroscopeEdit',['id'=>$horoscope->id])}}" method="GET" class="form-horizontal">
								{!! csrf_field() !!}
								<button type="submit" class="btn btn-default" aria-label="Left Align" name="edit">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
								</button>
							</form>

							<form action="{{route('compatibilityHoroscopeDestroy',['id'=>$horoscope->id])}}" method="POST" class="form-horizontal">
								{!! csrf_field() !!}
								{{ method_field('DELETE') }}
								<button type="submit" class="btn btn-default" aria-label="Left Align" name="delete">
									<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
								</button>
							</form>
						</td>
					</tr>
				@endforeach
				{{ $horoscopes->links() }}
				</tbody>
			</table>
		@endif

	</div>
</div>