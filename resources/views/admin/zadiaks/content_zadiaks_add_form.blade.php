<div class="container" style="padding-top: 20px ">
	<form class="form-horizontal" action="{{route('zadiakCreate')}}" method='post'>
		{!! csrf_field() !!}
		<div class="form-group">
			<label for="name" class="col-sm-2 control-label">Выберите задиак</label>
			<div class="col-sm-3">
				<select name="name" id="name" class="form-control">
					@foreach($zadiaks as $zadiak)
						<option value={{$zadiak->name}}>{{$zadiak->name}}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="image" class="col-sm-2 control-label">Вставте картинку</label>
			<div class="col-sm-3">
				<input type="text" name="image" placeholder="image_name.format" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label for="start_month" class="col-sm-2 control-label">Начало месяца</label>
			<div class="col-sm-3">
				<input type="date" name="start_month" id="start_month" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label for=end_month" class="col-sm-2 control-label">Конец месяца</label>
			<div class="col-sm-3">
				<input type="date" name="end_month" id="end_month" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-3 col-sm-offset-2">
				<input type="submit" id="submit" class="form-control">
			</div>
		</div>

	</form>
</div>
