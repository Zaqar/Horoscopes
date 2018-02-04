<div class="container" style="padding-top: 20px ">
	<form class="form-horizontal" action="{{route('horoscopeEdit',['id'=>$content])}}" method='POST'>
		{!! csrf_field() !!}
		<div class="form-group">
			<label for="zadiak_id" class="col-sm-2 control-label">Выберите задиак</label>
			<div class="col-sm-3">
				<select name="zadiak_id" id="zadiak_id" class="form-control">
					@foreach($zadiaks as $zadiak)
						@if($zadiak->id==$content->zadiak_id)
							<option selected value={{$zadiak->id}}>{{$zadiak->name}}</option>
						@endif
						<option value={{$zadiak->id}}>{{$zadiak->name}}</option>
						@endforeach
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="type" class="col-sm-2 control-label">Выберите тип</label>
			<div class="col-sm-3">
				<select name="type" id="type" class="form-control">
					@switch($content->type)
						@case(1)
							<option value= 1 selected>день</option>
							@break
						@case (2)
							<option value= 2 selected>неделя</option>
							@break
						@case (3)
							<option value= 3 selected>месяць</option>
							@break
						@case (4)
							<option value= 4 selected>год</option>
							@break
					@endswitch
					<option value= 1>день</option>
					<option value= 2>неделя</option>
					<option value= 3>месяць</option>
					<option value= 4>год</option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="start" class="col-sm-2 control-label">Выберите дату</label>
			<div class="col-sm-3">
				<input type="date" name="start" id="start" class="form-control" value="{{$content->start}}">
			</div>
		</div>

		<div class="form-group">
			<label for="love" class="col-sm-2 control-label">Любовь</label>
			<div class="col-sm-2">
				<select name="love" id="love" class="form-control">
					<option selected value={{$content->love}}>{{$content->love}}</option>
					@for($i = 5; $i>=1; --$i)
						<option value={{$i}}>{{$i}}</option>
					@endfor
				</select>
			</div>

			<label for="business" class="col-sm-2 control-label">Бизнес</label>
			<div class="col-sm-2">
				<select name="business" id="business" class="form-control">
					<option selected value={{$content->business}} >{{$content->business}}</option>
					@for($i = 5; $i>=1; --$i)
						<option value="{{$i}}">{{$i}}</option>
					@endfor
				</select>
			</div>

			<label for="health" class="col-sm-2 control-label">Здоровие</label>
			<div class="col-sm-2">
				<select name="health" id="health" class="form-control">
					<option value={{$content->health}} selected>{{$content->health}}</option>
					@for($i = 5; $i>=1; --$i)
						<option value={{$i}}>{{$i}}</option>
					@endfor
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="text" class="col-sm-2 control-label">Вставьте текст</label>
			<div class="col-sm-10">
				<textarea name="content" id="text" cols="80" rows="10" class="form-control">
					{{$content->content}}
				</textarea>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-3 col-sm-offset-2">
				<input type="submit" id="submit" name="submitEdit" class="form-control">
			</div>
		</div>
	</form>
</div>