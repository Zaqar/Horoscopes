<div class="container-fluid">
	<div class="row" style="padding-right: 80px; padding-bottom: 10px">
		<div class="col-sm-1 col-sm-offset-11">
			<a href="{{route('zadiakCreate')}}">
				{!! Form::button('Новая запись',['class'=>'btn btn-danger','type'=>'submit']) !!}
			</a>
		</div>
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
							{!! Form::open(array('url' => route('zadiakEdit',['id'=>$zadiak->id]), 'method' => 'get'),array('class'=>'form-horizontal')) !!}
							<button type="submit" class="btn btn-default" aria-label="Left Align" name="edit">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</button>
							{!! Form::close() !!}

							{!! Form::open(array('url' => route('zadiakDestroy',['id'=>$zadiak->id]), 'method' => 'delete')) !!}
							<button type="submit" class="btn btn-default" aria-label="Left Align" name="delete">
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							</button>
							{!! Form::close() !!}
						</td>
					</tr>
				@endforeach
				{{ $zadiaks->links() }}
				</tbody>
			</table>
		@endif

	</div>
</div>