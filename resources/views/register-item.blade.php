@extends('layouts.user_type.auth')

@section('content')
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid py-4">
            <div class="row">

                {{-- form --}}
                <div class="col-12 col-xl-3 ">
                    <div class="card h-100 w-100 mt-n4 bg-gradient-dark">
                        <div class="card-header pb-0 p-3 bg-gradient-dark">
                            <h4 class="mb-0 text-light"> <b>Register Item </b></h4>
                            <hr class="text-light">
                        </div>
                        <div class="card-body">
                            <form action="{{ route('register-item.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="item_check" class="form-control-label text-light">Item</label>
                                    <input class="form-control" name="item_check" type="item_check" id="item_check">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Insert
                                        Item</button>
                                </div>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>


                {{-- table --}}
                <div class="col-12 col-xl-9">
                    <div class="card mb-4 mt-n4">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Item Table</h6>
                                <form class="form-inline" method="get" action="{{ route('register-item.search') }}">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <div class="form-group">
                                                <div class="input-group mb-4">
                                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                                    <input class="form-control" placeholder="Search" type="text"
                                                        name="search" value="{{ request('search') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table id="table_item"
                                    class="table align-items-center justify-content-center mb-0 table-striped">

                                    <thead class="text-center">
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Date</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Item</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($item as $items)
                                            <tr class="text-center" id="{{ 'index_' . $items->id }}">
                                                <td class="text-xs font-weight-bold mb-0">{{ $items->id }}</td>
                                                <td class="text-xs font-weight-bold mb-0">{{ $items->date_created }}</td>
                                                <td class="text-xs font-weight-bold mb-0">{{ $items->item_check }}</td>
                                                <td class="text-xs font-weight-bold mb-0">
                                                    <form action="{{ route('register-item.destroy', $items->id) }}"
                                                        method="POST">
                                                        {{-- icon edit --}}
                                                        <a href="javascript:void(0)" id="btn-edit-item"
                                                            data-id="{{ $items->id }}"
                                                            class="btn btn-edit-item btn-primary btn-sm fa fa-edit"></a>
                                                        <script>
                                                            var id_edit = <?php echo json_encode($items->id); ?>;

                                                            console.log("Item ID:", <?php echo json_encode($items->id); ?>);
                                                        </script>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger fa fa-trash"></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @include('components.modal-edit-item')
                    <!-- Pagination Section -->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            {{-- Previous Page Link --}}
                            @if ($item->onFirstPage())
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">
                                        <i class="fa fa-angle-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $item->previousPageUrl() }}" tabindex="-1">
                                        <i class="fa fa-angle-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                            @endif

                            {{-- Page Links --}}
                            @foreach ($item->getUrlRange(1, $item->lastPage()) as $page => $url)
                                @if ($page == $item->currentPage())
                                    <li class="page-item active"><a class="page-link"
                                            href="{{ $url }}">{{ $page }}</a></li>
                                @else
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($item->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $item->nextPageUrl() }}">
                                        <i class="fa fa-angle-right"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">
                                        <i class="fa fa-angle-right"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
