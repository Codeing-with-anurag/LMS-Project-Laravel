@if ($message = Session::get('success'))
<div class="col-lg-4">
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
    </div>
</div>
@endif

@if ($message = Session::get('error'))
<div class="col-lg-4">
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
    </div>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="col-lg-4">
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
    </div>
</div>
@endif

@if ($message = Session::get('info'))
<div class="col-lg-4">
    <div class="alert alert-info alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
    </div>
</div>
@endif

@if ($errors->any())
<div class="col-lg-4">
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>	
        Please check the form below for errors
    </div>
</div>
@endif