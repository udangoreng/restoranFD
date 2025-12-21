@extends('layout.index')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/Popup.css') }}">
@endsection

@section('content')
<div class="modal" id="loginInfoModal">
    <div class="modal-content">
        <span class="modal-icon">✦</span>

        <h3>Unable To Finish Your Request!</h3>
        <p>
            {{ session('error') }}
        </p>
        <button class="modal-btn" id="closeLoginInfoModal">
            Understood
        </button>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('js/Popup.js') }}"></script>
@endsection
