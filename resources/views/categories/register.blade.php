@extends('layouts.dashboard')
@section('content')

    @include("errors.list")

    <div class="container">
        <div class="row col-md-10 custyle">
            <?php
            $tournament = \App\Tournament::findOrFail($tournamentId);
            ?>
            <h2 align="center">{{ $tournament->name }}</h2>

            <div class="panel panel-flat">

                <div class="panel-body">
                    <div class="container-fluid">
                        <legend class="text-semibold">{{Lang::get('crud.select_categories_to_register')}}</legend>

                        {!! Form::open(['url'=>'invite/'.$invite->id.'/categories']) !!}
                        <h6 class="coutent-group"></h6>




                    @foreach($tournament->categories as $key => $category)
                            @if ($key % 4 == 0)
                                <div class="row">
                                    @endif
                                    <div class="col-md-3">
                                        <p>
                                            {!!  Form::label('cat['.$key.']', trans($category->name)) !!} <br/>
                                            {!!   Form::checkbox('cat['.$key.']', $category->id,null, ['class' => 'switch', 'data-on-text'=>"Si", 'data-off-text'=>"No" ]) !!}
                                        </p>
                                    </div>
                                    @if ($key % 3 == 0 && $key != 0)
                                </div>
                            @endif

                        @endforeach

                    </div>
                    <div align="right">
                        <button type="submit" class="btn btn-success">{{trans("core.save")}}</button>
                    </div>
                </div>
            </div>
            {!! Form::close()!!}

        </div>
    </div>
    <script>

        $(function () {
            $(" .switch").bootstrapSwitch();
        });
    </script>

@stop
