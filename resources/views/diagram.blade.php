@extends('layouts.app')
@section('title','SEA |  Proyecto')
@section('body-class','project-page')
@section('content')

<style type="text/css">
	table{
		table-layout: fixed;
		text-align:center;
	}
	th, td {
		word-wrap: break-word;
		vertical-align: top;
	}
</style>
@if($num_characteristics==0)
<div class="container">
	<div class="row justify-content-center">
		<h3 style="margin-bottom:0; font-weight: bold;color: red">CAPTURE LAS CARACTERISTICAS FUNDAMENTALES DEL PROBLEMA.</h3>
	</div>
	<a class="btn btn-danger" href="{{ url('/'.$project_id.'/characteristic') }}">Regresar</a>
</div>
@endif

@if($num_characteristics==1)
<div class="container">
	<div class="row justify-content-center">
		<h3 style="margin-bottom:0; font-weight: bold;color: darkblue">{{$name_problem->name_problem}}</h3>
	</div>
	<div class="row justify-content-center">
		<h5 style="margin:0; font-weight: bold;color:RoyalBlue;">{{$characteristics[0]->name_c}}</h5>
	</div>
</div>
<div class="wrapperr">
	<div style="width: 95%; margin: 0 auto;">
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="-0.5 -0.5 482 22"><defs/><g><path d="M 250 -230 L 245.33 -230 Q 240.67 -230 240.67 -220 L 240.67 0 Q 240.67 10 235.33 10 L 232.67 10 Q 230 10 235.33 10 L 238 10 Q 240.67 10 240.67 20 L 240.67 240 Q 240.67 250 245.33 250 L 250 250" fill="none" stroke="#828181" stroke-miterlimit="10" transform="rotate(90,240,10)" pointer-events="all"/></g></svg>
	</div>

	<table width="100%" style="margin: 0">
		<tr>
			<th>SOCIAL</th>
			<th>ECONOMICO</th>
			<th>CULTURAL</th>
			<th>POLITICO</th>
			<th>LEYES-INSTITUCIONAL</th>
			<th>SALUD</th>
			<th>BIOFISICO</th>
		</tr>
		<tr>
			<td>
				@foreach ($elements as $element)
				@if($element->ambit=='SOCIAL')
				<span style="color: black">&#8226{{$element->name_e}}</span><br>
				@endif
				@endforeach
			</td>
			<td>
				@foreach ($elements as $element)
				@if($element->ambit=='ECONOMICO')
				<span style="color: black">&#8226{{$element->name_e}}</span><br>
				@endif
				@endforeach
			</td>
			<td>
				@foreach ($elements as $element)
				@if($element->ambit=='CULTURAL')
				<span style="color: black">&#8226{{$element->name_e}}</span><br>
				@endif
				@endforeach
			</td>
			<td>
				@foreach ($elements as $element)
				@if($element->ambit=='POLITICO')
				<span style="color: black">&#8226{{$element->name_e}}</span><br>
				@endif
				@endforeach
			</td>
			<td>
				@foreach ($elements as $element)
				@if($element->ambit=='LEYES-INSTITUCIONAL')
				<span style="color: black">&#8226{{$element->name_e}}</span><br>
				@endif
				@endforeach
			</td>
			<td>
				@foreach ($elements as $element)
				@if($element->ambit=='SALUD')
				<span style="color: black">&#8226{{$element->name_e}}</span><br>
				@endif
				@endforeach
			</td>
			<td>
				@foreach ($elements as $element)
				@if($element->ambit=='BIOFISICO')
				<span style="color: black">&#8226{{$element->name_e}}</span><br>
				@endif
				@endforeach
			</td>
		</tr>
	</table>
	<a class="btn btn-danger" href="{{ url('/'.$project_id.'/characteristic') }}" style="float: left;margin-left: 30px; margin-top: 50px">REGRESAR</a>
	<a class="btn btn-success" href="{{ url('/'.$project_id.'/table') }}" style="float: right;margin-right: 30px; margin-top: 50px">SIGUIENTE</a>
</div>
@endif

