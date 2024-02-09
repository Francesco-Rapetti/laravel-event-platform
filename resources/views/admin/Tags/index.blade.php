@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center gap-3">
            <div class="d-flex justify-content-center flex-wrap">
                @foreach ($tags as $tag)
                    <div class="card w-100 m-2 glass" style="width: 18rem;">
                        <div class="card-body">
                            <h4 class="card-title"><span
                                    class="badge rounded-pill {{ $tag->color }}">{{ $tag->name }}</span>
                            </h4>
                            <p class="card-text">{{ $tag->description }}</p>
                        </div>
                        <div class="d-flex align-items-center mb-3 ps-3 justify-self-end justify-content-center">
                            <a href="{{ route('admin.tags.edit', $tag->id) }}"
                                class="btn btn-warning me-3 w-100 d-flex justify-content-center align-items-center"><i
                                    class="fa-solid fa-pen fs-5"></i></a>

                            <!-- Button trigger modal -->
                            <button type="button"
                                class="btn btn-danger me-3 w-100 d-flex justify-content-center align-items-center"
                                data-bs-toggle="modal" data-bs-target="#{{ $tag->id }}">
                                <i class="fa-solid fa-trash-can fs-5"></i>
                            </button>
                        </div>

                    </div>
                    <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
                        @csrf
                        @method('DELETE')


                        <!-- Modal -->
                        <div class="modal fade" id="{{ $tag->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content text-dark">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="warningTitle">WARNING</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete {{ $tag->name }}?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary fw-bold"
                                            data-bs-dismiss="modal">DISCARD</button>
                                        <input id="deleteBtn" class="btn btn-danger fw-bold" type="submit" value="DELETE">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
            <a id="add-project"
                class="glass border-0 text-black btn btn-primary d-flex align-items-center justify-content-center"
                href="{{ route('admin.tags.create') }}">
                <i class="fa-solid fa-plus fs-3"></i>
            </a>
        @endsection
