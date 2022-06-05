@extends('layouts.frontend')
@section('title', 'Cart')
@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ route('home') }}">Home</a> <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">Orders</strong>
                </div>
            </div>
        </div>
    </div>

    <h1 class="text-center mt-5 container">
        {{ $title }}
    </h1>
    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <form class="col-md-12" method="post">
                    <div class="site-blocks-table">
                        <table id="dataTable" class="table table-bordered">
                            <thead>
                            <tr id="3">
                                <th class="product-thumbnail">Customer Name</th>
                                <th class="product-name">Customer Email</th>
                                <th class="product-name">Customer Telephone</th>
                                <th class="product-name">Customer Address</th>
                                <th class="product-price">Price</th>
                                <th class="product-price">Status</th>
                                <th class="product-price">Date</th>
                                <th class="product-remove">Operation</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($orders as $key=>$order)
                                <tr>
                                    <td class="product-name">
                                        <h2 class="h5 text-black">{{ $order->name }}</h2>
                                    </td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->telephone }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>{{ number_format($order->price) }}</td>
                                    <td>
                                        @if($order->status==="Pending")
                                            <span class="badge p-1 badge-danger">{{ $order->status }}</span>
                                        @elseif($order->status==="Supplier")
                                            <span class="badge p-1 badge-primary">{{ $order->status }}</span>
                                        @else
                                            <span class="badge p-1 badge-warning">{{ $order->status }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $order->created_at->format('d M Y') }}</td>
                                    <td>
                                        <a class="btn btn-info height-auto btn-sm"
                                           href="#" data-toggle="modal" data-target="{{ '#deleteModal'.$key }}">
                                            <span class="icon-eye"></span>
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

    @foreach($orders as $key=>$order)
        <div class="modal fade" style="top: 50px; transition: 0.3s;" id="{{ 'deleteModal'.$key }}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="exampleModalLabel">{{ __('More Information about the order') }}</h5>
                        <button class="close" type="button" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="p-1">{{ __('Customer Name') }}
                            : <strong>{{ $order->name }}</strong>
                        </div>
                        <hr>
                        <div class="p-1">{{ __('Customer Email') }}
                            : <strong>{{ $order->email }}</strong>
                        </div>
                        <hr>
                        <div class="p-1">{{ __('Customer Telephone') }}
                            : <strong>{{ $order->telephone }}</strong>
                        </div>
                        <hr>
                        <div class="p-1">{{ __('Customer address') }}
                            : <strong>{{ $order->address }}</strong>
                        </div>
                        <hr>
                        <div class="p-1">{{ __('Customer Note for this order') }}
                            : <strong>{{ $order->note }}</strong>
                        </div>
                        <hr>
                        <div class="p-1">{{ __('List of drug order') }}:
                            <table>
                                <tr>
                                    <td>Image</td>
                                    <td>Name</td>
                                    <td>Quantity</td>
                                </tr>

                                @foreach($order->orders as $cmd)
                                    <tr>
                                        <td><img class="w-25" src="{{ asset(''.$cmd->drug->image) }}" alt=""></td>
                                        <td>{{ $cmd->drug->name }}</td>
                                        <td class="text-right">{{ $cmd->quantity }}</td>
                                    </tr>
                                @endforeach

                            </table>
                        </div>
                        <hr>
                        <div class="p-1">{{ __('Total Price') }}
                            : <strong>{{ $order->price }}</strong>
                        </div>
                        <hr>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button"
                                data-dismiss="modal">{{ __('Close') }}</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@section('script')
    <script>$('#dataTable').DataTable();</script>
@endsection
