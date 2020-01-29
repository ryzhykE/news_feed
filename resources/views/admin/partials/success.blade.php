@if(session('success'))
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">X</span>
                </button>
                {{ session()->get('success') }}
            </div>
        </div>
    </div>
@endif
