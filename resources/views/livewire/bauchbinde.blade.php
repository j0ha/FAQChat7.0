    <div wire:poll.2000ms class="row h-100 w-100 align-items-end">
        @if($frage)
        <div class="card shadow-lg fade-in" style="width: 33%; margin: 10%">
            <div class="card-body">
                <h5 class="card-title">{{$frage->autor}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Frage</h6>
                <p class="card-text">{{$frage->frage}}</p>
            </div>
        </div>
            @endif
    </div>
