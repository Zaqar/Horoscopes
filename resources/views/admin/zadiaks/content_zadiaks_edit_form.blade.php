<div class="container" style="padding-top: 20px ">
	<form class="form-horizontal" action="{{route('zadiakUpdate',['id'=>$oldZadiak->id])}}" method='post'>
		{!! csrf_field() !!}
		{!! method_field('put') !!}
		<div class="form-group">
			<label for="name" class="col-sm-2 control-label">Выберите задиак</label>
			<div class="col-sm-3">
				<select name="name" id="name" class="form-control">
					@foreach($zadiaks as $zadiak)
						@if($oldZadiak->name == $zadiak->name)
							<option selected value={{$oldZadiak->name}}>{{$oldZadiak->name}}</option>
						@else
							<option value={{$zadiak->name}}>{{$zadiak->name}}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="image" class="col-sm-2 control-label">Вставте картинку</label>
			<div class="col-sm-3">
				@if(isset($oldZadiak))
					<input type="text" name="image" placeholder="{{$oldZadiak->image}}" value="{{$oldZadiak->image}}" class="form-control">
				@else
					<input type="text" name="image" placeholder="image_name.format" class="form-control">
				@endif
			</div>
		</div>

		<div class="form-group">
			<label for="start_month" class="col-sm-2 control-label">Начало месяца</label>
			<div class="col-sm-3">
				@if(isset($oldZadiak))
					<input type="date" name="start_month" id="start_month" value="{{$oldZadiak->start_month}}" class="form-control">
				@else
					<input type="date" name="start_month" id="start_month" class="form-control">
				@endif
			</div>
		</div>

		<div class="form-group">
			<label for=end_month" class="col-sm-2 control-label">Конец месяца</label>
			<div class="col-sm-3">
				@if(isset($oldZadiak))
					<input type="date" name="end_month" id="end_month" value="{{$oldZadiak->end_month}}" class="form-control">
				@else
					<input type="date" name="end_month" id="end_month" class="form-control">
				@endif
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-3 col-sm-offset-2">
				<input type="submit" id="submit" name="submitEdit" class="form-control">
			</div>
		</div>

	</form>
</div>