@if($num_characteristics==2)
<div class="wrapperr">
	<table width="100%" style="margin: 0;">
		<tr>
			<th>SOCIAL</th>
			<th>ECONOMICO</th>
			<th>CULTURAL</th>
			<th>POLITICO</th>
			<th>LEYES-INSTITUCIONAL</th>
			<th>SALUD</th>
			<th>BIOFISICO</th>
		</tr>
		<tr>
			<td>
				@foreach ($elements as $element)
				@if($element->ambit=='SOCIAL' and $element->characteristic_id==$characteristics[0]->id)
				<span style="color: black">&#8226{{$element->name_e}}</span><br>
				@endif
				@endforeach
			</td>
			<td>
				@foreach ($elements as $element)
				@if($element->ambit=='ECONOMICO' and $element->characteristic_id==$characteristics[0]->id)
				<span style="color: black">&#8226{{$element->name_e}}</span><br>
				@endif
				@endforeach
			</td>
			<td>
				@foreach ($elements as $element)
				@if($element->ambit=='CULTURAL' and $element->characteristic_id==$characteristics[0]->id)
				<span style="color: black">&#8226{{$element->name_e}}</span><br>
				@endif
				@endforeach
			</td>
			<td>
				@foreach ($elements as $element)
				@if($element->ambit=='POLITICO' and $element->characteristic_id==$characteristics[0]->id)
				<span style="color: black">&#8226{{$element->name_e}}</span><br>
				@endif
				@endforeach
			</td>
			<td>
				@foreach ($elements as $element)
				@if($element->ambit=='LEYES-INSTITUCIONAL' and $element->characteristic_id==$characteristics[0]->id)
				<span style="color: black">&#8226{{$element->name_e}}</span><br>
				@endif
				@endforeach
			</td>
			<td>
				@foreach ($elements as $element)
				@if($element->ambit=='SALUD' and $element->characteristic_id==$characteristics[0]->id)
				<span style="color: black">&#8226{{$element->name_e}}</span><br>
				@endif
				@endforeach
			</td>
			<td>
				@foreach ($elements as $element)
				@if($element->ambit=='BIOFISICO' and $element->characteristic_id==$characteristics[0]->id)
				<span style="color: black">&#8226{{$element->name_e}}</span><br>
				@endif
				@endforeach
			</td>
		</tr>
	</table>
	<div style="width: 95%; margin: 0 auto;">
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="-0.5 -0.5 482 22"><defs/><g><path d="M 250 -230 L 245.33 -230 Q 240.67 -230 240.67 -220 L 240.67 0 Q 240.67 10 235.33 10 L 232.67 10 Q 230 10 235.33 10 L 238 10 Q 240.67 10 240.67 20 L 240.67 240 Q 240.67 250 245.33 250 L 250 250" fill="none" stroke="#828181" stroke-miterlimit="10" transform="rotate(-90,240,10)" pointer-events="all"/></g></svg>
	</div>
	<div class="container">
		<div class="row justify-content-center">
			<h5 style="margin:0; font-weight: bold;color:RoyalBlue;">{{$characteristics[0]->name_c}}</h5>
		</div>
		<div class="row justify-content-center">
			<h3 style="margin-bottom:0;margin-top: 0; font-weight: bold;color: darkblue">{{$name_problem->name_problem}}</h3>
		</div>
		<div class="row justify-content-center">
			<h5 style="margin:0; font-weight: bold;color:RoyalBlue;">{{$characteristics[1]->name_c}}</h5>
		</div>	
	</div>
	<div style="width: 95%; margin: 0 auto;">
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="-0.5 -0.5 482 22"><defs/><g><path d="M 250 -230 L 245.33 -230 Q 240.67 -230 240.67 -220 L 240.67 0 Q 240.67 10 235.33 10 L 232.67 10 Q 230 10 235.33 10 L 238 10 Q 240.67 10 240.67 20 L 240.67 240 Q 240.67 250 245.33 250 L 250 250" fill="none" stroke="#828181" stroke-miterlimit="10" transform="rotate(90,240,10)" pointer-events="all"/></g></svg>
	</div>
	<table width="100%" style="margin: 0;">
		<tr>
			<th>SOCIAL</th>
			<th>ECONOMICO</th>
			<th>CULTURAL</th>
			<th>POLITICO</th>
			<th>LEYES-INSTITUCIONAL</th>
			<th>SALUD</th>
			<th>BIOFISICO</th>
		</tr>
		<tr>
			<td>
				@foreach ($elements as $element)
				@if($element->ambit=='SOCIAL' and $element->characteristic_id==$characteristics[1]->id)
				<span style="color: black">&#8226{{$element->name_e}}</span><br>
				@endif
				@endforeach
			</td>
			<td>
				@foreach ($elements as $element)
				@if($element->ambit=='ECONOMICO' and $element->characteristic_id==$characteristics[1]->id)
				<span style="color: black">&#8226{{$element->name_e}}</span><br>
				@endif
				@endforeach
			</td>
			<td>
				@foreach ($elements as $element)
				@if($element->ambit=='CULTURAL' and $element->characteristic_id==$characteristics[1]->id)
				<span style="color: black">&#8226{{$element->name_e}}</span><br>
				@endif
				@endforeach
			</td>
			<td>
				@foreach ($elements as $element)
				@if($element->ambit=='POLITICO' and $element->characteristic_id==$characteristics[1]->id)
				<span style="color: black">&#8226{{$element->name_e}}</span><br>
				@endif
				@endforeach
			</td>
			<td>
				@foreach ($elements as $element)
				@if($element->ambit=='LEYES-INSTITUCIONAL' and $element->characteristic_id==$characteristics[1]->id)
				<span style="color: black">&#8226{{$element->name_e}}</span><br>
				@endif
				@endforeach
			</td>
			<td>
				@foreach ($elements as $element)
				@if($element->ambit=='SALUD' and $element->characteristic_id==$characteristics[1]->id)
				<span style="color: black">&#8226{{$element->name_e}}</span><br>
				@endif
				@endforeach
			</td>
			<td>
				@foreach ($elements as $element)
				@if($element->ambit=='BIOFISICO' and $element->characteristic_id==$characteristics[1]->id)
				<span style="color: black">&#8226{{$element->name_e}}</span><br>
				@endif
				@endforeach
			</td>
		</tr>
	</table>
	<a class="btn btn-danger" href="{{ url('/'.$project_id.'/characteristic') }}" style="float: left;margin-left: 30px; margin-top: 50px">REGRESAR</a>
	<a class="btn btn-success" href="{{ url('/'.$project_id.'/table') }}" style="float: right;margin-right: 30px; margin-top: 50px">SIGUIENTE</a>
