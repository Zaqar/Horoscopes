<div class="container-fluid">
	<div class="row" style="padding-right: 35px; padding-bottom: 10px">
		<div class="col-sm-2 col-sm-offset-7">
			<a href="{{route('zadiakAdd')}}">
				{!! Form::button('Новая запись',['class'=>'btn btn-danger','type'=>'submit']) !!}
			</a>
		</div>
		<form action="{{route('adminZadiak')}}" method="GET">
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
		@if($zadiaks)
			<table class="table table-bordered">
				<thead>
				<tr>
					<th>№</th>
					<th>Имя</th>
					<th>Рисунок</th>
					<th>Начало месяца</th>
					<th>Конец месяца</th>
					<th>Удалить Изменить</th>
				</tr>
				</thead>
				<tbody>

				@foreach($zadiaks as $zadiak)

					<tr>
						<td>{{ $zadiak->id }}</td>
						<td>{{ $zadiak->name }}</td>
						<td>{{ $zadiak->image }}</td>
						<td>{{ $zadiak->start_month }}</td>
						<td>{{ $zadiak->end_month }}</td>

						<td width="100px">
							<form action="{{route('zadiakEdit',['id'=>$zadiak->id])}}" method="GET" class="form-horizontal">
								{!! csrf_field() !!}
								<button type="submit" class="btn btn-default" aria-label="Left Align" name="edit">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
								</button>
							</form>

							<form action="{{route('zadiakEdit',['id'=>$zadiak->id])}}" method="POST" class="form-horizontal">
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