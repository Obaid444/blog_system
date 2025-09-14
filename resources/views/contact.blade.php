@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <h1>Contact Us</h1>
    <form class="mt-3">
        <div class="mb-3">
            <label class="form-label">Your Name</label>
            <input type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Your Email</label>
            <input type="email" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Message</label>
            <textarea class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
@endsection
