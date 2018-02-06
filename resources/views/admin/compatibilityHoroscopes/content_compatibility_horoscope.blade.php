<div class="container-fluid">
	<div class="row" style="padding-left: 50px; padding-bottom: 10px">
		<div class="col-sm-2 col-sm-offset-3">
			<a href="{{route('compatibilityHoroscopeAdd')}}">
				<button class="btn btn-danger" type="submit"> Новая запись </button>
			</a>
		</div>
		<form action="{{route('adminCompatibilityHoroscope')}}" method="GET">
			{!! csrf_field() !!}
			<div class="col-sm-2">
				<select name="countOfRows" id="row" class="form-control">
                    <?php $j = 1?>
					@for($i=20; $i<=$count; $i+=20)
						@if($j==$startOfRow+1)
							<option selected value={{$j-1}}>{{$j}}-{{$i}}</option>
						@else
							<option value={{$j-1}}>{{$j}}-{{$i}}</option>
						@endif
                        <?php $j = $i ?>
					@endfor
	                    @if($count%20!=0 && $j!=1)
		                    <option value={{$j-1}}>{{$j}}-{{$j+($count%20)}}</option>
	                    @elseif($count%20!=0)
		                    <option value={{$j-1}}>{{$j}}-{{$count}}</option>
	                    @endif
				</select>
			</div>
			<input type="submit" class="btn btn-danger" value="Показать">
		</form>
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
						<td>{{ $horoscope->content_1 }}</td>
						<td>{{ $horoscope->content_2 }}</td>
						<td>{{ $horoscope->content_3 }}</td>
						<td>{{ $horoscope->content_4 }}</td>
						<td>{{ $horoscope->content_5 }}</td>
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

							<form action="{{route('compatibilityHoroscopeEdit',['id'=>$horoscope->id])}}" method="POST" class="form-horizontal">
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