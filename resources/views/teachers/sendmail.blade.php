@extends('teachers.layout')
@section('content')
<style>
    body {
        background-color: #f8f9fa;
    }
    .email-container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .form-label {
        font-weight: 500;
    }
    .btn-send {
        background-color: #0d6efd;
        border: none;
    }
    .btn-send:hover {
        background-color: #0b5ed7;
    }
</style>
<div class="container">
    <div class="email-container">
        <h2 class="text-center mb-4">Send Email</h2>
        <form>
            <div class="mb-3">
                <label for="recipient" class="form-label">Recipient's Email</label>
                <input type="email" class="form-control" id="recipient" placeholder="Enter recipient's email" required>
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" placeholder="Enter email subject" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" rows="6" placeholder="Enter your message" required></textarea>
            </div>
            <div class="mb-3">
                <label for="attachment" class="form-label">Attachment</label>
                <input type="file" class="form-control" id="attachment">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-send text-white px-4">Send Email</button>
            </div>
        </form>
    </div>
</div>
@endsection
