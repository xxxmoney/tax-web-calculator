@extends('layouts.app')

@section('title', 'New calculation')

@section('content')
    <div class="">
        <form action="{{ route('calculation_insert') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control dark:bg-transparent" id="price" name="price" placeholder="Enter price" min="0" step="0.001" required>
            </div>

            <div class="form-group">
                <label for="coeficient">Coeficient %</label>
                <input type="number" class="form-control" id="coeficient" name="coeficient" placeholder="Enter coeficient" step="1" required>
            </div>

            <div class="form-group">
                <label for="type">Type</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="fields">Fields</option>
                    <option value="classic">Classic</option>
                    <option value="duo">Duo</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary submit">Submit</button>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
@endsection

@push('css')
    <style>
        .form-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }
        .submit {
            width: 100%;
        }
    </style>
@endpush