</div>
@endif

@if($num_characteristics>2)
<div class="container">
	<div class="row justify-content-center">
		<h3 style="margin-bottom:5px; font-weight: bold;color: darkblue">{{$name_problem->name_problem}}</h3>
	</div>
</div>

<div class="wrapperr" style=" width: 95%; margin: 0 auto;">
@foreach ($characteristics as $characteristic)
<table width="100%" style="text-align: left;">

  <tr>
    <td style="width: 10%"></td>
    <td style="width: 90%; border-left:1px solid black"><b style="margin-left:5px">SOCIAL:</b> 
    	@foreach ($elements as $element)
    		@if($element->characteristic_id==$characteristic->id and $element->ambit=='SOCIAL')
    		[ {{$element->name_e}} ] 
    		@endif
    	@endforeach
    </td>
  </tr>
  <tr>
    <td></td>
    <td style="width: 90%; border-left:1px solid black"><b style="margin-left:5px">ECONOMICO:</b> 
    	@foreach ($elements as $element)
    		@if($element->characteristic_id==$characteristic->id and $element->ambit=='ECONOMICO')
    		[ {{$element->name_e}} ] 
    		@endif
    	@endforeach
    </td>
  </tr>
  <tr>
    <td></td>
    <td style="width: 90%; border-left:1px solid black"><b style="margin-left:5px">CULTURAL:</b> 
    	@foreach ($elements as $element)
    		@if($element->characteristic_id==$characteristic->id and $element->ambit=='CULTURAL')
    		[ {{$element->name_e}} ] 
    		@endif
    	@endforeach
    </td>
  </tr>
  <tr>
    <td style="text-align: center;border-top:1px solid black;border-bottom:1px solid black;color:RoyalBlue;font-weight: bold"> {{$characteristic->name_c}} </td>
    <td style="width: 90%; border-left:1px solid black"><b style="margin-left:5px">POLITICO:</b> 
    	@foreach ($elements as $element)
    		@if($element->characteristic_id==$characteristic->id and $element->ambit=='POLITICO')
    		[ {{$element->name_e}} ] 
    		@endif
    	@endforeach
    </td>
  </tr>
  <tr>
    <td></td>
    <td style="width: 90%; border-left:1px solid black"><b style="margin-left:5px">LEYES-INSTITUCIONAL:</b> 
    	@foreach ($elements as $element)
    		@if($element->characteristic_id==$characteristic->id and $element->ambit=='LEYES-INSTITUCIONAL')
    		[ {{$element->name_e}} ] 
    		@endif
    	@endforeach
    </td>
  </tr>
  <tr>
    <td></td>
    <td style="width: 90%; border-left:1px solid black"><b style="margin-left:5px">SALUD:</b> 
    	@foreach ($elements as $element)
    		@if($element->characteristic_id==$characteristic->id and $element->ambit=='SALUD')
    		[ {{$element->name_e}} ] 
    		@endif
    	@endforeach
    </td>
  </tr>
  <tr>
    <td></td>
    <td style="width: 90%; border-left:1px solid black"><b style="margin-left:5px">BIOFISICO:</b> 
    	@foreach ($elements as $element)
    		@if($element->characteristic_id==$characteristic->id and $element->ambit=='BIOFISICO')
    		[ {{$element->name_e}} ] 
    		@endif
    	@endforeach
    </td>
  </tr>
</table><hr>
@endforeach
<a style="margin-bottom: 25px" class="btn btn-danger" href="{{ url('/'.$project_id.'/characteristic') }}">Regresar</a>
<a class="btn btn-success" href="{{ url('/'.$project_id.'/table') }}" style="float: right;margin-right: 30px">SIGUIENTE</a>
</div>

@endif

@endsection

