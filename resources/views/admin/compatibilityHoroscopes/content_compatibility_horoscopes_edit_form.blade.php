<div class="container" style="padding-top: 20px ">
	<form class="form-horizontal" action="{{route('compatibilityHoroscopeEdit',['id'=>$horoscope->id])}}" method='POST'>
		{!! csrf_field() !!}
		<div class="form-group">
			<label for="first_id" class="col-sm-2  control-label">Первый знак</label>
			<div class="col-sm-3">
				<select name="first_id" id="first_id" class="form-control">
					@foreach($zadiaks as $zadiak)
						@if($zadiak->id==$horoscope->second_id)
							<option selected value={{$zadiak->id}}>{{$zadiak->name}}</option>
						@else
							<option value={{$zadiak->id}}>{{$zadiak->name}}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="second_id" class="col-sm-2 control-label">Второй знак</label>
			<div class="col-sm-3">
				<select name="second_id" id="second_id" class="form-control">
					@foreach($zadiaks as $zadiak)
						@if($zadiak->id==$horoscope->second_id)
							<option selected value={{$zadiak->id}}>{{$zadiak->name}}</option>
						@else
							<option value={{$zadiak->id}}>{{$zadiak->name}}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>


		<div class="form-group">
			<label for="percent" class="col-sm-2 control-label">Процент</label>
			<div class="col-sm-3">
				@if(isset($horoscope->percent))
					<input type="text" id="percent" name = "percent" value="{{$horoscope->percent}}" placeholder="{{$horoscope->percent}}">
				@else
					<input type="text" id="percent" name = "percent">
				@endif
			</div>
		</div>

		<div class="form-group">
			<label for="point_1" class="col-sm-2 control-label">Первая оценка</label>
			<div class="col-sm-2">
				<select name="point_1" id="point_1" class="form-control">
					@if(isset($horoscope->point_1))
						<option value="{{$horoscope->point_1}}" selected>{{$horoscope->point_1}}</option>
					@endif
						<option value="хорошо">Хорошо</option>
						<option value="cредне">Средне</option>
						<option value="плохо">Плохо</option>

				</select>
			</div>

			<label for="point_2" class="col-sm-2 control-label">Вторая оценка</label>
			<div class="col-sm-2">
				<select name="point_2" id="point_2" class="form-control">
					@if(isset($horoscope->point_2))
						<option value="{{$horoscope->point_2}}" selected>{{$horoscope->point_2}}</option>
					@endif
					<option value="хорошо">Хорошо</option>
					<option value="cредне">Средне</option>
					<option value="плохо">Плохо</option>
				</select>
			</div>

			<label for="point_3" class="col-sm-2 control-label">Третья оценка</label>
			<div class="col-sm-2">
				<select name="point_3" id="point_3" class="form-control">
					@if(isset($horoscope->point_3))
						<option value="{{$horoscope->point_3}}" selected>{{$horoscope->point_3}}</option>
					@endif
					<option value="хорошо">Хорошо</option>
					<option value="cредне">Средне</option>
					<option value="плохо">Плохо</option>
				</select>
			</div>

			<label for="point_4" class="col-sm-2 col-sm-offset-2 control-label">Четвертая оценка</label>
			<div class="col-sm-2">
				<select name="point_4" id="point_4" class="form-control">
					@if(isset($horoscope->point_4))
						<option value="{{$horoscope->point_4}}" selected>{{$horoscope->point_4}}</option>
					@endif
					<option value="хорошо">Хорошо</option>
					<option value="cредне">Средне</option>
					<option value="плохо">Плохо</option>
				</select>
			</div>

			<label for="point_4" class="col-sm-2 control-label">Пятая оценка</label>
			<div class="col-sm-2">
				<select name="point_5" id="point_5" class="form-control">
					@if(isset($horoscope->point_5))
						<option value="{{$horoscope->point_5}}" selected>{{$horoscope->point_5}}</option>
					@endif
					<option value="хорошо">Хорошо</option>
					<option value="cредне">Средне</option>
					<option value="плохо">Плохо</option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="horoscope_1" class="col-sm-2 control-label">Первый текст</label>
			<div class="col-sm-10">
				<textarea name="content_1" id="horoscope_1" cols="80" rows="3" class="form-control">
					@if(isset($horoscope->content_1))
						{{$horoscope->content_1}}
					@endif
				</textarea>
			</div>
		</div>

		<div class="form-group">
			<label for="horoscope_2" class="col-sm-2 control-label">Второй текст</label>
			<div class="col-sm-10">
				<textarea name="content_2" id="horoscope_2" cols="80" rows="3" class="form-control">
						@if(isset($horoscope->content_2))
							{{$horoscope->content_2}}
						@endif
				</textarea>
			</div>
		</div>

		<div class="form-group">
			<label for="horoscope_3" class="col-sm-2 control-label">Третий текст</label>
			<div class="col-sm-10">
				<textarea name="content_3" id="horoscope_3" cols="80" rows="3" class="form-control">
						@if(isset($horoscope->content_3))
							{{$horoscope->content_3}}
						@endif
				</textarea>
			</div>
		</div>

		<div class="form-group">
			<label for="horoscope_4" class="col-sm-2 control-label">Четвертий текст</label>
			<div class="col-sm-10">
				<textarea name="content_4" id="horoscope_4" cols="80" rows="3" class="form-control">
						@if(isset($horoscope->content_4))
							{{$horoscope->content_4}}
						@endif
				</textarea>
			</div>
		</div>

		<div class="form-group">
			<label for="horoscope_5" class="col-sm-2 control-label">Пятый текст</label>
			<div class="col-sm-10">
				<textarea name="content_5" id="horoscope_5" cols="80" rows="3" class="form-control">
						@if(isset($horoscope->content_5))
							{{$horoscope->content_5}}
						@endif
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
