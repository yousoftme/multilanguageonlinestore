@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Product') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="product_name_input">Name</label>
                            <input type="text" class="form-control" id="product_name_input">
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" value="options" id="option_check">
                            <label class="form-check-label" for="option_check">Options</label>
                        </div>

                        <div id="options-container" style="display:none;">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="language_select">Language</label>
                                </div>
                                <select class="custom-select" id="language_select">
                                    <option selected>Choose...</option>
                                    @forelse ($languages as $language)
                                    <option value="{{ $language->name }}">{{ $language->name }}</option>
                                    @empty
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                    @endforelse
                                    
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="color_select">Color</label>
                                </div>
                                <select class="custom-select" id="color_select">
                                    <option selected>Choose...</option>
                                    @forelse ($colors as $color)
                                    <option value="{{ $color->code }}">{{ $color->name }}</option>
                                    @empty
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                    @endforelse
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="memory_select">Memory</label>
                                </div>
                                <select class="custom-select" id="memory_select">
                                    <option selected>Choose...</option>
                                    @forelse ($memories as $memory)
                                    <option value="{{ $memory->ram .', '.$memory->hard_drive  }}">{{ $memory->ram .', '.$memory->hard_drive  }}</option>
                                    @empty
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                    @endforelse
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="size_select">Size</label>
                                </div>
                                <select class="custom-select" id="size_select">
                                    <option selected>Choose...</option>
                                    @forelse ($sizes as $size)
                                    <option value="{{ $size->inches }}">{{ $size->inches }}</option>
                                    @empty
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                    @endforelse
                                </select>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
        $(document).ready(function () {
            $('#option_check').on( "click", function (param) { 
                var options = $('#option_check:checked').val();
                console.log(options);
                if (options == 'options') {
                    $('#options-container').show();
                } else {
                    $('#options-container').hide();
                }
            });
        });
</script>
@endpush
