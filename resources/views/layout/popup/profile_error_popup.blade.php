@extends('layout.index')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/Popup.css') }}">
@endsection

@section('content')
    <div class="modal" id="loginInfoModal">
        <div class="modal-content">
            <span class="modal-icon">✦</span>

            <h3>Unable To Finish Your Request!</h3>
            @foreach (['name', 'username', 'phone', 'email', 'profile_img_path', 'birthday'] as $field)
                @error($field)
                    <p>
                        {{ $message }}
                    </p>
                @enderror
            @endforeach

            <button class="modal-btn" id="closeLoginInfoModal">
                Understood
            </button>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const modal = document.getElementById("loginInfoModal");
        const closeBtn = document.getElementById("closeLoginInfoModal");
        document.addEventListener('DOMContentLoaded', function() {
            modal.style.display = "flex";
        });
        if (closeBtn) {
                closeBtn.addEventListener('click', function() {
                    modal.style.display = "none";
                });
            }
        window.addEventListener('click', function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                    document.body.style.overflow = "auto";
                }
            });
    </script>
    <script src="{{ asset('js/Popup.js') }}"></script>
@endsection
