<div class="container" style="padding-top: 20px ">
	<form class="form-horizontal" action="{{route('compatibilityHoroscopeAdd')}}" method='POST'>
		{!! csrf_field() !!}
		<div class="form-group">
			<label for="first_id" class="col-sm-2  control-label">Первый знак</label>
			<div class="col-sm-3">
				<select name="first_id" id="first_id" class="form-control">
					@foreach($zadiaks as $zadiak)
						<option value={{$zadiak->id}}>{{$zadiak->name}}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="second_id" class="col-sm-2 control-label">Второй знак</label>
			<div class="col-sm-3">
				<select name="second_id" id="second_id" class="form-control">
					@foreach($zadiaks as $zadiak)
						<option value={{$zadiak->id}}>{{$zadiak->name}}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="percent" class="col-sm-2 control-label">Процент</label>
			<div class="col-sm-3">
				<input type="number" id="percent" size="3" min="1" max="100" name = "percent" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label for="point_1" class="col-sm-2 control-label">Первая оценка</label>
			<div class="col-sm-2">
				<select name="point_1" id="point_1" class="form-control">
					<option value="хорошо" selected>Хорошо</option>
					<option value="cредне">Средне</option>
					<option value="плохо">Плохо</option>
				</select>
			</div>
			
			<label for="point_2" class="col-sm-2 control-label">Вторая оценка</label>
			<div class="col-sm-2">
				<select name="point_2" id="point_2" class="form-control">
					<option value="хорошо" selected>Хорошо</option>
					<option value="cредне">Средне</option>
					<option value="плохо">Плохо</option>
				</select>
			</div>
			
			<label for="point_3" class="col-sm-2 control-label">Третья оценка</label>
			<div class="col-sm-2">
				<select name="point_3" id="point_3" class="form-control">
					<option value="хорошо" selected>Хорошо</option>
					<option value="cредне">Средне</option>
					<option value="плохо">Плохо</option>
				</select>
			</div>
			
			<label for="point_4" class="col-sm-2 col-sm-offset-2 control-label">Четвертая оценка</label>
			<div class="col-sm-2">
				<select name="point_4" id="point_4" class="form-control">
					<option value="хорошо" selected>Хорошо</option>
					<option value="cредне">Средне</option>
					<option value="плохо">Плохо</option>
				</select>
			</div>
			
			<label for="point_4" class="col-sm-2 control-label">Пятая оценка</label>
			<div class="col-sm-2">
				<select name="point_5" id="point_5" class="form-control">
					<option value="хорошо" selected>Хорошо</option>
					<option value="cредне">Средне</option>
					<option value="плохо">Плохо</option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="content_1" class="col-sm-2 control-label">Первый текст</label>
			<div class="col-sm-10">
				<textarea name="content_1" id="content_1" cols="80" rows="3" class="form-control"></textarea>
			</div>
		</div>

		<div class="form-group">
			<label for="content_2" class="col-sm-2 control-label">Второй текст</label>
			<div class="col-sm-10">
				<textarea name="content_2" id="content_2" cols="80" rows="3" class="form-control"></textarea>
			</div>
		</div>

		<div class="form-group">
			<label for="content_3" class="col-sm-2 control-label">Третий текст</label>
			<div class="col-sm-10">
				<textarea name="content_3" id="content_3" cols="80" rows="3" class="form-control"></textarea>
			</div>
		</div>

		<div class="form-group">
			<label for="content_4" class="col-sm-2 control-label">Четверий текст</label>
			<div class="col-sm-10">
				<textarea name="content_4" id="content_4" cols="80" rows="3" class="form-control"></textarea>
			</div>
		</div>

		<div class="form-group">
			<label for="content_5" class="col-sm-2 control-label">Пятый текст</label>
			<div class="col-sm-10">
				<textarea name="content_5" id="content_5" cols="80" rows="3" class="form-control"></textarea>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-3 col-sm-offset-2">
				<input type="submit" id="submit" class="form-control">
			</div>
		</div>
	</form>
</div>
