<div class="container-fluid" style="padding-left:190px;padding-bottom: 30px; text-align: left">
	<div class="row">
		<a href="{{route('horoscopeAdd')}}">
			{!! Form::button('Новая запись',['class'=>'btn btn-danger','type'=>'submit']) !!}
		</a>
	</div>
</div>

<div class="container-fluid">
	<div class="table-responsive" style="margin:0px 50px 0px 50px;">
		@if($horoscopes)
			<table class="table table-bordered">
				<thead>
				<tr>
					<th>№</th>
					<th>Номер задиака</th>
					<th>Тип текста</th>
					<th>Текст</th>
					<th>Любовь</th>
					<th>Бизнес</th>
					<th>Здорове</th>
					<th>Дата</th>
					<th>Удалить Изменить</th>
				</tr>
				</thead>
				<tbody>

				@foreach($horoscopes as $k => $horoscope)

					<tr>

						<td>{{ $horoscope->id }}</td>
						<td>{{ $horoscope->zadiak_id }}</td>
						<td>{{ $horoscope->type }}</td>
						<td>{{ $horoscope->content }}</td>
						<td>{{ $horoscope->love }}</td>
						<td>{{ $horoscope->business }}</td>
						<td>{{ $horoscope->health }}</td>
						<td>{{ $horoscope->start }}</td>

						<td>
							<form action="{{route('horoscopeEdit',['id'=>$horoscope->id])}}" method="GET" class="form-horizontal">
								{!! csrf_field() !!}
								<button type="submit" class="btn btn-default" aria-label="Left Align" name="edit">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
								</button>
							</form>

							<form action="{{route('horoscopeEdit',['id'=>$horoscope->id])}}" method="POST" class="form-horizontal">
								{!! csrf_field() !!}
							{{ method_field('DELETE') }}
							<button type="submit" class="btn btn-default" aria-label="Left Align" name="delete">
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							</button>
							</form>
						</td>
					</tr>
				@endforeach

				</tbody>
			</table>
		@endif

	</div>
</div>