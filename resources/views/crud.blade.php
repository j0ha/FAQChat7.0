<livewire:styles>
    @extends('layouts.app')
    <div class="container mt-4">


        @section('content')
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Fragen</div>

                            <div class="card-body">
                                @livewire('crud')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @endsection
    <livewire:scripts>
