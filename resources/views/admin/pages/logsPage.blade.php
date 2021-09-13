@extends('admin.layouts.layout')

@section('title') Admin Panel - Logs @endsection

@section('content')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <h3 class="page-title">Logs</h3>

                <form  action="{{route("showLog")}}" method="GET">

                    <label>Log Date:</label>
                    <select id="logDate" name="date">
                        @foreach($dates as $date)
                            <option @if($date==request()->input("date")) selected="selected" @endif value="{{$date}}">{{$date}}</option>
                        @endforeach
                    </select>
                    <button id="get" type="submit" class="btn btn-primary btn-sm">Get Log</button>
                </form>


                <div class="panel">
                    <div class="panel-body" id="logs">

                        @if(empty($file))
                            <h3>No Logs Found</h3>
                        @else
                            <h3>Log Date:{{request()->input("date")}} </h3>
                        <table class="table table-striped" >
                            <tbody>
                                @foreach($file as $row)
                                    <tr><td>{{$row}}</td></tr>
                                @endforeach
                            </tbody>
                        </table>


                        @endif
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
