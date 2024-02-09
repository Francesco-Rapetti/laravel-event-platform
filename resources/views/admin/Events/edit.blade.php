@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <h2>New event</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="row">
            <form action="{{ route('admin.events.update', $event) }}" method="POST">
                @csrf
                @method('PUT')
                {{-- name description --}}
                <div class="mb-3">
                    <label for="name" class="form-label">name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name') ?? $event->name }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">description</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                        name="description" value="{{ old('description') ?? $event->description }}">
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">date</label>
                    <input type="text" class="form-control @error('date') is-invalid @enderror" id="date"
                        name="date" placeholder="yyyy-mm-dd" value="{{ old('date') ?? $event->date }}">
                    @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="available_tickets" class="form-label">available_tickets</label>
                    <input type="number" class="form-control @error('available_tickets') is-invalid @enderror"
                        id="available_tickets" name="available_tickets"
                        value="{{ old('available_tickets') ?? $event->available_tickets }}">
                    @error('available_tickets')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tags" class="form-label">Seleziona i tag</label>
                    <select name="tags[]" id="tags" class="form-select" multiple>
                        @foreach ($tags as $tag)
                            <option
                                {{ in_array($tag->id, old('tags', $event->tags->pluck('id')->toArray())) ? 'selected' : '' }}
                                value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Insert</button>
            </form>
        </div>
    </div>
@endsection
