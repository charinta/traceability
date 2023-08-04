@extends('layouts.user_type.guest')

@section('content')
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid py-4">
            <div class="row">

                {{-- form --}}
                <div class="col-12 col-xl-3">
                    <div class="card h-100 w-100 mt-n4 bg-gradient-dark">
                        <div class="card-header pb-0 p-3 bg-gradient-dark">
                            <h4 class="mb-0 text-light"> <b>Register Item </b></h4>
                            <hr class="text-light">
                        </div>
                        <div class="card-body">
                            <form action="{{ route('register-item.update', $item->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="item_check" class="form-control-label text-light">Item</label>
                                    <input class="form-control" name="item_check" type="item_check" id="item_check"
                                        value="{{ old('item', $item->item_check) }}">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-warning w-100 my-4 mb-2">Update
                                        Item</button>
                                </div>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
