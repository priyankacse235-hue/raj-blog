<div class="row mx-2 my-2 text-capitalize">
    <div class="col-12">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <strong>{!! \Session::get('success') !!}</strong>
            </div>
        @endif
        @if (\Session::has('error'))
            <div class="alert alert-danger">
                <strong>{!! \Session::get('error') !!}</strong>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <span>{{ $error }}</span>
                @endforeach
            </div>
        @endif
    </div>
</div>