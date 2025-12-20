@extends('layout.index')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/Popup.css') }}">
@endsection

@section('content')
    <div class="modal" id="loginInfoModal">
        <div class="modal-content">
            <span class="modal-icon">✦</span>

            <h3>Your Table Awaits</h3>
            <p>
                Kindly sign in to continue your reservation<br>
                and enjoy a personalized dining experience.
            </p>

            <button class="modal-btn" id="closeLoginInfoModal">
                <a href="{{ route('auth.login') }}">
                    Understood
                </a>
            </button>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/Popup.js') }}"></script>
@endsection
