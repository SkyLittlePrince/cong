{{Form::open(array('url'=>'test','method' => 'post'))}}
	<p>
		{{Form::label('loginname:')}}
		{{Form::text('loginname')}}
	</p>
	<p>
		{{Form::submit('submit')}}
	</p>
{{Form::close()}}