@extends('layouts.frontend')
@section('title', 'Register')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update Order Status  ')  .$order->name }}</div>

                    <div class="card-body">
                        <form method="POST"
                              action="{{ route('pharma.orders.update', $order->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="status"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>

                                <div class="col-md-6">
                                    <select name="status" class="select form-control" id="status">
                                        <option value="{{ $order->status }}">{{ $order->status }}</option>
                                        <option value="Supply">Supply</option>
                                        <option value="Pending">Pending</option>
                                        <option value="On Going">On Going </option>
                                    </select>

                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
