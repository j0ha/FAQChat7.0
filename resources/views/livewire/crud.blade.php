<div>

    <div class="form-group row">
        <label for="name" class="col-4 col-form-label">Suche</label>
        <div class="col-8">
            <input wire:model.debounce.500ms="search" type="text" class="form-control" placeholder="z.B. Rudolf">
        </div>
    </div>

    <div class="form-group row">
        <label for="orderAsc" class="col-4 col-form-label"></label>
        <div class="col-8">
            <select wire:model="orderAsc" id="orderAsc" name="orderAsc" required="required" class="custom-select">
                <option value="1">Aufsteigend</option>
                <option value="0">Absteigend</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="perPage" class="col-4 col-form-label">Ergebnisse pro Seite</label>
        <div class="col-8">
            <select wire:model="perPage" id="perPage" name="perPage" required="required" class="custom-select">
                <option>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
        </div>
    </div>
    <div class="form-group" row>
        <p class="text-muted">Zuletzt aktualisiert: @php echo(date('H:i:s d.m.Y')); @endphp - aktualisiert alle 10 Sekunden</p>
    </div>
    <table class="table table-striped" wire:poll.10000ms>
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Autor</th>
            <th scope="col">Frage</th>
            <th scope="col">Status</th>
            <th scope="col">Aktion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($fragen as $frage)
            <tr>
                <td class="border">{{ $frage->id }}</td>
                <td class="border">{{ $frage->autor }}</td>
                <td class="border">{{ $frage->frage }}</td>
                <td class="border">@if($frage->aktiv != true)<span class="badge bg-secondary my-1 text-light">Sichtbar</span>@else<span class="badge bg-warning my-1">Sichtbar</span>@endif  @if($frage->beantwortet != true)<span class="badge bg-secondary my-1 text-light">Beantwortet</span>@else<span class="badge bg-success my-1">Beantwortet</span>@endif</td>
                <td class="border">@if($frage->aktiv != true)<button wire:click.lazy="show('{{$frage->id}}')" type="button" class="btn btn-primary m-1">Zeigen</button>@else<button wire:click.lazy="hide('{{$frage->id}}')" type="button" class="btn btn-primary m-1">Verstecken</button>@endif<button wire:click.lazy="done('{{$frage->id}}')" type="button" class="btn btn-success m-1" @if($frage->beantwortet == true) disabled @endif >Beantwortet</button></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{$fragen->links()}}
    </div>
</div>
