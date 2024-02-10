<div class="container">
    <div class="row justify-content-center gap-3">
        <div class="d-flex justify-content-center flex-wrap">
            @foreach ($events as $event)
                <div class="card w-100 m-2 glass" style="width: 18rem;">
                    <div class="card-body">
                        <h3 class="card-title">{{ $event->name }}</h3>
                        @if ($event->tags)
                            @foreach ($event->tags as $tag)
                                <span class="badge rounded-pill {{ $tag->color }}">{{ $tag->name }}</span>
                            @endforeach
                        @endif
                        <p class="card-text my-3">{{ $event->description }}</p>
                        <div><i class="fa-solid fa-calendar-days me-2"></i>{{ $event->date }}</div>
                        <div><i class="fa-solid fa-ticket me-2"></i>{{ $event->available_tickets }}</div>
                        @if ($event->user_id)
                            <div><i
                                    class="fa-solid fa-user-large me-2"></i>{{ App\Models\User::find($event->user_id)->name }}
                            </div>
                        @endif
                    </div>
                    <div class="d-flex align-items-center mb-3 ps-3 justify-self-end justify-content-center">
                        <a class="btn btn-primary me-3 add-cart-btn w-100 d-flex justify-content-center align-items-center"
                            href="{{ route('admin.events.show', $event->id) }}"><i
                                class="fa-solid fa-circle-info fs-2 me-2"></i> More info
                        </a>



                        @if (Route::currentRouteName() == 'admin.events.index')
                            <a href="{{ route('admin.events.edit', $event->id) }}"
                                class="btn btn-warning me-3 w-25 d-flex justify-content-center align-items-center"><i
                                    class="fa-solid fa-pen fs-5"></i></a>

                            <!-- Button trigger modal -->
                            <button type="button"
                                class="btn btn-danger me-3 w-25 d-flex justify-content-center align-items-center"
                                data-bs-toggle="modal" data-bs-target="#{{ $event->id }}">
                                <i class="fa-solid fa-trash-can fs-5"></i>
                            </button>
                        @endif
                    </div>

                </div>
                <form action="{{ route('admin.events.destroy', $event) }}" method="POST">
                    @csrf
                    @method('DELETE')


                    <!-- Modal -->
                    <div class="modal fade" id="{{ $event->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content text-dark">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="warningTitle">WARNING</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete {{ $event->name }}?</p>
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



    </div>
</div>
