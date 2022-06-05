@extends('layouts.frontend')
@section('title', 'Cart')
@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ route('home') }}">Home</a> <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">New Drug</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <form class="col-md-12" method="post">
                    <div class="site-blocks-table">
                        <table id="dataTable" class="table table-bordered">
                            <thead>
                            <tr id="3">
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name">Drug Name</th>
                                <th class="product-price">Unit Price</th>
                                <th class="product-price">Status</th>
                                <th class="product-price">Date preemption</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-remove">Operation</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($drugs as $key=>$drug)
                                <tr>
                                    <td class="product-thumbnail">
                                        <img src="{{ asset(''.$drug->image) }}" alt="Image"
                                             class="img-fluid">
                                    </td>
                                    <td class="product-name">
                                        <h2 class="h5 text-black">{{ $drug->name }}</h2>
                                    </td>
                                    <td>{{ number_format($drug->price) }}</td>
                                    <td>
                                        @if($drug->status==="Expired")
                                            <span class="badge p-2  badge-danger">{{ $drug->status }}</span>
                                        @elseif($drug->status==="Available")
                                            <span class="badge p-2 badge-primary">{{ $drug->status }}</span>
                                        @else
                                            <span class="badge p-2  badge-warning">{{ $drug->status }}</span>
                                        @endif

                                    </td>
                                    <td>{{ $drug->date_preemption }}</td>
                                    <td>{{ $drug->quantity }}</td>
                                    <td>
                                        <a href="{{ route('pharma.drugs.edit',$drug->slug) }}"
                                           class="btn btn-primary height-auto m-2 btn-sm">
                                            <span class="icon-pencil"></span>
                                        </a>

                                        <a href="{{ route('shop.show',$drug->slug) }}"
                                           class="btn btn-info height-auto btn-sm">
                                            <span class="icon-eye"></span>
                                        </a>

                                        <a class="btn btn-danger height-auto btn-sm"
                                           href="#" data-toggle="modal" data-target="{{ '#deleteModal'.$key }}">
                                            <span class="icon-trash"></span>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @foreach($drugs as $key=>$drug)
        <div class="modal fade" style="top: 50px" id="{{ 'deleteModal'.$key }}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="exampleModalLabel">{{ __('Are you sure thant you want to delete this ?') }}</h5>
                        <button class="close" type="button" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">{{ __('Delete') }}</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button"
                                data-dismiss="modal">{{ __('Cancel') }}</button>
                        <form action="{{ route('pharma.drugs.destroy',$drug->slug) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-primary"
                                    type="submit">{{ __('Delete') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@section('script')
    <script>$('#dataTable').DataTable();</script>
@endsection
