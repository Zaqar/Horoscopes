<div class="container-fluid">
	<div class="row" style="padding-left: 50px; padding-bottom: 10px">
		<div class="col-sm-2">
			<a href="{{route('horoscopeCreate')}}">
				{!! Form::button('Новая запись',['class'=>'btn btn-danger','type'=>'submit']) !!}
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

				@foreach($horoscopes as $horoscope)

					<tr>
						<td>{{ $horoscope->id }}</td>
						<td>{{ $horoscope->zadiak_id }}</td>
						<td>{{ $horoscope->type }}</td>
						<td>{{ str_limit($horoscope->content, 100)}}</td>
						<td>{{ $horoscope->love }}</td>
						<td>{{ $horoscope->business }}</td>
						<td>{{ $horoscope->health }}</td>
						<td>{{ $horoscope->start }}</td>

						<td>
							{!! Form::open(array('url' => route('horoscopeEdit',['id'=>$horoscope->id]), 'method' => 'get'),array('class'=>'form-horizontal')) !!}
								<button type="submit" class="btn btn-default" aria-label="Left Align" name="edit">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
								</button>
							{!! Form::close() !!}

							{!! Form::open(array('url' => route('horoscopeDestroy',['id'=>$horoscope->id]), 'method' => 'delete')) !!}
								<button type="submit" class="btn btn-default" aria-label="Left Align" name="delete">
									<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
								</button>
							{!! Form::close() !!}
						</td>
					</tr>
				@endforeach

				</tbody>
				{{ $horoscopes->links() }}
			</table>
		@endif
	</div>
</div>
